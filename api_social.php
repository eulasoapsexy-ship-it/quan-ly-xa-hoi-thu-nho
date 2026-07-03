<?php
header('Content-Type: application/json; charset=utf-8');
require 'db.php';

$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    // ================= BÀI ĐĂNG (POSTS) =================
    case 'read_posts':
        $sql = "SELECT * FROM posts ORDER BY created_at DESC";
        $result = $conn->query($sql);
        $posts = [];
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
        echo json_encode($posts);
        break;

    case 'create_post':
        $author = trim($_POST['author'] ?? '');
        $content = trim($_POST['content'] ?? '');
        if ($author && $content) {
            $stmt = $conn->prepare("INSERT INTO posts (author, content) VALUES (?, ?)");
            $stmt->bind_param("ss", $author, $content);
            if ($stmt->execute()) echo json_encode(["status" => "success"]);
            $stmt->close();
        }
        break;

    case 'like_post':
    case 'share_post':
        $id = intval($_POST['id'] ?? 0);
        $column = ($action == 'like_post') ? 'likes' : 'shares';
        if ($id > 0) {
            $stmt = $conn->prepare("UPDATE posts SET $column = $column + 1 WHERE id = ?");
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) echo json_encode(["status" => "success"]);
            $stmt->close();
        }
        break;

    // ================= TIN NHẮN (MESSAGES) =================
    case 'get_users':
        // Lấy danh sách những người có thể nhắn tin
        $sql = "SELECT username, role FROM users";
        $result = $conn->query($sql);
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        echo json_encode($users);
        break;

    case 'read_messages':
        $user1 = $_POST['user1'] ?? ''; // Người đang đăng nhập
        $user2 = $_POST['user2'] ?? ''; // Người đang chat cùng
        $stmt = $conn->prepare("SELECT * FROM messages WHERE (sender = ? AND receiver = ?) OR (sender = ? AND receiver = ?) ORDER BY created_at ASC");
        $stmt->bind_param("ssss", $user1, $user2, $user2, $user1);
        $stmt->execute();
        $result = $stmt->get_result();
        $messages = [];
        while ($row = $result->fetch_assoc()) {
            $messages[] = $row;
        }
        echo json_encode($messages);
        $stmt->close();
        break;

    case 'send_message':
        $sender = $_POST['sender'] ?? '';
        $receiver = $_POST['receiver'] ?? '';
        $content = trim($_POST['content'] ?? '');
        if ($sender && $receiver && $content) {
            $stmt = $conn->prepare("INSERT INTO messages (sender, receiver, content) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $sender, $receiver, $content);
            if ($stmt->execute()) echo json_encode(["status" => "success"]);
            $stmt->close();
        }
        break;
        // ================= BÌNH LUẬN (COMMENTS) =================
    case 'read_comments':
        $sql = "SELECT * FROM comments ORDER BY created_at ASC"; // Tải bình luận cũ trước, mới sau
        $result = $conn->query($sql);
        $comments = [];
        while ($row = $result->fetch_assoc()) {
            $comments[] = $row;
        }
        echo json_encode($comments);
        break;

    case 'add_comment':
        $post_id = intval($_POST['post_id'] ?? 0);
        $parent_id = intval($_POST['parent_id'] ?? 0);
        $author = trim($_POST['author'] ?? '');
        $content = trim($_POST['content'] ?? '');

        if ($post_id > 0 && $author && $content) {
            $stmt = $conn->prepare("INSERT INTO comments (post_id, parent_id, author, content) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiss", $post_id, $parent_id, $author, $content);
            if ($stmt->execute()) echo json_encode(["status" => "success"]);
            $stmt->close();
        }
        break;

    case 'like_comment':
        $id = intval($_POST['id'] ?? 0);
        if ($id > 0) {
            $stmt = $conn->prepare("UPDATE comments SET likes = likes + 1 WHERE id = ?");
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) echo json_encode(["status" => "success"]);
            $stmt->close();
        }
        break;
}
$conn->close();
?>

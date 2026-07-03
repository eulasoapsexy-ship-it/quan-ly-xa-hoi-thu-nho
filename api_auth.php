<?php
header('Content-Type: application/json; charset=utf-8');
require 'db.php';

$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'register':
        $user = trim($_POST['username'] ?? '');
        $pass = $_POST['password'] ?? '';
        $role = $_POST['role'] ?? 'student';
        $department = $_POST['department'] ?? 'Chưa rõ'; // Nhận thêm Khoa

        if (empty($user) || empty($pass)) {
            echo json_encode(["status" => "error", "message" => "Vui lòng nhập đầy đủ thông tin!"]);
            exit;
        }

        $check = $conn->query("SELECT id FROM users WHERE username = '$user'");
        if ($check->num_rows > 0) {
            echo json_encode(["status" => "error", "message" => "Tên đăng nhập này đã có người sử dụng!"]);
            exit;
        }

        $hash_password = password_hash($pass, PASSWORD_DEFAULT);
        
        $stmt = $conn->prepare("INSERT INTO users (username, password, role, department) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $user, $hash_password, $role, $department);
        
        if ($stmt->execute()) {
            if ($role === 'student') {
                $default_name = "SV_" . $user;
                // Lưu "Khoa" vào cột class_name bên bảng Sinh viên
                $stmt_sv = $conn->prepare("INSERT INTO students (student_code, full_name, class_name, location) VALUES (?, ?, ?, 'Chưa phân phòng')");
                $stmt_sv->bind_param("sss", $user, $default_name, $department);
                $stmt_sv->execute();
                $stmt_sv->close();
            }
            echo json_encode(["status" => "success", "message" => "Đăng ký thành công! Dữ liệu đã được đồng bộ."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Lỗi hệ thống: " . $conn->error]);
        }
        $stmt->close();
        break;

    case 'login':
        $user = trim($_POST['username'] ?? '');
        $pass = $_POST['password'] ?? '';

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            if (password_verify($pass, $row['password'])) {
                // Trả về thêm department để hiển thị ở Trang cá nhân
                echo json_encode(["status" => "success", "username" => $row['username'], "role" => $row['role'], "department" => $row['department']]);
            } else {
                echo json_encode(["status" => "error", "message" => "Sai mật khẩu! Vui lòng thử lại."]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Tài khoản không tồn tại!"]);
        }
        $stmt->close();
        break;
}
$conn->close();
?>

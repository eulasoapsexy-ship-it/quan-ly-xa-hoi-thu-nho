<?php
// Thiết lập header trả về định dạng JSON và hỗ trợ tiếng Việt (UTF-8)
header('Content-Type: application/json; charset=utf-8');

// Nhúng file kết nối cơ sở dữ liệu
require 'db.php';

// Lấy tham số 'action' gửi từ Client (Fetch API)
// Hỗ trợ cả method POST và GET
$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    
    // ==========================================
    // 1. LẤY DANH SÁCH SINH VIÊN (READ)
    // ==========================================
    case 'read':
        $sql = "SELECT * FROM students ORDER BY id DESC";
        $result = $conn->query($sql);
        $students = [];
        
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $students[] = $row;
            }
        }
        
        echo json_encode($students);
        break;

    // ==========================================
    // 2. THÊM MỚI SINH VIÊN (CREATE)
    // ==========================================
    case 'create':
        $code = trim($_POST['student_code'] ?? '');
        $name = trim($_POST['full_name'] ?? '');
        $class = trim($_POST['class_name'] ?? '');
        $location = trim($_POST['location'] ?? '');

        // Kiểm tra dữ liệu rỗng ở phía Server để đảm bảo an toàn
        if (empty($code) || empty($name) || empty($class)) {
            echo json_encode(["status" => "error", "message" => "Thiếu thông tin bắt buộc!"]);
            exit;
        }

        // Sử dụng Prepare Statement để chống SQL Injection
        $stmt = $conn->prepare("INSERT INTO students (student_code, full_name, class_name, location) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $code, $name, $class, $location);
        
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Thêm sinh viên thành công!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Lỗi CSDL: " . $conn->error]);
        }
        $stmt->close();
        break;

    // ==========================================
    // 3. CẬP NHẬT THÔNG TIN SINH VIÊN (UPDATE)
    // ==========================================
    case 'update':
        $id = intval($_POST['id'] ?? 0);
        $code = trim($_POST['student_code'] ?? '');
        $name = trim($_POST['full_name'] ?? '');
        $class = trim($_POST['class_name'] ?? '');
        $location = trim($_POST['location'] ?? '');

        if ($id === 0) {
            echo json_encode(["status" => "error", "message" => "Không xác định được ID sinh viên!"]);
            exit;
        }

        $stmt = $conn->prepare("UPDATE students SET student_code = ?, full_name = ?, class_name = ?, location = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $code, $name, $class, $location, $id);
        
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Cập nhật thành công!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Lỗi CSDL: " . $conn->error]);
        }
        $stmt->close();
        break;

    // ==========================================
    // 4. XÓA SINH VIÊN (DELETE)
    // ==========================================
    case 'delete':
        $id = intval($_POST['id'] ?? 0);
        
        if ($id === 0) {
            echo json_encode(["status" => "error", "message" => "Dữ liệu ID không hợp lệ!"]);
            exit;
        }

        $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Đã xóa sinh viên khỏi hệ thống!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Không thể xóa: " . $conn->error]);
        }
        $stmt->close();
        break;

    // ==========================================
    // BẮT LỖI ACTION KHÔNG HỢP LỆ
    // ==========================================
    default:
        echo json_encode(["status" => "error", "message" => "Yêu cầu (Action) không hợp lệ hoặc không tồn tại!"]);
        break;

        case 'update_profile':
        $student_code = $_POST['student_code']; // Dùng mã SV để định danh
        $dob = $_POST['dob'];
        $hometown = $_POST['hometown'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $stmt = $conn->prepare("UPDATE students SET dob = ?, hometown = ?, phone = ?, email = ? WHERE student_code = ?");
        $stmt->bind_param("sssss", $dob, $hometown, $phone, $email, $student_code);
        
        if ($stmt->execute()) echo json_encode(["status" => "success"]);
        else echo json_encode(["status" => "error", "message" => $conn->error]);
        $stmt->close();
        break;
}

// Đóng kết nối DB sau khi xử lý xong
$conn->close();
?>

<?php
header('Content-Type: application/json; charset=utf-8');
require 'db.php';

$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'read':
        // Dùng LEFT JOIN để lấy TOÀN BỘ sinh viên từ bảng students, kể cả người chưa có điểm
        $sql = "SELECT s.student_code, s.full_name, 
                       g.id, g.attendance, g.midterm, g.final, g.exam_status 
                FROM students s 
                LEFT JOIN grades g ON s.student_code = g.student_code 
                ORDER BY s.student_code ASC";
        
        $result = $conn->query($sql);
        $grades = [];
        
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cc = $row['attendance'] ?? 0;
                $gk = $row['midterm'] ?? 0;
                $ck = $row['final'] ?? 0;
                $status = $row['exam_status'] ?? 'Cho phép thi';

                // Công thức Hệ 10: CC(10%) + GK(20%) + CK(70%)
                $diem_10 = round(($cc * 0.1) + ($gk * 0.2) + ($ck * 0.7), 1);

                // Quy đổi Hệ 4
                $diem_4 = 0;
                if ($diem_10 >= 8.5) $diem_4 = 4.0;
                elseif ($diem_10 >= 7.0) $diem_4 = 3.0;
                elseif ($diem_10 >= 5.5) $diem_4 = 2.0;
                elseif ($diem_10 >= 4.0) $diem_4 = 1.0;

                // Cấm thi -> Tự động rớt
                if ($status === 'Cấm thi') {
                    $diem_10 = 0.0;
                    $diem_4 = 0.0;
                    $html_status = '<span class="badge-danger">Cấm thi</span>';
                } else {
                    $html_status = '<span class="badge-success">Cho phép thi</span>';
                }

                $grades[] = [
                    'id' => $row['id'] ?? 0,
                    'student_code' => $row['student_code'],
                    'full_name' => $row['full_name'],
                    'attendance' => $cc,
                    'midterm' => $gk,
                    'final' => $ck,
                    'diem_10' => $diem_10,
                    'diem_4' => $diem_4,
                    'status_raw' => $status,
                    'status_html' => $html_status
                ];
            }
        }
        echo json_encode($grades);
        break;

    case 'save':
        $code = trim($_POST['student_code']);
        $attendance = floatval($_POST['attendance']);
        $midterm = floatval($_POST['midterm']);
        $final = floatval($_POST['final']);
        $status = trim($_POST['exam_status']);

        $stmt = $conn->prepare("INSERT INTO grades (student_code, attendance, midterm, final, exam_status) 
                                VALUES (?, ?, ?, ?, ?) 
                                ON DUPLICATE KEY UPDATE attendance = ?, midterm = ?, final = ?, exam_status = ?");
        $stmt->bind_param("sdddsddds", $code, $attendance, $midterm, $final, $status, $attendance, $midterm, $final, $status);
        
        if ($stmt->execute()) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => $conn->error]);
        }
        $stmt->close();
        break;

    case 'delete':
        $id = intval($_POST['id']);
        if ($id > 0) {
            $stmt = $conn->prepare("DELETE FROM grades WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        }
        echo json_encode(["status" => "success"]);
        break;
}
$conn->close();
?>

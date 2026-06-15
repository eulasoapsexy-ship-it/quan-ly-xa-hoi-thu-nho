<?php
// Thông tin kết nối XAMPP mặc định
$host = "localhost";
$username = "root";
$password = "";
$dbname = "shop_dien_tu";

// Tạo kết nối
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Nhận dữ liệu từ JavaScript gửi lên (dạng JSON)
$data = json_decode(file_get_contents("php://input"));

if(isset($data->ma_sp)) {
    $ma_sp = $data->ma_sp;
    $ten_sp = $data->ten_sp;
    $danh_muc = $data->danh_muc;
    $gia_ban = $data->gia_ban;
    $ton_kho = $data->ton_kho;

    // Câu lệnh SQL thêm vào bảng
    $sql = "INSERT INTO san_pham (ma_sp, ten_sp, danh_muc, gia_ban, ton_kho) 
            VALUES ('$ma_sp', '$ten_sp', '$danh_muc', '$gia_ban', '$ton_kho')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Đã thêm thành công!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Lỗi: " . $conn->error]);
    }
}
$conn->close();
?>

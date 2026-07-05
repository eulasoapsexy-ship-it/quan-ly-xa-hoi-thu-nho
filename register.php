<?php
// register.php
session_start();
require 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    // Mã hóa mật khẩu
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    // Sử dụng Prepared Statement để chống SQL Injection
    $stmt = $conn->prepare("INSERT INTO Users (FullName, Email, Username, Password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullname, $email, $username, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Đăng ký thành công! Hãy đăng nhập.'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Lỗi: Email hoặc Username đã tồn tại!');</script>";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký - Mạng xã hội</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .form-box { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); width: 300px; }
        .form-box input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        .form-box button { width: 100%; background: #ff6600; color: white; border: none; padding: 10px; border-radius: 5px; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>
    <div class="form-box">
        <h2 style="text-align: center; color: #ff6600;">ĐĂNG KÝ</h2>
        <form method="POST" action="">
            <input type="text" name="fullname" placeholder="Họ và tên" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <button type="submit">Đăng Ký Ngay</button>
        </form>
        <p style="text-align: center; font-size: 14px;">Đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
    </div>
</body>
</html>
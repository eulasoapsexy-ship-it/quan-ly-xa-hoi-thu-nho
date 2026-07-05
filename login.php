<?php
// login.php
session_start();
require 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT UserID, FullName, Password FROM Users WHERE Username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Kiểm tra mật khẩu mã hóa
        if (password_verify($password, $row['Password'])) {
            $_SESSION['userid'] = $row['UserID'];
            $_SESSION['fullname'] = $row['FullName'];
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Sai mật khẩu!');</script>";
        }
    } else {
        echo "<script>alert('Tên đăng nhập không tồn tại!');</script>";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập - Mạng xã hội</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .form-box { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); width: 300px; }
        .form-box input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        .form-box button { width: 100%; background: #ff6600; color: white; border: none; padding: 10px; border-radius: 5px; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>
    <div class="form-box">
        <h2 style="text-align: center; color: #ff6600;">ĐĂNG NHẬP</h2>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <button type="submit">Đăng Nhập</button>
        </form>
        <p style="text-align: center; font-size: 14px;">Chưa có tài khoản? <a href="register.php">Đăng ký</a></p>
    </div>
</body>
</html>
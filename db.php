<?php
// Kết nối MySQL với Docker container
$servername = "watchstore-db.clwm266w0lzj.ap-southeast-1.rds.amazonaws.com ";  // Tên dịch vụ MySQL trong Docker Compose
$username = "admin";  // Tên người dùng MySQL
$password = "0368534800aA";  // Mật khẩu người dùng
$dbname = "watchstore";  // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
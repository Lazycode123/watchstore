<?php
// Kết nối MySQL với Endpoint cảu database trong aws
 $servername = "watchstore-db.clwm266w0lzj.ap-southeast-1.rds.amazonaws.com"; // Địa chỉ endpoint
 $username = "admin";  // Tên người dùng MySQL // Tên người dùng
 $password = "0368534800aA";  // Mật khẩu người dùng

// Kết nối MySQL với Docker engine
 #$servername = "mysql-db"; // Địa chỉ endpoint
 #$username = "root";  // Tên người dùng MySQL // Tên người dùng
 #$password = "123456";  // Mật khẩu người dùng

$dbname = "watchstore";  // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
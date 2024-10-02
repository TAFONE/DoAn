<?php
// Kết nối đến cơ sở dữ liệu
include 'config/connection.php'; // Tập tin kết nối cơ sở dữ liệu

// Kiểm tra nếu có `IDUser` trong URL
if (isset($_GET['id'])) {
    $userId = $_GET['id']; // Lấy ID người dùng từ URL

    // Thực hiện truy vấn xóa người dùng
    $sql = "DELETE FROM adminuser WHERE IDUser = $userId";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ManagerUser.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
    
    // Đóng kết nối
    $conn->close();
} else {
    // Nếu không có ID, chuyển hướng về trang quản lý
    header("Location: ManagerUser.php");
}
?>
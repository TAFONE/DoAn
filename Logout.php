<?php
session_start();
session_unset(); // Xóa tất cả biến session
session_destroy(); // Hủy session
header('Location: Login.php'); // Chuyển hướng về trang đăng nhập
exit;
?>
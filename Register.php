<?php
// session_start();
include 'config/connection.php'; // Kết nối đến cơ sở dữ liệu

// Kiểm tra xem form đã được gửi hay chưa
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu người dùng từ form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];
    $phone = $_POST= (string)$_POST['phone'];

    // Kiểm tra nếu mật khẩu không khớp
    if ($password !== $repeat_password) {
        $error_message = "Mật khẩu không khớp!";
    } else {
        // Băm mật khẩu
        
        $full_name = $last_name. ' ' . $first_name;
        // Chèn dữ liệu người dùng vào cơ sở dữ liệu
        $sql = "INSERT INTO adminuser (NameUser, Email, Password, Phone) VALUES ('$full_name','$email','$password', '$phone')";
        
        if ($conn->query($sql) === TRUE) {
            // Đăng ký thành công
            // $_SESSION['user_email'] = $email;
            // $_SESSION['loggedin'] = true;
            header('Location: ManagerUser.php');
            exit;
        } else {
            // Đăng ký thất bại
            $error_message = "Đăng ký không thành công! Vui lòng thử lại.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng ký</title>
    <link href="adm/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="adm/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Tạo tài khoản!</h1>
                            </div>

                            <?php if (isset($error_message)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                            <?php } ?>

                            <form method="POST" action="register.php" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="first_name" class="form-control form-control-user"
                                            placeholder="Tên" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="last_name" class="form-control form-control-user"
                                            placeholder="Họ" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user"
                                        placeholder="Địa chỉ email" required>
                                </div>
                                <div class="form-group">
                                    <input type="phone" name="phone" class="form-control form-control-user"
                                        placeholder="Số điện thoại" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            placeholder="Mật khẩu" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="repeat_password"
                                            class="form-control form-control-user" placeholder="Nhập lại mật khẩu"
                                            required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Đăng ký
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="adm/vendor/jquery/jquery.min.js"></script>
    <script src="adm/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="adm/js/sb-admin-2.min.js"></script>
</body>

</html>
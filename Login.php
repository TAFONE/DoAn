<?php
session_start();

// Include the separate database connection file
include 'config/connection.php'; // 
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Simple SQL query to check email and password
    $sql = "SELECT * FROM adminuser WHERE Email = '$email' AND Password = '$password'";
    $result = $conn->query($sql);

    // Check if user exists in the database
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_email'] = $user['Email'];
        $_SESSION['user_name'] = $user['NameUser']; 
        $_SESSION['user_image'] = $user['Avatar']; 
        $_SESSION['user_IsActive'] = $user['IsActive']; 
        $_SESSION['user_id'] = $user['IDUser']; 
        $_SESSION['loggedin'] = true;

        // Redirect to homepage or dashboard
        header('Location: Admin.php');
        exit;
    } else {
        // Invalid credentials
        $error_message = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link href="adm/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="adm/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>

                                    <?php if (isset($error_message)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error_message; ?>
                                    </div>
                                    <?php } ?>

                                    <form method="POST" action="login.php" class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" id="exampleInputPassword" placeholder="Password"
                                                required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>

                                    <div class="text-center mt-3">
                                        <a class="small" href="#">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="adm/vendor/jquery/jquery.min.js"></script>
    <script src="adm/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="adm/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="adm/js/sb-admin-2.min.js"></script>
</body>

</html>
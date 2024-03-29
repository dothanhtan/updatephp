<?php
session_start();
if (isset($_SESSION["user"]))
    header("location:index.php");
include_once("model/user.php");
$information = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_REQUEST["email"];
    $passWord = $_REQUEST["password"];
    $user = User::authentication($userName, $passWord);
    if ($user != null) {
        $_SESSION["user"] = serialize($user);
        $current_user = unserialize($_SESSION["user"]); 
        header("location:index.php");
    } else {
        $information = "Đăng nhập thất bại. Vui lòng kiểm tra lại thông tin";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin - Login</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header text-center mt-3"><strong>LOGIN</strong></div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" class="form-control" name="email"
                                placeholder="Email address" required="required" autofocus="autofocus">
                            <label for="inputEmail">Email address</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" name="password" class="form-control"
                                placeholder="Password" required="required">
                            <label for="inputPassword">Password</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me">
                                Remember me
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <?php if (strlen($information) != 0) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                            echo $information;
                        ?>
                    </div>
                    <?php } ?>
                </form>
                <p class="text-center text-info">--------------------Sign in with--------------------</p>
                <button class="btn btn-outline-info btn-facebook" type="submit"><i class="fab fa-facebook-f mr-2"></i>
                    Facebook</button>
                <button class="btn btn-outline-danger btn-google float-right" type="submit"><i
                        class="fab fa-google mr-2"></i> Google</button>

            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
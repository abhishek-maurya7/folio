<?php
require 'private\functions\function.php';
require 'private\db\_dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['Login'])) {
    $username = filter_input(INPUT_GET, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_STRING);
    if ($validate->checkUsername($username)) {
        if ($validate->checkPassword($username, $password)) {
            // regenerate session ID after successful login
            session_regenerate_id(true);

            // set session cookie options
            $secure = true; // only set secure flag if using HTTPS
            $httponly = true;
            session_set_cookie_params(0, '/', '', $secure, $httponly);

            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $validate->loginUser($username);
        } else {
            $showAlert =
                '<div class="notification alert">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    Invalid Password
                </div>';
        }
    } else {
        $showAlert =
            '<div class="notification alert">
                <i class="fa-solid fa-triangle-exclamation"></i>
                User does not exist
            </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> Folio | Sign IN</title>
    <meta name="keywords" content="Folio, Portfolio, Portfolio Generator" />
    <meta name="description" content="An amazing portfolio generator" />
    <meta name="author" content="Abhishek Maurya, Shashank Patil">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0fe3b336ed.js"></script>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Sofia&display=swap'>
    <link rel="stylesheet" href='app\private\css\base.css' />
    <link rel="stylesheet" href='app\private\css\nav.css' />
    <link rel="stylesheet" href='app\private\css\login-register.css' />
</head>

<body>
    <?php include 'private\includes\nav.php'; ?>
    <main>
        <section class="login-signup">
            <div class="container">
                <?php
                global $showAlert;
                echo  $showAlert;
                ?>
                <div class="title">
                    <h1>SIGN IN</h1>
                </div>
                <div class="login-signup-form">
                    <form action="login" method="GET" name="login-signup" autocomplete="on">
                        <div class="form-control">
                            <label for="username">Username</label><br><br>
                            <input type="text" name="username" id="username" placeholder="Enter your username" required>
                        </div>
                        <div class="form-control">
                            <label for="password">Password</label><br><br>
                            <input type="password" name="password" id="password" placeholder="Enter your password" required>
                        </div>
                        <br>
                        <div class="form-control">
                            <button class="button" name="Login">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="account-status">
            <div class="container">
                <p>Don't Have an Account? <a href="signup">&nbsp; <u>Sign Up</u></a> </p>
            </div>
        </section>
    </main>
</body>

</html>
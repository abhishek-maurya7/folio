<?php
require 'private/db/_dbconnect.php';
require 'private/functions/function.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Signup'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $cpassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    if ($password == $cpassword) {
        if (!$validate->checkUsername($username)) {
            if (!$validate->checkEmail($email)) {
                $validate->createAccount($username, $email, $password);
            } else {
                $showAlert =
                    '<div class="notification alert">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Email already exists
                    </div>';
            }
        } else {
            $showAlert =
                '<div class="notification alert">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    Username already exists
                </div>';
        }
    } else {
        $showAlert =
            '<div class="notification alert">
                <i class="fa-solid fa-triangle-exclamation"></i>
                Passwords do not match
            </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Folio | Sign UP</title>
    <meta name="keywords" content="Folio, Portfolio, Portfolio Generator" />
    <meta name="description" content="An amazing portfolio generator" />
    <meta name="author" content="Abhishek Maurya, Shashank Patil">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" as="font">
    <script src="https://kit.fontawesome.com/0fe3b336ed.js"></script>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Sofia&display=swap'>
    <link rel="stylesheet" href='app/private/css/base.css' />
    <link rel="stylesheet" href='app/private/css/nav.css' />
    <link rel="stylesheet" href='app/private/css/login-register.css' />
</head>

<body>
    <?php include 'private/includes/nav.php'; ?>
    <main>
        <section class="login-signup">
            <div class="container">
                <?php
                global $showAlert;
                echo  $showAlert;
                ?>
                <div class="title">
                    <h1>SIGN UP</h1>
                </div>
                <div class="login-signup-form">
                    <form action="signup" method="post" name="login-signup" autocomplete="on">
                        <div class="form-control">
                            <label for="username">Username</label><br><br>
                            <input type="text" maxlength="14" name="username" id="username" placeholder="Enter your Username" required>
                        </div>
                        <div class="form-control">
                            <label for="email">Email</label><br><br>
                            <input type="email" maxlength="35" name="email" id="email" placeholder="Enter your Email" required>
                        </div>
                        <div class="form-control">
                            <label for="password">Password</label><br><br>
                            <input type="password" maxlength="14" name="password" id="password" placeholder="Enter your Password" required>
                        </div>
                        <div class="form-control">
                            <label for="password">Re-Enter Password</label><br><br>
                            <input type="password" name="cpassword" id="cpassword" placeholder="Enter your Password" required>
                        </div>
                        <br>
                        <div class="form-control">
                            <button class="button" name="Signup">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="account-status">
            <div class="container">
                <p>Already Have an Account? <a href="login">&nbsp; <u>Sign In</u></a> </p>
            </div>
        </section>
    </main>
</body>

</html>

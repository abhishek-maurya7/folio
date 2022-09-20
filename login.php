<?php
require "private\classes\class.php";
require 'private\db\_dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($evaluate->checkUsername($username)) {
        $sql = "SELECT password FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location: choice");
        } else {
            echo '<script>alert("Incorrect password")</script>';
        }
    } else {
        echo "<script>alert('Username does not exist')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Folio </title>
    <meta name="keywords" content="Folio, Portfolio, Portfolio Generator" />
    <meta name="description" content="An amazing portfolio generator" />
    <meta name="author" content="Abhishek Maurya, Shashank Patil">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" as="font">
    <script src="https://kit.fontawesome.com/0fe3b336ed.js"></script>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Sofia&display=swap'>
    <link rel="stylesheet" href='private\css\base.css'>
    <link rel="stylesheet" href='private\css\nav.css'>
    <link rel="stylesheet" href='private\css\login-register.css'>
</head>

<body>
    <div class="container">
        <?php include 'private\includes\nav.php'; ?>
        <div class="main">
            <div class="login-page">
                <div class="title">
                    <h1>Sign In</h1>
                </div>
                <div class="form-field">
                    <form class="login-form" action="login" method="post" name="login" autocomplete="on">
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
                            <button class="button" href="">LOGIN</button>
                        </div>
                    </form>
                </div>
                <br>
                <div class="account-status">
                    <p>Don't Have a Account? <a href="signup">Sign Up</a> </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
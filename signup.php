<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     include 'components\db\_dbconnect.php';
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     $cpassword = $_POST['cpassword'];
//     $email = $_POST['email'];
//     try {
//         if ($password == $cpassword) {
//             $hash = password_hash($password, PASSWORD_DEFAULT);
//             $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
//             $stmt = $conn->prepare($sql);
//             $stmt->bind_param("sss", $username, $email, $hash);
//             $stmt->execute();
//             echo "Account created successfully";
//         }
//     } catch (PDOException $e) {
//         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//     }
// }

require "components\class.php";
    require 'components\db\_dbconnect.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $email = $_POST['email'];;

        if($password == $cpassword) {
            if($evaluate->checkUsername($username)) {
                if($evaluate->checkEmail($email)) {
                    try {
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("sss", $username, $email, $hash);
                        $result = $stmt->execute();
                        if ($result) {
                            echo '<script>alert("Account created successfully")</script>';
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                } else {
                    echo '<script>alert("Email already exists")</script>';
                }
            } else {
                echo '<script>alert("Username already exists")</script>';
            }
        } else {
            echo '<script>alert("Passwords do not match")</script>';
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
    <link rel="stylesheet" href='components\css\base.css'>
    <link rel="stylesheet" href='components\css\nav.css'>
    <link rel="stylesheet" href='components\css\login-register.css'>
</head>

<body>
    <div class="container">
        <div class="row nav">
            <input type="checkbox" id="nav-check">
            <div class="nav-header">
                <div class="nav-title">
                    Folio
                </div>
            </div>
            <div class="nav-btn">
                <label for="nav-check">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
            </div>
            <div class="nav-links">
                <a href="https://github.com/NewbieCodes1/folio" target="_blank" rel="noopener">Github</a>
                <a href="" target="_blank">ABC</a>
                <a mailto="mailto:shashankpatil360@gmail.com,">Contact Us</a>
                <a href="" target="_blank">About Us</a>
            </div>
        </div>
        <hr>
        <div class="main">
            <div class="login-page">
                <div class="title">
                    <h1>SIGN UP</h1>
                </div>
                <div class="form-field">
                    <form class="login-form" action="signup.php" method="post" name="login" autocomplete="on">
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
                            <button class="button" href="">Sign Up</button>
                        </div>
                    </form>
                </div>
                <br>

                <div class="account-status">
                    <p>Already Have an Account? <a href="login.php">Sign In</a> </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
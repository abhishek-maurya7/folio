<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'components\db\_dbconnect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT username, email, password FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "Login successful";
        header("Location: ");
    } else {
        echo "Login failed";
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
            <!-- <div class="nav"> -->
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
            <!-- </div> -->
        </div>
        <hr>
        <div class="main">
            <div class="login-page">
                <div class="title">
                    <h1>Sign In</h1>
                </div>
                <div class="form-field">
                    <form class="login-form" action="login.php" method="post" name="login" autocomplete="on">
                        <div class="form-control">
                            <label for="username">Username</label><br><br>
                            <input type="text" name="username" id="username" placeholder="Enter your email" required>
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
                    <p>Don't Have a Account? <a href="signup.php">Sign Up</a> </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
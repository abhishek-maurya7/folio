<?php
require_once "private\classes\class.php";
require_once 'private\db\_dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $email = $_POST['email'];
    if ($password == $cpassword) {
        if (!$evaluate->checkUsername($username)) {
            if (!$evaluate->checkEmail($email)) {
                try {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sss", $username, $email, $hash);
                    $result = $stmt->execute();
                    if ($result) {
                        header("location: login");
                    }
                } catch (mysqli_sql_exception $e) {
                    $showAlert =
                        '<div class="notification alert">
                            <i class="fa-solid fa-triangle-exclamation"></i>' . 'MySqlException: ' . $e->getMessage() . '<br />' . $sql . '
                        </div>';
                }
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
    <link rel="stylesheet" href='app\private\css\base.css' />
    <link rel="stylesheet" href='app\private\css\nav.css' />
    <link rel="stylesheet" href='app\private\css\login-register.css' />
</head>

<body>
    <?php include_once 'private/include_onces/nav.php'; ?>
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
                            <input type="text" maxlength="14" name="username" id="username" placeholder="Enter your Username" require_onced>
                        </div>
                        <div class="form-control">
                            <label for="email">Email</label><br><br>
                            <input type="email" maxlength="35" name="email" id="email" placeholder="Enter your Email" require_onced>
                        </div>
                        <div class="form-control">
                            <label for="password">Password</label><br><br>
                            <input type="password" maxlength="14" name="password" id="password" placeholder="Enter your Password" require_onced>
                        </div>
                        <div class="form-control">
                            <label for="password">Re-Enter Password</label><br><br>
                            <input type="password" name="cpassword" id="cpassword" placeholder="Enter your Password" require_onced>
                        </div>
                        <br>
                        <div class="form-control">
                            <button class="button" href="">Sign Up</button>
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
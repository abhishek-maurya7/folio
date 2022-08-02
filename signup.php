<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    try {
        if ($password == $cpassword) {
            $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $username, $email, $password);
            $stmt->execute();
            echo "Account created successfully";
        }
    } catch (PDOException $e) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Folio </title>
    <meta name="keywords" content="Folio, Portfolio, Portfolio Generator">
    <meta name="description" content="An amazing portfolio generator">
    <meta name="author" content="Abhishek Maurya, Shashank Patil">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/0fe3b336ed.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <link rel="stylesheet" href='css/base.css'>
    <link rel="stylesheet" href="css/login-register.css">
</head>

<body>

    <div class="container col-9">
        <div class="navbar">
            <div class="nav">
                <div class="nav-header">
                    <div class="nav-title"><a href="home.html">Folio </a></div>
                </div>
            </div>
        </div>
        <div class="login-page">
            <div class="title">
                <h1>Sign up to <span style="font-family: 'Sofia', nunito-sans;">Folio</span></h1>
            </div>
            <div class="form-field">
                    <form action="signup.php" method="post" autocomplete="on" name="login-form" class="login-form">
                    <div class="field-part">
                        <label for="username">Username </label></br>

                        <input type="text" id="username" name="username" class="form-control" required /></br>

                        <label for="email">Email</label></br>
                        <input type="email" id="email" name="email" class="form-control" required /></br>

                        <label for="password">Password</label></br>
                        <input type="password" id="password" name="password" class="form-control" required /></br>

                        <label for="cpassword">Re-Enter Password</label></br>
                        <input type="password" id="cpassword" name="cpassword" class="form-control" required /></br>
                    </div>
                    <div class="login">
                        <input type="submit" name="submit" value="Sign Up" class="login-signup-button">

                    </div>
                </form>
            </div><br>
            <div class="account-status">
                <p>Already have an account? <a href="login.php" target="_self" class="account">Login</a></p>
            </div>
        </div>
    </div>
</body>

</html>
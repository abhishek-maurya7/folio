<!DOCTYPE html>
<html lang="en">

<head>
    <title> Folio </title>
    <meta name="keywords" content="Folio, Portfolio, Portfolio Generator" />
    <meta name="description" content="An amazing portfolio generator" />
    <meta name="author" content="Abhishek Maurya, Shashank Patil">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" as="font">
    <script src="https://kit.fontawesome.com/0fe3b336ed.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Sofia&display=swap"' rel='stylesheet'>
    <link rel="stylesheet" href='css/base.css'>
    <link rel="stylesheet" href="css/login-register.css">
</head>

<body>
    <div class="container col-9">
        <div class="navbar">
            <div class="nav">
                <div class="nav-header">
                    <div class="nav-title">
                        <a href="home.html">
                            Folio
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="login-page">
            <div class="title">
                <h1>Sign in to <span style="font-family: 'Sofia';">Folio</span></h1>
            </div>
            <div class="form-field">
                <form action="login.php" method="post" name="login-form" class="login-form" autocomplete="on">
                    <div class="field-part">
                        <label for="username">Username or Email</label></br>
                        <input type="text" id="username" name="username" class="form-control"></br>
                        <label for="password">Password</label></br>
                        <input type="password" id="password" name="password" class="form-control"></br></br>
                    </div>
                    <div class="login">
                        <input type="submit" name="login" value="Login" class="login-signup-button">
                    </div>
                </form>
            </div>
            <br>
            <div class="account-status">
                <p>Don't have an account? <a href="signup.php" target="_self" class="account">Register</a></p>
            </div>
        </div>
    </div>
</body>

</html>
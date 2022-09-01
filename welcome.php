<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Folio </title>
    <meta charset="utf-8">
    <meta name="keywords" content="Folio, Portfolio, Portfolio Generator">
    <meta name="description" content="An amazing portfolio generator">
    <meta name="author" content="Abhishek Maurya, Shashank Patil">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0fe3b336ed.js" media="screen"></script>
    <link rel="stylesheet" href="components\css\base.css">
    <link rel="stylesheet" href="components\css\nav.css">
    <link rel="stylesheet" href="components\css\index.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Sofia' media="screen">
    <link rel="icon" href="components\images\logo.png" type="image/x-icon">
</head>

<body>
 Welcome <?php echo $_SESSION['username'] ?>   
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
                <a href="pricing.html">Pricing</a>
                <a href="mailto:shashankpatil360@gmail.com">Contact Us</a>
                <a href="" target="_blank">About Us</a>
                <a href="logout.php">Logout</a>
            </div>
            <!-- </div> -->
        </div>
        <hr>
        
    </div>
</body>

</html>
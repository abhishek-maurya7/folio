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

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Sofia' media="screen">
    <link rel="icon" href="\components\images\logo.png" type="image/x-icon">
    <link rel="stylesheet" href="components\css\base.css">
    <link rel="stylesheet" href="components\css\nav.css">
    <link rel="stylesheet" href="components\css\choose.css">

    <script src="https://kit.fontawesome.com/0fe3b336ed.js" media="screen"></script>
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
                <a href="pricing.html">Pricing</a>
                <a href="mailto:shashankpatil360@gmail.com">Contact Us</a>
                <a href="">About Us</a>
                <a href="login.php">Login</a>
            </div>
        </div>
        <hr>
        <div class="row main">
            <div class="title">
                <h2>Choose Your Template</h2>
            </div>
            <div class="row template-container col-12">
                <div class="template">
                    <div class="template-title">
                        <a href="">Portfolio for Person</a>
                    </div>
                    <div class="template-description">
                        <p>Personal Portfolio is best to showcase one's skills, achievements and works. This is best option
                            for Programmer, Designer, Teacher, Artist, Photographer, etc.
                        </p>
                    </div>
                    <div class="template-image">
                        <img src="components\images\personalPortfolio.png" alt="Person Template">
                    </div>
                </div>
                <br />
                <div class="template">
                    <div class="template-title">
                        <a href="">Portfolio for Person</a>
                    </div>
                    <div class="template-description">
                        <p>Business Portfolio is best to showcase services, information, etc. This is best option for Small
                            Businesses, Companies, NGO's, Shops etc.
                        </p>
                    </div>
                    <div class="template-image">
                        <img src="components\images\businessPortfolio.png" alt="Business Template">
                    </div>
                </div>
                <!-- <div class="template">
                    <div class="template-title">
                        <h3><a href="">Portfolio for Person</a></h3>
                    <div>
                    <div class="template-description">
                        <p>
                            Personal Portfolio is best to showcase one's skills, achievements and works. This is best option
                            for Programmer, Designer, Teacher, Artist, Photographer, etc.
                        </p>
                    </div>
                    <div class="template-image">
                        <img src="components\images\portfolio.png" alt="Portfolio for Person">
                    </div>
                </div>
                <div class="template">
                    <div class="template-title">
                        <h3><a href="">Portfolio for Person</a></h3>
                    <div>
                    <div class="template-description">
                        <p>
                            Business Portfolio is best to showcase services, information, etc. This is best option for Small
                            Businesses, Companies, NGO's, Shops etc. 
                        </p>
                    </div>
                    <div class="template-image">
                        <img src="components\images\portfolio.png" alt="Portfolio for Person">
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    </div>
</body>
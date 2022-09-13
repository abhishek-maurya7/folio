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
        <?php
            include 'components/includes/nav.php';
        ?>
        <div class="row main">
            <div class="title">
                <h2>Choose Your Template</h2>
            </div>
            <div class="row template-container col-12">
                <div class="template">
                    <div class="template-title">
                        <a href="create-personal-portfolio.html">Portfolio for Person</a>
                    </div>
                    <div class="template-description">
                        <p>Personal Portfolio is best to showcase one's skills, achievements and works. This is best option
                            for Programmer, Designer, Teacher, Freelancer, Artist, Photographer, etc.
                        </p>
                    </div>
                    <div class="template-image">
                        <a href="create-personal-portfolio.html">
                            <img src="components\images\personalPortfolio.png" alt="Personal Template">
                        </a>
                    </div>
                </div>
                <br />
                <div class="template">
                    <div class="template-title">
                        <a href="">Portfolio for Business</a>
                    </div>
                    <div class="template-description">
                        <p>Business Portfolio is best to showcase services, information, etc. This is best option for Small
                            Businesses, Companies, NGO's, Projects, Shops etc.
                        </p>
                    </div>
                    <div class="template-image">
                        <a href="">
                            <img src="components\images\businessPortfolio.png" alt="Business Template">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
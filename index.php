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
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Sofia&display=swap' media="screen">
    <link rel="icon" href="components\images\logo.png" type="image/x-icon">
</head>

<body>
    <div class="container">
        <?php
            include 'components/includes/nav.php';
        ?>
        <div class="main">
            <div class="row description">
                <div class="description-text col-4">
                    <p>Get Your Portfolio Ready In Just Few Minutes</p>
                </div>
                <span class="description-image">
                    <img class="description-image" 
                        src="components\images\mockup.avif"
                        alt="folio"
                    >
                </span>
            </div>
            <div class="row get-started">
                <button class="bn5"
                        onclick="document.location='signup.php'" >Get Started</button>
            </div>
        </div>
    </div>
</body>

</html>
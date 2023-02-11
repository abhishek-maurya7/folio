<?php
session_start();
if (!isset($_SESSION['loggedin']) || !($_SESSION['loggedin'])) {
    header("location: login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Folio | Templates </title>
    <meta charset="utf-8" />
    <meta name="keywords" content="Folio, Portfolio, Portfolio Generator" />
    <meta name="description" content="An amazing portfolio generator" />
    <meta name="author" content="Abhishek Maurya, Shashank Patil" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Sofia' media="screen" />
    <link rel="icon" href="app\private\images\logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="app\private\css\base.css" />
    <link rel="stylesheet" href="app\private\css\nav.css" />
    <link rel="stylesheet" href="app\private\css\choice.css" />
    <script src="https://kit.fontawesome.com/0fe3b336ed.js" integrity="sha384-dQXoip1UH2Gf76Rt/vZNDhej9dqGkaJQAXegWARNJT95sqvNHAuqn37K64TKaC4f" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'private/includes/nav.php'; ?>
    <main>
        <div class="container">
            <section class="title">
                <h3>Choose Your Template</h3>
            </section>
            <section class="template-container">
                <div class="template">
                    <div class="template-title">
                        <a href="personal-portfolio">Portfolio for Person</a>
                    </div>
                    <div class="template-description">
                        <p>Personal Portfolio is best to showcase one's skills, achievements and works. This is best option for Programmer,
                            Designer, Teacher, Freelancer, Artist, Photographer, etc.
                        </p>
                    </div>
                    <div class="template-image">
                        <a href="personal-portfolio">
                            <img src="app\private\images\personalPortfolio.png" alt="Personal Template">
                        </a>
                    </div>
                </div>
                <br />
                <div class="template">
                    <div class="template-title">
                        <a href="">Portfolio for Business</a>
                    </div>
                    <div class="template-description">
                        <p>Business Portfolio is best to showcase services, information, etc. This is best option for Small Businesses,
                            Companies, NGO's, Projects, Shops etc.
                        </p>
                    </div>
                    <div class="template-image">
                        <a href="">
                            <img src="app\private\images\businessPortfolio.png" alt="Business Template">
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>

</html>

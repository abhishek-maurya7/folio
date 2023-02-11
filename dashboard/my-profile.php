<?php
session_start();
if (!isset($_SESSION['loggedin']) || !($_SESSION['loggedin'])) {
    header("location: ../login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Folio | Profile </title>
    <meta charset="utf-8">
    <meta name="keywords" content="Folio, Portfolio, Portfolio Generator" />
    <meta name="description" content="An amazing portfolio generator" />
    <meta name="author" content="Abhishek Maurya, Shashank Patil" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/0fe3b336ed.js" integrity="sha384-dQXoip1UH2Gf76Rt/vZNDhej9dqGkaJQAXegWARNJT95sqvNHAuqn37K64TKaC4f" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../app/private/css/base.css" />
    <link rel="stylesheet" href="../app/private/css/nav.css" />
    <link rel="stylesheet" href="..\private\css\my-profile.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Sofia&display=swap' media="screen" />
    <link rel="icon" href="..\private\images\logo.png" type="image/x-icon" />
</head>

<body>
    <div class="container">
        <?php include '../app/private/includes/nav.php' ?>
        <div class="main" id="greeting">
            <h1>hi</h1>
        </div>
    </div>
    <script>
        var currentHour = new Date().getHours(),
            output = document.getElementById('greeting');

        output.innerHTML += "Current Hour: " + currentHour;

        if ((currentHour >= 5) && (currentHour < 12)) {
            output.innerHTML += "<br/><br/> Good Morning";
        } else if ((currentHour >= 12) && (currentHour < 16)) {
            output.innerHTML += "<br/><br/> Good Afternoon";
        } else if ((currentHour >= 16) && (currentHour <= 23)) {
            output.innerHTML += "<br/><br/> Good Evening";
        }
    </script>

</body>

</html>

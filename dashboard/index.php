<?php
session_start();
if (!isset($_SESSION['loggedin']) || !($_SESSION['loggedin'])) {
  header("location: ../login");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Folio | Dashboard</title>
  <meta charset="utf-8" />
  <meta name="keywords" content="Folio, Portfolio, Portfolio Generator, Folio Dashboard" />
  <meta name="description" content="An amazing portfolio generator" />
  <meta name="author" content="Abhishek Maurya, Shashank Patil" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/0fe3b336ed.js" integrity="sha384-dQXoip1UH2Gf76Rt/vZNDhej9dqGkaJQAXegWARNJT95sqvNHAuqn37K64TKaC4f" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../app/private/css/base.css" />
  <link rel="stylesheet" href="../app/private/css/nav.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&display=swap" media="screen" />
  <link rel="icon" href="../app/private/images/logo.png" type="image/x-icon" />
  <style>
    .dashboard {
      background: rgba(0, 0, 0, 0.5);
      padding: 2rem;
      border-radius: 1rem;
      color: #fff;
      font-family: 'Sofia', cursive;
      font-size: 2rem;
      text-align: center;
    }

    @media screen and (min-width: 768px) {
      .greeting {
        width: 30%;
      }
    }
  </style>
</head>

<body>
  <?php include '../app/private/includes/nav.php'; ?>
  <main>
    <section class="landing" id="landing">
      <div class="dashboard">
        <div class="greeting">
          <?php
          $currentHour = date("H");
          if ($currentHour >= 0 && $currentHour < 12) {
            echo "Good Morning, " . $_SESSION['username'];
          } else if ($currentHour >= 12 && $currentHour < 17) {
            echo "Good Afternoon, " . $_SESSION['username'];
          } else if ($currentHour >= 17 && $currentHour < 24) {
            echo "Good Evening, " . $_SESSION['username'];
          }
          ?>
        </div>
      </div>
    </section>
  </main>
  <script src="script.js"></script>
</body>

</html>
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
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
  <script src="https://kit.fontawesome.com/0fe3b336ed.js" media="screen"></script>
  <link rel="stylesheet" href="../app/private/css/base.css" />
  <link rel="stylesheet" href="../app/private/css/nav.css" />
  <!-- <link rel="stylesheet" href="../app/private\css\index.css"> -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&display=swap" media="screen" />
  <link rel="icon" href="../app/private/images/logo.png" type="image/x-icon" />
  <style>
    .main {
      display: flex;
      flex-direction: column;
    }

    .card {
      background: #0000005d;
      backdrop-filter: blur(10px);
      padding: 1rem;
      border-radius: 1rem;
      text-transform: uppercase;
      z-index: -1;
    }

    @media screen and (min-width: 988px) {
      .main {
        flex-direction: row;
        justify-content: space-between;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <?php include_once '../app/private/include_onces/nav.php' ?>
    <div class="main">
      <div class="card">
        <h4 class="greeting"></h4>
        <h4><?php echo $_SESSION['username']; ?></h4>
      </div>
    </div>
  </div>
  <script src="script.js"></script>
</body>

</html>
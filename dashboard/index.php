<?php
session_start();
if (!isset($_SESSION['loggedin']) || !($_SESSION['loggedin'])) {
  header("location: ../login");
}

require '../app/private/db/_dbconnect.php';
require '../app/private/functions/function.php';
$username = $_SESSION['username'];
$sql = 'SELECT * FROM personalPortfolio WHERE username = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Folio | Dashboard</title>
  <meta charset="utf-8" />
  <meta name="keywords" content="Folio, Portfolio, Portfolio Generator, Folio Dashboard" />
  <meta name="description" content="Folio Dashboard" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/0fe3b336ed.js" integrity="sha384-dQXoip1UH2Gf76Rt/vZNDhej9dqGkaJQAXegWARNJT95sqvNHAuqn37K64TKaC4f" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../app/private/css/base.css" />
  <link rel="stylesheet" href="../app/private/css/nav.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&display=swap" media="screen" />
  <link rel="icon" href="../app/private/images/logo.png" type="image/x-icon" />
  <style>
    .dashboard {
      height: 90vh;
      display: flex;
      flex-direction: column;
      border-radius: 1rem;
      font-size: 2rem;
      text-align: center;
      justify-content: space-around;
    }

    .card {
      border-radius: 1rem;
      padding: 1rem;
      display: flex;
      flex-direction: column;
      justify-content: space-around;
    }

    .greeting {
      font-family: 'Sofia', cursive;
      padding: 1rem;
    }

    .website-link {
      padding: 1rem;
      display: inline;
    }

    .website-link a {
      text-decoration: underline;
    }

    .visits {
      border-radius: 1rem;
      background-color: #ffffff;
      padding: 1rem;
    }

    .img {
      width: 100%;
      height: 300px;
      border-radius: 1rem;
    }

    .bn39 {
      background-color: greenyellow;
      border-radius: 6px;
      height: 50px;
      font-size: 1.4rem;
      padding: 0.5rem 1rem;
      position: relative;
      font-weight: 700;
      z-index: 0;
    }

    @media screen and (min-width: 768px) {
      .dashboard {
        height: 100%;
        display: flex;
        flex-direction: row;
      }

      .card {
        width: 30%;

      }

      .visits {
        width: 50%;
      }

      .img {
        width: 100%;
        height: 300px;
      }
    }
  </style>
</head>

<body>
  <?php include '../app/private/includes/nav.php'; ?>
  <main>
    <section class="landing" id="landing">
      <div class="dashboard">
        <div class="card">
          <div class="greeting">
            <?php
            $currentHour = date("H");
            if ($currentHour >= 0 && $currentHour < 12) {
              echo "Good Morning, " . $row['firstName'];
            } else if ($currentHour >= 12 && $currentHour < 17) {
              echo "Good Afternoon, " . $row['firstName'];
            } else if ($currentHour >= 17 && $currentHour < 24) {
              echo "Good Evening, " . $row['firstName'];
            }
            ?>
          </div>
          <div class="website-link">
            Your website is live at: <a target="_blank" href='<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $_SESSION['username'] ?>'><?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $_SESSION['username']; ?></a>
          </div>
          <div class="update">
            <button class="bn39" onclick="window.location.href = 'update'">Update Your Portfolio</button>
          </div>
        </div>
        <div class="visits">
          <h4>Visits in current year</h4>
          <?php
          $visits = $row['visits'];
          $visits = unserialize($visits);
          $visits = $visits[0];
          $visits = array_values($visits);
          $visits = implode(',', $visits);
          echo "<img src='https://quickchart.io/chart?c={type:\"bar\",data:{labels:[\"Jan\",\"Feb\",\"Mar\",\"Apr\",\"May\",\"Jun\",\"Jul\",\"Aug\",\"Sep\",\"Oct\",\"Nov\",\"Dec\"],datasets:[{label:\"Visits\",data:[" . $visits . "],backgroundColor:\"rgba(255, 99, 132, 0.2)\",borderColor:\"rgba(255, 99, 132, 1)\",borderWidth:1},{label:\"Visits\",data:[" . $visits . "],type:\"line\",fill:false,borderColor:\"rgba(54, 162, 235, 1)\",borderWidth:1}]},options:{scales:{yAxes:[{ticks:{beginAtZero:true}}]}}}' class='img' />";
          ?>
        </div>
      </div>
    </section>
    <section id="contact-requests" class="contact-requests">
      <div class="contact-request">

      </div>
    </section>
  </main>
  <script src="script.js"></script>
</body>

</html>
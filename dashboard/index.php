<?php
session_start();
if (!isset($_SESSION['loggedin']) || !($_SESSION['loggedin'])) {
  header("location: ../login");
}
require '../app/private/db/_dbconnect.php';
require '../app/private/functions/function.php';
$username = $_SESSION['username'];
$sql = 'SELECT * FROM personalportfolio WHERE username = ?';
$pstmt = $conn->prepare($sql);
$pstmt->bind_param('s', $username);
$pstmt->execute();
$presult = $pstmt->get_result();

$sql = 'SELECT * FROM businessportfolio WHERE username = ?';
$bstmt = $conn->prepare($sql);
$bstmt->bind_param('s', $username);
$bstmt->execute();
$bresult = $bstmt->get_result();

if ($presult->num_rows > 0) {
  $row = $presult->fetch_assoc();
  $name = $row['firstName'] . ' ' . $row['lastName'];
  $type = 'portfolio';
  $update = 'p-update';
} else if ($bresult->num_rows > 0) {
  $row = $bresult->fetch_assoc();
  $name = $row['companyName'];
  $type = 'business';
  $update = 'b-update';
} else {
  header("location: ../choice");
}

$contactSql = 'SELECT * FROM contact WHERE username = ?';
$contactStmt = $conn->prepare($contactSql);
$contactStmt->bind_param('s', $username);
$contactStmt->execute();
$contactResult = $contactStmt->get_result();;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Folio | Dashboard</title>
  <meta charset="utf-8" />
  <meta name="keywords" content="Folio, Portfolio, Portfolio Generator, Folio Dashboard" />
  <meta name="description" content="Folio Dashboard" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/0fe3b336ed.js" crossorigin="anonymous"></script>
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

    .field-title {
      font-size: 3rem;
      text-decoration: underline #0073ff 3px;
      text-underline-offset: 1.5rem;
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

    .contact-request-container {
      display: flex;
      flex-direction: column;
      justify-content: space-around;
      align-items: center;
      margin-top: 2rem;
    }

    .contact-request {
      width: 100%;
      background-color: #2b124A;
      padding: 1rem;
      border-radius: 1rem;
      margin: 1rem;
      font-size: 1.5rem;
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

      .contact-requests {
        padding: 0 10%;
      }

      .contact-request-container {
        flex-direction: row;
        width: 100%;
        flex-wrap: wrap;
      }

      .contact-request {
        width: 30%;
        font-size: 1.5rem;
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
              echo "Good Morning, " . $name;
            } else if ($currentHour >= 12 && $currentHour < 17) {
              echo "Good Afternoon, " . $name;
            } else if ($currentHour >= 17 && $currentHour < 24) {
              echo "Good Evening, " . $name;
            }
            ?>
          </div>
          <div class="website-link">
            Your website is live at: <a target="_blank" href='<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $type . '/' . $_SESSION['username'] ?>'><?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $type . '/' . $_SESSION['username']; ?></a>
          </div>
          <div class="update">
            <button class="bn39" onclick="window.location.href = '<?php echo $update; ?>'">Update Your Portfolio</button>
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
      <div class="field-title">Contact Requests</div>
      <div class="contact-request-container">
        <?php
        if ($contactResult->num_rows > 0) {
          while ($contactRequets = $contactResult->fetch_assoc()) {
            echo "<div class='contact-request'>";
            echo "<div class='name'>Name: " . $contactRequets['name'] . "</div>";
            echo "<div class='email'>Email: " . $contactRequets['email'] . "</div>";
            echo "<div class='message'>Message: " . $contactRequets['message'] . "</div>";
            echo "</div>";
          }
        } else {
          echo "<div class='contact-request'>";
          echo "<div class='name'>No contact requests yet</div>";
          echo "</div>";
        }
        ?>
      </div>
    </section>
  </main>
  <script src="script.js"></script>
</body>

</html>
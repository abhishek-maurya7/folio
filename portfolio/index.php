<?php

require '..\app\private\db\_dbconnect.php';
require '..\app\private\functions\function.php';
$username = filter_var(explode('/', $_SERVER['REQUEST_URI'])[2], FILTER_SANITIZE_STRING);
$sql = 'SELECT * FROM personalPortfolio WHERE username = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if (!$result->num_rows > 0) {
    header('Location: 404');
}
$validate->incrementVisits($username);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['firstName'] . ' ' . $row['lastName']; ?></title>
    <meta name="description" content="<?php echo $row['aboutMe']; ?>" />
    <link rel="stylesheet" href="portfolio/css/nav.css">
    <link rel="stylesheet" href="portfolio/css/footer.css">
    <link rel="stylesheet" href="portfolio/css/index.css">
    <link rel="stylesheet" href="portfolio/css/base.css">
    <script src="https://kit.fontawesome.com/0fe3b336ed.js" integrity="sha384-dQXoip1UH2Gf76Rt/vZNDhej9dqGkaJQAXegWARNJT95sqvNHAuqn37K64TKaC4f" crossorigin="anonymous"></script>
    <script type="text/javascript">
        (function() {
            var css = document.createElement('link');
            css.href = 'https://kit.fontawesome.com/0fe3b336ed.js';
            css.rel = 'stylesheet';
            css.type = 'text/css';
            document.getElementsByTagName('head')[0].appendChild(css);
        })();
    </script>
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="index.php"><?php echo $row['firstName']; ?></a>
        </div>
        <nav class="nav">
            <input type="checkbox" id="nav-check">
            <ul class="nav-links">
                <li><a href="#about">About</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="">Certificates</a></li>
                <li><a href="#contactMe">Contact Me</a></li>
            </ul>
        </nav>
        <div class="hamburger-container">
            <label class="hamburger" for="nav-check">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </label>
        </div>
    </header>
    <hr />
    <main>
        <section class="name-image">
            <div class="container">
                <div class="profile">
                    <div class="profile-image-container">
                        <img class="profile-image" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($row['profileImg']) ?>" alt="<?php echo $row['firstName'] . ' ' . $row['lastName'] ?>'s Picture" />
                    </div>
                    <div class="profile-name">
                        <h1><?php echo $row['firstName'] . ' ' . $row['lastName']; ?></h1>
                    </div>
                </div>
                <div class="social-links">
                    <a href="<?php echo $row['github']; ?>"><i class="fab fa-square-github "></i></a>
                    <a href="<?php echo $row['twitter']; ?>"><i class="fa-brands fa-square-twitter"></i></a>
                    <a href="<?php echo $row['facebook']; ?>"><i class="fab fa-square-facebook"></i></a>
                    <a href="<?php echo $row['yt']; ?>"><i class="fa-brands fa-square-youtube"></i></a>
                    <a href="<?php echo $row['LinkedIn']; ?>"><i class="fab fa-linkedin"></i></a>
                    <a href="<?php echo $row['instagram']; ?>"><i class="fa-brands fa-square-instagram"></i></a>
                </div>
            </div>
            <div class="arrow-container">
                <a href="#about"><i class="fa-solid fa-angles-down"></i></a>
            </div>
        </section>
        <section class="about" id="about">
            <div class="container">
                <div class="about-me">
                    <h1>About Me</h1>
                    <p><?php echo $row['aboutMe']; ?></p>
                </div>
            </div>
    </main>
</body>

</html>
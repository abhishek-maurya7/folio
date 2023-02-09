<?php

require '..\app\private\db\_dbconnect.php';
$username = explode('/', $_SERVER['REQUEST_URI'])[2];

$sql = 'SELECT * FROM personalPortfolio WHERE username = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$profileImage = $row['profileImg'];
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
    <script src="https://kit.fontawesome.com/0fe3b336ed.js" crossorigin="anonymous">
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
            <!-- <div class="profile"><div class="profile-image-container"><img class="profile-image" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($profileImage) ?>" alt="<?php echo $row['firstName'] . ' ' . $row['lastName'] ?>'s Picture"></div> -->
            <div class="container">
                <div class="profile">
                    <div class="profile-image-container">
                        <img class="profile-image" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($profileImage) ?>" alt="<?php echo $row['firstName'] . ' ' . $row['lastName'] ?>'s Picture">
                    </div>
                    <div class="profile-name">
                        <h1><?php echo $row['firstName'] . ' ' . $row['lastName']; ?></h1>
                    </div>
                </div>
                <div class="social-links">
                    <a href="<?php echo $row['github']; ?>"><i class="fab fa-github"></i></a>
                    <a href="<?php echo $row['twitter']; ?>"><i class="fab fa-twitter"></i></a>
                    <a href="<?php echo $row['facebook']; ?>"><i class="fab fa-facebook"></i></a>
                    <a href="<?php echo $row['yt']; ?>"><i class="fab fa-youtube"></i></a>
                    <a href="<?php echo $row['LinkedIn']; ?>"><i class="fab fa-linkedin"></i></a>
                    <a href="<?php echo $row['instagram']; ?>"><i class="fab fa-instagram"></i></a>
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
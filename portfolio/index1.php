<?php

require '..\app\private\db\_dbconnect.php';
$url = explode('/', $_SERVER['REQUEST_URI']);
$username = $url[2];
echo $username;
// $sql = "SELECT profileImg FROM personalPortfolio WHERE username = ?";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("s", $username);
// $stmt->execute();
// $result = $stmt->get_result();
// $row = $result->fetch_assoc();
// $profileImage = $row['profileImg'];
// header("Content-type: image/jpeg", true, 200);
// echo $profileImage;
echo "hello";
?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abhishek Maurya</title>
    <meta name="description" content="<?php echo $row['aboutMe']; ?>" />
    <link rel="stylesheet" href="portfolio/css/base.css">
    <link rel="stylesheet" href="portfolio/css/nav.css">
    <link rel="stylesheet" href="portfolio/css/footer.css">
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="index.php">Abhishek</a>
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
    </main>
    <?php
    require '..\app\private\db\_dbconnect.php';
    $url = explode('/', $_SERVER['REQUEST_URI']);
    $username = $url[2];
    echo $username;
    $sql = "SELECT profileImg FROM personalPortfolio WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $profileImage = $row['profileImg'];
    header("Content-type: image/jpeg", true, 200);
    echo $profileImage;
    ?>
    <footer>
        <div class="footer">
            <p>© 2021 Abhishek Maurya</p>
        </div>
    </footer>
</body>

</html> -->
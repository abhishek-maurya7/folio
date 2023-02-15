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
        window.addEventListener('load', function() {
            const altTexts = document.querySelectorAll('.alt-text');
            for (let i = 0; i < altTexts.length; i++) {
                altTexts[i].style.display = 'none';
            }
        });
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
                <li><a href="#contactMe">Contact</a></li>
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
        <section class="profile" id="profile">
            <div class="profile-container">
                <div class="profile-image-container">
                    <img class="profile-image" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($row['profileImg']) ?>" alt="<?php echo $row['firstName'] . ' ' . $row['lastName'] ?>'s Picture" />
                </div>
                <div class="profile-intro">
                    <div class="profile-greeting">
                        <div><span class="wave"> 👋 </span> Hello! I am</div>
                    </div>
                    <div class="profile-name">
                        <div><?php echo $row['firstName'] ?> <span class="lastName"><?php echo $row['lastName']; ?></span></div>
                    </div>
                    <div class="profile-role">
                        <div>and I'm a <?php echo $row['profession']; ?></div>
                    </div>
                </div>
            </div>
            <div class="social-links">
                <div class="link-container">
                    <a href="<?php echo $row['github']; ?>" target="_blank">
                        <i class="fab fa-github"></i>
                        <span class="alt-text">Github</span>
                    </a>
                </div>
                <div class="link-container">
                    <a href="<?php echo $row['LinkedIn']; ?>" target="_blank"><i class="fab fa-linkedin"></i>
                        <span class="alt-text">LinkedIN</span>
                    </a>
                </div>
                <div class="link-container">
                    <a href="<?php echo $row['twitter']; ?>" target="_blank"><i class="fab fa-twitter"></i>
                        <span class="alt-text">Twitter</span>
                    </a>
                    </a>
                </div>
                <div class="link-container">
                    <a href="<?php echo $row['instagram']; ?>" target="_blank"><i class="fab fa-instagram"></i>
                        <span class="alt-text">Instagram</span>
                    </a>
                </div>
                <div class="link-container">
                    <a href="<?php echo $row['facebook']; ?>" target="_blank"><i class="fab fa-facebook"></i>
                        <span class="alt-text">Facebook</span>
                    </a>
                </div>
                <div class="link-container">
                    <a href="<?php echo $row['yt']; ?>" target="_blank"><i class="fab fa-youtube"></i>
                        <span class="alt-text">Youtube</span>
                    </a>
                </div>
                <div class="link-container">
                    <a href="mailto:<?php echo $row['email']; ?>"><i class="fas fa-envelope"></i>
                        <span class="alt-text">Email</span>
                    </a>
                </div>
            </div>
            <div class="arrow-container">
                <a href="#about"><i class="fa-solid fa-angles-down arrow"></i></a>
            </div>
        </section>
        <section class="profile-info" id="profile-info">
            <div class="field-title">About Me</div>
            <div class="about-container">
                <div class="about-text">
                    <?php echo $row['aboutMe']; ?>
                </div>
            </div>
            <div class="field-title">Certificates</div>
            <div class="certificate-container">
                <?php
                for ($i = 1; $i <= 3; $i++) {
                    $certificateName = 'certificateName' . $i;
                    $certificateLink = 'certificateLink' . $i;
                    $certificateClaimDate = 'certificateClaimDate' . $i;
                    if ($row[$certificateName] != '') {
                        echo '<div class="certificate">
                                <div class="certificate-info">
                                    <div class="certificate-name">' . $row[$certificateName] . '</div>
                                    <div class=""> Date Obtained: ' . $row[$certificateClaimDate] . '</div>
                                </div>
                                <div class="certificate-link"><button onclick="' . $row[$certificateLink] . '" class="link-btn">View</button></div>
                            </div>';
                    }
                }
                ?>
            </div>
        </section>
    </main>
    <script type="text/javascript">
        function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less";
                moreText.style.display = "inline";
            }
        }
    </script>
</body>

</html>
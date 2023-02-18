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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    $showAlert = $validate->contact($username, $name, $email, $subject, $message);
}
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
                <li><a href="#profile-info">About</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#certificate">Certificates</a></li>
                <li><a href="#contact">Contact</a></li>
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
        <section id="profile" class="profile">
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
                <div class="social-links">
                    <div class="link-container">
                        <a href="<?php echo $row['github']; ?>" target="_blank" rel="noopener"><i class="fab fa-github link-icon"></i>
                            <span class="alt-text">Github</span>
                        </a>
                    </div>
                    <div class="link-container">
                        <a href="<?php echo $row['LinkedIn']; ?>" target="_blank" rel="noopener"><i class="fab fa-linkedin link-icon"></i></a>
                        <span class="alt-text">LinkedIN</span>
                        </a>
                    </div>
                    <div class="link-container">
                        <a href="<?php echo $row['twitter']; ?>" target="_blank" rel="noopener"><i class="fab fa-twitter link-icon "></i>
                            <span class="alt-text">Twitter</span>
                        </a>
                        </a>
                    </div>
                    <div class="link-container">
                        <a href="<?php echo $row['instagram']; ?>" target="_blank" rel="noopener"><i class="fab fa-instagram link-icon"></i>
                            <span class="alt-text">Instagram</span>
                        </a>
                    </div>
                    <div class="link-container">
                        <a href="<?php echo $row['facebook']; ?>" target="_blank" rel="noopener"><i class="fab fa-facebook link-icon"></i>
                            <span class="alt-text">Facebook</span>
                        </a>
                    </div>
                    <div class="link-container">
                        <a href="<?php echo $row['yt']; ?>" target="_blank" rel="noopener"><i class="fab fa-youtube link-icon"></i>
                            <span class="alt-text">Youtube</span>
                        </a>
                    </div>
                    <div class="link-container">
                        <a href="mailto:<?php echo $row['email']; ?>"><i class="fas fa-envelope link-icon"></i>
                            <span class="alt-text">Email</span>
                        </a>
                    </div>
                </div>
                <div class="arrow-container">
                    <a href="#profile-info"><i class="fa-solid fa-angles-down arrow"></i></a>
                </div>
            </div>
            <div class="profile-info" id="profile-info">
                <div class="field-title">About Me</div>
                <div class="about-container">
                    <div class="about-text">
                        <?php echo $row['aboutMe']; ?>
                    </div>
                </div>
                <div class="field-title" id="certificate">Certificates</div>
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
                                        <div class="certificate-date"> Date Obtained: ' . $row[$certificateClaimDate] . '</div>
                                    </div>
                                <div class="certificate-links"><button onclick="window.open(\'' . $row[$certificateLink] . '\', \'_blank\', \'noopener\')" class="link-btn">View</button></div>
                            </div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
        <section id="projects" class="projects">
            <div class="field-title">Projects</div>
            <div class="project-container">
                <?php
                for ($i = 1; $i <= 3; $i++) {
                    $projectTitle = 'projectTitle' . $i;
                    $projectDescription = 'projectDescription' . $i;
                    $projectLink = 'projectLink' . $i;
                    $projectCodeLink = 'projectCodeLink' . $i;
                    echo '<div class="project">
                        <div class="project-name">' . $row[$projectTitle] . '</div>
                        <div class="project-description">' . $row[$projectDescription] . '</div>
                        <div class="project-links">
                            <button onclick="window.open(\'' . $row[$projectLink] . '\', \'_blank\', \'noopener\')" class="link-btn">View Project</button>
                            <button onclick="window.open(\'' . $row[$projectCodeLink] . '\', \'_blank\', \'noopener\')" class="link-btn">View Code</button>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </section>
    </main>
    <footer class="contact" id="contact">
        <div class="field-title">Let's get in touch</div>
        <div class="contact-container">
            <form action="<?php echo $username . '#contact'; ?>" class="contact-form" name="contact-form" method="post" autocomplete="on">
                <div class="form-control">
                    <label for="name">Name</label><br><br>
                    <input type="text" name="name" id="name" placeholder="Enter your name" required>
                </div>
                <div class="form-control">
                    <label for="email">Email</label><br><br>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                </div>
                <div class="form-control">
                    <label for="subject">Subject</label><br><br>
                    <input type="text" name="subject" id="subject" placeholder="Enter your subject" required>
                </div>
                <div class="form-control">
                    <label for="message">Message</label><br><br>
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your message" required></textarea>
                </div>
                <div class="form-control">
                    <button type="submit" class="bn39">
                        Send Message <span><i class="fas fa-paper-plane send-message"></i></span>
                    </button>
                </div>
                <?php
                global $showAlert;
                echo  $showAlert;
                ?>
            </form>
        </div>
    </footer>
</body>

</html>
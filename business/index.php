<?php
require '../app/private/db/_dbconnect.php';
require '../app/private/functions/function.php';
$username = filter_var(explode('/', $_SERVER['REQUEST_URI'])[2], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sql = 'SELECT * FROM businessPortfolio WHERE username = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$type = 'website';
if (!$result->num_rows > 0) {
    header('Location: 404');
}
$validate->incrementVisits($username, $type);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if ($validate->contact($username, $name, $email, $subject, $message, $type)) {
        $showAlert =
            '<div class="notification success">
                <i class="fa-solid fa-check-circle"></i>
                Message sent successfully!
            </div>';
    } else {
        $showAlert =
            '<div class="notification alert">
                <i class="fa-solid fa-triangle-exclamation"></i>
                Message could not be sent!
            </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['companyName']; ?></title>
    <meta name="description" content="<?php echo $row['aboutCompany']; ?>" />
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/index.css">
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
            <a href="index.php"><?php echo $row['companyName']; ?></a>
        </div>
        <nav class="nav">
            <input type="checkbox" id="nav-check">
            <ul class="nav-links">
                <li><a href="#landing">Home</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#services">Services</a></li>
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
        <section class="landing" id="landing">
            <div class="landing-text-container">
                <h1 class="landing-text"><?php echo $row['companyName']; ?></h1>
                <h3 class="landing-subtext"><?php echo $row['companySlogan']; ?></h3>
            </div>
            <div class="landing-image-container">
                <img class="landing-image" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($row['companyCover']); ?>" alt="Company's Picture" />
            </div>
            <div class="arrow-container">
                <a href="#profile-info"><i class="fa-solid fa-angles-down arrow"></i></a>
            </div>
        </section>
        <section id="gallery" class="gallery">
            <div class="field-title">Gallery</div>
            <div class="gallery-container">
                <div class="scope">
                    <?php
                    for ($i = 1; $i <= 5; $i++) {
                        if ($row['companyImg' . $i] != '') {
                            echo '<span style="--i:' . $i . '">
                            <img src="data:image/jpeg;base64,' . base64_encode($row['companyImg' . $i]) . '" alt="not found">
                        </span>';
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
        <section id="services" class="services">
            <div class="field-title">Services</div>
            <div class="services-container">
                <?php
                for ($i = 1; $i <= 3; $i++) {
                    if ($row['productName' . $i] != '') {
                        echo '<div class="service">
                                    <div class="service-image-container">
                                        <img src="data:image/jpeg;base64,' . base64_encode($row['productImg' . $i]) . '" alt="Service ' . $i . '" class="service-image" />
                                    </div>
                                    <div class="service-title">' . $row['productName' . $i] . '</div>
                                    <div class="service-description">' . $row['productAbout' . $i] . '</div>
                                </div>';
                    }
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
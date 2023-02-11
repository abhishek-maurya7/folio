<?php
session_start();
if (!isset($_SESSION['loggedin']) || !($_SESSION['loggedin'])) {
    header("location: login");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'private/functions/function.php';
    require 'private/db/_dbconnect.php';
    $username = $_SESSION['username'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $profession = $_POST['profession'];
    $email = $_POST['email'];

    $imgType = $_FILES['profileImg']['type'];
    $allowedTypes = array('image/jpeg', 'image/png', 'image/jpg');
    if (!in_array($imgType, $allowedTypes)) {
        $showAlert =
            '<div class="notification alert">
                <i class="fa-solid fa-triangle-exclamation"></i>
                Image type should be jpeg, jpg or png
            </div>';
    }
    $imgSize = $_FILES['profileImg']['size'];
    if ($imgSize > 5000000) {
        $showAlert =
            '<div class="notification alert">
                <i class="fa-solid fa-triangle-exclamation"></i>
                Image size should be less than 5MB
            </div>';
    }
    $img = $_FILES['profileImg']['tmp_name'];
    $imgContent = addslashes(file_get_contents($img));

    $about = $_POST['aboutMe'];
    $instagram = $_POST['instagram'];
    $yt = $_POST['yt'];
    $github = $_POST['github'];
    $twitter = $_POST['twitter'];
    $facebook = $_POST['facebook'];
    $linkedin = $_POST['linkedIn'];
    $projectTitle = $_POST['projectTitle'];
    $projectLink = $_POST['projectLink'];
    $projectDescription = $_POST['projectDescription'];
    $projectTitle2 = $_POST['projectTitle2'];
    $projectLink2 = $_POST['projectLink2'];
    $projectDescription2 = $_POST['projectDescription2'];
    $projectTitle3 = $_POST['projectTitle3'];
    $projectLink3 = $_POST['projectLink3'];
    $projectDescription3 = $_POST['projectDescription3'];
    $certificateName = $_POST['certificateName'];
    $certificateClaimDate = $_POST['certificateClaimDate'];
    $certificateLink = $_POST['certificateLink'];
    $certificateName2 = $_POST['certificateName2'];
    $certificateClaimDate2 = $_POST['certificateClaimDate2'];
    $certificateLink2 = $_POST['certificateLink2'];
    $certificateName3 = $_POST['certificateName3'];
    $certificateClaimDate3 = $_POST['certificateClaimDate3'];
    $certificateLink3 = $_POST['certificateLink3'];

    $currentYear = 'year' . date('Y') . 'Visits';
    echo $currentYear . '<br/>';
    $visits = array();
    $yearFormat = array('Jan' => 0, 'Feb' => 0, 'Mar' => 0, 'Apr' => 0, 'May' => 0, 'Jun' => 0, 'Jul' => 0, 'Aug' => 0, 'Sep' => 0, 'Oct' => 0, 'Nov' => 0, 'Dec' => 0);
    array_unshift($visits, $currentYear);
    $visits[0] = $yearFormat;
    $visits = serialize($visits);

    if ($validate->checkUsername($username)) {
        try {
            $sql = "INSERT INTO personalPortfolio (username, firstName, lastName, profession, email, profileImg, aboutMe, instagram, yt, github, twitter, facebook, linkedIn, projectTitle, projectLink, projectDescription, projectTitle2, projectLink2, projectDescription2, projectTitle3, projectLink3, projectDescription3, certificateName, certificateClaimDate, certificateLink, certificateName2, certificateClaimDate2, certificateLink2, certificateName3, certificateClaimDate3, certificateLink3, visits) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssssssssssssssssssssssssssss", $username, $firstName, $lastName, $profession, $email, $imgContent, $about, $instagram, $yt, $github, $twitter, $facebook, $linkedin, $projectTitle, $projectLink, $projectDescription, $projectTitle2, $projectLink2, $projectDescription2, $projectTitle3, $projectLink3, $projectDescription3, $certificateName, $certificateClaimDate, $certificateLink, $certificateName2, $certificateClaimDate2, $certificateLink2, $certificateName3, $certificateClaimDate3, $certificateLink3, $visits);
            $stmt->execute();
            header("location: dashboard");
        } catch (mysqli_sql_exception $e) {
            $showAlert =
                '<div class="notification alert">
                    <i class="fa-solid fa-triangle-exclamation"></i>' . 'MySqlException: ' . $e->getMessage() . '<br />' . $sql . '
                </div>';
        }
    } else {
        $showAlert =
            '<div class="notification alert">
                <i class="fa-solid fa-triangle-exclamation"></i>
                User does not exist
            </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Folio </title>
    <meta charset="UTF-8">
    <meta name="keywords" content="Folio, Portfolio, Portfolio Generator">
    <meta name="description" content="An amazing portfolio generator">
    <meta name="author" content="Abhishek Maurya, Shashank Patil">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Sofia' media="screen">
    <link rel="icon" href="private\images\logo.png" type="image/x-icon">
    <link rel="stylesheet" href="app\private\css\base.css">
    <link rel="stylesheet" href="app\private\css\nav.css">
    <link rel="stylesheet" href="app\private\css\personal-portfolio.css">

    <script src="https://kit.fontawesome.com/0fe3b336ed.js" integrity="sha384-dQXoip1UH2Gf76Rt/vZNDhej9dqGkaJQAXegWARNJT95sqvNHAuqn37K64TKaC4f" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <?php
        include 'private\includes\nav.php';
        ?>
        <?php
        global $showAlert;
        echo  $showAlert;
        ?>
        <div class="row title">
            <h1> Create your portfolio </h1>
        </div>
        <div class="row main">
            <div class="form-field">
                <form class="information-form" action="personal-portfolio" method="post" name="information-form" enctype="multipart/form-data" autocomplete="on">
                    <div class="form-control">
                        <label for="Firstname"> Name </label><br /> <br />
                        <div class="name-area">
                            <input type="text" name="firstName" id="firstName" placeholder="Firstname" required />
                            <br />
                            <br />
                            <input type="text" name="lastName" id="lastName" placeholder="LastName" required />
                        </div>
                    </div>
                    <div class="form-control">
                        <label for="profession"> profession </label><br /> <br />
                        <input type="text" name="profession" id="profession" placeholder="Enter your profession" required />
                    </div>
                    <div class="form-control">
                        <label for="email"> Email </label><br /> <br />
                        <input type="email" name="email" id="email" placeholder="Enter your email" required />
                    </div>
                    <div class="form-control">
                        <label for="profileImage">Profile Image</label> <br /> <br />
                        <input type="file" name="profileImg" id="profileImg" class="inputFile" required />
                    </div>
                    <div class="form-control">
                        <label for="about"> About </label><br /> <br />
                        <textarea class="form-control" maxlength="300" rows="5" name="aboutMe" id="about" placeholder="Write about you" required></textarea>
                    </div>
                    <br />
                    <div class="form-control">
                        <label for="socialLinks"> Social Links </label>
                        <hr />
                        <div class="social-links">
                            <i class="fab fa-instagram"></i>
                            <input type="url" name="instagram" id="instagram" placeholder="Instagram" />
                        </div>
                        <br />
                        <div class="social-links">
                            <i class="fab fa-youtube"></i>
                            <input type="url" name="yt" id="youtube" placeholder="Youtube" />
                        </div>
                        <br />
                        <div class="social-links">
                            <i class="fab fa-github"></i>
                            <input type="url" name="github" id="github" placeholder="Github" />
                        </div>
                        <br />
                        <div class="social-links">
                            <i class="fab fa-twitter"></i>
                            <input type="url" name="twitter" id="twitter" placeholder="Twitter" />
                        </div>
                        <br />
                        <div class="social-links">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            <input type="url" name="facebook" id="facebook" placeholder="Facebook" />
                        </div>
                        <br />
                        <div class="social-links">
                            <i class="fab fa-linkedin-in"></i>
                            <input type="url" name="linkedIn" id="linkedIn" placeholder="LinkedIn" />
                        </div>
                    </div>
                    <br />
                    <div class="form-control">
                        <label for="project"> Projects </label>
                        <hr />
                        <div class="project">
                            <label for="projectTitle"> Project 1 </label> <br /> <br />
                            <input type="text" name="projectTitle" id="projectTitle" placeholder="Project Title" />
                            <br />
                            <br />
                            <input type="url" name="projectLink" id="projectLink" placeholder="Project Link" />
                            <br /> <br />
                            <textarea class="form-control" maxlength="300" rows="5" name="projectDescription" id="projectDescription" placeholder="Project Description"></textarea>
                        </div>
                        <br />
                        <div class="project">
                            <label for="projectTitle2"> Project 2 </label> <br /> <br />
                            <input type="text" name="projectTitle2" id="projectTitle2" placeholder="Project Title" />
                            <br />
                            <br />
                            <input type="url" name="projectLink2" id="projectLink2" placeholder="Project Link" />
                            <br /> <br />
                            <textarea class="form-control" maxlength="300" rows="5" name="projectDescription2" id="projectDescription2" placeholder="Project Description"></textarea>
                        </div>
                        <br />
                        <div class="project">
                            <label for="projectTitle3"> Project 3 </label> <br /> <br />
                            <input type="text" name="projectTitle3" id="projectTitle3" placeholder="Project Title" />
                            <br />
                            <br />
                            <input type="url" name="projectLink3" id="projectLink3" placeholder="Project Link" />
                            <br /> <br />
                            <textarea class="form-control" maxlength="300" rows="5" name="projectDescription3" id="projectDescription3" placeholder="Project Description"></textarea>
                        </div>
                    </div>
                    <br />
                    <div class="form-control">
                        <label for="certificates"> Certificates <i class="fa-solid fa-question fa-shake" onclick="alert('Enter Certificate Name, Certificate Link and Data of Issue')"></i>
                        </label>
                        <hr />
                        <div class="certificate">
                            <label for="certificateName"> Certificate 1 </label> <br /> <br />
                            <input type="text" name="certificateName" id="certificateName" placeholder="Certificate Name" />
                            <br /> <br />
                            <input type="url" name="certificateLink" id="certificateLink" placeholder="Certificate Link" /> <br /> <br />
                            <input type="date" name="certificateClaimDate" id="certificateClaimDate" /> <br /> <br />
                        </div>
                        <br />
                        <div class="certificate">
                            <label for="certificateName2"> Certificate 2 </label> <br /> <br />
                            <input type="text" name="certificateName2" id="certificateName2" placeholder="Certificate Name" />
                            <br /> <br />
                            <input type="url" name="certificateLink2" id="certificateLink2" placeholder="Certificate Link" /> <br /> <br />
                            <input type="date" name="certificateClaimDate2" id="certificateClaimDate2" /> <br /> <br />
                        </div>
                        <br />
                        <div class="certificate">
                            <label for="certificateName3"> Certificate 3 </label> <br /> <br />
                            <input type="text" name="certificateName3" id="certificateName3" placeholder="Certificate Name" />
                            <br /> <br />
                            <input type="url" name="certificateLink3" id="certificateLink3" placeholder="Certificate Link" /> <br /> <br />
                            <input type="date" name="certificateClaimDate3" id="certificateClaimDate3" /> <br /> <br />
                        </div>
                        <div class="form-control">
                            <button class="button" href="">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

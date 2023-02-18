<?php
session_start();
if (!isset($_SESSION['loggedin']) || !($_SESSION['loggedin'])) {
    header("location: ../login");
}
require '..\app\private\db\_dbconnect.php';
require '..\app\private\functions\function.php';
$username = $_SESSION['username'];
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $newUsername = $_GET['username'];
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $profession = $_GET['profession'];
    $email = $_GET['email'];
    $profileImg = file_get_contents($_FILES['profileImg']['tmp_name']);
    $aboutMe = $_GET['aboutMe'];
    $instagram = $_GET['instagram'];
    $yt = $_GET['yt'];
    $github = $_GET['github'];
    $twitter = $_GET['twitter'];
    $facebook = $_GET['facebook'];
    $linkedIn = $_GET['linkedIn'];
    $projectTitle1 = $_GET['projectTitle1'];
    $projectLink1 = $_GET['projectLink1'];
    $projectCodeLink1 = $_GET['projectCodeLink1'];
    $projectDescription1 = $_GET['projectDescription1'];
    $projectTitle2 = $_GET['projectTitle2'];
    $projectLink2 = $_GET['projectLink2'];
    $projectCodeLink2 = $_GET['projectCodeLink2'];
    $projectDescription2 = $_GET['projectDescription2'];
    $projectTitle3 = $_GET['projectTitle3'];
    $projectLink3 = $_GET['projectLink3'];
    $projectCodeLink3 = $_GET['projectCodeLink3'];
    $projectDescription3 = $_GET['projectDescription3'];
    $certificateName1 = $_GET['certificateName1'];
    $certificateClaimDate1 = $_GET['certificateClaimDate1'];
    $certificateLink1 = $_GET['certificateLink1'];
    $certificateName2 = $_GET['certificateName2'];
    $certificateClaimDate2 = $_GET['certificateClaimDate2'];
    $certificateLink2 = $_GET['certificateLink2'];
    $certificateName3 = $_GET['certificateName3'];
    $certificateClaimDate3 = $_GET['certificateClaimDate3'];
    $certificateLink3 = $_GET['certificateLink3'];
    $showAlert = updatePortfolio($username, $firstName, $lastName, $profession, $email, $profileImg, $aboutMe, $instagram, $yt, $github, $twitter, $facebook, $linkedIn, $projectTitle1, $projectLink1, $projectCodeLink1, $projectDescription1, $projectTitle2, $projectLink2, $projectCodeLink2, $projectDescription2, $projectTitle3, $projectLink3, $projectCodeLink3, $projectDescription3, $certificateName1, $certificateClaimDate1, $certificateLink1, $certificateName2, $certificateClaimDate2, $certificateLink2, $certificateName3, $certificateClaimDate3, $certificateLink3, $contacts, $visits);
}

$sql = "SELECT * FROM personalPortfolio WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();


function updatePortfolio($username, $firstName, $lastName, $profession, $email, $profileImg, $aboutMe, $instagram, $yt, $github, $twitter, $facebook, $linkedIn, $projectTitle1, $projectLink1, $projectCodeLink1, $projectDescription1, $projectTitle2, $projectLink2, $projectCodeLink2, $projectDescription2, $projectTitle3, $projectLink3, $projectCodeLink3, $projectDescription3, $certificateName1, $certificateClaimDate1, $certificateLink1, $certificateName2, $certificateClaimDate2, $certificateLink2, $certificateName3, $certificateClaimDate3, $certificateLink3, $contacts, $visits)
{
    require '..\app\private\db\_dbconnect.php';
    require '..\app\private\functions\function.php';
    $sql = "UPDATE personalPortfolio SET firstName = ?, lastName = ?, profession = ?, email = ?, profileImg = ?, aboutMe = ?, instagram = ?, yt = ?, github = ?, twitter = ?, facebook = ?, linkedIn = ?, projectTitle1 = ?, projectLink1 = ?, projectCodeLink1 = ?, projectDescription1 = ?, projectTitle2 = ?, projectLink2 = ?, projectCodeLink2 = ?, projectDescription2 = ?, projectTitle3 = ?, projectLink3 = ?, projectCodeLink3 = ?, projectDescription3 = ?, certificateName1 = ?, certificateClaimDate1 = ?, certificateLink1 = ?, certificateName2 = ?, certificateClaimDate2 = ?, certificateLink2 = ?, certificateName3 = ?, certificateClaimDate3 = ?, certificateLink3 = ?, contacts = ? WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssssssssssssssssssssssssss", $username, $firstName, $lastName, $profession, $email, $profileImg, $aboutMe, $instagram, $yt, $github, $twitter, $facebook, $linkedIn, $projectTitle1, $projectLink1, $projectCodeLink1, $projectDescription1, $projectTitle2, $projectLink2, $projectCodeLink2, $projectDescription2, $projectTitle3, $projectLink3, $projectCodeLink3, $projectDescription3, $certificateName1, $certificateClaimDate1, $certificateLink1, $certificateName2, $certificateClaimDate2, $certificateLink2, $certificateName3, $certificateClaimDate3, $certificateLink3, $contacts);
    $stmt->execute();
    if ($stmt->affected_rows == 1) {
        $showAlert =
            '<div class="notification success">
                        <i class="fa-solid fa-check-circle"></i>
                        Message sent successfully!
                    </div>';
        return $showAlert;
    }
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
    <script src="https://kit.fontawesome.com/0fe3b336ed.js" integrity="sha384-dQXoip1UH2Gf76Rt/vZNDhej9dqGkaJQAXegWARNJT95sqvNHAuqn37K64TKaC4f" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../app/private/css/base.css" />
    <link rel="stylesheet" href="../app/private/css/nav.css" />
    <link rel="stylesheet" href="../app/private/css/dashboard.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&display=swap" media="screen" />
    <link rel="icon" href="../app/private/images/logo.png" type="image/x-icon" />
</head>

<body>
    <?php include '..\app\private\includes\nav.php'; ?>
    <main>
        <section class="update">
            <div class="row title">
                <h1> Update your portfolio </h1>
            </div>
            <form action="update.php" name="update-form" autocomplete="on">
                <div class="form-control">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $row['username']; ?>" required />
                </div>
                <div class="form-control">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" required />
                </div>
                <!-- username, firstName, lastName, profession, email, profileImg, aboutMe, instagram, yt, github, twitter, facebook, linkedIn, projectTitle1, projectLink1, projectCodeLink1, projectDescription1, projectTitle2, projectLink2, projectCodeLink2, projectDescription2, projectTitle3, projectLink3, projectCodeLink3, projectDescription3, certificateName1, certificateClaimDate1, certificateLink1, certificateName2, certificateClaimDate2, certificateLink2, certificateName3, certificateClaimDate3, certificateLink3, contacts, visits -->
                <div class="form-control">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" value="<?php echo $row['firstName']; ?>" required />
                </div>
                <div class="form-control">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="lastName" value="<?php echo $row['lastName']; ?>" required />
                </div>
                <div class="form-control">
                    <label for="profession">Profession</label>
                    <input type="text" name="profession" id="profession" value="<?php echo $row['profession']; ?>" required />
                </div>
                <div class="form-control">
                    <label for="aboutMe">About Me</label>
                    <textarea name="aboutMe" id="aboutMe" cols="30" rows="10" required><?php echo $row['aboutMe']; ?></textarea>
                </div>
                <div class="form-control">
                    <label for="instagram">Instagram</label>
                    <input type="text" name="instagram" id="instagram" value="<?php echo $row['instagram']; ?>" required />
                </div>
                <div class="form-control">
                    <label for="yt">YouTube</label>
                    <input type="text" name="yt" id="yt" value="<?php echo $row['yt']; ?>" required />
                </div>
                <div class="form-control">
                    <label for="github">GitHub</label>
                    <input type="text" name="github" id="github" value="<?php echo $row['github']; ?>" required />
                </div>
                <div class="form-control">
                    <label for="twitter">Twitter</label>
                    <input type="text" name="twitter" id="twitter" value="<?php echo $row['twitter']; ?>" required />
                </div>
                <div class="form-control">
                    <label for="facebook">Facebook</label>
                    <input type="text" name="facebook" id="facebook" value="<?php echo $row['facebook']; ?>" required />
                </div>
                <div class="form-control">
                    <label for="linkedIn">LinkedIn</label>
                    <input type="text" name="linkedIn" id="linkedIn" value="<?php echo $row['LinkedIn']; ?>" required />
                </div>
                <div class="form-control">
                    <label for="projectTitle1">Project Title 1</label>
                    <input type="text" name="projectTitle1" id="projectTitle1" value="<?php echo $row['projectTitle1']; ?>" required />
                </div>
                <div class="form-control">
                    <label for="projectLink1">Project Link 1</label>
                    <input type="text" name="projectLink1" id="projectLink1" value="<?php echo $row['projectLink1']; ?>" required />
                </div>
                <div class="form-control">
                    <label for="projectCodeLink1">Project Code Link 1</label>
                    <input type="text" name="projectCodeLink1" id="projectCodeLink1" value="<?php echo $row['projectCodeLink1']; ?>" required />
                </div>
                <div class="form-control">
                    <label for="projectDescription1">Project Description 1</label>
                    <textarea name="projectDescription1" id="projectDescription1" cols="30" rows="10" required><?php echo $row['projectDescription1']; ?></textarea>
                </div>
                <div class="form-control">
                    <label for="projectTitle2">Project Title 2</label>
                    <input type="text" name="projectTitle2" id="projectTitle2" value="<?php echo $row['projectTitle2']; ?>" required />
                </div>
                <div class="form-control">
                    <label for="projectLink2">Project Link 2</label>
                    <input type="text" name="projectLink2" id="projectLink2" value="<?php echo $row['projectLink2']; ?>" required />
                </div>
                <div class="form-control">
                    <label for="projectCodeLink2">Project Code Link 2</label>
                    <input type="text" name="projectCodeLink2" id="projectCodeLink2" value="<?php echo $row['projectCodeLink2']; ?>" required />
                </div>
                <div class="form-control">
                    <label for="projectDescription2">Project Description 2</label>
                    <textarea name="projectDescription2" id="projectDescription2" cols="30" rows="10" required><?php echo $row['projectDescription2']; ?></textarea>
                </div>
                <div class="form-control">
                    <label for="projectTitle3">Project Title 3</label>
                    <input type="text" name="projectTitle3" id="projectTitle3" value="<?php echo $row['projectTitle3']; ?>" required />
                </div>
                <div class="form-control">
                    <label for="projectLink3">Project Link 3</label>
                    <input type="text" name="projectLink3" id="projectLink3" value="<?php echo $row['projectLink3']; ?>" required />
                </div>
                <div class="form-control">
                    <label for="projectCodeLink3">Project Code Link 3</label>
                    <input type="text" name="projectCodeLink3" id="projectCodeLink3" value="<?php echo $row['projectCodeLink3']; ?>" required />
                </div>
                <div class="form-control">
                    <label for="projectDescription3">Project Description 3</label>
                    <textarea name="projectDescription3" id="projectDescription3" cols="30" rows="10" required><?php echo $row['projectDescription3']; ?></textarea>
                </div>
                <div class="certificate">
                    <label for="certificateName1"> Certificate 1 </label> <br /> <br />
                    <input type="text" name="certificateName1" id="certificateName1" value="<?php echo $row['certificateName1']; ?>" />
                    <br /> <br />
                    <input type=" url" name="certificateLink1" id="certificateLink1" value="<?php echo $row['certificateLink1']; ?>" /> <br /> <br />
                    <input type=" date" name="certificateClaimDate1" id="certificateClaimDate1" value="<?php echo $row['certificateClaimDate1']; ?>" /> <br /> <br />
                </div>
                <br />
                <div class="certificate">
                    <label for="certificateName2"> Certificate 2 </label> <br /> <br />
                    <input type="text" name="certificateName2" id="certificateName2" value="<?php echo $row['certificateName2']; ?>" />
                    <br /> <br />
                    <input type=" url" name="certificateLink2" id="certificateLink2" value="<?php echo $row['certificateLink2']; ?>" /> <br /> <br />
                    <input type=" date" name="certificateClaimDate2" id="certificateClaimDate2" value="<?php echo $row['certificateClaimDate2']; ?>" /> <br /> <br />
                </div>
                <br />
                <div class="certificate">
                    <label for="certificateName3"> Certificate 3 </label> <br /> <br />
                    <input type="text" name="certificateName3" id="certificateName3" value="<?php echo $row['certificateName3']; ?>" />
                    <br /> <br />
                    <input type=" url" name="certificateLink3" id="certificateLink3" value="<?php echo $row['certificateLink3']; ?>" /> <br /> <br />
                    <input type=" date" name="certificateClaimDate3" id="certificateClaimDate3" value="<?php echo $row['certificateClaimDate3']; ?>" /> <br /> <br />
                </div>
                <br />
                <div class=" form-control">
                    <button class="button" href="">Submit</button>
                </div>
            </form>
        </section>
    </main>
</body>

</html>
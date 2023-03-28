<?php
session_start();
if (!isset($_SESSION['loggedin']) || !($_SESSION['loggedin'])) {
    header("location: ../login");
}
require '../app/private/db/_dbconnect.php';
require '../app/private/functions/function.php';
$username = $_SESSION['username'];
$sql = "SELECT * from personalPortfolio where username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $profession = $_POST['profession'];
    $email = $_POST['email'];
    if (isset($_FILES['profileImg'])) {
        $profileImg = file_get_contents($_FILES['profileImg']['tmp_name']);
    } else {
        $profileImg = $row['profileImg'];
    }
    $aboutMe = $_POST['aboutMe'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $twitter = $_POST['twitter'];
    $linkedin = $_POST['linkedIn'];
    $github = $_POST['github'];
    $yt = $_POST['yt'];
    $projectTitle1 = $_POST['projectTitle1'];
    $projectLink1 = $_POST['projectLink1'];
    $projectCodeLink1 = $_POST['projectCodeLink1'];
    $projectDescription1 = $_POST['projectDescription1'];
    $projectTitle2 = $_POST['projectTitle2'];
    $projectLink2 = $_POST['projectLink2'];
    $projectCodeLink2 = $_POST['projectCodeLink2'];
    $projectDescription2 = $_POST['projectDescription2'];
    $projectTitle3 = $_POST['projectTitle3'];
    $projectLink3 = $_POST['projectLink3'];
    $projectCodeLink3 = $_POST['projectCodeLink3'];
    $projectDescription3 = $_POST['projectDescription3'];
    $certificateName1 = $_POST['certificateName1'];
    $certificateLink1 = $_POST['certificateLink1'];
    $certificateClaimDate1 = $_POST['certificateClaimDate1'];
    $certificateName2 = $_POST['certificateName2'];
    $certificateLink2 = $_POST['certificateLink2'];
    $certificateClaimDate2 = $_POST['certificateClaimDate2'];
    $certificateName3 = $_POST['certificateName3'];
    $certificateLink3 = $_POST['certificateLink3'];
    $certificateClaimDate3 = $_POST['certificateClaimDate3'];
    try {
        $sql = "UPDATE personalPortfolio SET firstName = ?, lastName = ?, profession = ?, email = ?, profileImg = ?, aboutMe = ?, facebook = ?, instagram = ?, twitter = ?, linkedIn = ?, github = ?, yt = ?, projectTitle1 = ?, projectLink1 = ?, projectCodeLink1 = ?, projectDescription1 = ?, projectTitle2 = ?, projectLink2 = ?, projectCodeLink2 = ?, projectDescription2 = ?, projectTitle3 = ?, projectLink3 = ?, projectCodeLink3 = ?, projectDescription3 = ?, certificateName1 = ?, certificateLink1 = ?, certificateClaimDate1 = ?, certificateName2 = ?, certificateLink2 = ?, certificateClaimDate2 = ?, certificateName3 = ?, certificateLink3 = ?, certificateClaimDate3 = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssssssssssssssssssssssssssssssss', $firstName, $lastName, $profession, $email, $profileImg, $aboutMe, $facebook, $instagram, $twitter, $linkedin, $github, $yt, $projectTitle1, $projectLink1, $projectCodeLink1, $projectDescription1, $projectTitle2, $projectLink2, $projectCodeLink2, $projectDescription2, $projectTitle3, $projectLink3, $projectCodeLink3, $projectDescription3, $certificateName1, $certificateLink1, $certificateClaimDate1, $certificateName2, $certificateLink2, $certificateClaimDate2, $certificateName3, $certificateLink3, $certificateClaimDate3, $username);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            $showAlert =
                '<div class="notification success">
                    <i class="fa-solid fa-check-circle"></i>
                    Portfolio Updated Successfully
                </div>';
        } else {
            $showAlert =
                '<div class="notification alert">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    Something went wrong. Please contact our team.
                </div>';
        }
    } catch (Exception $e) {
        $showAlert =
            '<div class="notification alert">
                <i class="fa-solid fa-triangle-exclamation"></i>
                Error: ' . $e->getMessage() . '
            </div>';
    }
}

$username = $_SESSION['username'];
$sql = "SELECT * from personalPortfolio where username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Folio | Update</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="Folio, Portfolio, Portfolio Generator, Folio Dashboard" />
    <meta name="description" content="An amazing portfolio generator" />
    <meta name="author" content="Abhishek Maurya, Shashank Patil" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/0fe3b336ed.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../app/private/css/base.css" />
    <link rel="stylesheet" href="../app/private/css/nav.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&display=swap" media="screen" />
    <link rel="icon" href="../app/private/images/logo.png" type="image/x-icon" />
    <style type="text/css">
        .update {
            text-align: center;
        }

        .title {
            font-size: 2rem;
            text-align: center;
        }

        .update-form {
            background-color: #2b124A;
            padding: 2rem;
            border-radius: 1rem;
        }

        .form-control {
            text-align: left;
            margin: 1.8rem 0 0 0;
        }

        .form-control label {
            font-size: 1.8rem;
        }

        .update-field {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        input {
            width: 70%;
            border: none;
            padding: 1rem;
            outline: none;
            border-radius: 0.5rem;
            position: relative;
        }

        i {
            font-size: 2rem;
        }

        textarea {
            width: 70%;
            min-width: 70%;
            max-height: 15rem;
            resize: vertical;
            border-radius: 0.5rem;
        }

        .update-button {
            background-color: #1974c8;
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 0.5rem;
            font-size: 1.8rem;
            cursor: pointer;
        }

        @media screen and (min-width: 768px) {
            .update {
                margin: 0 20%;
            }
        }
    </style>
</head>

<body>
    <?php include '../app/private/includes/nav.php'; ?>
    <main>
        <section class="update">
            <?php
            global $showAlert;
            echo  $showAlert;
            ?>
            <div class="row title">
                <h1> Update your portfolio </h1>
            </div>
            <form class="update-form" action="p-update" method="POST" name="update-form" enctype="multipart/form-data" autocomplete=" on">
                <div class="form-control">
                    <label for="Firstname"> Name </label><br /> <br />
                    <div class="name-area">
                        <div class="update-field">
                            <input type="text" name="firstName" id="firstName" value="<?php echo $row['firstName']; ?>" />
                            <button class="update-button" name="update">Update</button>
                        </div>
                        <br />
                        <div class="update-field">
                            <input type="text" name="lastName" id="lastName" value="<?php echo $row['lastName']; ?>" />
                            <button class="update-button" name="update">Update</button>
                        </div>
                    </div>
                </div>
                <div class="form-control">
                    <label for="profession">Profession</label> <br />
                    <div class="update-field">
                        <input type="text" name="profession" id="profession" value="<?php echo $row['profession']; ?>" />
                        <button class="update-button" name="update">Update</button>
                    </div>
                </div>
                <div class="form-control">
                    <label for="email">Email</label> <br />
                    <div class="update-field">
                        <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" />
                        <button class="update-button" name="update">Update</button>
                    </div>
                </div>
                <div class="form-control">
                    <label for="profileImg">Profile Image</label> <br />
                    <div class="update-field">
                        <input type="file" name="profileImg" id="profileImg" />
                        <button class="update-button" name="update">Update</button>
                    </div>
                </div>
                <div class="form-control">
                    <label for="about">About</label> <br />
                    <div class="update-field">
                        <textarea name="aboutMe" id="about" cols="30" rows="10"><?php echo $row['aboutMe']; ?></textarea>
                        <button class="update-button" name="update">Update</button>
                    </div>
                </div>
                <div class="form-control">
                    <label for="socialLinks"> Social Links </label>
                    <hr />
                    <div class="social-links">
                        <div class="update-field">
                            <i class="fab fa-instagram"></i>
                            <input type="url" name="instagram" id="instagram" value="<?php echo $row['instagram']; ?>" />
                            <button class="update-button" name="update">Update</button>
                        </div>
                    </div>
                    <br />
                    <div class="social-links">
                        <div class="update-field">
                            <i class="fab fa-youtube"></i>
                            <input type="url" name="yt" id="youtube" value="<?php echo $row['yt']; ?>" />
                            <button class="update-button" name="update">Update</button>
                        </div>
                    </div>
                    <br />
                    <div class="social-links">
                        <div class="update-field">
                            <i class="fab fa-github"></i>
                            <input type="url" name="github" id="github" value="<?php echo $row['github']; ?>" />
                            <button class="update-button" name="update">Update</button>
                        </div>
                    </div>
                    <br />
                    <div class="social-links">
                        <div class="update-field">
                            <i class="fab fa-twitter"></i>
                            <input type="url" name="twitter" id="twitter" value="<?php echo $row['twitter']; ?>" />
                            <button class="update-button" name="update">Update</button>
                        </div>
                    </div>
                    <br />
                    <div class="social-links">
                        <div class="update-field">
                            <i class="fab fa-facebook"></i>
                            <input type="url" name="facebook" id="facebook" value="<?php echo $row['facebook']; ?>" />
                            <button class="update-button" name="update">Update</button>
                        </div>
                    </div>
                    <br />
                    <div class="social-links">
                        <div class="update-field">
                            <i class="fab fa-linkedin"></i>
                            <input type="url" name="linkedIn" id="linkedIn" value="<?php echo $row['LinkedIn']; ?>" />
                            <button class="update-button" name="update">Update</button>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-control">
                    <label for="project"> Projects </label>
                    <hr />
                    <?php
                    for ($i = 1; $i <= 3; $i++) {
                        echo '<div class="project">
                        <label for="projectTitle' . $i . '"> Project ' . $i . ' </label> <br /> <br />
                        <div class="update-field">
                            <input type="text" name="projectTitle' . $i . '" id="projectTitle' . $i . '" value="' . $row['projectTitle' . $i] . '" placeholder="Project name" />
                            <button class="update-button"  name="update">Update</button>
                        </div>
                        <br />
                        <div class="update-field">
                            <input type="url" name="projectLink' . $i . '" id="projectLink' . $i . '" value="' . $row['projectLink' . $i] . '" placeholder="Link to project" />
                            <button class="update-button" name="update">Update</button>
                        </div>
                        <br />
                        <div class="update-field">
                            <input type="url" name="projectCodeLink' . $i . '" id="projectCodeLink' . $i . '" value="' . $row['projectCodeLink' . $i] . '" placeholder="Link to project source code" />
                            <button class="update-button" name="update">Update</button>
                        </div>
                        <div class="update-field">
                            <textarea class="form-control" maxlength="500" rows="5" name="projectDescription' . $i . '" id="projectDescription' . $i . '" placeholder="Describe the project">' . $row['projectDescription' . $i] . '</textarea>
                            <button class="update-button" name="update">Update</button>
                        </div>              
                    </div>
                    <br />';
                    }
                    ?>
                </div>
                <div class="form-control">
                    <label for="certificates"> Certificates <i class="fa-solid fa-question fa-shake" onclick="alert('Enter Certificate Name, Certificate Link and Data of Issue')"></i>
                    </label>
                    <hr />
                    <?php
                    for ($i = 1; $i <= 3; $i++) {
                        echo '<div class="certificate">
                        <label for="certificateName' . $i . '"> Certificate ' . $i . ' </label> <br /> <br />
                        <div class="update-field">
                            <input type="text" name="certificateName' . $i . '" id="certificateName' . $i . '" value="' . $row['certificateName' . $i] . '" placeholder="Certificate name" />
                            <button class="update-button" name="update">Update</button>
                        </div>
                        <br /> <br />
                        <div class="update-field">
                            <input type="url" name="certificateLink' . $i . '" id="certificateLink' . $i . '" value="' . $row['certificateLink' . $i] . '" placeholder="Link to certificate" />
                            <button class="update-button" name="update">Update</button>
                        </div>
                        <br /> <br />
                        <div class="update-field">
                            <input type="date" name="certificateClaimDate' . $i . '" id="certificateClaimDate' . $i . '" value="' . $row['certificateClaimDate' . $i] . '"/> <br /> <br />
                            <button class="update-button" name="update">Update</button>
                        </div>
                        <br />
                    </div>
                    <br />';
                    }
                    ?>
                </div>
            </form>
        </section>
    </main>
</body>

</html>
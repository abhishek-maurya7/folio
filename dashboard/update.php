<?php
session_start();
if (!isset($_SESSION['loggedin']) || !($_SESSION['loggedin'])) {
    header("location: ../login");
}
require '..\app\private\db\_dbconnect.php';
require '..\app\private\functions\function.php';
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
    <title>Folio | Dashboard</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="Folio, Portfolio, Portfolio Generator, Folio Dashboard" />
    <meta name="description" content="An amazing portfolio generator" />
    <meta name="author" content="Abhishek Maurya, Shashank Patil" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/0fe3b336ed.js" integrity="sha384-dQXoip1UH2Gf76Rt/vZNDhej9dqGkaJQAXegWARNJT95sqvNHAuqn37K64TKaC4f" crossorigin="anonymous"></script>
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
            /* margin: 1rem 0 0 0; */
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
    <?php include '..\app\private\includes\nav.php'; ?>
    <main>
        <section class="update">
            <?php
            global $showAlert;
            echo  $showAlert;
            ?>
            <div class="row title">
                <h1> Update your portfolio </h1>
            </div>
            <form class="update-form" action="update" method="POST" name="update-form" autocomplete="on">
                <div class="form-control">
                    <label for="username">Username</label> <br />
                    <div class="update-field">
                        <input type="text" name="username" id="username" value="<?php echo $row['username']; ?>" />
                        <button class="update-button">Update</button>
                    </div>
                </div>
                <div class="form-control">
                    <label for="Firstname"> Name </label><br /> <br />
                    <div class="name-area">
                        <div class="update-field">
                            <input type="text" name="firstName" id="firstName" value="<?php echo $row['firstName']; ?>" />
                            <button class="update-button">Update</button>
                        </div>
                        <br />
                        <br />
                        <div class="update-field">
                            <input type="text" name="lastName" id="lastName" value="<?php echo $row['lastName']; ?>" />
                            <button class="update-button">Update</button>
                        </div>
                    </div>
                </div>
                <div class="form-control">
                    <label for="profession">Profession</label> <br />
                    <div class="update-field">
                        <input type="text" name="profession" id="profession" value="<?php echo $row['profession']; ?>" />
                        <button class="update-button">Update</button>
                    </div>
                </div>
                <div class="form-control">
                    <label for="email">Email</label> <br />
                    <div class="update-field">
                        <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" />
                        <button class="update-button">Update</button>
                    </div>
                </div>
                <div class="form-control">
                    <label for="profileImg">Profile Image</label> <br />
                    <div class="update-field">
                        <input type="file" name="profileImg" id="profileImg" />
                        <button class="update-button">Update</button>
                    </div>
                </div>
                <div class="form-control">
                    <label for="about">About</label> <br />
                    <div class="update-field">
                        <textarea name="aboutMe" id="about" cols="30" rows="10"><?php echo $row['aboutMe']; ?></textarea>
                        <button class="update-button">Update</button>
                    </div>
                </div>
                <div class="form-control">
                    <label for="socialLinks"> Social Links </label>
                    <hr />
                    <div class="social-links">
                        <div class="update-field">
                            <i class="fab fa-instagram"></i>
                            <input type="url" name="instagram" id="instagram" value="<?php echo $row['instagram']; ?>" />
                            <button class="update-button">Update</button>
                        </div>
                    </div>
                    <br />
                    <div class="social-links">
                        <div class="update-field">
                            <i class="fab fa-youtube"></i>
                            <input type="url" name="yt" id="youtube" value="<?php echo $row['yt']; ?>" />
                            <button class="update-button">Update</button>
                        </div>
                    </div>
                    <br />
                    <div class="social-links">
                        <div class="update-field">
                            <i class="fab fa-github"></i>
                            <input type="url" name="github" id="github" value="<?php echo $row['github']; ?>" />
                            <button class="update-button">Update</button>
                        </div>
                    </div>
                    <br />
                    <div class="social-links">
                        <div class="update-field">
                            <i class="fab fa-twitter"></i>
                            <input type="url" name="twitter" id="twitter" value="<?php echo $row['twitter']; ?>" />
                            <button class="update-button">Update</button>
                        </div>
                    </div>
                    <br />
                    <div class="social-links">
                        <div class="update-field">
                            <i class="fab fa-facebook"></i>
                            <input type="url" name="facebook" id="facebook" value="<?php echo $row['facebook']; ?>" />
                            <button class="update-button">Update</button>
                        </div>
                    </div>
                    <br />
                    <div class="social-links">
                        <div class="update-field">
                            <i class="fab fa-linkedin"></i>
                            <input type="url" name="linkedIn" id="linkedIn" value="<?php echo $row['LinkedIn']; ?>" />
                            <button class="update-button">Update</button>
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
                            <input type="text" name="projectTitle' . $i . '" id="projectTitle' . $i . '" value="' . $row['projectTitle' . $i] . '" />
                            <button class="update-button">Update</button>
                        </div>
                        <br />
                        <br />
                        <div class="update-field">
                            <input type="url" name="projectLink' . $i . '" id="projectLink' . $i . '" value="' . $row['projectLink' . $i] . '" />
                            <button class="update-button">Update</button>
                        </div>
                        <br /> <br />
                        <div class="update-field">
                            <input type="url" name="projectCodeLink' . $i . '" id="projectCodeLink' . $i . '" value="' . $row['projectCodeLink' . $i] . '" />
                            <button class="update-button">Update</button>
                        </div>
                        <br /> <br />
                        <div class="update-field">
                            <textarea class="form-control" maxlength="500" rows="5" name="projectDescription' . $i . '" id="projectDescription' . $i . '">' . $row['projectDescription' . $i] . '</textarea>
                            <button class="update-button">Update</button>
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
                            <input type="text" name="certificateName' . $i . '" id="certificateName' . $i . '" value="' . $row['certificateName' . $i] . '" />
                            <button class="update-button">Update</button>
                        </div>
                        <br /> <br />
                        <div class="update-field">
                            <input type="url" name="certificateLink' . $i . '" id="certificateLink' . $i . '" value="' . $row['certificateLink' . $i] . '" />
                            <button class="update-button">Update</button>
                        </div>
                        <br /> <br />
                        <div class="update-field">
                            <input type="date" name="certificateClaimDate' . $i . '" id="certificateClaimDate' . $i . '" value="' . $row['certificateClaimDate' . $i] . '" /> <br /> <br />
                            <button class="update-button">Update</button>
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
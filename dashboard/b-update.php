<?php
session_start();
if (!isset($_SESSION['loggedin']) || !($_SESSION['loggedin'])) {
    header("location: ../login");
}
require '../app/private/db/_dbconnect.php';
require '../app/private/functions/function.php';
$username = $_SESSION['username'];
$sql = "SELECT * from businessPortfolio where username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $companyName = $_POST['companyName'];
    $companySlogan = $_POST['companySlogan'];
    if (isset($_FILES['companyCover']) && !empty($_FILES['companyCover']['tmp_name'])) {
        $companyCover = file_get_contents($_FILES['companyCover']['tmp_name']);
    } else {
        $companyCover = $row['companyCover'];
    }
    $aboutCompany = $_POST['aboutCompany'];
    $email = $_POST['email'];
    $instagram = $_POST['instagram'];
    $yt = $_POST['yt'];
    $github = $_POST['github'];
    $twitter = $_POST['twitter'];
    $facebook = $_POST['facebook'];
    $linkedin = $_POST['linkedin'];

    if (isset($_FILES['companyImg1']) && !empty($_FILES['companyImg1']['tmp_name'])) {
        $companyImg1 = file_get_contents($_FILES['companyImg1']['tmp_name']);
    } else {
        $companyImg1 = $row['companyImg1'];
    }
    if (isset($_FILES['companyImg2']) && !empty($_FILES['companyImg2']['tmp_name'])) {
        $companyImg2 = file_get_contents($_FILES['companyImg2']['tmp_name']);
    } else {
        $companyImg2 = $row['companyImg2'];
    }
    if (isset($_FILES['companyImg3']) && !empty($_FILES['companyImg3']['tmp_name'])) {
        $companyImg3 = file_get_contents($_FILES['companyImg3']['tmp_name']);
    } else {
        $companyImg3 = $row['companyImg3'];
    }
    if (isset($_FILES['companyImg4']) && !empty($_FILES['companyImg4']['tmp_name'])) {
        $companyImg4 = file_get_contents($_FILES['companyImg4']['tmp_name']);
    } else {
        $companyImg4 = $row['companyImg4'];
    }
    if (isset($_FILES['companyImg5']) && !empty($_FILES['companyImg5']['tmp_name'])) {
        $companyImg5 = file_get_contents($_FILES['companyImg5']['tmp_name']);
    } else {
        $companyImg5 = $row['companyImg5'];
    }

    $productName1 = $_POST['productName1'];
    $productAbout1 = $_POST['productAbout1'];
    if (isset($_FILES['productImg1']) && !empty($_FILES['productImg1']['tmp_name'])) {
        $productImg1 = file_get_contents($_FILES['productImg1']['tmp_name']);
    } else {
        $productImg1 = $row['productImg1'];
    }

    $productName2 = $_POST['productName2'];
    $productAbout2 = $_POST['productAbout2'];
    if (isset($_FILES['productImg2']) && !empty($_FILES['productImg2']['tmp_name'])) {
        $productImg2 = file_get_contents($_FILES['productImg2']['tmp_name']);
    } else {
        $productImg2 = $row['productImg2'];
    }

    $productName3 = $_POST['productName3'];
    $productAbout3 = $_POST['productAbout3'];
    if (isset($_FILES['productImg3']) && !empty($_FILES['productImg3']['tmp_name'])) {
        $productImg3 = file_get_contents($_FILES['productImg3']['tmp_name']);
    } else {
        $productImg3 = $row['productImg3'];
    }
    $companyLocation = $_POST['companyLocation'];

    try {
        $sql = "UPDATE businessPortfolio SET companyName = ?, companySlogan = ?, companyCover = ?, aboutCompany = ?, email = ?, instagram = ?, yt = ?, github = ?, twitter = ?, facebook = ?, 
        linkedin = ?, companyImg1 = ?, companyImg2 = ?, companyImg3 = ?, companyImg4 = ?, companyImg5 = ?, productName1 = ?, productAbout1 = ?, productImg1 = ?, productName2 = ?, 
        productAbout2 = ?, productImg2 = ?, productName3 = ?, productAbout3 = ?, productImg3 = ?, companyLocation = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssssssssssssssssssssssss', $companyName, $companySlogan, $companyCover, $aboutCompany, $email, $instagram, $yt, $github, $twitter, $facebook, $linkedin, $companyImg1, $companyImg2, $companyImg3, $companyImg4, $companyImg5, $productName1, $productAbout1, $productImg1, $productName2, $productAbout2, $productImg2, $productName3, $productAbout3, $productImg3, $companyLocation, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($stmt->affected_rows == 1) {
            $showAlert =
                '<div class="notification success">
                    <i class="fa-solid fa-check-circle"></i>
                    Updated Successfully
                </div>';
        } else {
            $showAlert =
                '<div class="notification alert">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    Error: ' . $stmt->error . '
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
$sql = "SELECT * from businessPortfolio where username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Folio | Update</title>
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
            margin: 1.8rem 0 0 0;
        }

        .form-control label {
            font-size: 1.8rem;
        }

        .update-field {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 1rem 0;
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
                <h1> Update your website </h1>
            </div>
            <form class="update-form" action="b-update" method="POST" name="update-form" enctype="multipart/form-data" autocomplete="on">
                <div class="form-control">
                    <label for="companyName"> Name </label><br /> <br />
                    <div class="update-field">
                        <input type="text" name="companyName" id="companyName" value="<?php echo $row['companyName'] ?>" />
                        <button class="update-button" name="update">Update</button>
                    </div>
                </div>
                <div class="form-control">
                    <label for="companySlogan"> Company Slogan </label><br /> <br />
                    <div class="update-field">
                        <input type="text" name="companySlogan" id="companySlogan" value="<?php echo $row['companySlogan'] ?>" />
                        <button class="update-button" name="update">Update</button>
                    </div>
                </div>
                <div class="form-control">
                    <label for="email"> Email </label><br /> <br />
                    <div class="update-field">
                        <input type="email" name="email" id="email" value="<?php echo $row['email'] ?>" />
                        <button class="update-button" name="update">Update</button>
                    </div>
                </div>
                <div class="form-control">
                    <label for="companyCover">Cover Image</label> <br /> <br />
                    <div class="update-field">
                        <input type="file" name="companyCover" id="companyCover" />
                        <button class="update-button" name="update">Update</button>
                    </div>
                </div>
                </div>
                <div class="form-control">
                    <label for="companyImage1">Images</label> <br /> <br />
                    <div class="update-field">
                        <input type="file" name="companyImg1" id="companyImg1" />
                        <button class="update-button" name="update">Update</button>
                    </div>
                    <div class="update-field">
                        <input type="file" name="companyImg2" id="companyImg2" />
                        <button class="update-button" name="update">Update</button>
                    </div>
                    <div class="update-field">
                        <input type="file" name="companyImg3" id="companyImg3" />
                        <button class="update-button" name="update">Update</button>
                    </div>
                    <div class="update-field">
                        <input type="file" name="companyImg4" id="companyImg4" />
                        <button class="update-button" name="update">Update</button>
                    </div>
                    <div class="update-field">
                        <input type="file" name="companyImg5" id="companyImg5" />
                        <button class="update-button" name="update">Update</button>
                    </div>
                </div>
                <div class="form-control">
                    <label for="aboutCompany"> About Company </label><br /> <br />
                    <div class="update-field">
                        <textarea class="form-control" maxlength="1000" rows="5" name="aboutCompany" id="aboutCompany"><?php echo $row['aboutCompany']; ?></textarea>
                        <button class="update-button" name="update">Update</button>
                    </div>
                </div>
                <br />
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
                            <input type="url" name="linkedin" id="linkedin" value="<?php echo $row['linkedin']; ?>" />
                            <button class="update-button" name="update">Update</button>
                        </div>
                    </div>
                </div>
                <br />
                <div class="form-control">
                    <label for="services"> Product </label>
                    <hr />
                    <?php
                    for ($i = 1; $i <= 3; $i++) {
                        echo '<div class="services">
                            <label for="productName' . $i . '"> Product ' . $i . ' </label> <br /> <br />
                            <div class="update-field">
                                <input type="text" name="productName' . $i . '" id="productName' . $i . '" value="' . $row['productName' . $i] . '" />
                                <button class="update-button" name="update">Update</button>
                                </div>
                            <br /> <br />
                            <label for="productImg' . $i . '"> Product ' . $i . ' Image</label>
                            <div class="update-field">
                                <input type="file" name="productImg' . $i . '" id="productImg' . $i . '" />
                                <button class="update-button" name="update">Update</button>
                            </div>
                            <br /> <br />
                            <label for="productAbout' . $i . '"> Product ' . $i . ' About</label>
                            <div class="update-field">
                                <textarea class="form-control" maxlength="500" rows="5" name="productAbout' . $i . '" id="productAbout' . $i . '">' . $row['productAbout' . $i] . '</textarea>
                                    <button class="update-button" name="update">Update</button>
                            </div>
                        </div>
                        <br /> <br />';
                    }
                    ?>
                </div>
                <div class="form-control">
                    <label for="companyLocation"> Location of the company</label> <br /> <br />
                    <div class="update-field">
                        <input type="text" name="companyLocation" id="companyLocation" value="<?php echo $row['companyLocation']; ?>" />
                        <button class="update-button" name="update">Update</button>
                    </div>
                </div>
            </form>
        </section>
    </main>
</body>

</html>
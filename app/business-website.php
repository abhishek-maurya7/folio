<?php
session_start();
if (!isset($_SESSION['loggedin']) || !($_SESSION['loggedin'])) {
    header("location: login");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'private/functions/function.php';
    require 'private/db/_dbconnect.php';
    $username = $_SESSION['username'];
    $companyName = $_POST['companyName'];
    $companySlogan = $_POST['companySlogan'];

    $companyCover = file_get_contents($_FILES['companyCover']['tmp_name']);

    $aboutCompany = $_POST['aboutCompany'];
    $email = $_POST['email'];
    $instagram = $_POST['instagram'];
    $yt = $_POST['yt'];
    $github = $_POST['github'];
    $twitter = $_POST['twitter'];
    $facebook = $_POST['facebook'];
    $linkedin = $_POST['linkedin'];

    if (isset($_FILES['companyImg1'])) {
        $companyImg1 = file_get_contents($_FILES['companyImg1']['tmp_name']);
    } else {
        $companyImg1 = null;
    }
    if (isset($_FILES['companyImg2'])) {
        $companyImg2 = file_get_contents($_FILES['companyImg2']['tmp_name']);
    } else {
        $companyImg2 = null;
    }
    if (isset($_FILES['companyImg3'])) {
        $companyImg3 = file_get_contents($_FILES['companyImg3']['tmp_name']);
    } else {
        $companyImg3 = null;
    }
    if (isset($_FILES['companyImg4'])) {
        $companyImg4 = file_get_contents($_FILES['companyImg4']['tmp_name']);
    } else {
        $companyImg4 = null;
    }
    if (isset($_FILES['companyImg5'])) {
        $companyImg5 = file_get_contents($_FILES['companyImg5']['tmp_name']);
    } else {
        $companyImg5 = null;
    }

    $productName1 = $_POST['productName1'];
    $productAbout1 = $_POST['productAbout1'];
    if (isset($_FILES['productImg1']) && !empty($_FILES['productImg1']['tmp_name'])) {
        $productImg1 = file_get_contents($_FILES['productImg1']['tmp_name']);
    } else {
        $productImg1 = null;
    }

    $productName2 = $_POST['productName2'];
    $productAbout2 = $_POST['productAbout2'];
    if (isset($_FILES['productImg2']) && !empty($_FILES['productImg2']['tmp_name'])) {
        $productImg2 = file_get_contents($_FILES['productImg2']['tmp_name']);
    } else {
        $productImg2 = null;
    }

    $productName3 = $_POST['productName3'];
    $productAbout3 = $_POST['productAbout3'];
    if (isset($_FILES['productImg3']) && !empty($_FILES['productImg3']['tmp_name'])) {
        $productImg3 = file_get_contents($_FILES['productImg3']['tmp_name']);
    } else {
        $productImg3 = null;
    }
    $companyLocation = $_POST['companyLocation'];

    $contacts = array();
    $contacts = serialize($contacts);

    $currentYear = 'year' . date('Y') . 'Visits';
    $visits = array();
    $yearFormat = array('Jan' => 0, 'Feb' => 0, 'Mar' => 0, 'Apr' => 0, 'May' => 0, 'Jun' => 0, 'Jul' => 0, 'Aug' => 0, 'Sep' => 0, 'Oct' => 0, 'Nov' => 0, 'Dec' => 0);
    array_unshift($visits, $currentYear);
    $visits[0] = $yearFormat;
    $visits = serialize($visits);
    if ($validate->checkUsername($username)) {
        try {
            $sql = "INSERT INTO businessportfolio (username, companyName, companySlogan, companyCover, aboutCompany, email, yt, instagram, github, twitter, facebook, linkedin, companyImg1, companyImg2, companyImg3, companyImg4, companyImg5, productName1, productAbout1, productImg1, productName2, productAbout2, productImg2, productName3, productAbout3, productImg3, companyLocation, visits, contacts) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssssssssssssssssssssssss", $username, $companyName, $companySlogan, $companyCover, $aboutCompany, $email, $instagram, $yt, $github, $twitter, $facebook, $linkedin, $companyImg1, $companyImg2, $companyImg3, $companyImg4, $companyImg5, $productName1, $productAbout1, $productImg1, $productName2, $productAbout2, $productImg2, $productName3, $productAbout3, $productImg3, $companyLocation, $visits, $contacts);
            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                header("location: dashboard");
            } else {
                $showAlert =
                    '<div class="notification alert">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Error: ' . $stmt->error . '
                    </div>';
            }
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Sofia' media="screen">
    <link rel="icon" href="private\images\logo.png" type="image/x-icon">
    <link rel="stylesheet" href="app\private\css\base.css">
    <link rel="stylesheet" href="app\private\css\nav.css">
    <link rel="stylesheet" href="app\private\css\information-form.css">
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
                <form class="information-form" method="post" name="information-form" enctype="multipart/form-data" autocomplete="on">
                    <div class="form-control">
                        <label for="companyName"> Name </label><br /> <br />
                        <div class="name-area">
                            <input type="text" name="companyName" id="companyName" placeholder="Name of the company" required />
                        </div>
                    </div>
                    <div class="form-control">
                        <label for="companySlogan"> Company Slogan </label><br /> <br />
                        <input type="text" name="companySlogan" id="slogan" placeholder="Enter your companies slogan" required />
                    </div>
                    <div class="form-control">
                        <label for="email"> Email </label><br /> <br />
                        <input type="email" name="email" id="email" placeholder="Enter your email" required />
                    </div>
                    <div class="form-control">
                        <label for="companyCover">Cover Image</label> <br /> <br />
                        <input type="file" name="companyCover" id="companyCover" required />
                    </div>
                    <div class="form-control">
                        <label for="companyImage1">Images</label> <br /> <br />
                        <input type="file" name="companyImg1" id="companyImg1" required />
                        <input type="file" name="companyImg2" id="companyImg2" required />
                        <input type="file" name="companyImg3" id="companyImg3" required />
                        <input type="file" name="companyImg4" id="companyImg4" required />
                        <input type="file" name="companyImg5" id="companyImg5" required />
                    </div>
                    <div class="form-control">
                        <label for="aboutCompany"> About Company </label><br /> <br />
                        <textarea class="form-control" maxlength="1000" rows="5" name="aboutCompany" id="aboutCompany" placeholder="Write about company"></textarea>
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
                            <input type="url" name="linkedin" id="linkedin" placeholder="LinkedIn" />
                        </div>
                    </div>
                    <br />
                    <div class="form-control">
                        <label for="services"> Services </label>
                        <hr />
                        <div class="services">
                            <label for="productName1"> Product 1 </label> <br /> <br />
                            <input type="text" name="productName1" id="productName1" placeholder="Product Name" />
                            <br /> <br />
                            <label for="productImg1"> Product 1 Image</label>
                            <input type="file" name="productImg1" id="productImg1" />
                            <br /> <br />
                            <label for="productAbout1"> Product 1 Description</label>
                            <textarea class="form-control" maxlength="500" rows="5" name="productAbout1" id="productAbout1" placeholder="Product Description"></textarea>
                        </div>
                        <br />
                        <div class="services">
                            <label for="productName2"> Product 2 </label> <br /> <br />
                            <input type="text" name="productName2" id="productName2" placeholder="Product Name" />
                            <br /> <br />
                            <label for="productImg2"> Product 2 Image</label>
                            <input type="file" name="productImg2" id="productImg2" />
                            <br /> <br />
                            <label for="productAbout2"> Product 2 Description</label>
                            <textarea class="form-control" maxlength="500" rows="5" name="productAbout2" id="productAbout2" placeholder="Product Description"></textarea>
                        </div>
                        <br />
                        <div class="services">
                            <label for="productName3"> Product 3 </label> <br /> <br />
                            <input type="text" name="productName3" id="productName3" placeholder="Product Name" />
                            <br /> <br />
                            <label for="productImg3"> Product 3 Image</label>
                            <input type="file" name="productImg3" id="productImg3" />
                            <br /> <br />
                            <label for="productAbout3"> Product 3 Description</label>
                            <textarea class="form-control" maxlength="500" rows="5" name="productAbout3" id="productAbout3" placeholder="Product Description"></textarea>
                        </div>
                    </div>
                    <div class="form-control">
                        <label for="companyLocation"> Location of the company</label> <br /> <br />
                        <input type="text" name="companyLocation" id="companyLocation" placeholder="Enter your company location" />
                    </div>
                    <br />
                    <div class="form-control">
                        <button class="button">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
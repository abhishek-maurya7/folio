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
                        <label for="companyName"> Name </label><br /> <br />
                        <div class="name-area">
                            <input type="text" name="companyName" id="companyName" placeholder="Name of the company" required />
                        </div>
                    </div>
                    <div class="form-control">
                        <label for="slogan"> Company Slogan </label><br /> <br />
                        <input type="text" name="slogan" id="slogan" placeholder="Enter your companies slogan" required />
                    </div>
                    <div class="form-control">
                        <label for="email"> Email </label><br /> <br />
                        <input type="email" name="email" id="email" placeholder="Enter your email" required />
                    </div>
                    <div class="form-control">
                        <label for="coverImage">Cover Image</label> <br /> <br />
                        <input type="file" name="coverImage" id="coverImage" required />
                    </div>
                    <div class="form-control">
                        <label for="companyImage1">Images</label> <br /> <br />
                        <input type="file" name="companyImage1" id="companyImage1" required />
                        <input type="file" name="companyImage2" id="companyImage2" required />
                        <input type="file" name="companyImage3" id="companyImage3" required />
                        <input type="file" name="companyImage4" id="companyImage4" required />
                        <input type="file" name="companyImage5" id="companyImage5" required />
                    </div>
                    <div class="form-control">
                        <label for="aboutCompany"> About Company </label><br /> <br />
                        <textarea class="form-control" maxlength="300" rows="5" name="aboutCompany" id="aboutCompany" placeholder="Write about company" required></textarea>
                    </div>
                    <br />
                    <div class="form-control">
                        <label for="socialLinks"> Social Links </label>
                        <hr />
                        <div class="social-links">
                            <i class="fa fa-envelope"></i>
                            <input type="email" name="email" id="email" placeholder="Email address" />
                        </div>
                        <br />
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
                            <textarea class="form-control" maxlength="500" rows="5" name="productAbout1" id="productAbout1" placeholder="Project Description"></textarea>
                        </div>
                        <br />
                        <div class="services">
                            <label for="productName2"> Product 2 </label> <br /> <br />
                            <input type="text" name="productName2" id="productName2" placeholder="Product Name" />
                            <br /> <br />
                            <label for="productImg2"> Product 2 Image</label>
                            <input type="file" name="productImg2" id="productImg2" />
                            <br /> <br />
                            <textarea class="form-control" maxlength="500" rows="5" name="productAbout2" id="productAbout2" placeholder="Project Description"></textarea>
                        </div>
                        <br />
                        <div class="services">
                            <label for="productName3"> Product 3 </label> <br /> <br />
                            <input type="text" name="productName3" id="productName3" placeholder="Product Name" />
                            <br /> <br />
                            <label for="productImg3"> Product 3 Image</label>
                            <input type="file" name="productImg3" id="productImg3" />
                            <br /> <br />
                            <textarea class="form-control" maxlength="500" rows="5" name="productAbout3" id="productAbout3" placeholder="Project Description"></textarea>
                        </div>
                    </div>
                    <div class="form-control">
                        <label for="companyLocation"> Location of the company</label> <br /> <br />
                        <input type="text" name="companyLocation" id="companyLocation" placeholder="Enter your company location" required />
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
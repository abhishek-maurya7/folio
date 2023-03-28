<!DOCTYPE html>
<html lang="en">

<head>
    <title> Folio | 404 </title>
    <meta charset="utf-8">
    <meta name="keywords" content="Folio, Portfolio, Portfolio Generator">
    <meta name="description" content="An amazing portfolio generator">
    <meta name="author" content="Abhishek Maurya, Shashank Patil">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0fe3b336ed.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href='app\private\css\base.css' />
    <link rel="stylesheet" href='app\private\css\nav.css' />
    <link rel="stylesheet" href="app\private\css\404.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Sofia&display=swap' media="screen">
    <link rel="icon" href="app/private/images/logo.png" type="image/x-icon">
    <style>
        .error {
            width: 100%;
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .error-container {
            background-image: url('app/private/images/404.gif');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 70%;
            height: 70%;
            border-radius: 1rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php include 'private/includes/nav.php'; ?>
    </div>
    <main>
        <section class="error">
            <div class="error-container">
                <div class="error-message">
                </div>
            </div>
        </section>
    </main>
</body>

</html>
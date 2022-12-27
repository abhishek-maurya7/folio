<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Profile</title>
</head>

<body>
    <?php
    require '..\app\private\db\_dbconnect.php';
    $path = $_SERVER['REQUEST_URI'];
    $file = explode('/', $path);
    $file = $file[2];
    echo $file;
    $sql = "SELECT * FROM personalportfolio WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $file);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        echo ("<pre>");
        print_r($row);
        echo ("</pre>");
    }
    ?>
    <div class="container">


    </div>

</body>

</html>
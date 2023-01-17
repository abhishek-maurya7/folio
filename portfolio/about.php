<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>This is about of profile folder</h1>
    <?php
    $path = $_SERVER['REQUEST_URI'];
    $explodes = explode('/', $path);
    $explod = $explodes[2];
    $file = basename($path);
    echo $path;
    echo '<br>';
    echo '<pre>';
    print_r($explodes);
    echo '<br>';
    echo $explod;
    echo '<br>';
    echo $file;
    ?>
</body>

</html>
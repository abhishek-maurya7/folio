<?php
require 'components\db\_dbconnect.php';
$path = $_SERVER['REQUEST_URI'];
$file = basename($path);
$sql = "SELECT * FROM personalportfolio WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $file);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if ($result->num_rows > 0) {
    echo ("<pre>");
    print_r($row);
} else {
    header("Location: 404");
}

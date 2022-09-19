<?php
$folioServer = "localhost";
$folioUsername = "root";
$folioPassword = "";
$folioDatabase = "folio";
$conn = mysqli_connect($folioServer, $folioUsername, $folioPassword, $folioDatabase);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

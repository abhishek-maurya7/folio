<?php
$folioServer = "localhost";
$folioUsername = "root";
$folioPassword = "";
// $folioUsername = "id20375625_root";
// $folioPassword = "Z1eF7(Gwa?*=v[%M";
$folioDatabase = "id20375625_folio";
$conn = mysqli_connect($folioServer, $folioUsername, $folioPassword, $folioDatabase);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

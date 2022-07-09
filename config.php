<?php
define('DBSERVER', 'localhost');
define('DBUSERNAME', 'root');
define('DBPASSWORD', '');
define('DBNAME', 'folioUsers');

/*connect to mysql database*/
$conn = new mysqli(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);

/*check connection*/
if ($conn === false) {
    die("Connection failed: " . mysqli_connect_error());
}

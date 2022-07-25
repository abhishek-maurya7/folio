<?php
/*start the session*/
session_start();

/*check if user is already logged in*/
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] === true) {
    header('Location: index.php');
}
exit;

<?php
class Evaluate
{
    public function checkUsername($validateUsername)
    {
        require 'private\db\_dbconnect.php';
        $sql = "SELECT username FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $validateUsername);
        $stmt->execute();
        $result = $stmt->get_result();
        if (!$result->num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }
    public function checkEmail($validateEmail)
    {
        require 'private\db\_dbconnect.php';
        $sql = "SELECT email FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $validateEmail);
        $stmt->execute();
        $result = $stmt->get_result();
        if (!$result->num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("location: login");
    }
}
$evaluate = new Evaluate();

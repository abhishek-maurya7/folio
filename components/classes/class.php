<?php 
    class Evaluate {
        public function checkUsername($validateUsername) {
            require 'components\db\_dbconnect.php';
            $sql = "SELECT username FROM users WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $validateUsername);
            $stmt->execute();
            $result = $stmt->get_result();
            if (!$result->num_rows > 0) {
                return true;
            }
            return false;
        }
        public function checkEmail($validateEmail) {
            require 'components\db\_dbconnect.php';
            $sql = "SELECT email FROM users WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $validateEmail);
            $stmt->execute();
            $result = $stmt->get_result();
            if (!$result->num_rows > 0) {
                return true;
            }
            return false;
        }
    }
    $evaluate = new Evaluate();
?>
<?php
class Validate
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

    public function createAccount($username, $email, $password)
    {
        require 'private\db\_dbconnect.php';
        try {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $username, $email, $hash);
            $result = $stmt->execute();
            if ($result) {
                header("location: login");
            }
        } catch (mysqli_sql_exception $e) {
            $showAlert =
                '<div class="notification alert">
                            <i class="fa-solid fa-triangle-exclamation"></i>' . 'MySqlException: ' . $e->getMessage() . '<br />' . $sql . '
                        </div>';
        }
    }
    public function checkPassword($username)
    {
        require 'private\db\_dbconnect.php';
        try {
            $sql = "SELECT password FROM users WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                return true;
            } else {
                return false;
            }
        } catch (mysqli_sql_exception $e) {
            $showAlert =
                '<div class="notification alert">
                            <i class="fa-solid fa-triangle-exclamation"></i>' . 'MySqlException: ' . $e->getMessage() . '<br />' . $sql . '
                        </div>';
        }
    }
    public function verifyUser($username)
    {
        require 'private\db\_dbconnect.php';
        try {
            $sql = "SELECT username FROM personalportfolio where username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                header("location: dashboard");
            } else {
                header("location: choice");
            }
        } catch (mysqli_sql_exception $e) {
            $showAlert =
                '<div class="notification alert">
                        <i class="fa-solid fa-triangle-exclamation"></i>' . 'MySqlException: ' . $e->getMessage() . '<br/>' . $sql . '
                    </div>';
        }
    }
}
$validate = new Validate();

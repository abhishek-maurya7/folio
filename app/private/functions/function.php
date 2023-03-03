<?php
class Validate
{
    public function checkUsername($validateUsername) //Checks whether the username is available
    {
        require 'private/db/_dbconnect.php';
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

    public function checkEmail($validateEmail) //Checks whether the email has already been used
    {
        require 'private/db/_dbconnect.php';
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

    public function createAccount($username, $email, $password) //Creates an account
    {
        require 'private/db/_dbconnect.php';
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
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    MySqlException: ' . $e->getMessage() . '<br />' . $sql . '
                </div>';
            echo $showAlert;
        }
    }

    public function checkPassword($username, $password) //Checks whether the password is correct
    {
        require 'private/db/_dbconnect.php';
        try {
            $sql = "SELECT password FROM users WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            return password_verify($password, $row['password']);
        } catch (mysqli_sql_exception $e) {
            $showAlert =
                '<div class="notification alert">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    MySqlException: ' . $e->getMessage() . '<br />' . $sql . '
                </div>';
            echo $showAlert;
        }
    }

    public function loginUser($username) //Logs in the user and starts the session
    {
        require 'private/db/_dbconnect.php';
        try {
            $sql = "SELECT username FROM personalPortfolio where username = ?";
            $pstmt = $conn->prepare($sql);
            $pstmt->bind_param("s", $username);
            $pstmt->execute();
            $presult = $pstmt->get_result();

            $sql = "SELECT username FROM businessPortfolio where username = ?";
            $bstmt = $conn->prepare($sql);
            $bstmt->bind_param("s", $username);
            $bstmt->execute();
            $bresult = $bstmt->get_result();
            if ($presult->num_rows > 0 || $bresult->num_rows > 0) {
                header("location: dashboard");
            } else {
                header("location: choice");
            }
        } catch (mysqli_sql_exception $e) {
            $showAlert =
                '<div class="notification alert">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    MySqlException: ' . $e->getMessage() . '<br />' . $sql . '
                </div>';
            echo $showAlert;
        }
    }

    public function incrementVisits($username, $type)
    {
        require '../app/private/db/_dbconnect.php';
        try {
            if ($type == 'portfolio') {
                $sql = "Select visits from personalPortfolio where username = ?";
            }
            if ($type == 'website') {
                $sql = "Select visits from businessPortfolio where username = ?";
            }
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $visits = unserialize($row['visits']);
            $visits[0][date('M')] += 1;
            $visits = serialize($visits);
            if ($type == 'portfolio') {
                $sql = "UPDATE personalPortfolio SET visits = ? WHERE username = ?";
            }
            if ($type == 'website') {
                $sql = "UPDATE businessPortfolio SET visits = ? WHERE username = ?";
            }
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $visits, $username);
            $stmt->execute();
        } catch (mysqli_sql_exception $e) {
            $showAlert =
                '<div class="notification alert">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    MySqlException: ' . $e->getMessage() . '<br />' . $sql . '
                </div>';
            echo $showAlert;
        }
    }

    public function contact($username, $name, $email, $subject, $message, $type)
    {
        require '../app/private/db/_dbconnect.php';
        $sql = "INSERT INTO contact (username, name, email, subject, message, type) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $username, $name, $email, $subject, $message, $type);
        $result = $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
$validate = new Validate();

<?php
class Validate
{
    public function checkUsername($validateUsername) //Checks whether the username is available
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

    public function checkEmail($validateEmail) //Checks whether the email has already been used
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


    public function createAccount($username, $email, $password) //Creates an account
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
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    MySqlException: ' . $e->getMessage() . '<br />' . $sql . '
                </div>';
            echo $showAlert;
        }
    }

    public function checkPassword($username, $password) //Checks whether the password is correct
    {
        require 'private\db\_dbconnect.php';
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
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    MySqlException: ' . $e->getMessage() . '<br />' . $sql . '
                </div>';

            echo $showAlert;
        }
    }

    public function incrementVisits($username)
    {
        require '..\app\private\db\_dbconnect.php';
        try {
            $sql = "Select visits from personalportfolio where username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            $visits = unserialize($row['visits']);
            $visits[0][date('M')] += 1;

            $visits = serialize($visits);
            $sql = "UPDATE personalportfolio SET visits = ? WHERE username = ?";
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

    public function contact($username, $name, $email, $subject, $message)
    {
        require '..\app\private\db\_dbconnect.php';
        try {
            $sql = "SELECT contacts FROM personalportfolio WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            $contact = unserialize($row['contacts']);
            $messageRequest = array(
                'name' => $name,
                'email' => $email,
                'subject' => $subject,
                'message' => $message
            );

            array_push($contact, $messageRequest);
            $contact = serialize($contact);

            $sql = "UPDATE personalportfolio SET contacts = ? WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $contact, $username);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $showAlert =
                    '<div class="notification success">
                        <i class="fa-solid fa-check-circle"></i>
                        Message sent successfully!
                    </div>';
                return $showAlert;
            } else {
                throw new mysqli_sql_exception("No rows affected");
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
}
$validate = new Validate();

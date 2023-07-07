<?php

class User
{
    public $name;
    public $email;
    public $password;

    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function saveUser()
    {
        try {
            $db = Db::getInstance();
            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
    
            $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->execute();
    
            // Return true if the user was successfully saved
            return true;
        } catch (Exception $e) {
            die("Db connection error");
        }
    }
    public function updateUser()
    {
        try {
            $db = Db::getInstance();

            $query = "UPDATE users SET name = :name, email = :email, password = :password WHERE name = :username";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':username', $_SESSION['name']);
            $stmt->execute();
        } catch (Exception $e) {
            die("Db connection error");
        }
    }
    

    public static function login($email, $password)
    {
        try {
            $db = Db::getInstance();

            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch();

            if ($result) {
                if (password_verify($password, $result['password'])) {
                    session_regenerate_id();
                    $_SESSION["name"] = $result['name'];
                    $_SESSION["loggedIn"] = true;
                    header('location: index.php?controller=posts&action=index');
                } else {
                    echo "Incorrect password";
                }
            } else {
                echo "Account not found";
            }
        } catch (Exception $e) {
            die("Db connection error");
        }
    }
}
?>

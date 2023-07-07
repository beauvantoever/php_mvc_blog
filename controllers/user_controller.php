<?php

// folder controllers/user_controller.php

/*
    Create the user controller
    functions for the views (login, error)
    check for form $_POST submit to verify the user to login
    Show the result or error
*/

// Require the model for the user
require_once('models/user.php');

class UserController
{
    // function for the login page
    public function login()
    {
        // require the login view
        require_once('views/user/login.php');
    }
    
    /*
     * Function that checks if a POST request has been sent and then calls the method check
     */
    public function signIn()
    {
        // check the data as POST request
        $email = $_POST['registerEmail'];
        $password = $_POST['registerPassword'];

        // validate the values for both POST requests, if both fields from the form are filled;
        // try logging in by calling user model with the $email and $password
        if (!empty($email)) {
            if (!empty($password)) {
                $result = User::login($email, $password);
                // echo $result;
            } else {
                echo "Password is required";
            }
        } else {
            echo "Email is required";
        }
    }
    
    /*
    function to signOut; destroy the session and redirect to the home page
    */
    public function signOut()
    {
        // destroy the session
        session_destroy();
        // redirect to the login page
        header('location: index.php');
    }

    public function showSignUp()
    {
        // require the register view
        require_once('views/user/signup.php');
    }
    
    public function showProfile()
    {
        require_once("views/user/profile.php");
    }

    public function signUp()
    {
        $name = $_POST['registerName'];
        $email = $_POST['registerEmail'];
        $password = $_POST['registerPassword'];

        if (!empty($name)) {
            if (!empty($email)) {
                if (!empty($password)) {
                    $user = new User($name, $email, $password);
                    $result = $user->saveUser();
                    if ($result) {
                        // Account successfully created
                        echo "Account created successfully";
                    } else {
                        echo "Failed to create account";
                    }
                } else {
                    echo "Password is required";
                }
            } else {
                echo "Email is required";
            }
        } else {
            echo "Name is required";
        }
    }
    
    public function updateUser()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        if (!empty($name) && !empty($email) && !empty($password)) {
            // Hash het nieuwe wachtwoord
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
            $user = new User($name, $email, $hashedPassword);
            $user->updateUser();
    
            // Werk de gebruikersnaam in de sessie bij
            $_SESSION['name'] = $name;
    
            header('Location: index.php');
        } else {
            echo "Fill in all the required fields!";
        }
    }
    
}
?>

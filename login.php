<?php
    
    session_start();

    // If logout var found equal to 1, then destroy session...
    if($_GET['logout'] == 1 AND $_SESSION['id']) {

        session_destroy();
        $message = "You have been logged out!";
    }

    include("connection.php");

    if($_POST['submit'] == "Sign Up") {

        // Email
        if(!$_POST['email']) {

            $error.="<br />Please enter your email";

        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

            $error.="<br />Please enter a valid email address";
        }

        // Password
        if(!$_POST['pwd']) {

            $error.="<br />Please enter your password";

        } else {

            // Min 8 characters
            if(strlen($_POST['pwd']) < 8) {
                $error.="<br />Please enter a password with at least 8 characters";
            }

            // At least 1 capital letter
            if(!preg_match('`[A-Z]`', $_POST['pwd'])) {
                $error.="<br />Please include at least 1 captial letter in your password";
            }

        }

        if($error) {

            $error = "<strong>There were errors in your sign up details</strong>".$error;

        } else {

            // SQL query string
            $query = "SELECT * FROM users WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."'";

            $result = mysqli_query($link, $query);

            $results = mysqli_num_rows($result);

            // Check if user already exists, else sign them up!
            if($results) {

                $error = "That email address is already registered. Do you want to log in?";
                
            } else {

                $query = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('".$_POST['fname']."', '".mysqli_real_escape_string($link, $_POST['email'])."', '".$_POST['email'].$_POST['pwd']."')";

                mysqli_query($link, $query);

                echo "You've been signed up!";

                $_SESSION['id'] = mysqli_insert_id($link);
                
                // Redirect to logged in page
                header("Location:mainpage.php");

            }
        }

    }


    if($_POST['submit'] == "Log In") {

        $query = "SELECT * FROM users WHERE email='".mysqli_real_escape_string($link, $_POST['loginemail'])."' AND password='".md5(md5($_POST['loginemail']).$_POST['loginpwd'])."' LIMIT 1";

        $result = mysqli_query($link, $query);

        $row = mysqli_fetch_array($result);

        if($row) {

            $_SESSION['id'] = $row['id'];

            // Redirect to logged in page
            header("Location:mainpage.php");

        } else {

            $error = 'We could not find a user with that email and password! <a href=forgot.php>Forgot password?</a>';
            
        }

    }

?>
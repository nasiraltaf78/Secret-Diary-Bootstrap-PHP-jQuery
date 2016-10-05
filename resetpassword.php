<?php

    session_start();

    include("connection.php");

    $query = "SELECT * FROM users WHERE email='".mysqli_real_escape_string($link, $_POST['forgotemail'])."'";

    $result = mysqli_query($link, $query);

    $results = mysqli_num_rows($result);

    if($_POST['submit'] == "Send") {

        if(!$_POST['forgotemail']) {

            $error.="Please enter your email";
        }
        
        if (!filter_var($_POST['forgotemail'], FILTER_VALIDATE_EMAIL)) {

            $error.="<br />Please enter a valid email address";

        } else {

            if(!$results) {
                
                $error.='That email address is not registered! Please sign up <a href=signup.php>here</a>';

            } else {
                
                $existingEmailId = $_POST['forgotemail'];
                $resetField = '<input type="password" name="newPwd" class="form-control" />';
                
            }
        }
    }

    if($_POST['submit'] == "Reset") {
        
        // Password
        if(!$_POST['newPwd']) {

            $error.="Please enter your new password!";

            // Min 8 characters
            if(strlen($_POST['newPwd']) < 8) {
                $error.="<br />Please enter a password with at least 8 characters";
            }

            // At least 1 capital letter
            if(!preg_match('`[A-Z]`', $_POST['newPwd'])) {
                $error.="<br />Please include at least 1 captial letter in your password";
            }

        } else {

            $q = "UPDATE users SET password='".md5(md5($_POST['forgotemail']).$_POST['newPwd'])."' WHERE email='".mysqli_real_escape_string($link, $_POST['forgotemail'])."' LIMIT 1"; 
            echo $q;
            
            mysqli_query($link, $q);

            $_SESSION['id'] = mysqli_insert_id($link);

            $message = "<strong>Password has successfully been changed!</strong><br /> Please login <a href=signup.php>here</a>";

        }
    }

?>
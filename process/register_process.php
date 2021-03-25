<?php



if (isset($_POST["submit"])) {
    require("./db/conn.php");
    require("./functions/functions.php");
    
    $errors = [];

    if (empty(verifyUserInput($_POST["username"]))) {
        $errors[] = "Please enter a valid username!";
    }
    if (empty(verifyUserInput($_POST["email"]))) {
        $errors[] = "Please enter an email Address!";
    }else {
        if (verifyEmail(mysqli_real_escape_string($conn, verifyUserInput($_POST["email"])) == false)) {
            $errors[] = "Invalid email address!";
        }
    }
    if (empty(verifyUserInput($_POST["password"]))) {
        $errors[] = "Please enter a password!";
    }else {
        if (verifyPasswordStrength(mysqli_real_escape_string($conn, verifyUserInput($_POST["password"]))) == false) {
            $errors[] = "Password is weak!";
        }
    }
    if (empty(verifyUserInput($_POST["confirm"]))) {
        $errors[] = "Please confirm your password!";
    }else {
        if ($_POST["confirm"] !== $_POST["password"]) {
            $errors[] = "Incorrect confirm password!";
        }
    }

    if (empty($errors)) {
        # There were no errors...
        require_once("./functions/alerts.php");
        alert_success("Working");
    } else {
        # There were errors...
        $new_errors = "";
        foreach ($errors as $error) {
            require_once("./functions/alerts.php");
            $new_errors = $new_errors . $error . "</br>";
        }
        alert_error($new_errors);
    }
    
}

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
        // require_once("./functions/alerts.php");
        // alert_success("Working");

        ## Catch the user's input and inser it in the DB...

        $username = strtolower(mysqli_real_escape_string($conn, verifyUserInput($_POST["username"])));
        $email = mysqli_real_escape_string($conn, verifyUserInput($_POST["email"]));
        $password = mysqli_real_escape_string($conn, verifyUserInput($_POST["password"]));
        $confirm = mysqli_real_escape_string($conn, verifyUserInput($_POST["confirm"]));

        // Check if the email and username exists already...
        if (checkUsernameExistsAndRetrieveData($username) == false) {
            # The email is not yet used, go ahead and check for the username...
            if (checkEmailExists($email) == false) {
                # The username is not yet used, proceed to hash the password and insert to the DB table...
                $hp = password_hash($password, PASSWORD_DEFAULT);

                $registered_success = registerUser($username, $email, $hp);

                if ($registered_success == true) {
                    # The user has been registered successfully...
                    require_once("./functions/alerts.php");
                    alert_success("Registeration successful, <a href='./login.php' class='btn btn-success'>Click me</a> to login.");
                }
            } else {
                # The username is already used...
                require_once("./functions/alerts.php");
                alert_error("Email already Exists!");
            }
        }else {
            # The email is already used...
            require_once("./functions/alerts.php");
            alert_error("Username already Exists!");
        }
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

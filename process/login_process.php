<?php

if (isset($_POST["submit"])) {
    require("./db/conn.php");
    require("./functions/functions.php");

    $errors = [];

    if (empty(verifyUserInput($_POST["username"]))) {
        $errors[] = "Please enter a valid username!";
    }
    if (empty(verifyUserInput($_POST["password"]))) {
        $errors[] = "Please enter a password!";
    }

    if (empty($errors)) {
        # There were no errors...

        ## Catch the user's input and inser it in the DB...

        $username = strtolower(mysqli_real_escape_string($conn, verifyUserInput($_POST["username"])));
        $password = mysqli_real_escape_string($conn, verifyUserInput($_POST["password"]));

        // Check if the username exists...
        if (checkUsernameExistsAndRetrieveData($username) != false) {
            # The username exists, go ahead and verify the password...
            $user_array = checkUsernameExistsAndRetrieveData($username);
            $h_password = $user_array["password"];

            // echo json_encode($user_array);
            if(password_verify($password, $h_password)){
                # The password is correct, start session and pass data to session...
                session_start();
                $_SESSION = $user_array;

                header("Location: ./");
            }else{
                # The password is incorrect...
                require_once("./functions/alerts.php");
                alert_error("Incorrecct password!");
            }
        } else {
            # The email is already used...
            require_once("./functions/alerts.php");
            alert_error("Username not registered!");
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


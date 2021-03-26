<?php
/**
 * ===============================================
 *              VERIFICATION FUCNTIONS
 * ===============================================
 */

function verifyUserInput($input)
{
    ## This strips white spaces, slashes, and specialcharacters from the users input...
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}



function verifyEmail($email)
{
    ## This verifies the email...
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //email id valid...
        //$verified_email = filter_var($email, FILTER_VALIDATE_EMAIL);
        return true;
    } else {
        //email is invalid...
        return false;
    }
}



function verifyPasswordStrength($password)
{
    ## This verifies the strength of the user's password...
    if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password)) {
        //password is strong...
        return true;
    } else {
        //password is weak...
        return false;
    }
}


/**
 * =====================================================
 *          THIS SHOWS THE CRUD CYCLE
 * =====================================================
 * # C - Create in a DB
 * # R - Read from the DB
 * # U - Update the DB
 * # D - Delete in the DB
 */




function checkEmailExists($email) {
    ## This is to check if the email exists already...
    require("./db/conn.php");
    $email_query = "SELECT * FROM `users` WHERE `email` = '$email' LIMIT 1";
    $email_result = mysqli_query($conn, $email_query);

    if ($email_result) {
        # There was no error...
        if (mysqli_num_rows($email_result) == 1) {
            ## The email exists...
            return true;
        } else {
            ## The email doesn't exist...
            return false;
        }
    }else {
        # There was an error...
        require_once("./functions/alerts.php");
        alert_error("There was an error: " . mysqli_error($conn));
    }
}





function checkUsernameExistsAndRetrieveData($username) {
    ## This is to check if the username exists already...
    require("./db/conn.php");
    $username_query = "SELECT * FROM `users` WHERE `username` = '$username' LIMIT 1";
    $username_result = mysqli_query($conn, $username_query);

    if ($username_result) {
        # There was no error...
        if (mysqli_num_rows($username_result) == 1) {
            ## The username exists, retrieve the data...
            $user_array = mysqli_fetch_array($username_result, MYSQLI_ASSOC);
            return $user_array;
        } else {
            ## The username doesn't exist...
            return false;
        }
    }else {
        # There was an error...
        require_once("./functions/alerts.php");
        alert_error("There was an error: " . mysqli_error($conn));
    }
}





function registerUser($username, $email, $password){
    ## This is going to insert that data into the table in the DB...

    require("./db/conn.php");

    $register_query = "INSERT INTO `users` (`username`, `email`, `password`) VALUE ('$username', '$email', '$password')";
    $register_result = mysqli_query($conn, $register_query);

    if ($register_result) {
        # The user has been registered...
        return true;
    } else {
        # There was an error...
        require_once("./functions/alerts.php");
        alert_error("There was an error: " . mysqli_error($conn));
        return false;
    }
    
}



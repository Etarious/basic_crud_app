<?php

function verifyUserInput($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}



function verifyEmail($email)
{
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
    if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password)) {
        //password is strong...
        return true;
    } else {
        //password is weak...
        return false;
    }
}



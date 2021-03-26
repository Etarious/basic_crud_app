<?php
/**
 * ========================================================
 *          THIS FILE CONTEAINS THE DATABASE CODES
 * ========================================================
 * 
 * ## It would connect to the DB...
 * ## And then automatically create the tables...
 */

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db = "basic_crud";

$conn = mysqli_connect($db_host, $db_user, $db_password, $db) or die("Couldn't connect to database");

if ($conn) {
    ## This is going to create a table in DB...
    $user_query = "CREATE TABLE IF NOT EXISTS `users` (
        `id` INT PRIMARY KEY AUTO_INCREMENT,
        `username` VARCHAR(64) NOT NULL,
        `email` VARCHAR(64) NOT NULL,
        `password` VARCHAR(64) NOT NULL
    )";

    $user_result = mysqli_query($conn, $user_query);
}
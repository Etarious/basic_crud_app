<?php
/**
 * ========================================================
 *          THIS FILE CONTEAINS THE DATABASE CODES
 * ========================================================
 * 
 * ## It wouold connect to the DB...
 * ## And then automatically create the tables...
 */

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db = "basic_crud";

$conn = mysqi_connect($db_host, $db_user, $db_password, $db) or die("Couldn't connect to database");

if ($conn) {
    # code...
}
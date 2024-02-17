<?php
/**
 * Author: Steven Casada
 * Date: 12/30/2023
 * File: database.php
 * Description:
 */

// database connection
//define parameters
$host = "localhost";
$login = "phpuser";
$password = "phpuser";
$database = "atchleyfarms_db";
$tblMarket = "market";

//connect to the mysql server
$connection = @new mysqli($host, $login, $password, $database);

//handle connection servers
if ($connection->connect_errno) {
    $error = $connection->connect_error;
    header("Location:error.php");
    die;
}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
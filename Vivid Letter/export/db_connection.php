<?php
/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: DB Connection
*/

// Connection variables
$host = "localhost"; // MySQL host name eg. localhost
$user = "root"; // MySQL user. eg. root ( if your on localserver)
$password = "sazid1498"; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "sms_portal"; // MySQL Database name

// Connect to MySQL Database
$con = new mysqli($host, $user, $password, $database);
mysqli_set_charset($con,"utf8");
//mb_convert_encoding($con, 'UTF-16LE', 'UTF-8');
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>

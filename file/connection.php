<?php

// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bloodbank";

$conn = new mysqli($servername, $username, $password, $dbname);

// adding default timezone due to deployment server zones issue
date_default_timezone_set('Asia/Kolkata');

if(!$conn){
 die('Could not Connect MySql:' .mysql_error());
}
// else{
//     echo "Connection was successful<br>";
// }

?>
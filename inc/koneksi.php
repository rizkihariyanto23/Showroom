<?php
$servername = "localhost";
$user = "root";
$password = "";
$database = "db_myweb";

//create connection
$con = new mysqli($servername, $user, $password, $database);

//check connection
if ($con->connect_error) {
    die("connection failed" . $conn->connect_error);
}
?>
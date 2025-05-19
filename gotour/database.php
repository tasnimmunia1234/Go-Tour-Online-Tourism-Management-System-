<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "go_tour";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}


?>
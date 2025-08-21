<?php
$host = "localhost";
$user = "root";   // your MySQL username
$pass = "root";       // your MySQL password
$db   = "ums";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

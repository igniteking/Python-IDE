<?php
$dbServername = "localhost";
$dbUsername = "u391376576_root";
$dbPassword = "Website@123";
$dbName = "u391376576_IDE";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die;
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION["email"];
} else {
    $email = "No User";
}

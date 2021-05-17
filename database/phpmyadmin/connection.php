<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "pythonide";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die;
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION["email"];
} else {
    $email = "No User";
}
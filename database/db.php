<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "ppn";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die;
session_start();
if (isset($_SESSION['username'])) {
    $user = $_SESSION["username"];
} else {
    $user = "No User";
}

<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "pythonide";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die;
session_start();
date_default_timezone_set('Asia/Kolkata');
if (isset($_SESSION['email'])) {
    $email = $_SESSION["email"];
    $token = $_SESSION['session_token'];
    $id_login = $_SESSION['id'];
} else {
    $email = "No User";
}
?>
<link rel="apple-touch-icon" sizes="57x57" href="images/main.png">
<link rel="apple-touch-icon" sizes="60x60" href="images/main.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/main.png">
<link rel="apple-touch-icon" sizes="76x76" href="images/main.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/main.png">
<link rel="apple-touch-icon" sizes="120x120" href="images/main.png">
<link rel="apple-touch-icon" sizes="144x144" href="images/main.png">
<link rel="apple-touch-icon" sizes="152x152" href="images/main.png">
<link rel="apple-touch-icon" sizes="180x180" href="images/main.png">
<link rel="icon" type="image/png" sizes="192x192" href="images/main.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/main.png">
<link rel="icon" type="image/png" sizes="96x96" href="images/main.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/main.png">
<link rel="manifest" href="images/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="images/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
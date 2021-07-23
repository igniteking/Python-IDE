
<?php
include_once("database/phpmyadmin/connection.php");
$datetime = date("h");
$mainDate = date("y-m-d");
mysqli_query($conn, "UPDATE `session` SET `status`='0' WHERE user_id='$id_login'");
$sql = "UPDATE calculate SET end_time='$datetime' WHERE user='$email' AND rand='$token' AND date='$mainDate'";
$query = mysqli_query($conn, $sql);
session_start();
session_unset();
session_destroy();
header("Location: login.php");

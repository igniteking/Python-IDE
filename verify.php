<?php
if (isset($_GET['vkey'])) {
    $vkey = $_GET['vkey'];
    $mysqli = new MySQLi('localhost', 'root', '', 'ramblerhalts');
    $resultSet = $mysqli->query("SELECT activated, vkey FROM users WHERE activated='0' AND vkey='$vkey' LIMIT 1");
    if ($resultSet->num_rows == 1) {
        $update = $mysqli->query("UPDATE users SET activated='1' WHERE vkey='$vkey' LIMIT 1");
        if ($update) {
            echo "Your account has been verified. You can now login. Redirecting...";
            echo "<meta http-equiv=\"refresh\" content=\"3; url=login.php\">";
        } else {
            echo $mysqli->error;
        }
    } else {
        "This account invalid or already verified";
    }
} else {
    die("Something Went Wrong!");
}

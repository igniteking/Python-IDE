<?php
include('database/phpmyadmin/connection.php');
echo "<h1>Please wait for the payment process to be Completed!<br>Sorry for any delays</h1>";
$user = $_POST['name'];
        $email = $_POST['email'];
        $course_category = $_POST['course_category'];
        $days = $_POST['days'];
        $added_on = date('Y-m-d h:i:s');
if ($course_category == "python" or $course_category == "javascript") {
    if (isset($_POST['days']) && isset($_POST['name']) && isset($_POST['course_category']) && isset($_POST['email'])) {
        mysqli_query($conn, "insert into payment(name,course_category,email,payment_id,added_on,days) values('$user','$course_category','$email', '$payment_id','$added_on', '$days')");
        $_SESSION['OID'] = mysqli_insert_id($conn);
    }


    if (isset($_POST['payment_id']) && isset($_POST['name']) && isset($_SESSION['OID'])) {
        $payment_id = $_POST['payment_id'];
        $user = $_POST['name'];
        mysqli_query($conn, "update payment set payment_id='$payment_id' where id='" . $_SESSION['OID'] . "'");
        mysqli_query($conn, "update `users` set refral='1' where username='$user'");
        mysqli_query($conn, "delete from `users` where refral='0'");
    }
}
if ($course_category == "cc_plus") {
    if (isset($_POST['days']) && isset($_POST['name']) && isset($_POST['course_category']) && isset($_POST['email'])) {
        mysqli_query($conn, "insert into payment(name,course_category,email,payment_id,added_on,days) values('$user','python','$email', '$payment_id','$added_on', '$days')");
        mysqli_query($conn, "insert into payment(name,course_category,email,payment_id,added_on,days) values('$user','javascript','$email', '$payment_id','$added_on', '$days')");
        mysqli_query($conn, "insert into payment(name,course_category,email,payment_id,added_on,days) values('$user','$course_category','$email', '$payment_id','$added_on', '$days')");
        $_SESSION['OID'] = mysqli_insert_id($conn);
    }


    if (isset($_POST['payment_id']) && isset($_POST['name']) && isset($_SESSION['OID'])) {
        $payment_id = $_POST['payment_id'];
        $user = $_POST['name'];
        mysqli_query($conn, "update payment set payment_id='$payment_id' where id='" . $_SESSION['OID'] . "'");
        mysqli_query($conn, "update `users` set refral='1' where username='$user'");
        mysqli_query($conn, "delete from `users` where refral='0'");
    }
}

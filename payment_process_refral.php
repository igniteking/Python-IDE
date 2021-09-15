<?php
include('database/phpmyadmin/connection.php');

if(isset($_POST['days']) && isset($_POST['name']) && isset($_POST['course_category']) && isset($_POST['email'])){
    $user=$_POST['name'];
    $email=$_POST['email'];
    $course_category=$_POST['course_category'];
    $days = $_POST['days'];
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($conn,"insert into payment(name,course_category,email,payment_id,added_on,days) values('$user','$course_category','$email', '$payment_id','$added_on', '$days')");
    $_SESSION['OID']=mysqli_insert_id($conn);
}


if(isset($_POST['payment_id']) && isset($_POST['name']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    $user=$_POST['name'];
    mysqli_query($conn,"update payment set payment_id='$payment_id' where id='".$_SESSION['OID']."'");
    mysqli_query($conn,"update `users` set refral='1' where username='$user'");
    mysqli_query($conn,"delete from `users` where refral='0'");
}

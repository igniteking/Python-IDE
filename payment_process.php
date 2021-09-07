<?php
include('database/phpmyadmin/connection.php');
if(isset($_POST['amt']) && isset($_POST['name']) && isset($_POST['course_category'])){
    $amt=$_POST['amt'];
    $name=$_POST['name'];
    $course_category=$_POST['course_category'];
    $payment_status="pending";
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($conn,"insert into payment(name,course_category,amount,payment_status,added_on) values('$name','$course_category','$amt','$payment_status','$added_on')");
    $_SESSION['OID']=mysqli_insert_id($conn);
}


if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    mysqli_query($conn,"update payment set payment_status='complete',payment_id='$payment_id' where id='".$_SESSION['OID']."'");
}

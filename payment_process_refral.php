<?php
include('database/phpmyadmin/connection.php');
if(isset($_POST['amt']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['course_category'])){
    $amt=$_POST['amt'];
    $name=$_POST['name'];
    $course_category=$_POST['course_category'];
    $payment_status="pending";
    $added_on=date('Y-m-d h:i:s');
    $username = strip_tags(@$_POST['username']);
    $email = strip_tags(@$_POST['email']);
    $password = strip_tags(@$_POST['password']);
    $mobile = strip_tags(@$_POST['mobile']);
    $r_pswd = strip_tags(@$_POST['repeat-password']);
    $date = date("Y-m-d");
    $vkey = md5(time() . $username);
    $randomNum = substr(str_shuffle("0123456789"), 0, 4);
    $mobile_otp = $randomNum;
    mysqli_query($conn,"insert into payment(name,email,course_category,amount,payment_status,added_on) values('$name','$email','$course_category','$amt','$payment_status','$added_on')");
    $_SESSION['OID']=mysqli_insert_id($conn);
    mysqli_query($conn, "INSERT INTO users(`id`, `username`, `email`, `mobile`, `password`, `bio`, `date`, `active`, `token_key`, `user_type`, `mobile_otp`, `mobile_active`, `refral`) VALUES (NULL, '$username','$email','$mobile', '$hashedPwd','','$date','0','$vkey', 'student', '$mobile_otp', '0', '1')");
}


if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    mysqli_query($conn,"update payment set payment_status='complete',payment_id='$payment_id' where id='".$_SESSION['OID']."'");
}

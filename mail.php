<!DOCTYPE html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<html lang="en">
<?php
$payment_selectioni_query_python = "SELECT * FROM `payment`";
$payment_selectioni_result_python = mysqli_query($conn, $payment_selectioni_query_python);
while ($rows = mysqli_fetch_assoc($payment_selectioni_result_python)) {
    $days = $rows['days'];
    echo $name = $rows['name'];
    $email = $rows['email'];
    $course_category = $rows['course_category'];

    if ($days == 7 ) {
        //Load Composer's autoloader
        require 'vendor/autoload.php';
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'learn.glowedu@gmail.com';                     //SMTP username
        $mail->Password   = 'Website@123';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('learn.glowedu@gmail.com', 'Mailer');
        $mail->addAddress('khanzaidan786@gmail.com');               //Name is optional
        $mail->addReplyTo('learn.glowedu@gmail.com', 'Information');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Forgot Password - GLOWEDU';
        $mail->Body = "Hey There, <br> Days left<br><br>
                                        Random : $rand<br>
                                        $days<br>
                                        Regards,<br>
                                        Team Glowworm
                                    </br></br> https://learn.glowedu.co.in";
        $mail->AddAddress($email);
        $mail->Send();
}}
?>
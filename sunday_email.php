<!DOCTYPE html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<html lang="en">
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
<?php
$payment_selectioni_query_python = "SELECT * FROM `users`";
$payment_selectioni_result_python = mysqli_query($conn, $payment_selectioni_query_python);
while ($rows = mysqli_fetch_assoc($payment_selectioni_result_python)) {
    $email = $rows['email'];
    $username = $rows['username'];


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
        $mail->addAddress($email);               //Name is optional
        $mail->addReplyTo('learn.glowedu@gmail.com', 'Information');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Forgot Password - GLOWEDU';
        $mail->Body = "Dear learner!<br><Br>

        Do you know that it is said that, it takes 10,000 hours to master something!<br>
        
        So to achieve your dream job you need to practice and that is why you should log in and start learning!<br>
        
        Don't forget to solve this week's weekly challenge!<br>
        
        It may be tough but you are tougher!<br>
        
        Always remember, pain is temporary regret is permenant!<br>
        
        You can do it by logging into our platform using the following link:<br>
        
        https://learn.glowedu.co.in <br>
        
        For any queries feel free to reach out to us!<br><br>
        
        E-mail: info@glowedu.co.in<br>
        WhatsApp: +919825085454<br><br>
        
        Happy Learning!<br>
        
        Regards,<br>
        
        Team Glowworm
                                    </br></br> https://learn.glowedu.co.in";
        $mail->AddAddress($email);
        $mail->Send();
    }
?>
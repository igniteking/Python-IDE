<?php include_once("database/phpmyadmin/connection.php");
$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $query);
while ($rows = mysqli_fetch_assoc($result)) {
        $username = $rows['username'];
        $email = $rows['email'];
        $mobile_number = $rows['mobile'];
        $password = $rows['password'];
        $vkey = $rows['token_key'];
}
        
        
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
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
        $mail->Subject = 'Welcome To Learn GlowEDU';
        $mail->Body    = "Dear $username, </br> Your Account Has Been Created On Learn GlowEDU. Click the link below to verify your account!
        <br><br>
        <a href='http://learn.glowedu.co.in/verify.php?vkey=$vkey'>http://learn.glowedu.co.in/verify.php?vkey=$vkey</a>
        <br><br>
        </br></br> https://learn.glowedu.co.in";
    
        $mail->send();
        echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
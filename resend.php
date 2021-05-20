<?php include_once("database/phpmyadmin/connection.php"); ?>
<?php 
$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $query);
while($rows = mysqli_fetch_assoc($result))
        {
$username = $rows['username'];
$email = $rows['email'];
$mobile_number = $rows['mobile'];
$password = $rows['password'];
$vkey = $rows['token_key'];
require 'class/class.phpmailer.php';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.hostinger.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = 'info@glowedu.co.in';
$mail->Password = 'Website@123';
$mail->SetFrom('info@glowedu.co.in');
$mail->Subject = "Welcome To Learn GlowEDU";
$mail->Body = "Dear $username, </br> Your Account Has Been Created On Learn GlowEDU. Click the link below to verify your account!
<br><br>
<a href='http://learn.glowedu.co.in/verify.php?vkey=$vkey'>http://learn.glowedu.co.in/verify.php?vkey=$vkey</a>
<br><br>
</br></br> https://learn.glowedu.co.in";
$mail->AddAddress($email);
$mail->Send();
echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
}?>
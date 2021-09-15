<!DOCTYPE html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password? - GlowEDU</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="style/css/style.css">
</head>
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    if (isset($_SESSION['email'])) {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
        exit();
    } else {
    }
    ?>
<?php
$submit = @$_POST['check'];
    $email = strip_tags(@$_POST['email']);
    $date = date("Y-m-d");
    $rand = md5(time() . $email);
    if ($submit) {
        $user_check2 = "SELECT email from users WHERE email='$email'";
            $result2 = mysqli_query($conn, $user_check2);
            $result_check2 = mysqli_num_rows($result2);
            if ($result_check2 > 0) {
                $sql = "INSERT INTO `password_tokens`(`id`, `email`, `token`, `date`) VALUES (null,'$email','$rand','$date')";
                $query = mysqli_query($conn, $sql);
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
                $mail->Body = "Hey There, <br> Here's your random generated key to reset your password<br><br>
                                        Random : $rand<br>
                                        Copy the code above and go to :- http://learn.glowedu.co.in/recover-password.php?token=$rand <br><br>
                                        To Recover Your Password<br>
                                        Regards,<br>
                                        Team Glowworm
                                    </br></br> https://learn.glowedu.co.in";
                                                    $mail->AddAddress($email);
                                                    $mail->Send();
                                                    echo "<p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #009fdc;'>E-mail has been sent to your Inserted E-mail address!</p>";
            } else {
                echo "<div class='error-styler'><center>
                <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>E-mail Dosen't exist!</p>
        </center></div>";
            }
    }
        ?>
<body>
    <div class="one" style="margin-top: 8%;">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form"><br><br><br><br>
                        <h2 class="form-title">Forgot Password?</h2>
                        <form method="POST" action='forgot-password.php' class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="check" id="signup" class="form-submit" value="Send Link" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/forgot.svg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link" style="font-size: 20px;">Back To Login!</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <br>
    <center>
        <p style="font-size: 13.5px; color: #555;">&copy; 2021 Learn GlowEDU</p>
    </center>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>
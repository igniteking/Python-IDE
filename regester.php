<!DOCTYPE html>
<?php include_once("database/phpmyadmin/connection.php"); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <?php
    if (isset($_SESSION['username'])) {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
        exit();
    } else {
    }
    ?>
</head>

<body>
<?php
$reg = @$_POST['reg'];
$username = strip_tags(@$_POST['username']);
$email = strip_tags(@$_POST['email']);
$mobile_number = strip_tags(@$_POST['mobile']);
$password = strip_tags(@$_POST['password']);
$r_pswd = strip_tags(@$_POST['repeat-password']);
$date = date("Y-m-d");
$vkey = md5(time() . $username);
if ($reg) {
    if($username && $mobile_number && $password && $r_pswd) {
        $user_check = "SELECT username from users WHERE username='$username'";
        $result = mysqli_query($conn, $user_check);
        $result_check = mysqli_num_rows($result);
        if (!$result_check > 0) {
            if ($password == $r_pswd) {
                if (preg_match("/\d/", $password)) {
                    if (preg_match("/[A-Z]/", $password)) {
                        if (preg_match("/[a-z]/", $password)) {
                            if (preg_match("/\W/", $password)) {
                                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                                mysqli_query($conn, "INSERT INTO users(`id`, `username`, `email`, `mobile`, `password`, `bio`, `date`, `active`, `token_key`, `user_type`) VALUES (NULL, '$username','$email','$mobile_number', '$hashedPwd','','$date    ','','$vkey', 'student')");
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
                                <a href='https://learn.glowedu.co.in/verify.php?=$vkey'>https://learn.glowedu.co.in/verify.php?vkey=$vkey</a>
                                <br><br>
                                </br></br> https://learn.glowedu.co.in";
                                $mail->AddAddress($email);
                                $mail->Send();
                                echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
                            } else {
                                echo "<div class='error-styler'><center>
            <f style='padding-top: 10px; padding-bottom: 10px;'>Password should contain at least one special character</f>
            </center></div>";
                            }
                        } else {
                            echo "<div class='error-styler'><center>
            <f style='padding-top: 10px; padding-bottom: 10px;'>Password should contain at least one small Letter</f>
            </center></div>";
                        }
                    } else {
                        echo "<div class='error-styler'><center>
            <f style='padding-top: 10px; padding-bottom: 10px;'>Password should contain at least one Capital Letter</f>
            </center></div>";
                    }
                } else {
                    echo "<div class='error-styler'><center>
        <f style='padding-top: 10px; padding-bottom: 10px;'>Password should contain at least one digit</f>
        </center></div>";
                }
            } else {
                echo "<div class='error-styler'><center>
        <f style='padding-top: 10px; padding-bottom: 10px;'>Both Password's Dont Match!</f>
        </center></div>";
            }
        } else {
            echo "<div class='error-styler'><center>
        <f style='padding-top: 10px; padding-bottom: 10px;'>Username already exist!</f>
        </center></div>";
        }
    } else {
        echo "<div class='error-styler'><center>
        <f style='padding-top: 10px; padding-bottom: 10px;'>Please Fill In All Fields!</f>
        </center></div>";
    }
}
?>


<div class="one" style="margin-top: 3%;">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Register</h2>
                        <form method="POST" action='regester.php' class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="mobile"><i class="zmdi zmdi-phone"></i></label>
                                <input type="number" name="mobile" id="email" placeholder="Your Mobile Number"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="repeat-password" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="TandC.php" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="reg" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
            </section>
    </div>
<br>
    <center>
        <p style="font-size: 13.5px; color: #555;">&copy; 2021 </p>
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
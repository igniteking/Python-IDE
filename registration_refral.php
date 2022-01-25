<!-- Facebook Pixel Code -->
<script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '811028626177906');
    fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=811028626177906&ev=PageView&noscript=1" /></noscript>
<!-- End Facebook Pixel Code -->
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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register - GlowEdu</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="style/css/style.css">
    <?php
    if (isset($_SESSION['username'])) {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
        exit();
    } else {
    }
    ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="images/logo.png" width="50px">
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="registration_refral.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <?php
    $reg = @$_POST['reg'];
    $username = strip_tags(@$_POST['username']);
    $course_category = strip_tags(@$_POST['course_category']);
    $email = strip_tags(@$_POST['email']);
    $password = strip_tags(@$_POST['password']);
    $mobile = strip_tags(@$_POST['mobile']);
    $r_pswd = strip_tags(@$_POST['repeat-password']);
    $date = date("Y-m-d");
    $vkey = md5(time() . $username);
    $randomNum = substr(str_shuffle("0123456789"), 0, 4);
    $mobile_otp = $randomNum;
    if ($reg) {
        if ($username && $password && $r_pswd) {
            $user_check2 = "SELECT email from users WHERE email='$email'";
            $result2 = mysqli_query($conn, $user_check2);
            $result_check2 = mysqli_num_rows($result2);
            if (!$result_check2 > 0) {
                if ($password == $r_pswd) {
                    if (preg_match("/\d/", $password)) {
                        if (preg_match("/[A-Z]/", $password)) {
                            if (preg_match("/[a-z]/", $password)) {
                                if (preg_match("/\W/", $password)) {
                                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                                    $sql_insert = "INSERT INTO users(`id`, `username`, `email`, `mobile`, `password`, `bio`, `date`, `active`, `token_key`, `user_type`, `mobile_otp`, `mobile_active`, `refral`) VALUES (NULL, '$username','$email','$mobile', '$hashedPwd','','$date','0','$vkey', 'student', '$mobile_otp', '0', '0')";
                                    mysqli_query($conn, $sql_insert);
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
                                    $mail->Subject = 'Welcome To Learn GlowEDU';
                                    $mail->Body = "Dear, $username  <br> This is to inform you that you are just one step away from a great learning experience.<br>
                                        Click on the link below and verify your E-mail ID to complete your registration process with us. <br>
                                        Link : <a href='http://learn.glowedu.co.in/verify.php?vkey=$vkey'>http://learn.glowedu.co.in/verify.php?vkey=$vkey</a><br>
                                        Once done with the registration you will be able to access the course <br>
                                        Regards,                                    <br>
                                        Team Glowworm

                                    </br></br> https://learn.glowedu.co.in";
                                    $mail->AddAddress($email);
                                    $mail->Send();
                                    $last_id = mysqli_insert_id($conn);
                                    echo "<meta http-equiv=\"refresh\" content=\"0; url=validate.php?id=$last_id&&username=$username&&course_category=$course_category&&email=$email\">";
                                } else {
                                    echo "<div class='error-styler'><center>
                                        <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password should contain at least one special character!</p>;
                                        </center></div>";
                                }
                            } else {
                                echo "<div class='error-styler'><center>
                                    <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password should contain at least one small Letter</p>
                </center></div>";
                            }
                        } else {
                            echo "<div class='error-styler'><center>
                                <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password should contain at least one Capital Letter</p>
                </center></div>";
                        }
                    } else {
                        echo "<div class='error-styler'><center>
                            <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password should contain at least one digit</p>
            </center></div>";
                    }
                } else {
                    echo "<div class='error-styler'><center>
                        <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Both Password's Dont Match!</p>
            </center></div>";
                }
            } else {
                echo "<div class='error-styler'><center>
                    <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>E-mail already exist!</p>
            </center></div>";
            }
        } else {
            echo "<div class='error-styler'><center>
                <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Please Fill In All Fields!</p>
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
                        <form method="POST" action='registration_refral.php' class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="name" placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" />
                            </div>
                            <div class="form-group">
                                <label for="mobile"><i class="zmdi zmdi-phone"></i></label>
                                <input type="tel" name="mobile" id="mobile" placeholder="Mobile" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password" />
                            </div>
                            <span><b>Password should contain atleast one Upper case letter </b></span><br>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="repeat-password" id="re_pass" placeholder="Repeat your password" />
                            </div>
                            <div class="form-group">
                                <p>I am subscribing for :</p>
                                <select name="course_category" class="input_styler" id="course_category" style="padding: 10px; border: 1px solid #ccc; border-radius: 1px solid dotted; width: 100%;">
                                    <option>Select your desired package from here!</option>
                                    <option value="python30">Python Course / 1 Month / Rs. 199.00/-</option>
                                    <option value="python90">Python Course / 3 Month / Rs. 597.00/-</option>
                                    <option value="python180">Python Course / 6 Month / Rs. 1,074.00/-</option>
                                    <option value="python360">Python Course / 12 Month / Rs. 1,910.00/-</option>
                                    <option value="javascript30">Javascript Course / 1 Month / Rs. 199.00/-</option>
                                    <option value="javascript90">Javascript Course / 3 Month / Rs. 597.00/-</option>
                                    <option value="javascript180">Javascript Course / 6 Months / Rs. 1,074.00/-</option>
                                    <option value="javascript360">Javascript Course / 12 Months / Rs. 1,910.00/-</option>
                                    <option value="cc_plus30">C & C++ Course / 1 Month / Rs. 199.00/-</option>
                                    <option value="cc_plus90">C & C++ Course / 3 Month / Rs. 597.00/-</option>
                                    <option value="cc_plus180">C & C++ Course / 6 Months / Rs. 1,074.00/-</option>
                                    <option value="cc_plus360">C & C++ Course / 12 Months / Rs. 1,910.00/-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="agree-term" class="label-agree-term"><span><span></span></span><b>By registering you will be agreeing all statements in <a href="tandc_refral.php" style="color: blue;" class="term-service">Terms of service</a></b></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="reg" id="signup" class="form-submit" value="Buy & Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/join.svg" alt="sing up image"></figure>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <center>
        <p style="margin-top:-60px; font-size: 13.5px; color: #555;">&copy; 2021 Learn GlowEDU</p>
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
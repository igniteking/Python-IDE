<!DOCTYPE html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recover Password - GlowEDU</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="style/css/style.css">
</head>
<?php
$get_token = @$_GET['token'];
$email = @$_POST['email'];
$password = @$_POST['password'];
$submit = @$_POST['check'];
$r_pswd = @$_POST['r-password'];
if ($submit) {
    # code...
$user_check2 = "SELECT * from `password_tokens` WHERE email='$email' AND token='$get_token'";
$result = mysqli_query($conn, $user_check2);
$result_check = mysqli_num_rows($result);
if ($result_check > 0) {
    if ($password == $r_pswd) {
        if (preg_match("/\d/", $password)) {
            if (preg_match("/[A-Z]/", $password)) {
                if (preg_match("/[a-z]/", $password)) {
                    if (preg_match("/\W/", $password)) {
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                            $password_update = "UPDATE `users` SET `password`='$hashedPwd' WHERE email='$email'";
                            $result_password_update = mysqli_query($conn, $password_update);
                            if ($result_password_update) {
                                # code...
                                echo "<p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #009fdc;'>Your Password Has Been Created!</p>";
                                echo "<meta http-equiv=\"refresh\" content=\"2; url=login.php\">";
                            }
                            
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
    echo "<p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>E-mail does not match!</p>";
    
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
                        <h2 class="form-title">Reset Password?</h2>
                        <form method="POST" action='recover-password.php?token=<?php echo $get_token;?>' class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your E-mail!" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-lock"></i></label>
                                <input type="text" name="password" id="email" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="r-password" id="email" placeholder="Re-type Password" />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="check" id="signup" class="form-submit" value="Reset-Password" />
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
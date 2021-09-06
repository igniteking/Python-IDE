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
            <img src="images/main.png" width="50px">
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            </div>
        </div>
    </nav>
    <br>
    <?php
    $reg = @$_POST['btn'];
    $username = strip_tags(@$_POST['username']);
    $email = strip_tags(@$_POST['email']);
    $password = strip_tags(@$_POST['password']);
    $mobile = strip_tags(@$_POST['mobile']);
    $r_pswd = strip_tags(@$_POST['re_pass']);
    $vkey = md5(time() . $username);
    if ($reg) {
        if ($username && $password && $r_pswd) {
            $user_check = "SELECT username from users WHERE username='$username'";
            $result = mysqli_query($conn, $user_check);
            $user_check2 = "SELECT email from users WHERE email='$email'";
            $result2 = mysqli_query($conn, $user_check2);
            $result_check = mysqli_num_rows($result);
            $result_check2 = mysqli_num_rows($result2);
            if (!$result_check > 0) {
                if (!$result_check2 > 0) {
                    if ($password == $r_pswd) {
                        if (preg_match("/\d/", $password)) {
                            if (preg_match("/[A-Z]/", $password)) {
                                if (preg_match("/[a-z]/", $password)) {
                                    if (preg_match("/\W/", $password)) {
                                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                                        //Load Composer's autoloader
                                        ?>
                                        <script>
                                        var name = jQuery('#name').val();
        var email = jQuery('#email').val();
        var amt = jQuery('#amt').val();
        var course_category = jQuery('#course_category_c').val();
        
        jQuery.ajax({
          type: 'post',
          url: 'payment_process.php',
          data: "amt=" + amt + "&name=" + name + "&email=" + email + "&course_category=" + course_category,
          success: function(result) {
            var options = {
              "key": "rzp_test_j1EvXkK1lRyYz4",
              "amount": amt * 100,
              "currency": "INR",
              "name": "GlowEDU",
              "description": "C-Course",
              "image": "images/logo.jpeg",
              "handler": function(response) {
                jQuery.ajax({
                  type: 'post',
                  url: 'payment_process.php',
                  data: "payment_id=" + response.razorpay_payment_id,
                  success: function(result) {
                    window.location.href = "thank_you.php";
                  }
                });
              }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
          }
        });
    </script>
                                        <?php
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
                }else {
                    echo "<div class='error-styler'><center>
                    <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>E-mail already exist!</p>
            </center></div>";
                }
                } else {
                    echo "<div class='error-styler'><center>
                    <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Username already exist!</p>
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
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" />
                            </div>
                            <p><b>Select a new password</b></p>
                                <select name="course_category_python" style="width:100%;">
                                    <option value="">Select Course</option>
                                    <option value="python">Python</option>
                                    <option value="javascript">Javascript</option>
                                    <option value="c_plus">C++</option>
                                    <option value="c">C</option>
                                </select>
                            <div class="form-group">
                                <label for="agree-term" class="label-agree-term"><span><span></span></span><b>By registering you will be agreeing all statements in <a href="tandc.php" style="color: blue;" class="term-service">Terms of service</a></b></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" onclick='pay_now()' name='btn' id="btn" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                    <img src="images/join.svg" alt="sing up image"></figure>
                    <form>
         <input type='textbox' name='name' value='$user' style='display: none;' id='name' placeholder='Enter your name' />
         <input type='textbox' name='email' value='$email' style='display: none;' id='name' placeholder='Enter your email' />
         <input type='textbox' name='course_category_c' value='c' style='display: none;' id='course_category_c' placeholder='Enter your course_category' />
         <input type='textbox' name='amt' value='700' id='amt' style='display: none;' placeholder='Enter your amt' />
         <input type='button' name='btn' id='btn' onclick='pay_now()' value='Buy Course' style='text-decoration: none; margin-top: 50px; border: 2px dotted white; background-color: #83c5be; width: 100%; height: 50px; font-size: 20px; color: white; '>
       </form>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    
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
<!doctype html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<?php include_once("database/phpmyadmin/header.php"); ?>
<html lang="en">
  <head>
  <?php
  if (isset($_SESSION['email'])) {
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
    exit();
}

?>
<?php
        $query = "SELECT * from users WHERE email = '".$_SESSION['email'] ."'";
        $result = mysqli_query($conn, $query);

        while($rows = mysqli_fetch_assoc($result))
        {
        $id = $rows['id'];;
        $user = $rows['username'];
        $email = $rows['email'];
        }
    ?>
  	<title>Report - GlowEdu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="style/css/css/style.css">
  </head>
  <body>
  <div id="content" class="p-4 p-md-5">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">

    <button type="button" id="sidebarCollapse" class="btn btn-primary">
      <i class="fa fa-bars"></i>
      <span class="sr-only">Toggle Menu</span>
    </button>
    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="nav navbar-nav ml-auto">
      <li class="nav-item active">
      <img src="images/main.png" width ="40px">
      </li>
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="about.php">About Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </div>
      </nav>
<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$reg = @$_POST['reg'];
$reaper = @$_POST['reaper'];

if ($reg) {

      if (((@$_FILES["img"]["type"] == "image/jpeg") || (@$_FILES["img"]["type"] == "image/png") || (@$_FILES["img"]["type"] == "image/gif")) && (@$_FILES["img"]["size"] < 10048576)) {
          $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
          $rand_dir_name = substr(str_shuffle($chars), 0, 15);
          mkdir("reports/$rand_dir_name");
          if (file_exists("reports/$rand_dir_name/" . @$_FILES['img']['name'])) {
              $error = "Image Already Exists!";
          } else {
              move_uploaded_file(@$_FILES['img']['tmp_name'], "reports/$rand_dir_name/" . $_FILES['img']['name']);
              $cover_pic_name = "$rand_dir_name/" . @$_FILES['img']['name'];
             echo "Uploaded!";
              };
          };
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
        $mail->Body = "Dear $username, </br> This is in reference to the error/bug reported by you on our platform.
        We are grateful to vigilant users like you that help us improve our portal's learning experience.
        Rest assured the bug/error reported by you will be solved within no time as we are commited to offer 
        the best learning experience possible to our users and our team is working hard to achieve this.
        This mail contains the details of the bug/error submitted by you along with the screenshot.
        Regards,
        Team Glowworm
    <br><br>
    </br></br> https://learn.glowedu.co.in";
    $mail->AddAddress($email);
    $mail->Send();
    echo "Mail has been sent!";
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
        $mail->addAddress($email, 'learn.glowedu@gmail.com');               //Name is optional
        $mail->addReplyTo('learn.glowedu@gmail.com', 'Information');
        
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Error Report To Learn GlowEDU';
        $mail->Body = "$reaper<br><br><br><img src='http://learn.glowedu.co.in/reports/$cover_pic_name'><br>
        Regards,
        $user
    <br><br>
    </br></br> https://learn.glowedu.co.in";
    $mail->AddAddress($email);
    $mail->Send();
};

?>

<h6>Report Us If somethig is wrong</h6><br>
<form method="POST" action ="report.php" enctype='multipart/form-data'>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Query</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="reaper" id="inputPassword3" style="height: 100px;"></textarea>
    </div>
    <br>
  </div><br>
  <div class="form-group row">
    <div class="col-sm-10">
    <label class="form-label" for="customFile">Upload a Screen shot for our reference</label>
    <input class="form-control" type="file" name="img" id="formFileMultiple"/> <br>
      <input type="submit" name="reg" class="btn btn-primary" value="Send Email" />
  </div>
</form>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
  </body>
</html>
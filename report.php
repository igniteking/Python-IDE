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
        }
    ?>
  	<title>Report - GlowEdu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/css/style.css">
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
            <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<form>
<?php 
$reg = @$_POST['reg'];
$username = strip_tags(@$_POST['username']);
$email = strip_tags(@$_POST['email']);

require 'class/class.phpmailer.php';
                                    $mail = new PHPMailer();
                                    $mail->isSMTP();
                                    $mail->SMTPAuth = true;
                                    $mail->SMTPSecure = 'tls';
                                    $mail->Host = 'smtp.gmail.com';
                                    $mail->Port = '587';
                                    $mail->isHTML();
                                    $mail->Username = 'learn.glowedu@gmail.com';
                                    $mail->Password = 'Website@123';
                                    $mail->SetFrom('learn.glowedu@gmail.com');
                                    $mail->Subject = "Greetings from Glowworm Academy!";
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

                                    ?>

<h6>Report Us If somethig is wrong</h6><br>
<form method="POST" action ="report.php">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text"  name="username" class="form-control" id="inputEmail3" placeholder="Username">
    </div>
  </div><br>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">E-mail</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="inputPassword3" placeholder="E-mail">
    </div>
  </div><br>
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
    <input class="form-control" type="file" id="formFileMultiple" multiple /> <br>
      <input type="submit" name="reg" class="btn btn-primary" value="Register" />
  </div>
</form>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
  </body>
</html>
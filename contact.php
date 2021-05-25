<!doctype html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<?php include_once("database/phpmyadmin/header.php"); ?>
<html lang="en">
  <head>
  	<title>Contact - GlowEdu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
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
      <img src="images/logo.jpeg" width ="50px">
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

  <div class="box">

    <div class="text">
    <h1>Contact <span class="red">Us</span></h1>
    <hr class="redline">
    <p>Have Questions ? We have answers ( may be )</p>
    </div>
  </div>

  <div class="touch">
    <h2>Get in touch</h2>
    <hr class="redline">
  </div>
  
  <form action="" method="POST" name="contact-form">
  <div class="container form-margin">
    <div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>     <div class="col-lg-4 col-md-4 col-sm-4">
      <div class="form-group">
    <input type="text" class="form-control" placeholder="First Name" ng-model="firstname" name="firstname" required>    
      </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Company Name" ng-model="company" name="company" required>    
      </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Phone" ng-model="phone" name="firstname" required>    
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
      <div class="form-group">
    <input type="text" class="form-control" placeholder="Last Name" ng-model="lastname" name="lastname" required>    
      </div>
      <div class="form-group">
    <input type="email" class="form-control" placeholder="E-mail" ng-model="email" name="email" required>    
      </div>
      <div class="form-group">
    <input type="text" class="form-control" placeholder="Course" ng-model="course" name="course" required>    
      </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
    </div>
  </div>
  
  <div class="container">
    <div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
    <div class="col-lg-8 col-md-8 col-sm-8">
      <div class="form-group">
    <textarea class="form-control" rows="6" placeholder="Message" ng-model="message" name="message" required></textarea>
  </div>  
      <div class="pager">
      <button type="submit" class="btn btn-success">SEND MESSAGE</button>
      </div>
      </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
  
  </div>
  </form>
  <!--address-->

  <div class="container address">
    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    <div class="col-lg-4 col-md-4 col-sm-4">
      <h3>Our Address</h3>
      <div class="redline-address"></div>
      <p> Shree complex Hostel Road opposite AES sports complex University boys, </p>
      <p>Navrangpura,</p>
      <p> Ahmedabad,</p>
      <p> Gujarat 380009</p>
      <div class="phone-e">
      <p><span class="glyphicon glyphicon-envelope"> </span>  info@glowedu.co.in</p>
      <p><span class="glyphicon glyphicon-phone"></span> +91 98250 85454</p>
      </div>
    </div>
    <div class="d-flex flex-row justify-content p-1">
      <!--map-->
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3889.019213593812!2d77.62060731482127!3d12.906485990898592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae14eed2a26dbb%3A0x98f64960052a26b0!2sTrainingMug!5e0!3m2!1sen!2sin!4v1504259922701" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

    </div>
  <style>
  body{
  margin:0;
}
.box{
  background: url("https://image.ibb.co/nJHGgk/about_us1.jpg");
  color: white;
  text-align:center;
  z-index:1;
}
.text{
    padding: 100px 0;
}
.box p{
  font-size:18px;
}
.red{
  color:orangered;
}
.redline{
  width:100px;
  height:3px;
  background-color:red;
  border:none;
}
.touch h2{
  padding-top: 20px;
  text-align: center;
}
.form-margin{
  margin-top: 40px;
}
.left{
  text-align:left;
}
h3{
  font-variant:bold;
}
.redline-address{
  border:none;
  height:3px;
  background-color:orangered;
  width:140px;
  margin-bottom:20px;
}
.address{
  padding-top: 50px;
}
.address p{
  font-weight:bold;
  color: #676565;
  margin:3px;
}
.phone-e{
  padding:15px 0;
}
.logo img{
  height:100px;
  width:100px;
  z-index:2;
  float:left;
  margin-top:10px;
}
.bottom-gap{
  margin-bottom:100px;
}
/*validation css*/
input.ng-valid {
  background-color:#dff0d8;
}
input.ng-invalid {
    background-color:#f2dede;
}
input.ng-pristine{
  background-color:white;
}
textarea.ng-invalid {
    background-color:#f2dede;
}
textarea.ng-pristine{
  background-color:white;
}
textarea.ng-valid {
  background-color:#dff0d8;
}

  </style>
</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
  </body>
</html>
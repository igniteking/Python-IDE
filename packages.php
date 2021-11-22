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
        $id = $rows['id'];
        $ut = $rows['user_type'];
        $user = $rows['username'];
        }
    ?>
  	<title>Users - GlowEdu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
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
      <img src="images/logo.png" width ="40px">
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
<style>
.collapsible_python {
  background-color: #fff;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  color: #000;
}
.collapsible_c_plus {
  background-color: #fff;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  color: #000;
}
.collapsible_javascript {
  background-color: #fff;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  color: #000;
}
.collapsible_c {
  background-color: #fff;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  color: #000;
}

.collapsible_python:hover {
  background-color: #800000;
  color: white;
}
.collapsible_javascript:hover {
  background-color: #800000;
  color: white;
}
.collapsible_c:hover {
  background-color: #800000;
  color: white;
}
.active1 {
  background-color: #800000;
  color: white;
}

.content5 {
  padding: 20px;
  display: none;
  overflow: hidden;
  background-color: white;
}
</style>
<div class="row mt-12">
      <h2 class="col-md-4" id="subhead">Package Data!</h2>
</div>
        <div class="row mt-12">
        <div id="beauty-boxes">
        <div style="padding: 20px;">
          <center><img src="images/python.jpg" style="padding: 5px;" height="110px"><br><br>
          <h5>Python</h5><br></center>
          <h6>High-level programming language</h6>
          Python is an interpreted high-level general-purpose programming language. Python's design philosophy emphasizes code readability with its notable use of significant indentation.<br><br>
<br><button type="button" style="margin-top: 20px" class="collapsible_python">Package For 1 Month! (Click here to select)</button>
<div class="content5">
  <p>Python Fundamentals, Python Advanced, Data Analytics with Python, Data Visualzation with Python, Applied Statistics with Python, Weekly Challenges, Practice Projects, Interview Questions.</p>
  <center><form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_HwTXA4Q0pQleAd" async> </script> </form></center>
</div>
<button type="button" class="collapsible_python">Package For 3 Month! (Click here to select)</button>
<div class="content5">
  <p>Python Fundamentals, Python Advanced, Data Analytics with Python, Data Visualzation with Python, Applied Statistics with Python, Weekly Challenges, Practice Projects, Interview Questions.</p>
  <center><form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_IODq7uGCNiWuMz" async> </script> </form></center>
</div>
<button type="button" class="collapsible_python">Package For 6 Month! (Click here to select)</button>
<div class="content5">
  <p>Python Fundamentals, Python Advanced, Data Analytics with Python, Data Visualzation with Python, Applied Statistics with Python, Weekly Challenges, Practice Projects, Interview Questions.</p>
  <center><form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_HwXjTHF7x0KsvX" async> </script> </form></center>
</div>
<button type="button" class="collapsible_python">Package For 12 Month! (Click here to select)</button>
<div class="content5">
  <p>Python Fundamentals, Python Advanced, Data Analytics with Python, Data Visualzation with Python, Applied Statistics with Python, Weekly Challenges, Practice Projects, Interview Questions.</p>
  <center><form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_HwXlZhc5Jkj2K4" async> </script> </form></center>
</div>

<script>
var coll = document.getElementsByClassName("collapsible_python");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active1");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>

        </div>
        </div>
        <div id="beauty-boxes">
        <div style="padding: 20px;">
          <center><img src="images/js.png" style="padding: 5px;" height="100px"><br><br>
          <h5>Javascript</h5><br></center>
          <h6>Programming language</h6>
          JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing, prototype-based object-orientation, and first-class functions.<br><br>
          <button type="button" class="collapsible_javascript">Package For 1 Month! (Click here to select)</button>
<div class="content5">
  <p>JavaScript Fundamentals, JavaScript Advanced, Weekly Challenges, Practice Projects, Interview Questions.</p>
  <center><form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_HwXS1UOrF6JDaF" async> </script> </form></center>
</div>
<button type="button" class="collapsible_javascript">Package For 3 Month! (Click here to select)</button>
<div class="content5">
  <p>JavaScript Fundamentals, JavaScript Advanced, Weekly Challenges, Practice Projects, Interview Questions.</p>
  <center><form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_IODmtElmHs5fUL" async> </script> </form></center>
</div>
<button type="button" class="collapsible_javascript">Package For 6 Month! (Click here to select)</button>
<div class="content5">
  <p>JavaScript Fundamentals, JavaScript Advanced, Weekly Challenges, Practice Projects, Interview Questions.</p>
  <center><form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_HwXnZGtNFlwPyE" async> </script> </form></center>
</div>
<button type="button" class="collapsible_javascript">Package For 12 Month! (Click here to select)</button>
<div class="content5">
  <p>JavaScript Fundamentals, JavaScript Advanced, Weekly Challenges, Practice Projects, Interview Questions.</p>
  <center><form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_HwXoS8Fl7uvP9Q" async> </script> </form></center>
</div>
<script>
var coll = document.getElementsByClassName("collapsible_javascript");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active1");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
        </div>
        </div>
        </div>
        <div class="row mt-12" style="margin-top: 60px;">
        <div id="beauty-boxes2">
        <div style="padding: 20px;">
          <center><img src="images/c.png" style="padding: 5px;" height="100px"><img src="images/c++.svg" style="padding: 5px;" height="100px"><br><br>
          <h5>C & C++</h5><br></center>
        <h6>Programming language C</h6>
        C is a general-purpose, multi-paradigm programming language encompassing static typing, strong typing, lexically scoped, imperative, declarative, functional, generic, object-oriented, and component-oriented programming disciplines.<br><br>
        <h6>Programming language C</h6>
        C++ is a general-purpose programming language created by Bjarne Stroustrup as an extension of the C programming language, or "C with Classes".<br><br>        <button type="button" style="margin-top: 20px" class="collapsible_c">Package For 1 Month! (Click here to select)</button>
<div class="content5">
  <p>C and C++ Ultimate Course, Weekly Challenges, Practice Projects, Interview Questions.</p>
  <center><form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_HwXMOGKQZtmOUV" async> </script> </form></center>
</div>
<button type="button" class="collapsible_c">Package For 3 Month! (Click here to select)</button>
<div class="content5">
  <p>C and C++ Ultimate Course, Weekly Challenges, Practice Projects, Interview Questions.</p>
  <center><form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_IODkdaksVhCxUT" async> </script> </form></center>
</div>
<button type="button" class="collapsible_c">Package For 6 Month! (Click here to select)</button>
<div class="content5">
  <p>C and C++ Ultimate Course, Weekly Challenges, Practice Projects, Interview Questions.</p>
  <center><form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_IODkdaksVhCxUT" async> </script> </form></center>
</div>
<button type="button" class="collapsible_c">Package For 12 Month! (Click here to select)</button>
<div class="content5">
  <p>C and C++ Ultimate Course, Weekly Challenges, Practice Projects, Interview Questions.</p>
  <center><form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_HwXrN57miU7CEW" async> </script> </form></center>
</div>
<script>
var coll = document.getElementsByClassName("collapsible_c");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active1");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>    
    </div>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
  </body>
</html>
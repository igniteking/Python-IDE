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
  	<title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
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
<?php
        if ($ut == 'admin') {
            ?>
<h2 class="mb-4">Hi! <?php echo $user;?></h2>
<?php
    $query = "SELECT count(user_type) AS 'count' FROM users GROUP BY user_type HAVING user_type='student'";
    $result = mysqli_query($conn, $query);
    if ($result)
    {
        $student = mysqli_num_rows($result);?>
<?php
    $query = "SELECT count(user_type) AS 'count' FROM users GROUP BY user_type HAVING user_type='admin'";
    $result = mysqli_query($conn, $query);
    if ($result)
    {
        $admin = mysqli_num_rows($result);?>
<?php
    $query = "SELECT count(course_category) AS 'count' FROM courses GROUP BY course_category HAVING course_category='python'";
    $result = mysqli_query($conn, $query);
    if ($result)
    {
        $coueses = mysqli_num_rows($result);?>

<div class='row mt-3'>
    <div id='card' class='col-md-4' style="margin-top: 15px;">
    <div id='flip-card'>
      <div id='flip-card-front1'>Number of Students</div>
      <div id='flip-card-back'>Total Students: <?php echo $student;?> <br> Verified Students: <?php echo $student;?> <br> Unverified Students: <?php echo $student; }?></div>
    </div>
  </div>
  <div id='card' class='col-md-4' style="margin-top: 15px;">
    <div id='flip-card'>
      <div id='flip-card-front2'>Number of Admins</div>
      <div id='flip-card-back'>Admins: <?php echo $admin; }?></div>
    </div>
  </div>
  <div id='card' class='col-md-4' style="margin-top: 15px;">
    <div id='flip-card'>
      <div id='flip-card-front3'>Number of Courses</div>
      <div id='flip-card-back'>Python Courses: <?php echo $coueses;}?></div>
    </div>
  </div>
</div>
      <!-- // code here // -->
      <div id='card' class='md-4'>
      <div class="mt-5"><a href="download.php"><input class="btn btn-success profile-button" type="submit" name="upload_cover" value="Download" /></a></div>
 </div>
 
    <?php
        } else {
?> 
<div class="carousel" data-flickity='{ "autoPlay": true, "wrapAround": true }'>
<div class="carousel-cell">
  <div style="padding: 20px;">
  <img src="images/python.png" height="100px">
  <h5>Python</h5><br>
  <h6>High-level programming language</h6>
  Python is an interpreted high-level general-purpose programming language. Python's design philosophy emphasizes code readability with its notable use of significant indentation.
</div>
</div>
<div class="carousel-cell">
  <div style="padding: 20px;">
  <img src="images/js.png" height="100px">
  <h5>Javascript</h5><br>
  <h6>Programming language</h6>
  JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing, prototype-based object-orientation, and first-class functions.</div>
</div>
<div class="carousel-cell">
  <div style="padding: 20px;">
  <img src="images/c.png" height="100px">
  <h5>C#</h5><br>
  <h6>Programming language</h6>
  C# is a general-purpose, multi-paradigm programming language encompassing static typing, strong typing, lexically scoped, imperative, declarative, functional, generic, object-oriented, and component-oriented programming disciplines.</div>
</div>
<div class="carousel-cell">
  <div style="padding: 20px;">
  <img src="images/c++.svg" height="100px">
  <h5>C++</h5>
  <h6>Programming language</h6>
  C++ is a general-purpose programming language created by Bjarne Stroustrup as an extension of the C programming language, or "C with Classes".</div>
</div>
</div>
<?php
        $query = "SELECT * from users WHERE email = '".$_SESSION['email'] ."'";
        $result = mysqli_query($conn, $query);

        while($rows = mysqli_fetch_assoc($result))
        {
        $user = $rows['username'];
        $email = $rows['email'];
        $mobile = $rows['mobile'];
        $active = $rows['active'];
        $bio = $rows['bio'];
        $state = $rows['state'];
        $postalcode = $rows['postalcode'];
        $education = $rows['education'];
        $country = $rows['country'];
        $additional = $rows['additional'];
        $user_type = $rows['user_type'];
        }
    ?><br><br>
<h2 class='mb-4'>Hi! <?php echo $user; ?></h2>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container emp-profile" >
            <form method="post" style="padding: 20px;">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                        <?php 
              $check_pic = mysqli_query($conn, "SELECT profile_pic from users WHERE email = '$email'");
              $get_pic_row = mysqli_fetch_assoc($check_pic);
              $profile_pic_db = $get_pic_row['profile_pic'];
                if ($profile_pic_db == "") {
                $profile_pic2 = "";
                echo "<img class='img-radius' alt='User-Profile-Image' src='images/user.png'>";
                }
                    else{
                    $profile_pic2 = "userdata/".$profile_pic_db;     
                    echo "<img src='$profile_pic2' class='img-radius' alt='User-Profile-Image'>";
                }
              ?>
                            
                            <a href="profile.php"><div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="button" name="file"/>
                            </div></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                    <?php echo $user; ?>
                                    </h5>
                                    <h6>
                                    <?php echo $user_type; ?> || <?php echo $active; ?>
                                    </h6><?php
        $sql = "SELECT * FROM courses";
        $query = mysqli_query($conn, $sql);
        $count_total_course = mysqli_num_rows($query);

        $sql2 = "SELECT * FROM match_id WHERE student_id='$user_id'";
        $query2 = mysqli_query($conn, $sql2);
        $count_total_course_done = mysqli_num_rows($query2);

        //Algorithm Part
        $count = $count_total_course_done / $count_total_course * 100;
        $count_final = bcdiv($count, 1, 0);
        ?>
        <h5>Completed Modules <i class="fa fa-check" aria-hidden="true" style="color: #67ce8b;"></i></h5>
        <div style='margin-top: 20px; margin-bottom: 20px; width: 100%; border-radius: 8px; border: 1px solid #eee;'>
            <div id="progress">
                COMPLETED <?php echo $count_final ?>%
            </div>
        </div>
        <style type="text/css">
            #progress {
                padding: 10px;
                color: #fff;
                font-size: 12px;
                border-radius: 8px;
                background: #80ddb8;
                transition: all 5s ease;
                animation: imganim 2s linear both;
                
            }

            @keyframes imganim {
                from {
                    width: 0px;
                    padding: 10px;
                }

                to {
                    width: <?php echo $count_final; ?>%;
                }
            }
        </style>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Extras</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="profile.php"><input type="button" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>Web Links</p>
                            <a href="about.php">About Us</a><br/>
                            <a href="contact.php">Contact Us</a><br/>
                            <a href="tandc.php">Terms and Conditions</a>
                            <p>Languages</p>
                            <a href="python_module.php">Python</a><br/>
                            <a href="commingsoon.php">JavaScript</a><br/>
                            <a href="commingsoon.php">C#</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $user; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $user; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $email; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $mobile; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Bio</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $bio; ?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Country</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $country; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>State</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $state; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Additional Info</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $additional; ?></p>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
  <style>
    body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
    .realtives {
        position: relative;
    }

    .carousel {
        background: transparent;
        text-align: center;
    }

    .carousel-cell {
        width: 26%;
        border: 1px solid #ccc;
        height: 400px;
        background: #fff;
        margin-right: 40px;
        border-radius: 5px;
        -webkit-box-shadow: 3px 9px 9px -1px rgba(0, 0, 0, 0.09);
        -moz-box-shadow: 3px 9px 9px -1px rgba(0, 0, 0, 0.09);
        box-shadow: 3px 9px 9px -1px rgba(0, 0, 0, 0.09);
    }

    @media screen and (max-width: 800px) {
        .carousel-cell {
            width: 50%;
        }
    }

    /* cell number */
    .carousel-cell:before {
        display: block;
        text-align: center;
        line-height: 200px;
        font-size: 80px;
        color: white;
    }

  body {
  background: #e2e1e0;
}
.card {
  background: #fff;
  border-radius: 2px;
  display: inline-block;
  height: 300px;
  margin: 1rem;
  position: relative;
  width: 300px;
}

#python {
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
}

#python:hover {
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}
  .card.user-card {
      border-top: none;
      -webkit-box-shadow: 0 0 1px 2px rgba(0,0,0,0.05), 0 -2px 1px -2px rgba(0,0,0,0.04), 0 0 0 -1px rgba(0,0,0,0.05);
      box-shadow: 0 0 1px 2px rgba(0,0,0,0.05), 0 -2px 1px -2px rgba(0,0,0,0.04), 0 0 0 -1px rgba(0,0,0,0.05);
      -webkit-transition: all 150ms linear;
      transition: all 150ms linear;
  }
</style>
        
      </div>
		</div>
    <?php 
        }
    ?>
<style>
  #back {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  backface-visibility: hidden;
  font-family: Verdana;
  font-size: 1em;
  box-shadow: 0 0 5px rgb(230,230,230);
  background-color: rgb(230,230,230);
  color: #222;
  }
#boss {
  padding: 10px;
  border-radius: 25px;
  height: 300px;
  overflow-y: scroll;
  box-shadow: 0px 25px 10px -15px 
}
#boss::-webkit-scrollbar {
  display: none;
  }
  #boss {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
</style>
<style>
  body::-webkit-scrollbar {
  display: none;
  }
  body {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
#flip-card-back::-webkit-scrollbar {
  display: none;
  }
  #flip-card-back {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
#card {
  width: 100%;;
}

#card , #flip-card {
  width: 100%;
  height: 200px;
}

#flip-card {
  transition: transform .5s ease-in-out;
  transform-origin: 50% 50%;
  transform-style: preserve-3d;
}

#flip-card:Hover {
  transform: rotateY(180deg);
}

#flip-card-front {
  position: absolute;
  top: 0;
  left: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}
#flip-card-back {
  position: absolute;
  top: 0;
  left: 0;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}
#flip-card-front, #flip-card-back {
  border-radius: 10px;
  backface-visibility: hidden;
  font-family: Verdana;
  font-size: 1em;
}

#flip-card-back {
  box-shadow: 0 0 5px rgb(230,230,230);
  background-color: rgb(230,230,230);
  transform: rotateY(180deg);
  color: #222;
}

#flip-card-front {
  box-shadow: 0 0 5px rgb(22,22,22);
  background-color: #e6e6ea;
  color: #111;
}

  </style>



    <style>
      body::-webkit-scrollbar {
  display: none;
  }
  body {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
#card {
  max-width: 100%;
  perspective: 1000px;
}

#card , #flip-card {
  width: 100%;
  height: 200px;
}

#flip-card {
  transition: transform .5s ease-in-out;
  transform-origin: 50% 50%;
  transform-style: preserve-3d;
}

#flip-card:Hover {
  transform: rotateY(180deg);
}

#flip-card-front1, #flip-card-front2, #flip-card-front3, #flip-card-back {
  position: absolute;
  top: 0;
  left: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}

#flip-card-front1, #flip-card-front2, #flip-card-front3, #flip-card-back {
  border-radius: 10px;
  backface-visibility: hidden;
  font-family: Verdana;
  font-size: 1em;
}

#flip-card-back {
  box-shadow: 0 0 5px rgb(230,230,230);
  background-color: rgb(230,230,230);
  transform: rotateY(180deg);
  color: #222;
}

#flip-card-front1 {
  box-shadow: 0 0 5px rgb(22,22,22);
  background-color: #4285F4;;
  color: #fff;
  font-size: 24px;
}
#flip-card-front2 {
  box-shadow: 0 0 5px rgb(22,22,22);
  background-color: #DB4437;
  color: #fff;
  font-size: 24px;
}
#flip-card-front3 {
  box-shadow: 0 0 5px rgb(22,22,22);
  background-color: #F4B400;
  color: #fff;
  font-size: 24px;
}

    </style>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
  </body>
</html>
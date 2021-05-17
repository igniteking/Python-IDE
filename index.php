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

<h2 class='mb-4'>Modules You Have Completed</h2>
<div class='row mt-3' id='boss'>
<?php
        $query = "SELECT * from courses";
        $result = mysqli_query($conn, $query);

        while($rows = mysqli_fetch_assoc($result))
        {
        $id = $rows['id'];
        $course_topic = $rows['course_topic'];
        $course_category = $rows['course_category'];
        $course_data = $rows['course_data'];
        $youtube_link = $rows['youtube_link'];
        $hints = $rows['hints'];
        $answer = $rows['answer'];
        ?>
        <?php  if ($ut == 'student') { 
          echo "
        <a href='python.php?id=$id'><div id='card' class='col-md-4' style='margin-top: 15px;'>
        <div id='flip-card'>
          <div id='flip-card-front' class='cardfrount'>$course_topic<br>$course_category</div>
          <div id='flip-card-back' style='overflow-y: scroll; padding: 20px;'>$course_data</div>
        </div></a>
      </div>"; }
      else {
        echo "
        <a href='module.php?id=$id'><div id='card' class='col-md-4' style='margin-top: 15px;'>
        <div id='flip-card'>
          <div id='flip-card-front' class='cardfrount'>$course_topic<br>$course_category</div>
          <div id='flip-card-back' style='overflow-y: scroll; padding: 20px;'>$course_data</div>
        </div></a>
      </div>"; 
      }?>

    <?php } ?>
    </div>
    <br><br>
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
    ?>
<h2 class='mb-4'>Hi! <?php echo $user; ?></h2>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="row">
<div class="col-12 col-md-16">
  <div class="row">
  <div class="col-md-4">
      <div class="card user-card">
          <div class="card-header">
              <h6>Profile</h6>
          </div>
          <div class="card-block">
              <div class="user-image">
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
              </div>
              <h6 class="f-w-600 m-t-25 m-b-10"><?php echo $user ?></h6>
              <p class="text-muted"><?php echo $active ?>Active | <?php echo $user_type ?> | <?php echo $country ?></p>
              <hr>
              <p class="text-muted m-t-15">Module Completion Level: 87%</p>
              <ul class="list-unstyled activity-leval">
                  <li class="active"></li>
                  <li class="active"></li>
                  <li class="active"></li>
                  <li></li>
                  <li></li>
              </ul>
              <p class="m-t-15 text-muted"><?php echo $bio ?></p>
              <hr>
              <div class="row justify-content-center user-social-link">
                <a href="profile.php"><button type="button" class="btn btn-outline-primary">Visit Profile</button></a>
              </div>
          </div>
      </div>
  </div>
  <div class="col-12 col-md-8">
<div id="lala" style="background-color : #eee; border: 1px solid black; padding : 30px; border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;border-top: none;
    -webkit-box-shadow: 0 0 1px 2px rgba(0,0,0,0.05), 0 -2px 1px -2px rgba(0,0,0,0.04), 0 0 0 -1px rgba(0,0,0,0.05);
    box-shadow: 0 0 1px 2px rgba(0,0,0,0.05), 0 -2px 1px -2px rgba(0,0,0,0.04), 0 0 0 -1px rgba(0,0,0,0.05);
    -webkit-transition: all 150ms linear;
    transition: all 150ms linear;background-color: transparent;">
<form>
<h6>Report Us If somethig is wrong</h6><br>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Username">
    </div>
  </div><br>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">E-mail</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputPassword3" placeholder="E-mail">
    </div>
  </div><br>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Query</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="inputPassword3" style="height: 100px;"></textarea>
    </div>
    <br>
  </div><br>
  <div class="form-group row">
    <div class="col-sm-10">
    <label class="form-label" for="customFile">Upload a Screen shot for our reference</label>
    <input class="form-control" type="file" id="formFileMultiple" multiple /> <br>
      <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
  </div></div>
</div>
<style>
  .card.user-card {
      border-top: none;
      -webkit-box-shadow: 0 0 1px 2px rgba(0,0,0,0.05), 0 -2px 1px -2px rgba(0,0,0,0.04), 0 0 0 -1px rgba(0,0,0,0.05);
      box-shadow: 0 0 1px 2px rgba(0,0,0,0.05), 0 -2px 1px -2px rgba(0,0,0,0.04), 0 0 0 -1px rgba(0,0,0,0.05);
      -webkit-transition: all 150ms linear;
      transition: all 150ms linear;
  }

  .card {
      border-radius: 5px;
      -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
      box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
      border: none;
      margin-bottom: 30px;
      -webkit-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out;
  }

  .card .card-header {
      background-color: transparent;
      border-bottom: none;
      padding: 25px;
  }

  .card .card-header h5 {
      margin-bottom: 0;
      color: #222;
      font-size: 14px;
      font-weight: 600;
      display: inline-block;
      margin-right: 10px;
      line-height: 1.4;
  }

  .card .card-header+.card-block, .card .card-header+.card-block-big {
      padding-top: 0;
  }

  .user-card .card-block {
      text-align: center;
  }

  .card .card-block {
      padding: 25px;
  }

  .user-card .card-block .user-image {
      position: relative;
      margin: 0 auto;
      display: inline-block;
      padding: 5px;
      width: 110px;
      height: 110px;
  }

  .user-card .card-block .user-image img {
      z-index: 20;
      position: absolute;
      top: 5px;
      left: 5px;
          width: 100px;
      height: 100px;
  }

  .img-radius {
      border-radius: 50%;
  }

  .f-w-600 {
      font-weight: 600;
  }

  .m-b-10 {
      margin-bottom: 10px;
  }

  .m-t-25 {
      margin-top: 25px;
  }

  .m-t-15 {
      margin-top: 15px;
  }

  .card .card-block p {
      line-height: 1.4;
  }

  .text-muted {
      color: #919aa3!important;
  }

  .user-card .card-block .activity-leval li.active {
      background-color: #2ed8b6;
  }

  .user-card .card-block .activity-leval li {
      display: inline-block;
      width: 15%;
      height: 4px;
      margin: 0 3px;
      background-color: #ccc;
  }

  .user-card .card-block .counter-block {
      color: #fff;
  }

  .bg-c-blue {
      background: linear-gradient(45deg,#4099ff,#73b4ff);
  }

  .bg-c-green {
      background: linear-gradient(45deg,#2ed8b6,#59e0c5);
  }

  .bg-c-yellow {
      background: linear-gradient(45deg,#FFB64D,#ffcb80);
  }

  .bg-c-pink {
      background: linear-gradient(45deg,#FF5370,#ff869a);
  }

  .m-t-10 {
      margin-top: 10px;
  }

  .p-20 {
    padding: 20px;
}

.user-card .card-block .user-social-link i {
    font-size: 30px;
}

.text-facebook {
    color: #3B5997;
}

.text-twitter {
    color: #42C0FB;
}

.text-dribbble {
    color: #EC4A89;
}

.user-card .card-block .user-image:before {
    bottom: 0;
    border-bottom-left-radius: 50px;
    border-bottom-right-radius: 50px;
}

.user-card .card-block .user-image:after, .user-card .card-block .user-image:before {
    content: "";
    width: 100%;
    height: 48%;
    border: 2px solid #4099ff;
    position: absolute;
    left: 0;
    z-index: 10;
}

.user-card .card-block .user-image:after {
    top: 0;
    border-top-left-radius: 50px;
    border-top-right-radius: 50px;
}

.user-card .card-block .user-image:after, .user-card .card-block .user-image:before {
    content: "";
    width: 100%;
    height: 48%;
    border: 2px solid #4099ff;
    position: absolute;
    left: 0;
    z-index: 10;
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
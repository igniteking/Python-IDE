<?php include_once("../database/phpmyadmin/connection.php"); ?>
<?php include_once("../database/phpmyadmin/header2.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../style/css/css/style.css">
    <title>C++ Modules - GlowEdu</title>
    <?php
    if (isset($_SESSION['email'])) {
    } else {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
        exit();
    }
        $category_id = $_GET['id'];
    ?>
    <?php
    if (isset($_SESSION['email'])) {
        
        $query = "SELECT * from users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        while($rows = mysqli_fetch_assoc($result))
        {
        $ut = $rows['user_type'];
        $active = $rows['active'];
        }
      } else {
        
      }
    ?>
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
      <img src="../images/main.png" width ="40px">
      </li>
        <li class="nav-item active">
            <a class="nav-link" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../about.php">About Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../contact.php">Contact</a>
        </li>
        <li class="nav-item">
        <div class="input-group">
  <div class="form-outline">
    <form action="../search.php" method="GET">
    <input type="search" id="form1" name="find" class="form-control" placeholder="Search" /></div>
  <button type="submit" style="height: 40px;" class="btn btn-primary">Search
    <i class="fa fa-search"></i>
  </button></form>
</div>
        </li>
      </ul>
      </ul>
    </div>
  </div>
</nav>
<?php
        $query = "SELECT * from users WHERE email = '".$_SESSION['email'] ."'";
        $result = mysqli_query($conn, $query);

        while($rows = mysqli_fetch_assoc($result))
        {
          if($active == 1) {
            $dialog = "";
        } else {
            $active = "Verify Your Email!";
            echo "<p style='padding: 10px; font-size: 14px; color: #fff; border-radius: 8px; text-align: center; background: #ff7474;'>Go To <a href='../index.php' style='color: #eee'><u>HOME</u></a> and Verify your E-mail to access the modules!</p>";
        }
      }
      ?>
      <?php
        $cat_name = "SELECT * from category WHERE id = $category_id";
        $result = mysqli_query($conn, $cat_name);

        while($rows = mysqli_fetch_assoc($result))
        {
        $finalid = $rows['id'];
        $cat_name = $rows['cat_name'];
        $cat_type = $rows['cat_type'];
        ?>
              <?php
       $payment_selectioni_query_c = "SELECT * FROM `payment` WHERE email = '$email' AND course_category = 'c'";
       $payment_selectioni_result_c = mysqli_query($conn, $payment_selectioni_query_c);
       $row_count = mysqli_num_rows($payment_selectioni_result_c);
       if($row_count > 0) { 
            $dialog = "";
        } else {
            $course_category = "Buy The Course!";
            echo "<p style='padding: 10px; font-size: 14px; color: #fff; border-radius: 8px; text-align: center; background: #ff7474;'>Go To <a href='../index.php' style='color: #eee'><u>HOME</u></a> and Buy The Course to access the modules!</p>";
        }
      ?>
<h2 class='mb-4'><?php echo $cat_name;}?></h2>
<div class='row mt-12'>
<?php
        $query2 = "SELECT * from courses WHERE cat_id = $category_id";
        $result2 = mysqli_query($conn, $query2);
        while($rows = mysqli_fetch_assoc($result2))
        {
        $id = $rows['id'];
        $course_topic = $rows['course_topic'];
        $course_category = $rows['course_category'];
        $course_data = $rows['course_data'];
        $course_color = $rows['course_color'];
        $hints = $rows['hints'];
        $answer = $rows['answer'];
        $cat_id = $rows['cat_id'];
        ?>

        <?php  if ($ut == 'student') {
          if($row_count > 0) { 
          if($active == 1) {
              echo "<div id='card' class='col-md-4' style='margin-top: 15px; '>
              <a href='c++_ide.php?id=$id'><div class='card-$id card-1' style='color: $course_color; overflow-y: scroll; padding: 20px;'><b>$course_topic</b> <br>$course_data</div></a>
              </div>
              <style>
              .card-$id::-webkit-scrollbar {
                width: 10px;
            }
            
            .card-$id::-webkit-scrollbar-track {
                background-color: $course_color;
            }
            
            .card-$id::-webkit-scrollbar-thumb {
                box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            }
              </style>";
        }} else {
          echo "<div id='card' class='col-md-4' style='margin-top: 15px;'>
          <div class='card-1' style='overflow-y: scroll; padding: 20px;'><b>$course_topic</b> <br>$course_data</div>
        </div>";;}}
        ?>
        <?php
        if ($ut == 'superadmin') {
        echo "<div id='card' class='col-md-4' style='margin-top: 15px;'>
        <a href='../module.php?id=$id'><div class='card-1' style='overflow-y: scroll; padding: 20px;'><b>$course_topic</b> <br>$course_data</div></a>
        </div>"; 
      } else {}
     
        if ($ut == 'admin') {
        echo "
        <a href='../module.php?id=$id'><div id='card' class='col-md-4' style='margin-top: 15px;'>
        <div class='card-1' style='overflow-y: scroll; padding: 20px;'><b>$course_topic</b> <br>$course_data</div></a>
      </div>"; 
      } else {}?>
<style>
  body {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
  background-color: #e2e1e0;
  
}
  .card-1 {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
.card-1 {
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  background-color: white;
  width: 100%;
  height: 200px;
  border-radius: 4px;
  color: black;
}

.card-1:hover {
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
  background-color: white;
}
    </style><?php }?>
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
</body>
</html>
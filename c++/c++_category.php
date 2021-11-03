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
    <title>c++ Modules Index - GlowEdu</title>
    <?php
    if (isset($_SESSION['email'])) {
    } else {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
        exit();
    }
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
      <img src="../images/logo.png" width ="40px">
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
      </ul>
      </ul>
    </div>
  </div>
</nav><div class='row mt-12'>
<h2 class='col-6'>C++ Modules Index</h2>
<?php
         $payment_selectioni_query_python = "SELECT * FROM `payment` WHERE name = '$user' AND course_category = 'c_plus'";
         $payment_selectioni_result_python = mysqli_query($conn, $payment_selectioni_query_python);
         $row_count = mysqli_num_rows($payment_selectioni_result_python);
         if($row_count > 0) {
          $normal_row_count = "SELECT * FROM `request` WHERE name = '$user' AND course_name = 'c_plus'";
          $normal_query = mysqli_query($conn, $normal_row_count);
          $normale_row_count = mysqli_num_rows($normal_query);
          if ($normale_row_count == '0') {
            echo "<form action='c++_category.php' class='col-6' method='post'>
            <input type='submit' onclick='showAlert()' name='delete_subscription_button_1' value='Delete Subscription' class='btn btn-danger' style='float: right;'>
            </form>";
          } else {
            echo "<div class='col-6><input type='submit' onclick='showAlert()' name='delete_subscription_button_1' value='Delete Subscription' class='btn btn-danger' style='display: none;float: right;'></div>'";
          }?></div>
          <?php 
      $delete_subscription_btn = @$_POST["delete_subscription_button_1"];
      if($delete_subscription_btn){
      $query_delete_subscription = "INSERT INTO `request`(`id`, `name`, `email`, `course_name`) VALUES (NULL ,'$user','$email','c_plus')";
      $delete_query_delete_subscription = mysqli_query($conn, $query_delete_subscription);
      if ($query_delete_subscription) {
      echo "<p style='padding: 10px; font-size: 14px; color: #fff; border-radius: 8px; text-align: center; background: green;'>The request has been sent to the ADMIN! 'WILL REFLECT BACK SOON!'</p>";
      echo "<meta http-equiv=\"refresh\" content=\"3; url=\">";
      }}
    }
      ?>
      <script>
      function showAlert() {
        alert("Hello! ARE YOU SURE YOU WANT TO GET YOUR SUBSCRIBTION DELETED!..");
      }
    </script>
<div class='row mt-12'>
<?php
        $query = "SELECT * from category WHERE cat_type = 'c++'";
        $result = mysqli_query($conn, $query);

        while($rows = mysqli_fetch_assoc($result))
        {
        $id = $rows['id'];
        $cat_name = $rows['cat_name'];
        $cat_type = $rows['cat_type'];
        ?>
        <?php  if ($ut == 'student') {
          if($active == 1) {
              echo "<div id='card' class='col-md-4' style='margin-top: 15px; '>
              <a href='c++_module.php?id=$id'><div class='card-1' style=' overflow-y: scroll; padding: 20px;'><b class='col-md-8' style='font-size: 20px;'>$cat_name</b></div></a>
              </div>";
        } else {
          echo "<div id='card' class='col-md-4' style='margin-top: 15px; '>
          <a href='c++_module.php?id=$id'><div class='card-1' style=' overflow-y: scroll; padding: 20px;'><b class='col-md-8' style='font-size: 20px;'>$cat_name</b></div></a>
          </div>";;}}
        ?>
        <?php
        if ($ut == 'superadmin') {
        echo "<div id='card' class='col-md-4' style='margin-top: 15px; '>
        <a href='c++_module.php?id=$id'><div class='card-1' style=' overflow-y: scroll; padding: 20px;'><b class='col-md-8' style='font-size: 20px; color: #000;'>$cat_name</b><a href='../category_edit.php?id=$id'><i class='fa fa-pencil' style='float: right; color: blue; font-size: 24px; border: 2px solid blue; border-radius: 8px; padding: 10px' aria-hidden='true'></i></a></div></a>
        </div>"; 
      } else {}
     
        if ($ut == 'admin') {
        echo "
        <div id='card' class='col-md-4' style='margin-top: 15px; '>
              <a href='c++_module.php?id=$id'><div class='card-1' style=' overflow-y: scroll; padding: 20px;'><b class='col-md-8' style='font-size: 20px;'>$cat_name</b></div></a>
              </div>"; 
      } else {}?>

    <?php } ?>
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
  height: 150px;
  border-radius: 4px;
  color: black;
}

.card-1:hover {
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
  background-color: white;
}
    </style>
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
</body>
</html>
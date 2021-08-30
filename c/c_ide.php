<style type='text/css'>
  #decide {
    display: none;
  }
</style>
<!doctype html>
<?php include_once("../database/phpmyadmin/connection.php"); ?>
<?php include_once("../database/phpmyadmin/header2.php"); ?>
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
  	<title>C IDE - GlowEdu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../style/css/css/style.css">
  </head>
  <body style="background-color: #fff;">
  <div id="content" class="p-4 p-md-5">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <script>
          $(document).ready(function() { // on document ready
            $("#sidebarCollapse").click(); // click the element
          })
        </script>
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
          <i class="fa fa-bars"></i>
          <span class="sr-only">Toggle Menu</span>
        </button>
        <button id="2button" class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
      </ul>
    </div>
  </div>
</nav>
<?php
    $course_int = "Welcome, $user<br> To c IDE... <br><br><br> All The Best!<br>";
    $id = $_GET['id'];
    $query = "SELECT * from courses Where id = '$id'";
    $result = mysqli_query($conn, $query);
    while ($rows = mysqli_fetch_assoc($result)) {
      $Course_id = $rows['id'];
      $course_topic = $rows['course_topic'];
      $course_category = $rows['course_category'];
      $course_data = $rows['course_data'];
      $course_color = $rows['course_color'];
      $hints = $rows['hints'];
      $answer = $rows['answer'];
    }
?>
<?php
    $next_id = "";
    $next_sql = "SELECT * FROM courses WHERE id > $Course_id ORDER BY id DESC";
    $next_query = mysqli_query($conn, $next_sql);
    while ($row = mysqli_fetch_assoc($next_query)) {
      $next_id = $row['id'];
    }
    if ($next_id == "") {
      $final_next_id = "category.php";
    } else {
      $final_next_id = "c_ide.php?id=" . $next_id;
    }
    ?>
        <?php
    $pre_id = "";
    $next_sql = "SELECT id from courses where id < $Course_id ORDER BY id DESC";
    $next_query = mysqli_query($conn, $next_sql);
    while ($row = mysqli_fetch_assoc($next_query)) {
      $pre_id = $row['id'];
    }
    if ($pre_id == "") {
      $final_pre_id = "c_category.php";
    } else {
      $final_pre_id = "c_ide.php?id=" . $pre_id;
    }
?>
<?php
    $id_check = "SELECT student_id, course_id FROM match_id WHERE course_id='$id' AND student_id='$user_id'";
    $result = mysqli_query($conn, $id_check);
    $result_check = mysqli_num_rows($result);
    if (!$result_check == 0) {
      echo "<p style='font-family: Roboto; font-weight: 600; color: #fff; padding: 10px; text-align: center; background: #67ce8b; border: 1px solid #67ce8b; border-radius: 4px;'>  You have already completed the module... </p>";
      $sql2 = "SELECT * FROM courses WHERE id='$id'";
      $query2 = mysqli_query($conn, $sql2);
      while ($row = mysqli_fetch_assoc($query2)) {
        $code = $row['answer'];
      }
    } else {
      $code = "print('Hello, $user')";
    }
    ?>
    <?php
    $reg = @$_POST['reg'];
    $date = date("Y-m-d");
    if ($reg) {
        mysqli_query($conn, "INSERT INTO `match_id`(`id`, `student_id`, `course_id`, `date`) VALUES (NULL, '$user_id', '$id', '$date')");
        echo "<meta http-equiv=\"refresh\" content=\"0; url=#\">";
    }?>
<div class="row mt-12">
    <div class="col-md-4"><a href='<?php echo $final_pre_id?>' style='text-decoration: underline; font-size:large;'> << Back </a></div>
    
      <?php 
      if($result_check == 0) {
        echo "<div class='col-md-4'>
        <form action='c_ide.php?id=$id' method='POST'>
        <center><Input type='submit' name='reg' style='background: none; border: none; text-decoration: underline; color:#67ce8b; font-size:large;'>Click here to finish the module! <i class='fa fa-check' aria-hidden='true'></i></center>
        </form></div>";
      } else {
        echo "<h2 class='col-md-4'></h2>";
      }
      ?>
    
  <div class="col-md-4"><a style="text-decoration: underline; float: right; color:#F8B739; font-size:large;" href='<?php echo $final_next_id?>'>Next >></a></div><br><br>
<div class="row mt-12">
  <h2 class="col-md-4" id="head"><?php echo $course_topic; ?></h2>
  <h2 class="col-md-4" id="subhead">Code Here!</h2>
  <div class="col-md-4"><a href="../coming.php"><button type="button" class="btn btn-outline-primary" style="float:left;"><i class="fa fa-user" aria-hidden="true"></i> Request Mentor</button></a><a href="#"><button type="button" class="btn btn-outline-success" style="float:left; margin-left: 5px;"><i class="fa fa-object-group" aria-hidden="true"></i> Ask in the group</button></a><a href="../report.php" target="_blank"><button type="button" onclick="showAlert()" class="btn btn-outline-danger" style="float:left; margin-left: 5px;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Report</button></a>
</div>
      <script>
        function showAlert() {
          alert("Hello! Please Take a Screen Shot For Our Reference!!..");
        }
      </script>
    </div>
    
      <script>
        function showAlert() {
          alert("Hello! Please Take a Screen Shot For Our Reference!!..");
        }
      </script>
    </div>
    <div class="row mt-3">
    <div class="col-md-4" id="collums" style="border-radius: 10px; height: 750px; color: #000; background: #EDF0F6; overflow-y: scroll;"><br>
        <div id="course_data"><?php echo $course_data; ?></div><br>
        <center><h5 id="course_topic" style="background: #fff; width: 80%; color: black; border-radius: 4px;">Hint</h5></center>
        <center><div id="hint" style="background: #fff; color: black; width: 80%; border-radius: 4px; height: auto; padding: 5px;"><b><?php echo $hints; ?></b></div></center><br>
        <center><span><z onclick="myFunction()"></span></center><br><br>

<script>
function myFunction() {
  var x = document.getElementById("answer");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
<div id="answer" style="display: none;"><?php echo $answer; ?></div><br>
      </div>
      <div class="col">
      <iframe class="iframe-prog-ide" src="https://www.programiz.com/cpp-programming/online-compiler/" style="  
  width: 100%;
  height: 750px;
  transform-origin: 2px;
  transform-origin: bottom; 
  transform: scale(1.0);"></iframe></div>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/popper.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/main.js"></script>
<style>


/* reveal answer button effects */
span{
  position: relative;
  display: inline-flex;
  width: 180px;
  height: 55px;
  margin: 0 15px;
  perspective: 1000px;
}
span z{
  font-size: 19px;
  letter-spacing: 1px;
  transform-style: preserve-3d;
  transform: translateZ(-25px);
  transition: transform .25s;
  font-family: 'Montserrat', sans-serif;
  
}
span z:before,
span z:after{
  position: absolute;
  content: "Reveal Answer";
  height: 55px;
  width: 180px;
  display: flex;
  align-items: center;
  justify-content: center;
  box-sizing: border-box;
  border-radius: 5px;
}
span z:before{
  color: #fff;
  background: #3FA1E8;
  transform: rotateY(0deg) translateZ(25px);
}
span z:after{
  color: #000;
  border: 3px solid black;
  transform: rotateX(90deg) translateZ(25px);
}
span z:hover{
  transform: translateZ(-25px) rotateX(-90deg);
}
</style>
</body>
</html>
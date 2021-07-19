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
        $moduleid = $_GET['id'];
        ?>
  	<title>Update - GlowEdu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/css/style.css">
        <?php
        $id = $_GET['id'];
        $query = "SELECT * from category WHERE id=$id";
        $result = mysqli_query($conn, $query);

        while($rows = mysqli_fetch_assoc($result))
        {
        $id = $rows['id'];
        $cat_name = $rows['cat_name'];
        $cat_type = $rows['cat_type'];
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
        <li class="nav-item">
        <div class="input-group">
  <div class="form-outline">
    <form action="search.php" method="GET">
    <input type="search" id="form1" name="find" class="form-control" placeholder="Search" /></div>
  <button type="submit" class="btn btn-primary">Search
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
  $update = @$_POST['update'];
  $cat_name = @$_POST['cat_name'];
  $cat_type = @$_POST['cat_type'];
if($update) {
  $sql2 = "INSERT INTO `category`(`id`, `cat_name`, `cat_type`) VALUES (NULL, '$cat_name','$cat_type')";
    $rt2 = mysqli_query($conn, $sql2);
    if($rt2) {
        echo "Done!";
        echo "<meta http-equiv=\"refresh\" content=\"0; url=# \">";
    } else{
        echo "<h1> ERROR!</h1> ". $sql2;
    }
  }
?>
<h2 class="mb-4">Create Sub-Category</h2>
<form method="POST" action='upload.php' class="register-form" id="register-form">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example1" class="form-control" name="cat_name" value="<?php echo $cat_name ?>"/>
        <label class="form-label" for="form6Example1">Sub-Category Name</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
      <select class="form-control" id="exampleFormControlSelect1" name="cat_type">
      <option value="python">Python</option>
    </select>
        <label class="form-label" for="form6Example2">Sub-Category Language</label>
      </div>
    </div>
  </div>
    <!-- Submit button -->
    <div style="padding: 15px;">
  <input type="submit" name="update" id="signup" class="form-update" value="Update" style="float: left; width: 40%; padding: 10px; font-weight: 600; color: #fff; background: #3580ff; border: 1px solid #3580ff; border-radius: 4px; cursor: pointer; font-size: 14px; margin-top: 20px;">
  <br><a href="delmod.php?id=<?php echo $moduleid;?>"><button style='width:40%; float: right; padding: 10px; font-weight: 600; color: #fff;' type='button' class='btn btn-danger'>Delete</button></a>
  </div></form>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
  </body>
</html>
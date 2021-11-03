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
    
    <title>Request - GlowEdu</title>
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
                            <img src="images/logo.png" width="40px">
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
                                        <input type="search" id="form1" name="find" class="form-control" placeholder="Search" />
                                </div>
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
        <div class="row mt-12">
      <h2 class="col-md-4" id="subhead">Delete Requests! </h2><br><Br>
                  <div class="table-responsive">
                  <table class='table table-hover' style="background-color:#fff; border-radius: 10px;">
                  <thead>
              <tr>
                <th scope='col'>#</th>
                <th scope='col'>Name</th>
                <th scope='col'>E-Mail</th>
                <th scope='col'>Course Name</th>
                <th scope='col'>Action</th>
              </tr>
            </thead>
            <tbody>
            
      <?php
        $query000 = "SELECT * from request";
        $result000 = mysqli_query($conn, $query000);
        while($rows = mysqli_fetch_assoc($result000))
        {
        $request_id = $rows['id'];
        $name = $rows['name'];
        $email = $rows['email'];
        $course_name = $rows['course_name'];
          echo "<tr>
          <th scope='row'>$request_id</th>
          <td>$name</td>
          <td>$email</td>
          <td>$course_name</td>
          <td><a href='delete_request_mode.php?id=$request_id&&course_name=$course_name&&email=$email'><button style='float: right; width: 100%;' class='btn btn-outline-danger'>Delete Subscription</button></a></td></tr>";}
?>
</tbody>
          </table></div>
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
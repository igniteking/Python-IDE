<!doctype html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<html lang="en">
<link rel="icon" type="image/png" sizes="192x192" href="images/main.png">
<?php
if (isset($_SESSION['email'])) {

  $query = "SELECT * from users WHERE email = '$email'";
  $result = mysqli_query($conn, $query);

  while ($rows = mysqli_fetch_assoc($result)) {
    $user_id = $rows['id'];
    $user = $rows['username'];
    $em = $rows['email'];
    $ut = $rows['user_type'];
    $active = $rows['active'];
  }
} else {
}

$start_time = 0;
$end_time = 0;
$query2 = "SELECT * from calculate";
$result2 = mysqli_query($conn, $query2);
while ($rows = mysqli_fetch_assoc($result2)) {
  $start_time += $rows['start_time'];
  $end_time += $rows['end_time'];
}
$severtime = $end_time - $start_time;
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../css/css/style.css">
</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="p-4 pt-5">
        <?php
        $query = "SELECT * FROM session WHERE `token`='$token' AND `user_id`='$id_login'";
        $get = mysqli_query($conn, $query);
        while ($rows = mysqli_fetch_assoc($get)) {
          $status = $rows['status'];
          if (!$status == "1") {
            echo "<meta http-equiv=\"refresh\" content=\"0; url=logout.php\">";
            exit();
          } else {
            //Do Nothing!!!
          }
        }
        ?>
       <center><img class='rounded-circle mt-5' width='150px' height='150px;' src='images/logo.jpeg'></center><br>
      <center><h4 style="color: white;"><a href="profile.php"><?php echo $user; ?></a></h4><br></center>


        <?php
        if (!isset($_SESSION['email'])) {
          echo '
              <ul class="list-unstyled components mb-5">
              <li class="active">
                <a href="login.php" aria-expanded="false">Login</a></li>
              <li>
                <a href="about.php">About Us</a>
              </li>
              <li>
                <a href="contact.php">Contact</a>
              </li>
              <li>
                <a href="tandc.php">Terms and Conditions</a>
              </li>
              <li>
                <a href="faq.php">FAQ</a>
              </li>
            </ul>';
        } else {
          if ($ut == 'student') {
            echo "
              <ul class='list-unstyled components mb-5'>
              <li class='active'>
                <a href='#homeSubmenu' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle'>
                <lord-icon
                    src='https://cdn.lordicon.com/gmzxduhd.json'
                    trigger='loop'
                    delay= '1000'
                    colors='primary:#ffffff,secondary:#ffffff'
                    style='width:50px;height:50px'>
                </lord-icon> Home</a>
                <ul class='collapse list-unstyled' id='homeSubmenu'>
                <li>
                 <a href='index.php'>Home</a>
                  </li>
                  <li>
                      <a href='about.php'>About Us</a>
                  </li>
                  <li>
                      <a href='contact.php'>Contact Us</a>
                  </li>
                  <li>
                <a href='faq.php'>FAQ</a>
              </li>
                </ul>
              </li>";
            if ($active == 1) {
              $active = "Active";
              echo "<li>
                  <a href='progress.php'><lord-icon
                  src='https://cdn.lordicon.com/gqdnbnwt.json'
                  trigger='loop'
                  delay='1000'
                  colors='primary:#ffffff,secondary:#ffffff'
                  style='width:50px;height:50px'>
              </lord-icon> Progress</a>
                </li>";
              $dialog = "";
            } else {
            }
        ?>
        <?php
            echo " <li>
                <a href='#pageSubmenu' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle'>
                <lord-icon
                src='https://cdn.lordicon.com/wxnxiano.json'
                trigger='loop'
                delay='1000'
                colors='primary:#ffffff,secondary:#ffffff'
                style='width:50px;height:50px'></lord-icon> Courses</a>
                <ul class='collapse list-unstyled' id='pageSubmenu'>
                  <li>
                      <a href='python/python_category.php'><lord-icon
                      src='https://cdn.lordicon.com/bkqtuigh.json'
                      trigger='loop'
                      delay='1000'
                      colors='primary:#ffffff,secondary:#ffffff'
                      style='width:50px;height:50px'>
                  </lord-icon> Python</a>
                  </li>
                  <li>
                      <a href='javascript/javascript_category.php'><lord-icon
                      src='https://cdn.lordicon.com/kkwzhxjj.json'
                      trigger='loop'
                      delay='1000'
                      colors='primary:#ffffff,secondary:#ffffff'
                      style='width:50px;height:50px'>
                  </lord-icon> Javascript</a>
                  </li>
                  <li>
                      <a href='c++/c++_category.php'><lord-icon
                      src='https://cdn.lordicon.com/ptbbcteb.json'
                      trigger='loop'
                      delay='1000'
                      colors='primary:#ffffff,secondary:#ffffff'
                      style='width:50px;height:50px'>
                  </lord-icon> C++</a>
                  </li>
                  <li>
                      <a href='c/c_category.php'><lord-icon
                      src='https://cdn.lordicon.com/ptbbcteb.json'
                      trigger='loop'
                      delay='1000'
                      colors='primary:#ffffff,secondary:#ffffff'
                      style='width:50px;height:50px'>
                  </lord-icon> C</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href='profile.php'><lord-icon
                src='https://cdn.lordicon.com/dxjqoygy.json'
                trigger='loop'
                delay='1000'
                colors='primary:#ffffff,secondary:#ffffff'
                style='width:50px;height:50px'>
            </lord-icon> Profile</a>
              </li>
            </ul>";
          } else {
          }
          if ($ut == 'superadmin') {
            echo "
              <ul class='list-unstyled components mb-5'>
              <li class='active'>
                <a href='#homeSubmenu' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle'>
                <lord-icon
                    src='https://cdn.lordicon.com/gmzxduhd.json'
                    trigger='loop'
                    delay= '1000'
                    colors='primary:#ffffff,secondary:#ffffff'
                    style='width: 50px;height: 50px'>
                </lord-icon> Home</a>
                <ul class='collapse list-unstyled' id='homeSubmenu'>
                <li>
                      <a href='index.php'>Home</a>
                  </li>
                  <li>
                      <a href='about.php'>About Us</a>
                  </li>
                  <li>
                      <a href='contact.php'>Contact Us</a>
                  </li>
                  <li>
                <a href='faq.php'>FAQ</a>
              </li>
                </ul>
              </li>
              <li>
                <a href='#pageSubmenu' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle'>
                <lord-icon
                src='https://cdn.lordicon.com/wxnxiano.json'
                  trigger='loop'
                  delay='1000'
                colors='primary:#ffffff,secondary:#ffffff'
                style='width:50px;height:50px'>
            </lord-icon> Courses</a>
                <ul class='collapse list-unstyled' id='pageSubmenu'>
                  <li>
                      <a href='python/python_category.php'><lord-icon
                      src='https://cdn.lordicon.com/bkqtuigh.json'
                      trigger='loop'
                      delay='1000'
                      colors='primary:#ffffff,secondary:#ffffff'
                      style='width:50px;height:50px'>
                  </lord-icon> Python</a>
                  </li>
                  <li>
                      <a href='javascript/javascript_category.php'><lord-icon
                      src='https://cdn.lordicon.com/kkwzhxjj.json'
                      trigger='loop'
                      delay='1000'
                      colors='primary:#ffffff,secondary:#ffffff'
                      style='width:50px;height:50px'>
                  </lord-icon> Javascript</a>
                  </li>
                  <li>
                      <a href='c++/c++_category.php'><lord-icon
                      src='https://cdn.lordicon.com/ptbbcteb.json'
                      trigger='loop'
                      delay='1000'
                      colors='primary:#ffffff,secondary:#ffffff'
                      style='width:50px;height:50px'>
                  </lord-icon> C++</a>
                  </li>
                  <li>
                      <a href='c/c_category.php'><lord-icon
                      src='https://cdn.lordicon.com/ptbbcteb.json'
                      trigger='loop'
                      delay='1000'
                      colors='primary:#ffffff,secondary:#ffffff'
                      style='width:50px;height:50px'>
                  </lord-icon> C</a>
                  </li>
                </ul>
              </li>
              <li>
                  <a href='user.php'><lord-icon
                  src='https://cdn.lordicon.com/jvucoldz.json'
                    trigger='loop'
                    delay='1000'
                  colors='primary:#ffffff,secondary:#ffffff'
                  style='width:50px;height:50px'>
              </lord-icon> User Data</a>
              </li>
              <li>
                  <a href='inventory.php'><lord-icon
                  src='https://cdn.lordicon.com/slkvcfos.json'
                    trigger='loop'
                    delay='1000'
                  colors='primary:#ffffff,secondary:#ffffff'
                  style='width:50px;height:50px'>
              </lord-icon> Inventory</a>
              </li>
              <li>
                  <a href='upload.php'><lord-icon
                  src='https://cdn.lordicon.com/nocovwne.json'
                    trigger='loop'
                    delay='1000'
                  colors='primary:#ffffff,secondary:#ffffff'
                  style='width:50px;height:50px'>
              </lord-icon> Upload Study Material</a>
              </li>
              <li>
                <a href='profile.php'><lord-icon
                src='https://cdn.lordicon.com/dxjqoygy.json'
                  trigger='loop'
                  delay='1000'
                colors='primary:#ffffff,secondary:#ffffff'
                style='width:50px;height:50px'>
            </lord-icon> Profile</a>
              </li>
            </ul>";
          } else {
          }
          if ($ut == 'admin') {
            echo "
              <ul class='list-unstyled components mb-5'>
              <li class='active'>
                <a href='#homeSubmenu' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle'>
                <lord-icon
                    src='https://cdn.lordicon.com/gmzxduhd.json'
                    trigger='loop'
                    delay= '1000'
                    colors='primary:#ffffff,secondary:#ffffff'
                    style='width: 50px;height: 50px'>
                </lord-icon> Home</a>
                <ul class='collapse list-unstyled' id='homeSubmenu'>
                <li>
                      <a href='index.php'>Home</a>
                  </li>
                  <li>
                      <a href='about.php'>About Us</a>
                  </li>
                  <li>
                      <a href='contact.php'>Contact Us</a>
                  </li>
                  <li>
                <a href='faq.php'>FAQ</a>
              </li>
                </ul>
              </li>
              <li>
                <a href='#pageSubmenu' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle'>
                <lord-icon
                src='https://cdn.lordicon.com/wxnxiano.json'
                  trigger='loop'
                  delay='1000'
                colors='primary:#ffffff,secondary:#ffffff'
                style='width:50px;height:50px'>
            </lord-icon> Courses</a>
                <ul class='collapse list-unstyled' id='pageSubmenu'>
                  <li>
                      <a href='python/python_category.php'><lord-icon
                      src='https://cdn.lordicon.com/bkqtuigh.json'
                      trigger='loop'
                      delay='1000'
                      colors='primary:#ffffff,secondary:#ffffff'
                      style='width:50px;height:50px'>
                  </lord-icon> Python</a>
                  </li>
                  <li>
                      <a href='javascript/javascript_category.php'><lord-icon
                      src='https://cdn.lordicon.com/kkwzhxjj.json'
                      trigger='loop'
                      delay='1000'
                      colors='primary:#ffffff,secondary:#ffffff'
                      style='width:50px;height:50px'>
                  </lord-icon> Javascript</a>
                  </li>
                  <li>
                      <a href='c++/c++_category.php'><lord-icon
                      src='https://cdn.lordicon.com/ptbbcteb.json'
                      trigger='loop'
                      delay='1000'
                      colors='primary:#ffffff,secondary:#ffffff'
                      style='width:50px;height:50px'>
                  </lord-icon> C++</a>
                  </li>
                  <li>
                      <a href='c/c_category.php'><lord-icon
                      src='https://cdn.lordicon.com/ptbbcteb.json'
                      trigger='loop'
                      delay='1000'
                      colors='primary:#ffffff,secondary:#ffffff'
                      style='width:50px;height:50px'>
                  </lord-icon> C</a>
                  </li>
                </ul>
              </li>
              <li>
                  <a href='../upload.php'><lord-icon
                  src='https://cdn.lordicon.com/nocovwne.json'
                    trigger='loop'
                    delay='1000'
                  colors='primary:#ffffff,secondary:#ffffff'
                  style='width:50px;height:50px'>
              </lord-icon> Upload Study Material</a>
              </li>
              <li>
                <a href='profile.php'><lord-icon
                src='https://cdn.lordicon.com/dxjqoygy.json'
                  trigger='loop'
                  delay='1000'
                colors='primary:#ffffff,secondary:#ffffff'
                style='width:50px;height:50px'>
            </lord-icon> Profile</a>
              </li>
            </ul>";
          }
        }
        ?>
        <div class="footer">
          <?php
          if (!isset($_SESSION['email'])) {
          } else {

            echo '<a href="logout.php"><button style="width: 100%; padding: 10px; font-weight: 600; color: #fff; background: #3580ff; border: 1px solid #3580ff; border-radius: 4px; cursor: pointer; font-size: 14px; margin-top: 20px;"><i class="fas fa-sign-out-alt"></i> Logout</button></a>';
          }
          ?>
        </div>
    </nav>

    <!-- Page Content  -->
    <style>
      html {
        user-select: none;
        /* supported by Chrome and Opera */
        -webkit-user-select: none;
        /* Safari */
        -khtml-user-select: none;
        /* Konqueror HTML */
        -moz-user-select: none;
        /* Firefox */
        -ms-user-select: none;
        /* Internet Explorer/Edge */
      }
    </style>

    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>

</body>

</html>
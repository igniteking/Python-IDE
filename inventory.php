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
    $query = "SELECT * from users WHERE email = '" . $_SESSION['email'] . "'";
    $result = mysqli_query($conn, $query);

    while ($rows = mysqli_fetch_assoc($result)) {
        $user = $rows['username'];
        $email = $rows['email'];
        $mobile_number = $rows['mobile'];
        $bio = $rows['bio'];
        $state = $rows['state'];
        $city = $rows['city'];
        $postalcode = $rows['postalcode'];
        $education = $rows['education'];
        $country = $rows['country'];
        $additional = $rows['additional'];
        $active = $rows['active'];
        $email_active = $rows['active'];
        if ($email_active == "0") {
            $email_active = "<f style='color: #f04040; font-weight: bold;'>Not Verified</f>";
        } else {
            $email_active = "<f style='color: #6cb038; font-weight: bold;'><i class='fa fa-check' aria-hidden='true'></i> Verified</f>";
        }
        $email_mobile_otp = $rows['mobile_otp'];
        $mobile_count_active = $rows['mobile_active'];
        $mobile_active = $rows['mobile_active'];
        if ($mobile_active == "") {
            $mobile_active = "0";
        }
        if ($mobile_active == "0") {
            $mobile_active = "<f style='color: #f04040; font-weight: bold;'>Not Verified</f>";
        } else {
            $mobile_active = "<f style='color: #6cb038; font-weight: bold;'><i class='fa fa-check' aria-hidden='true'></i> Verified</f>";
        }
    }
    ?>
    <title>Profile - GlowEdu</title>
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
            <?php
            //SQL and API To Import Sims
            use Phppot\DataSource;

            require_once 'dataSource.php';
            $db = new DataSource();
            $conn = $db->getConnection();

            if (isset($_POST["import"])) {

                $fileName = $_FILES["file"]["tmp_name"];

                if ($_FILES["file"]["size"] > 0) {

                    $file = fopen($fileName, "r");

                    while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {

                        $id = "";
                        if (isset($column[0])) {
                            $id = null;
                        }
                        $course_topic = "";
                        if (isset($column[1])) {
                            $course_topic = mysqli_real_escape_string($conn, $column[1]);
                        }
                        $course_category = "";
                        if (isset($column[2])) {
                            $course_category = mysqli_real_escape_string($conn, $column[2]);
                        }
                        $course_data = "";
                        if (isset($column[3])) {
                            $course_data = mysqli_real_escape_string($conn, $column[3]);
                        }
                        $course_color = "";
                        if (isset($column[4])) {
                            $course_color = mysqli_real_escape_string($conn, $column[4]);
                        }
                        $hints = "";
                        if (isset($column[5])) {
                            $hints = mysqli_real_escape_string($conn, $column[5]);
                        }
                        $answer = "";
                        if (isset($column[6])) {
                            $answer = mysqli_real_escape_string($conn, $column[6]);
                        }
                        $cat_id = "";
                        if (isset($column[7])) {
                            $cat_id = mysqli_real_escape_string($conn, $column[7]);;
                        }
                        $sqlInsert = "INSERT INTO `courses`(`id`, `course_topic`, `course_category`, `course_data`, `course_color`, `hints`, `answer`, `cat_id`)
                   values (?,?,?,?,?,?,?,?)";
                        $paramType = "isssssss";
                        $paramArray = array(
                            $id,
                            $course_topic,
                            $course_category,
                            $course_data,
                            $course_color,
                            $hints,
                            $answer,
                            $cat_id
                        );
                        $insertId = $db->insert($sqlInsert, $paramType, $paramArray);

                        if (!empty($insertId)) {
                            $type = "success";
                            $message = "CSV Data Imported into the Database";
                            echo "<meta http-equiv=\"refresh\" content=\"0; url=#.php\">";
                        } else {
                            $type = "error";
                            $message = "Problem in Importing CSV Data";
                        }
                    }
                }
            }
            //End Of Code
            ?>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#frmCSVImport").on("submit", function() {

                        $("#response").attr("class", "");
                        $("#response").html("");
                        var fileType = ".csv";
                        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
                        if (!regex.test($("#file").val().toLowerCase())) {
                            $("#response").addClass("error");
                            $("#response").addClass("display-block");
                            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
                            return false;
                        }
                        return true;
                    });
                });
            </script>
            <div style="width: 48%; height: 220px; border: 2px solid #2a9d8f; border-radius: 8px; float: left; ">
                <div style="padding: 40px;">
                    <img src="images/excel.svg" width="80px" style="float: left; margin-right: 20px;">
                    <h1 style="font-size: 16px; font-weight: 600; color: #444;">Import .csv</h1>
                    <form class="form-horizontal" action="" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                        <br><input type="file" name="file" id="file" accept=".csv" style="padding: 10px; border: 2px dashed #eee;"><br>
                        <button type="submit" id="submit" name="import" class="btn-submit" style="background: #0ead69; color: #fff; font-weight: 600; font-size: 14px; border-radius: 4px; border: 1px solid #2a9d8f; padding: 10px 30px; float: right;"><i class="fa fa-upload" aria-hidden="true"></i> Import</button>
                    </form>
                    <div style="clear: both;"></div>
                </div>
            </div>
            <div style="width: 48%; height: 220px; border: 2px solid #fcbf49; border-radius: 8px; float: left; margin-left: 20px;">
                <div style="padding: 40px;">
                    <img src="images/excel_export.svg" width="80px" style="float: left; margin-right: 20px;">
                    <h1 style="font-size: 16px; font-weight: 600; color: #444;">Export .csv</h1><br>
                    <f style='font-size: 13px; padding: 10px; border: 2px dashed #eee; '>Click The Button Below To Download</f><br><br>
                    <a href="download_courses.php"><button id="download" name="download" style="background: #fcbf49; color: #fff; font-weight: 600; font-size: 14px; border-radius: 4px; border: 1px solid #fcbf49; padding: 10px 30px; float: right; text-decoration: none;" class="btn-submit"><i class="fa fa-download" aria-hidden="true"></i> Export</button></a>
                </div>
            </div>
            <div style="clear: both;"></div><br><br>
            <a href="del_course.php" target=""><button type="button" onclick="showAlert()" style="float: left;" class="btn btn-outline-danger float-left"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Delete Course</button></a>
        <br><br>
        <div style="border: 1px solid; padding: 10px; width: 540px;">
        <h6>1. Delete courses before importing bulk data</h6>
        <h6>2. Chose the template file to bulk upload the data</h6>
        <h6>3. Click on Import button to import data!</h6>
    </div>
        <script>
            function showAlert() {
                alert("Hello! Are you sure you want to delete this course!..");
            }
        </script>
    <?php
        $sql = "SELECT * FROM category"
    ?>
    <?php
        $reg = @$_POST['register'];
        if ($reg) {
            $check = @$_POST['check'];
            $cat_id = @$_POST['cat_id'];
            $checked_array = @$_POST['check'];
            foreach ($check as $key => $value) {
                if (in_array($check[$key], $checked_array)) {
                    $key_press = $check[$key];
                    echo '<br>';
                    $sql2 = "UPDATE `courses` SET `cat_id` = '$cat_id' WHERE id = $key_press";
                    $query2 = mysqli_query($conn, $sql2);
                    echo "<meta http-equiv=\"refresh\" content=\"0; url=#\">";
                }
            }
        }
    ?>
            <form class="form-inline" method="post" action="inventory.php" style="display: inline;">
                        <input type="submit" name="register" id="submit" value="Send" style="padding: 9px; font-weight: 700; border-top-right-radius: 8px; border-bottom-right-radius: 8px; color: #fff; background: #3f37c9; border: 2px solid #3f37c9; float: right;">
                        <select id="handlers" name="cat_id" style="width: auto; padding: 10px; border: 2px solid #eee; border-top-left-radius: 8px; border-bottom-left-radius: 8px; float: right;">
                            <?php
                            $query = "SELECT * from category";
                            $result = mysqli_query($conn, $query);

                            while ($rows = mysqli_fetch_assoc($result)) {
                                $id = $rows['id'];
                                $cat_name = $rows['cat_name'];
                                $cat_type = $rows['cat_type'];
                            ?>
                                <option value="<?php echo $id; ?>"><?php echo $cat_name;} ?></option>
                        </select>
                        <br><br><br><br><div class='tabs'><br><br>
                <!-- Tab 1 & Content -->
                <input type="radio" name="tab" id="tab1" role="tab" checked>
                <label for="tab1" id="tab1-label">Inventory</label>
                <section aria-labelledby="tab1-label">
                    <?php
                    $sqlSelect = "SELECT * FROM courses WHERE cat_id = '0'";
                    $result2 = mysqli_query($conn, $sqlSelect);
                    if (!empty($result2)) {
                    ?>
                        <table id='userTable'>
                            <thead>
                                <tr>
                                    <th>Check</th>
                                    <th>ID</th>
                                    <th>Course Topic</th>
                                    <th>Course Category</th>
                                </tr>
                            </thead>
                            <?php

                            foreach ($result2 as $row) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" id="vehicle1" name="check[]" value="<?php echo $row['id']; ?>"></td>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['course_topic']; ?></td>
                                        <td><?php echo $row['course_category']; ?></td>
                                    </tr>
                                <?php
                            }
                                ?>
                                </tbody>
                        </table>
                    <?php } ?>

                </section></form>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
   <!-- Flattern structure for adjacent sibling combinator -->
   <style>
                .tabs {
                    /* Step 1: Enable Flex on the container */
                    display: flex;

                    /* Step 2: Enable flex-wrap to put content section below tab label */
                    flex-wrap: wrap;
                }

                .tabs>section {
                    /* Step 3: Move content <section> to the end, after the tab labels */
                    order: 999;

                    /* Step 4: Make sure the content <section> is 100% width */
                    width: 100%;

                    /* Step 5: Hide all content <section> by default */
                    display: none;
                }

                .tabs>input {
                    /* display: none; Don’t use display:none. Bad for accessibility */

                    /* Step 6: Hide the radio inputs */
                    opacity: 0;

                    /* Step 7: Make sure the radio inputs don’t take up space in layout */
                    position: absolute;
                }

                /* Step 8: Select the label right next to the selected input */
                .tabs>input[type=radio]:checked+label {
                    /* Step 9: Highlight the selected label */
                    background: yellow;
                }

                /* Step 10: Select the section right next to the label which is next to the selected input */
                .tabs>input[type=radio]:checked+label+section {
                    /* Step 11: Unset the 'display:none' we did in step 5 */
                    display: unset;
                }

                /* Done. Make sure to disable the debug code at the beginning of CSS. And now it is time to make the tabs look good */

                /* Make the tabs look good */
                /* Final Step: Make the tabs pretty with padding and colors */

                .tabs>label {
                    padding: .5em 1em;
                    background: #3c8ae1;
                    border-right: 1px solid #3c8ae1;
                    color: #fff;
                }

                .tabs>label:last-of-type {
                    border-right: none;
                }

                .tabs>input[type=radio]:checked+label {
                    background: #13c8f5;
                    color: #fff;
                    font-weight: 700;
                }

                .tabs section {
                    border: 1px #13c8f5 solid;
                    border-top: 5px #13c8f5 solid;
                    padding: 1em;
                }
            </style>
            <style>
                table {
                    font-family: arial, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                }

                td,
                th {
                    border: 1px solid #f8f8f8;
                    text-align: left;
                    font-family: arial, sans-serif;
                    padding: 15px 15px;
                }

                tr:nth-child(even) {
                    font-family: arial, sans-serif;
                    background-color: #fefefe;
                }
            </style>
</body>
</html>
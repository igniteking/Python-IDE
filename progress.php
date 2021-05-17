<!doctype html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<?php include_once("database/phpmyadmin/header.php"); ?>
<html lang="en">
<title>My Progress</title>

<head>
    <?php
    if (isset($_SESSION['email'])) {
    } else {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
        exit();
    }
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/css/style.css">

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
        <h1>Completed Modules <i class="fa fa-check" aria-hidden="true" style="color: #67ce8b;"></i></h1>
        <div style='margin-top: 20px; margin-bottom: 20px; width: 100%; border-radius: 8px; box-shadow: 1px 10px 10px #ccc;'>
            <div id="progress">
                COMPLETED <?php echo $count_final ?>%
            </div>
        </div>
        <style type="text/css">
            #progress {
                padding: 10px;
                color: #fff;
                font-family: Consolas, monaco, monospace;
                border-radius: 8px;
                background: rgb(0, 0, 0);
                background: linear-gradient(90deg, rgba(0, 0, 0, 1) 0%, rgba(45, 48, 47, 1) 61%, rgba(29, 29, 29, 1) 100%);
                transition: all 5s ease;
                animation: imganim 2s linear both;
            }

            @keyframes imganim {
                from {
                    width: 0px;
                    padding: 10px;
                }

                to {
                    padding: 10px;
                    width: <?php echo $count_final; ?>%;
                }
            }
        </style>
        <?php
        $sql = "SELECT * FROM match_id WHERE student_id='$user_id'";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $course = $row['course_id'];
            $sql2 = "SELECT * FROM courses WHERE id='$course'";
            $query2 = mysqli_query($conn, $sql2);
            while ($row = mysqli_fetch_assoc($query2)) {
                $course_topic = $row['course_topic'];
                $course_data = $row['answer'];
                $course_category = $row['course_category'];
                echo "<a href='python.php?id=$course'><div id='card' class='col-md-4' style='float: left; margin-top: 15px;'>
                <div id='flip-card'>
                  <div id='flip-card-front' class='cardfrount'>$course_topic<br>$course_category</div>
                  <div id='flip-card-back' style='overflow-y: scroll; padding: 20px;'>$course_data</div>
                </div></a>
              </div>";
            }
        }
        ?>


        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
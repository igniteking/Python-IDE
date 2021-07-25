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
                            <img src="images/main.png" width="40px">
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
                                <option value="<?php echo $id; ?>"><?php echo $cat_name;
                                                                } ?></option>
                        </select>
                        <br><br><br><br>
        <div class='tabs'> 
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
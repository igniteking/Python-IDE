<?php include_once("database/phpmyadmin/connection.php");
  $query = "SELECT * FROM `payment`";
  $result = mysqli_query($conn, $query);

  while ($rows = mysqli_fetch_assoc($result)) {
    $id = $rows['id'];
    $name = $rows['name'];
    $email = $rows['email'];
    $days = $rows['days'];
    $update_new = $days - 1;
    $quesry_less = "UPDATE `payment` SET `days`='$update_new' WHERE id='$id'";
    $result_less = mysqli_query($conn, $quesry_less);
    $query_delete = "DELETE FROM `payment` WHERE `days` = '0'";
    $result_delete = mysqli_query($conn, $query_delete);
  }

  ?>
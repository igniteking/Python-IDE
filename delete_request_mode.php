<?php
include('database/phpmyadmin/connection.php');
$request_id = $_GET['id'];
$course_name = $_GET['course_name'];
$email = $_GET['email'];
$delete_query = "DELETE FROM `request` WHERE id = '$request_id'";
$delete_result = mysqli_query($conn, $delete_query);
if($delete_result)
{
    echo "deleted record"; // display error message if not delete
}
else
{
    echo "Error deleting record"; // display error message if not delete
}

$delete_query123 = "DELETE FROM `payment` WHERE email = '$email' AND course_category='$course_name'";
$delete_result123 = mysqli_query($conn, $delete_query123);
if($delete_result123)
{
    echo "deleted record"; // display error message if not delete
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>
echo "<meta http-equiv=\"refresh\" content=\"0; url=delete_request.php\">";
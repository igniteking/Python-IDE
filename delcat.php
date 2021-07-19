<?php include_once("database/phpmyadmin/connection.php"); ?>

<?php

$category_id = $_GET['id']; // get id through query string
$query = "DELETE FROM `category` WHERE `id` = '$category_id'";
$del = mysqli_query($conn, $query); // delete query
$delete_query = "DELETE FROM `sub_cat_match` WHERE `cat_id` = '$category_id'";
$delete_final = mysqli_query($conn, $delete_query); // delete query
if($del)
{
    mysqli_close($conn); // Close connection
    echo "deleted record"; // display error message if not delete
    header("location:category.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>
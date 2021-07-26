<?php include_once("database/phpmyadmin/connection.php"); ?>
<?php
/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: Export
*/
// Database Connection
// get Users
$query = "SELECT * FROM courses";
if (!$result = mysqli_query($conn, $query)) {
    exit(mysqli_error($conn));
}

$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Sims.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('Id', 'Course Topic', 'Course Language', 'Course Data', 'Course Card Color', 'Hint', 'Answer', 'Category Id'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
?>
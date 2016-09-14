<?php
session_start();
include('mysql_connect.php');
if ($conn->connect_error) {
    die("Connection failed ");
}
$ID = $_SESSION['ID'];
$output = [];

$query = "SELECT * FROM people WHERE dr_id = '$ID' ORDER BY full_name";


$result = mysqli_query($conn, $query);

$rows_affected = mysqli_affected_rows($conn);

if ($result->num_rows < 0) {
    $output['message'][] = 'this user has no friends';
    $output = json_encode($output);
    print($output);

};
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output['full_name'][] = $row['full_name'];
        $output["active"][] = $row['active'];
        $output['form'][] = $row['form'];
        $output['timestamp'][] = $row['timestamp'];
    };
    $output['status'] = 'success';
    $output = json_encode($output);
    print($output);
}
?>
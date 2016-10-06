<?php
session_start();
include('mysql_connect.php');
if ($conn->connect_error) {
    die("Connection failed ");
}
$output['status'] = 'success';
$output = json_encode($output);
print($output);
?>
<?php
session_start();
include('mysql_connect.php');
if($conn->connect_error){
    $output['message'][]='Cannot connect to server';
    $output = json_encode($output);
    print($output);
    die();
}
$output = $_POST['form'];
$output = addslashes($output);
$_SESSION['form'] = $output;
$output = json_encode($output);
print($output);
?>
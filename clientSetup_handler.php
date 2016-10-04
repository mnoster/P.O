<?php
session_start();
include('mysql_connect.php');
if($conn->connect_error){
    $output['message'][]='Cannot connect to server';
    $output = json_encode($output);
    print($output);
    die();
}
$_SESSION['first_name'] = $_POST['first_name'];
$_SESSION['last_name'] = $_POST['last_name'];
$_SESSION['notes'] = $_POST['notes'];

?>
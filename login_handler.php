<?php
session_start();
include('mysql_connect.php');
if ($conn->connect_error) {
    die("Connection failed ");
}
$output = [];
if(empty($_POST['username']) || empty($_POST['password'])){
    $output['message'][] = "fill out both fields";
    die();
};
$username = mysqli_real_escape_string($conn,$_POST['username']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$encrypted_pass = sha1($password);
$password = "";
$output = [];

$query = "SELECT * FROM `users` WHERE `username` = '$username' AND `password`='$encrypted_pass'";

mysqli_query($conn,$query);


$rows_affected = mysqli_affected_rows($conn);

if($rows_affected > 0){
    $_SESSION['username'] = $username;
    $output['message'] = 'success';
    $output['success'] = true;
    $output = json_encode($output);
    print($output);
}else{
    $output['message'] = 'INCORRECT USER INFO';
    $output['success'] = false;
    $output = json_encode($output);
    print($output);
}
?>
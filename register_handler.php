<?php
session_start();
include('mysql_connect.php');
if ($conn->connect_error) {
    die("Connection failed ");
}
$username = mysqli_real_escape_string($conn,$_POST['username']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$check_password = mysqli_real_escape_string($conn,$_POST['password2']);
if($password !== $check_password){
    $output['message'] = 'You typed the password incorrectly';
    $output['success'] = false;
    $output = json_encode($output);
    print($output);
    die("Error");
}
$encrypted_pass = sha1($password);
$password = " ";
$output = [];

$query = "INSERT INTO users (email, password, username) VALUES ('$email' , '$encrypted_pass' , '$username')";

mysqli_query($conn,$query);

$rows_affected = mysqli_affected_rows($conn);

if($rows_affected > 0){
    $_SESSION['username'] = $username;
    $output['message'] = 'success';
    $output['success'] = true;
    $output = json_encode($output);
    print($output);
}else{
    $output['message'] = 'Account not created';
    $output['success'] = false;
    $output = json_encode($output);
    print($output);
}
?>

if(empty($first_success)){
$first_success =addslashes($_SESSION['1st_success']);
}else{
$first_success =addslashes($_POST['1st_success']);
}
if(empty($second_success)){
$second_success =addslashes($_SESSION['2nd_success']);
}else{
$second_success =addslashes($_POST['2nd_success']);
}
if(empty($second_success)){
$second_success =addslashes($_SESSION['2nd_success']);
}else{
$second_success =addslashes($_POST['2nd_success']);
}
if(empty($third_success)){
$third_success =addslashes($_SESSION['3rd_success']);
}else{
$third_success =addslashes($_POST['3rd_success']);
}
if(empty($forth_success)){
$forth_success =addslashes($_SESSION['4th_success']);
}else{
$forth_success =addslashes($_POST['4th_success']);
}
if(empty($fifth_success)){
$fifth_success =addslashes($_SESSION['5th_success']);
}else{
$fifth_success =addslashes($_POST['5th_success']);
}
if(empty($sixth_success)){
$sixth_success =addslashes($_SESSION['6th_success']);
}else{
$sixth_success =addslashes($_POST['6th_success']);
}
if(empty($seventh_success)){
$seventh_success =addslashes($_SESSION['7th_success']);
}else{
$seventh_success =addslashes($_POST['7th_success']);
}
if(empty($eighth_success)){
$eighth_success =addslashes($_SESSION['8th_success']);
}else{
$eighth_success =addslashes($_POST['8th_success']);
}

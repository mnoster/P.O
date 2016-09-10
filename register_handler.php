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

$output = [];

$query = "INSERT INTO users (email, password, username) VALUES ('$email' , '$encrypted_pass' , '$username')";

mysqli_query($conn,$query);
$password = " ";

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

<?php
session_start();
include('mysql_connect.php');
if ($conn->connect_error) {
    die("Connection failed ");
}
$firstName = addslashes($_POST['first_name']);
$lastName = addslashes($_POST['last_name']);
$fullName = addslashes($_POST['full_name']);
$active = addslashes($_POST['active']);
if(empty($firstName . $lastName . $active)){
    $output['message'] = 'fill out all fields';
    $output['success'] = false;
    $output = json_encode($output);
    print($output);
    die("Error");
}
$encrypted_pass = sha1($password);
$password = " ";
$output = [];

$query = "INSERT INTO people (first_name, last_name, full_name, active) 
          VALUES ('$firstName' , '$lastName' , '$fullName', '$active')";

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

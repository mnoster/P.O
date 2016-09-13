<?php
session_start();
include('mysql_connect.php');
if ($conn->connect_error) {
    die("Connection failed ");
}
$firstName = addslashes($_POST['first_name']);
$lastName = addslashes($_POST['last_name']);
$form = addslashes($_POST['form']);
$fullName = $firstName ." ". $lastName;
$active = addslashes($_POST['active']);
//
//if(empty($firstName . $lastName . $active . $form)){
//    $output['message'] = 'fill out all fields';
//    $output['success'] = false;
//    $output = json_encode($output);
//    print($output);
//    die("Error");
//}

$output = [];

$query = "INSERT INTO names (first_name, last_name, full_name, active, form) 
          VALUES ('$firstName' , '$lastName' , '$fullName', '$active', '$form')";

mysqli_query($conn,$query);


$rows_affected = mysqli_affected_rows($conn);

if($rows_affected > 0){
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

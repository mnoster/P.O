<?php
session_start();
include('mysql_connect.php');
if ($conn->connect_error) {
    die("Connection failed ");
}


$first_name =addslashes($_SESSION['first_name']);
$first_name = sha1($first_name);
$last_name =addslashes($_SESSION['last_name']);
$last_name = sha1($last_name);
$notes =addslashes($_SESSION['notes']);
$dr_ID = addslashes($_SESSION['ID']);
$active = addslashes($_SESSION['active']);
$form = addslashes($_SESSION['form']);
$query = "INSERT INTO names (first_name, last_name, notes, dr_ID, active, form) VALUES ('$first_name' , '$last_name' , '$notes','$dr_ID','$active','$form')";
mysqli_query($conn,$query);

$rows_affected = mysqli_affected_rows($conn);

if($rows_affected > 0){
    $_SESSION['username'] = $username;
    $output['message'] = 'success';
    $output['success'] = true;
    $output = json_encode($output);
    print($output);
}else{
    $output['message'] = 'Account not updated';
    $output['success'] = false;
    $output = json_encode($output);
    print($output);
}

?>


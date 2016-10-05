<?php
session_start();
include('mysql_connect.php');
if ($conn->connect_error) {
    die("Connection failed ");
}

$first_name = addslashes($_SESSION['first_name']);
$last_name = addslashes($_SESSION['last_name']);
$notes = addslashes($_SESSION['notes']);
$dr_ID = addslashes($_SESSION['ID']);
$_SESSION['active'] = 'true';
$active = $_SESSION['active'];
$form = addslashes($_SESSION['form']);
$full_name = $first_name . " " . $last_name;

$query = "INSERT INTO names (first_name, last_name, full_name, notes, dr_ID, active, form) 
          VALUES ('$first_name' , '$last_name' ,'$full_name', '$notes','$dr_ID','$active','$form')";

mysqli_query($conn, $query);
$rows_affected = mysqli_affected_rows($conn);

if ($rows_affected > 0) {
    $query2 = "SELECT ID FROM names 
            WHERE full_name ='$full_name' 
            ORDER BY date_added DESC LIMIT 1 ";
    $result = mysqli_query($conn, $query2);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output['name_ID']=$row['ID'];
        };
        $output['status'] = 'success';
        $output = json_encode($output);
        print($output);
    }
}
else{
    $output['message'] = 'Account not updated';
    $output['success'] = false;
    $output = json_encode($output);
    print($output);
}

?>


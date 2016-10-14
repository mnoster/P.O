<?php
$output = [];
if(empty($_POST['username']) || empty($_POST['password'])){
    $output['message'][] = "fill out both fields";
    die();
};
$username = mysqli_real_escape_string($conn,$_POST['username']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
//$encrypted_pass = password_hash($password, PASSWORD_DEFAULT);
$encrypted_pass = sha1($password);

$password = "";
$output = [];

$query = "SELECT * FROM `users` WHERE `username` = '$username' AND `password`='$encrypted_pass'";

$result=mysqli_query($conn,$query);


$rows_affected = mysqli_affected_rows($conn);
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $_SESSION['username'] = $row["username"];
        $_SESSION["ID"]=$row["ID"];
    }
} else {
    echo "0 results";
}

if($rows_affected > 0){
    $_SESSION['username'] = $username;
    $output['message'] = 'success';
    $output['success'] = true;
    $_SESSION['active'] = 'true';
    $output = json_encode($output);
    print($output);
}else{
    $output['message'] = 'INCORRECT USER INFO';
    $output['success'] = false;
    $output = json_encode($output);
    print($output);
}
?>
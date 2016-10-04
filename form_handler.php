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

$user_ID = $name_id;
$clinician_ID = addslashes($_SESSION['ID']);

if(empty($_POST['age'])){
    $age = "";
}else{
    $age = addslashes($_POST['age']);
};
if(empty($_POST['ethnicity'])){
    $ethnicity ="";
}else{
    $ethnicity =addslashes($_POST['ethnicity']);
};
if(empty($_POST['gender'])){
    $gender ="";
}else{
    $gender =addslashes($_POST['gender']);
}
if(empty($_POST['country'])){
    $country ="";
}else{
    $country =addslashes($_POST['country']);
};
if(empty($_POST['state'])){
    $state ="";
}else{
    $state =addslashes($_POST['state']);
};
if(empty($_POST['relationship_status'])){
    $relationship_status ="";
}else{
    $relationship_status =addslashes($_POST['relationship_status']);
}
if(empty($_POST['education'])){
    $education ="";
}else{
    $education =addslashes($_POST['education']);
}
if(empty($_POST['sexual_orientation'])){
    $sexual_orientation ="";
}else{
    $sexual_orientation =addslashes($_POST['sexual_orientation']);
}
if(empty($_POST['number_of_children'])){
    $number_of_children ="";
}else{
    $number_of_children =addslashes($_POST['number_of_children']);
}
if(empty($_POST['employed'])){
    $employed="";
}else{
    $employed =addslashes($_POST['employed']);
}
if(empty($_POST['religion'])){
    $religion ="";
}else{
    $religion =addslashes($_POST['religion']);
}
if(empty($_POST['parental_situation'])){
    $parental_situation ="";
}else{
    $parental_situation =addslashes($_POST['parental_situation']);
}
if(empty($_POST['veteran'])){
    $veteran ="";
}else{
    $veteran =addslashes($_POST['veteran']);
}
if(empty($_POST['brain_trauma'])){
    $brain_trauma ="";
}else{
    $brain_trauma =addslashes($_POST['brain_trauma']);
}
if(empty($_POST['arrested'])){
    $arrested ="";
}else{
    $arrested =addslashes($_POST['arrested']);
}
if(empty($_POST['prison'])){
    $prison ="";
}else{
    $prison =addslashes($_POST['prison']);
}
if(empty($_POST['drug_abuse'])){
    $drug_abuse ="";
}else{
    $drug_abuse =addslashes($_POST['drug_abuse']);
}
if(empty($_POST['current_medications'])){
    $current_medications ="";
}else{
    $current_medications =addslashes($_POST['current_medications']);
}
if(empty($_POST['homeless'])){
    $homeless ="";
}else{
    $homeless =addslashes($_POST['homeless']);
}
if(empty($_POST['physical'])){
    $physical ="";
}else{
    $physical =addslashes($_POST['physical']);
}
if(empty($_POST['years_therapy'])){
    $years_therapy ="";
}else{
    $years_therapy =addslashes($_POST['years_therapy']);
}

//------diagnosis------------------
if(empty($_POST['1st_Past_Diagnosis'])){
    $first_Diagnosis ="";
}else{
    $first_Diagnosis =addslashes($_POST['1st_Past_Diagnosis']);
}
if(empty($_POST['2nd_Past_Diagnosis'])){
    $second_Diagnosis ="";
}else{
    $second_Diagnosis =addslashes($_POST['2nd_Past_Diagnosis']);
}
if(empty($_POST['3rd_Past_Diagnosis'])){
    $third_Diagnosis ="";
}else{
    $third_Diagnosis =addslashes($_POST['3rd_Past_Diagnosis']);
}
if(empty($_POST['4th_Past_Diagnosis'])){
    $forth_Diagnosis ="";
}else{
    $forth_Diagnosis =addslashes($_POST['4th_Past_Diagnosis']);
}
if(empty($_POST['5th_Past_Diagnosis'])){
    $fifth_Diagnosis ="";
}else{
    $fifth_Diagnosis =addslashes($_POST['5th_Past_Diagnosis']);
}
if(empty($_POST['6th_Past_Diagnosis'])){
    $sixth_Diagnosis ="";
}else{
    $sixth_Diagnosis =addslashes($_POST['6th_Past_Diagnosis']);
}
if(empty($_POST['7th_Past_Diagnosis'])){
    $seventh_Diagnosis ="";
}else{
    $seventh_Diagnosis =addslashes($_POST['7th_Past_Diagnosis']);
}
if(empty($_POST['8th_Past_Diagnosis'])){
    $eighth_Diagnosis ="";
}else{
    $eighth_Diagnosis =addslashes($_POST['8th_Past_Diagnosis']);
}
//-----------treatments--------

if(empty($_POST['1st_treatment'])){
    $first_treatment ="";
}else{
    $first_treatment =addslashes($_POST['1st_treatment']);
}
if(empty($_POST['2nd_treatment'])){
    $second_treatment ="";
}else{
    $second_treatment =addslashes($_POST['2nd_treatment']);
}
if(empty($_POST['3rd_treatment'])){
    $third_treatment ="";
}else{
    $third_treatment =addslashes($_POST['3rd_treatment']);
}
if(empty($_POST['4th_treatment'])){
    $forth_treatment ="";
}else{
    $forth_treatment =addslashes($_POST['4th_treatment']);
}
if(empty($_POST['5th_treatment'])){
    $fifth_treatment ="";
}else{
    $fifth_treatment =addslashes($_POST['5th_treatment']);
}
if(empty($_POST['6th_treatment'])){
    $sixth_treatment ="";
}else{
    $sixth_treatment =addslashes($_POST['6th_treatment']);
}
if(empty($_POST['7th_treatment'])){
    $seventh_treatment ="";
}else{
    $seventh_treatment =addslashes($_POST['7th_treatment']);
}
if(empty($_POST['8th_treatment'])){
    $eighth_treatment ="";
}else{
    $eighth_treatment =addslashes($_POST['8th_treatment']);
}
//--------therapy------------
if(empty($_POST['1st_therapy'])){
    $first_therapy ="";
}else{
    $first_therapy =addslashes($_POST['1st_therapy']);
}
if(empty($_POST['2nd_therapy'])){
    $second_therapy ="";
}else{
    $second_therapy =addslashes($_POST['2nd_therapy']);
}
if(empty($_POST['3rd_therapy'])){
    $third_therapy ="";
}else{
    $third_therapy =addslashes($_POST['3rd_therapy']);
}
if(empty($_POST['4th_therapy'])){
    $forth_therapy ="";
}else{
    $forth_therapy =addslashes($_POST['4th_therapy']);
}
if(empty($_POST['5th_therapy'])){
    $fifth_therapy ="";
}else{
    $fifth_therapy =addslashes($_POST['5th_therapy']);
}
if(empty($_POST['6th_therapy'])){
    $sixth_therapy ="";
}else{
    $sixth_therapy =addslashes($_POST['6th_therapy']);
}
if(empty($_POST['7th_therapy'])){
    $seventh_therapy ="";
}else{
    $seventh_therapy =addslashes($_POST['7th_therapy']);
}
if(empty($_POST['8th_therapy'])){
    $eighth_therapy ="";
}else{
    $eighth_therapy =addslashes($_POST['8th_therapy']);
}
//--------success----------
if(empty($_POST['1st_success'])){
    $first_success ="";
}else{
    $first_success =addslashes($_POST['1st_success']);
}
if(empty($_POST['2nd_success'])){
    $second_success ="";
}else{
    $second_success =addslashes($_POST['2nd_success']);
}
if(empty($_POST['3rd_success'])){
    $third_success ="";
}else{
    $third_success =addslashes($_POST['3rd_success']);
}
if(empty($_POST['4th_success'])){
    $forth_success ="";
}else{
    $forth_success =addslashes($_POST['4th_success']);
}
if(empty($_POST['5th_success'])){
    $fifth_success ="";
}else{
    $fifth_success =addslashes($_POST['5th_success']);
}
if(empty($_POST['6th_success'])){
    $sixth_success ="";
}else{
    $sixth_success =addslashes($_POST['6th_success']);
}
if(empty($_POST['7th_success'])){
    $seventh_success ="";
}else{
    $seventh_success =addslashes($_POST['7th_success']);
}
if(empty($_POST['8th_success'])){
    $eighth_success ="";
}else{
    $eighth_success =addslashes($_POST['8th_success']);
}


$full_name = $first_name ." ". $last_name;
//$full_name = password_hash($full_name, PASSWORD_DEFAULT);
$first_name = " ";
$last_name = " ";
$output = [];

$query = "UPDATE people SET full_name='$full_name', clinician_ID='$clinician_ID', age='$age', gender='$gender', ethnicity='$ethnicity', state='$state', country='$country', parental_situation='$parental_situation','$country', relationship_status='$relationship_status', number_of_children='$number_of_children', brain_trauma='$brain_trauma', education='$education',
 1st_Past_Diagnosis='$first_Diagnosis', 2nd_Past_Diagnosis='$second_Diagnosis', 3rd_Past_Diagnosis='$third_Diagnosis', 4th_Past_Diagnosis='$forth_Diagnosis', 5th_Past_Diagnosis='$fifth_Diagnosis', 6th_Past_Diagnosis='$sixth_Diagnosis', 7th_Past_Diagnosis='$seventh_Diagnosis', 8th_Past_Diagnosis='$eighth_Diagnosis',
 1st_treatment='$first_treatment', 2nd_treatment='$second_treatment', 3rd_treatment='$third_treatment', 4th_treatment='$forth_treatment', 5th_treatment='$fifth_treatment', 6th_treatment='$sixth_treatment', 7th_treatment='$seventh_treatment', 8th_treatment='$eighth_treatment',
 1st_therapy='$first_therapy', 2nd_therapy='$second_therapy', 3rd_therapy='$third_therapy', 4th_therapy='$forth_therapy', 5th_therapy='$fifth_therapy', 6th_therapy='$sixth_therapy', 7th_therapy='$seventh_therapy', 8th_therapy='$eighth_therapy'
 1st_success='$first_success', 2nd_success='$second_success', 3rd_success='$third_success', 4th_success='$forth_success', 5th_success='$fifth_success', 6th_success='$sixth_success', 7th_success='$seventh_success', 8th_success='$eighth_success',
 Arrested='$arrested', Prison='$prison', Employed='$employed', sexual_orientation='$sexual_orientation', current_medications='$current_medications', homeless='$homeless',religion = '$religion',veteran = '$veteran',drug_abuse='$drug_abuse',physical_activity='$physical',years_therapy='$years_therapy') WHERE client_ID = $user_ID";

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


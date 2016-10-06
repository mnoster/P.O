<?php
session_start();
include('mysql_connect.php');
if ($conn->connect_error) {
    die("Connection failed ");
}
$name_ID =  addslashes($_SESSION['name_ID']);
$name_ID = (int)$name_ID;
$_POST = $_POST['form'];

if(empty($_POST['selectedAge'])){
$age = "";
}else{
$age = addslashes($_POST['selectedAge']);
};
if(empty($_POST['selectedEthnicity'])){
$ethnicity ="";
}else{
$ethnicity =addslashes($_POST['selectedEthnicity']);
};
if(empty($_POST['selectedGender'])){
$gender ="";
}else{
$gender =addslashes($_POST['selectedGender']);
}
if(empty($_POST['selectedCountry'])){
$country ="";
}else{
$country =addslashes($_POST['selectedCountry']);
};
if(empty($_POST['selectedState'])){
$state ="";
}else{
$state =addslashes($_POST['selectedState']);
};
if(empty($_POST['selectedRelationship'])){
$relationship_status ="";
}else{
$relationship_status =addslashes($_POST['selectedRelationship']);
}
if(empty($_POST['selectedEducation'])){
$education ="";
}else{
$education =addslashes($_POST['selectedEducation']);
}
if(empty($_POST['selectedOrientation'])){
$sexual_orientation ="";
}else{
$sexual_orientation =addslashes($_POST['selectedOrientation']);
}
if(empty($_POST['selectedChildren'])){
$number_of_children ="";
}else{
$number_of_children =addslashes($_POST['selectedChildren']);
}
if(empty($_POST['selectedEmployment'])){
$employed="";
}else{
$employed =addslashes($_POST['selectedEmployment']);
}
if(empty($_POST['selectedReligion'])){
$religion ="";
}else{
$religion =addslashes($_POST['selectedReligion']);
}
if(empty($_POST['selectedParentStatus'])){
$parental_situation ="";
}else{
$parental_situation =addslashes($_POST['selectedParentStatus']);
}
if(empty($_POST['selectedVeteran'])){
$veteran ="";
}else{
$veteran =addslashes($_POST['selectedVeteran']);
}
if(empty($_POST['selectedBrainTrauma'])){
$brain_trauma ="";
}else{
$brain_trauma =addslashes($_POST['selectedBrainTrauma']);
}
if(empty($_POST['selectedArrested'])){
$arrested ="";
}else{
$arrested =addslashes($_POST['selectedArrested']);
}
if(empty($_POST['selectedPrison'])){
$prison ="";
}else{
$prison =addslashes($_POST['selectedPrison']);
}
if(empty($_POST['selectedDrugProblems'])){
$drug_abuse ="";
}else{
$drug_abuse =addslashes($_POST['selectedDrugProblems']);
}
if(empty($_POST['current_medications'])){
$current_medications ="";
}else{
$current_medications =addslashes($_POST['current_medications']);
}
if(empty($_POST['selectedParentHealth'])){
    $parent_health ="";
}else{
    $parent_health =addslashes($_POST['selectedParentHealth']);
}
if(empty($_POST['selectedHomeless'])){
$homeless ="";
}else{
$homeless =addslashes($_POST['selectedHomeless']);
}
if(empty($_POST['selectedActivity'])){
$physical ="";
}else{
$physical =addslashes($_POST['selectedActivity']);
}
if(empty($_POST['selectedYears'])){
$years_therapy ="";
}else{
$years_therapy =addslashes($_POST['selectedYears']);
}

//------diagnosis------------------
if(empty($_POST['firstDiagnosis'])){
$first_Diagnosis ="";
}else{
$first_Diagnosis =addslashes($_POST['firstDiagnosis']);
}
if(empty($_POST['secondDiagnosis'])){
$second_Diagnosis ="";
}else{
$second_Diagnosis =addslashes($_POST['secondDiagnosis']);
}
if(empty($_POST['thirdDiagnosis'])){
$third_Diagnosis ="";
}else{
$third_Diagnosis =addslashes($_POST['thirdDiagnosis']);
}
if(empty($_POST['forthDiagnosis'])){
$forth_Diagnosis ="";
}else{
$forth_Diagnosis =addslashes($_POST['forthDiagnosis']);
}
if(empty($_POST['fifthDiagnosis'])){
$fifth_Diagnosis ="";
}else{
$fifth_Diagnosis =addslashes($_POST['fifthDiagnosis']);
}
if(empty($_POST['sixthDiagnosis'])){
$sixth_Diagnosis ="";
}else{
$sixth_Diagnosis =addslashes($_POST['sixthDiagnosis']);
}
if(empty($_POST['seventhDiagnosis'])){
$seventh_Diagnosis ="";
}else{
$seventh_Diagnosis =addslashes($_POST['seventhDiagnosis']);
}
if(empty($_POST['eighthDiagnosis'])){
$eighth_Diagnosis ="";
}else{
$eighth_Diagnosis =addslashes($_POST['eighthDiagnosis']);
}
//-----------treatments--------

if(empty($_POST['firstMedication'])){
$first_treatment ="";
}else{
$first_treatment =addslashes($_POST['firstMedication']);
}
if(empty($_POST['secondMedication'])){
$second_treatment ="";
}else{
$second_treatment =addslashes($_POST['secondMedication']);
}
if(empty($_POST['thirdMedication'])){
$third_treatment ="";
}else{
$third_treatment =addslashes($_POST['thirdMedication']);
}
if(empty($_POST['forthMedication'])){
$forth_treatment ="";
}else{
$forth_treatment =addslashes($_POST['forthMedication']);
}
if(empty($_POST['fifthMedication'])){
$fifth_treatment ="";
}else{
$fifth_treatment =addslashes($_POST['fifthMedication']);
}
if(empty($_POST['sixthMedication'])){
$sixth_treatment ="";
}else{
$sixth_treatment =addslashes($_POST['sixthMedication']);
}
if(empty($_POST['seventhMedication'])){
$seventh_treatment ="";
}else{
$seventh_treatment =addslashes($_POST['seventhMedication']);
}
if(empty($_POST['eighthMedication'])){
$eighth_treatment ="";
}else{
$eighth_treatment =addslashes($_POST['eighthMedication']);
}
//--------therapy------------
if(empty($_POST['firstTreatment'])){
$first_therapy ="";
}else{
$first_therapy =addslashes($_POST['firstTreatment']);
}
if(empty($_POST['secondTreatment'])){
$second_therapy ="";
}else{
$second_therapy =addslashes($_POST['secondTreatment']);
}
if(empty($_POST['thirdTreatment'])){
$third_therapy ="";
}else{
$third_therapy =addslashes($_POST['thirdTreatment']);
}
if(empty($_POST['forthTreatment'])){
$forth_therapy ="";
}else{
$forth_therapy =addslashes($_POST['forthTreatment']);
}
if(empty($_POST['fifthTreatment'])){
$fifth_therapy ="";
}else{
$fifth_therapy =addslashes($_POST['fifthTreatment']);
}
if(empty($_POST['sixthTreatment'])){
$sixth_therapy ="";
}else{
$sixth_therapy =addslashes($_POST['sixthTreatment']);
}
if(empty($_POST['seventhTreatment'])){
$seventh_therapy ="";
}else{
$seventh_therapy =addslashes($_POST['seventhTreatment']);
}
if(empty($_POST['eighthTreatment'])){
$eighth_therapy ="";
}else{
$eighth_therapy =addslashes($_POST['eighthTreatment']);
}
//--------success----------
if(empty($_POST['firstTreatmentSuccess'])){
$first_success ="";
}else{
$first_success =addslashes($_POST['firstTreatmentSuccess']);
}
if(empty($_POST['secondTreatmentSuccess'])){
$second_success ="";
}else{
$second_success =addslashes($_POST['secondTreatmentSuccess']);
}
if(empty($_POST['thirdTreatmentSuccess'])){
$third_success ="";
}else{
$third_success =addslashes($_POST['thirdTreatmentSuccess']);
}
if(empty($_POST['forthTreatmentSuccess'])){
$forth_success ="";
}else{
$forth_success =addslashes($_POST['forthTreatmentSuccess']);
}
if(empty($_POST['fifthTreatmentSuccess'])){
$fifth_success ="";
}else{
$fifth_success =addslashes($_POST['fifthTreatmentSuccess']);
}
if(empty($_POST['sixthTreatmentSuccess'])){
$sixth_success ="";
}else{
$sixth_success =addslashes($_POST['sixthTreatmentSuccess']);
}
if(empty($_POST['seventhTreatmentSuccess'])){
$seventh_success ="";
}else{
$seventh_success =addslashes($_POST['seventhTreatmentSuccess']);
}
if(empty($_POST['eighthTreatmentSuccess'])){
$eighth_success ="";
}else{
$eighth_success =addslashes($_POST['eighthTreatmentSuccess']);
}

$output = [];

$query = "UPDATE people SET  age='$age', gender='$gender', ethnicity='$ethnicity', state='$state', country='$country', parental_situation='$parental_situation', relationship_status='$relationship_status', number_of_children='$number_of_children', brain_trauma='$brain_trauma', education='$education',
1st_Diagnosis='$first_Diagnosis', 2nd_Diagnosis='$second_Diagnosis', 3rd_Diagnosis='$third_Diagnosis', 4th_Diagnosis='$forth_Diagnosis', 5th_Diagnosis='$fifth_Diagnosis', 6th_Diagnosis='$sixth_Diagnosis', 7th_Diagnosis='$seventh_Diagnosis', 8th_Diagnosis='$eighth_Diagnosis',
1st_treatment='$first_treatment', 2nd_treatment='$second_treatment', 3rd_treatment='$third_treatment', 4th_treatment='$forth_treatment', 5th_treatment='$fifth_treatment', 6th_treatment='$sixth_treatment', 7th_treatment='$seventh_treatment', 8th_treatment='$eighth_treatment',
1st_therapy='$first_therapy', 2nd_therapy='$second_therapy', 3rd_therapy='$third_therapy', 4th_therapy='$forth_therapy', 5th_therapy='$fifth_therapy', 6th_therapy='$sixth_therapy', 7th_therapy='$seventh_therapy', 8th_therapy='$eighth_therapy',
1st_success='$first_success', 2nd_success='$second_success', 3rd_success='$third_success', 4th_success='$forth_success', 5th_success='$fifth_success', 6th_success='$sixth_success', 7th_success='$seventh_success', 8th_success='$eighth_success',
Arrested='$arrested', Prison='$prison', Employed='$employed', sexual_orientation='$sexual_orientation', homeless='$homeless',religion = '$religion',veteran = '$veteran',drug_abuse='$drug_abuse',physical_activity='$physical',years_therapy='$years_therapy',parent_health = '$parent_health' WHERE name_ID = $name_ID";

mysqli_query($conn,$query);

$rows_affected = mysqli_affected_rows($conn);

if($rows_affected > 0){
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
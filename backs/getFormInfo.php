<?php
$ID = $_SESSION['ID'];
$output = [];

$fullname = addslashes($_POST['name']);
$date = addslashes($_POST['date']);


$query = "SELECT ID,first_name,last_name FROM names WHERE dr_id = '$ID' AND full_name='$fullname' AND date_added='$date'";

$result = mysqli_query($conn, $query);
$fullname = [];
//$rows_affected = mysqli_affected_rows($conn);
//print($rows_affected);
if ($result->num_rows < 0) {
    $output['message'] = 'there is an issue with retrieving client form data';
    $output = json_encode($output);
};
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output['first_name']= $row['first_name'];
        $output['last_name'] = $row['last_name'];
        $output['date_added'] = $date;
        $output['name_ID'] = $row['ID'];
        $name_ID = $row['ID'];

    };
    $query2 = "SELECT * FROM people WHERE name_ID='$name_ID' AND clinician_ID = '$ID'";
    $result2 = mysqli_query($conn, $query2);
    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            $output['age'] = $row['age'];
            $output['gender'] = $row['gender'];
            $output['state'] = $row['state'];
            $output['ethnicity'] = $row['ethnicity'];
            $output['country'] = $row['country'];
            $output['employed'] = $row['Employed'];
            $output['relationship_status'] = $row['relationship_status'];
            $output['sexual_orientation'] = $row['sexual_orientation'];
            $output['religion'] = $row['religion'];
            $output['education'] = $row['education'];
            $output['number_of_children'] = $row['number_of_children'];
            $output['parent_status'] = $row['parental_situation'];
            $output['physical_activity'] = $row['physical_activity'];
            $output['homeless'] = $row['homeless'];
            $output['veteran'] = $row['veteran'];
            $output['prison'] = $row['Prison'];
            $output['arrested'] = $row['Arrested'];
            $output['drug_abuse'] = $row['drug_abuse'];
            $output['parent_health'] = $row['parent_health'];
            $output['years_therapy'] = $row['years_therapy'];

            //build session
            $_SESSION['age'] = $row['age'];
            $_SESSION['gender'] = $row['gender'];
            $_SESSION['state'] = $row['state'];
            $_SESSION['ethnicity'] = $row['ethnicity'];
            $_SESSION['country'] = $row['country'];
            $_SESSION['employed'] = $row['Employed'];
            $_SESSION['relationship_status'] = $row['relationship_status'];
            $_SESSION['sexual_orientation'] = $row['sexual_orientation'];
            $_SESSION['religion'] = $row['religion'];
            $_SESSION['education'] = $row['education'];
            $_SESSION['number_of_children'] = $row['number_of_children'];
            $_SESSION['parent_status'] = $row['parental_situation'];
            $_SESSION['physical_activity'] = $row['physical_activity'];
            $_SESSION['homeless'] = $row['homeless'];
            $_SESSION['veteran'] = $row['veteran'];
            $_SESSION['prison'] = $row['Prison'];
            $_SESSION['arrested'] = $row['Arrested'];
            $_SESSION['drug_abuse'] = $row['drug_abuse'];
            $_SESSION['parent_health'] = $row['parent_health'];
            $_SESSION['years_therapy'] = $row['years_therapy'];


        };
        $output['status'] = 'success';
        $output = json_encode($output);
        print($output);
    }


}
?>
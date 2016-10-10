<?php
$ID = $_SESSION['ID'];
$output = [];

$query = "SELECT * FROM names WHERE dr_id = '$ID' ORDER BY full_name";

$result = mysqli_query($conn, $query);

//$rows_affected = mysqli_affected_rows($conn);
//print($rows_affected);
if ($result->num_rows < 0) {
    $output['message'][] = 'this user has no friends';
    $output = json_encode($output);
};
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output['client']['full_name'][] = $row['full_name'];
        $output['client']["active"][] = $row['active'];
        $output['client']['form'][] = $row['form'];
        $output['client']['date_added'][] = $row['date_added'];
//        $output['timestamp'][] = $row['timestamp'];
    };
    $output['status'] = 'success';
    $output = json_encode($output);
    print($output);
}
?>
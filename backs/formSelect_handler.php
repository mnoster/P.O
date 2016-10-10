<?php

$output = $_POST['form'];
$output = addslashes($output);
$_SESSION['form'] = $output;
$output = json_encode($output);
print($output);

?>
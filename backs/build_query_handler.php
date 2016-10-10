<?php

$_SESSION['query'] = $_POST['search_query'];
$output = $_SESSION['query'];
print(json_encode($output));
?>
<?php
session_start();
include('mysql_connect.php');
if ($conn->connect_error) {
    die("Connection failed ");
}

    if($_POST['keyword'] == 'login'){
        include('login_handler.php');
    }else if($_POST['keyword'] == 'logout') {
        include('logout_handler.php');
    }else if($_POST['keyword'] == 'searchData'){
        include('build_query_handler.php');
    } else if($_POST['keyword'] == 'clientData'){
        include('add_client_handler.php');
    }else if($_POST['keyword'] == 'getClients'){
        include('get_clients_handler.php');
    }else if($_POST['keyword'] == 'getFormInfo'){
        include('getFormInfo.php');
    }else if($_POST['keyword'] == 'clientSetup'){
        include('clientSetup_handler.php');
    }else if($_POST['keyword'] == 'formSelect'){
        include('formSelect_handler.php');
    }else if($_POST['keyword'] == 'form'){
        include ('form_handler.php');
    }



?>
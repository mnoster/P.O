<?php
session_start();
if(empty($_SESSION)){
    header("Location: login.php"); /* Redirect browser */
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | PsychOrigins</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
    <script src="http://code.angularjs.org/1.3.15/angular-route.js"></script>
    <script src="main.js"></script>
</head>
<body ng-app="psychoApp">
<nav class="navbar navbar-inverse">
    <div class="contatiner-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#home">PsychOrigins</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#home">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Research <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#dashboard">Dashboard</a></li>
                        <li><a href="#FAQ">FAQ</a></li>
                    </ul>
                </li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            </ul>
        </div>
    </div>
</nav>
<div ng-view></div>
<footer class="footer">
    <div class="container" id="footcontent">
        <p class="text-muted">Copyright 2016 NJP PsychOrigins.com</p>
    </div>
</footer>
</body>
</html>
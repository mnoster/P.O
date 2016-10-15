<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Psych Origins</title>
    <meta name="keywords" content="Psychorigins,Psychorigins.com,academic search, google scholar, mircosoft academic search, psych origins, research, client, manager,free academic articles,PsychInfo,download">
    <meta name="description" content="PsychOrigins.com is a free academic search engine for researchers and health clinicians">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!--    Goog Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Eczar" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
    <!--    AOS -->
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="Images/Logomakr_0X15Cd.png">
    <link href="main-page.css" type="text/css" rel="stylesheet">

</head>
<body ng-app="psychoApp">
<?php
if (isset($_SESSION['active'])) {
    echo "<span ng-init='active=true'></span>";
    ?>
    <?php
}
?>
<nav class="navbar navbar-inverse" id="nav">
    <div class="contatiner-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#main-page"><img  class="logo" src="Images/Logomakr_0X15Cd.png"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#home">Research</a></li>
                <li class="dropdown">
                    <a ng-show="active" class="dropdown-toggle" data-toggle="dropdown">Tools<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#dashboard">Dashboard</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Info<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#about">About</a></li>
                        <li><a href="#FAQ">FAQ</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li class="last-item"><a href="#compliance">Compliance</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li  ng-show="active"><a href="#logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                <li  ng-hide="active"><a href="http://psychorigins.com/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li  ng-hide="active"><a href="#register">Register</a></li>
            </ul>
        </div>
    </div>
</nav>
<div ng-view></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
<!--    routing-->
<script src="http://code.angularjs.org/1.3.15/angular-route.js"></script>
<!--    AOS script-->
<script src="https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.js"></script>
<script src="main.js"></script>
<script src="register_control.js"></script>
<script src="contact.js"></script>
<!--<script src="form_script.js"></script>-->
<script>AOS.init();</script>
</body>
</html>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | PsychOrigins</title>
    <meta name="keywords" content="Psychorigins,Psychorigins.com,academic search, google scholar, mircosoft academic search, psych origins, research, client, manager,free academic articles,PsychInfo,download">
    <meta name="description" content="PsychOrigins.com is a free academic search engine for researchers and health clinicians">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="Images/Logomakr_0X15Cd.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
    <script src="http://code.angularjs.org/1.3.15/angular-route.js"></script>
    <script src="main.js"></script>
<!--    <script src="login.js"></script>-->
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
            <a class="navbar-brand" href="http://psychorigins.com"><img  class="logo" src="Images/Logomakr_0X15Cd.png" height="200%"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="http://psychorigins.com">Home</a></li>
                <li class="active"><a href="http://psychorigins.com/#/home">Research</a></li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Info<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="http://psychorigins.com/#/about">About</a></li>
                        <li><a href="http://psychorigins.com/#/FAQ">FAQ</a></li>
                        <li><a href="http://psychorigins.com/#/contact">Contact</a></li>
                        <li class="last-item"><a href="http://psychorigins.com/#/compliance">Compliance</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                 <li><a href="http://psychorigins.com/#/register">Register</a></li>
            </ul>
    </div>
</nav>
<div class="container login-background" ng-controller="loginController as lc">
    <div class="hidden-xs col-sm-1 col-md-2"></div>
    <div class="col-xs-12 col-sm-10 col-md-8 login-inner">
        <div class="wrapper">
            <form class="form-signin">
                <h2 class="form-signin-heading">Please login</h2>
                <input ng-model="lc.user.username"  value="" type="text" id="username" class="form-control form-group sharp" name="username" placeholder="username" required=""
                       autofocus/>
                <input ng-model="lc.user.password" id="password" type="password" class="form-control sharp" name="password" placeholder="Password" />
                <label class="checkbox">
                    <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
                </label>
            </form>
            <button type="button" ng-click="lc.getData(lc.user)" class="btn btn-lg btn-primary btn-block login-button sharp">Login</button>
            <br>
            <p>Not a member? Sign up <a href="secret.php">here</a></p>
        </div>
    </div>
</div>
<footer>
    <div class="row footer">
        <img src="Images/hipaa_blue.png" class="hippa" height="75vh" width="160px">

    </div>
</footer>
</body>
</html>
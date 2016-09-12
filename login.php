<?php
session_start();
$_SESSION['username'] = "";
?>
<?php
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
            <a class="navbar-brand">PsychOrigins</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Research <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#FAQ">FAQ</a></li>
                    </ul>
                </li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="#login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container login-background" ng-controller="loginController as lc">
    <div class="col-xs-12 login-inner">
        <div class="wrapper">
            <form class="form-signin">
                <h2 class="form-signin-heading">Please login</h2>
                <input ng-model="lc.user.username"  value="" type="text" id="username" class="form-control" name="username" placeholder="username" required=""
                       autofocus/>
                <input ng-model="lc.user.password" id="password" type="password" class="form-control" name="password" placeholder="Password" />
                <label class="checkbox">
                    <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
                </label>
            </form>
            <button type="button" ng-click="lc.getData(lc.user)" class="btn btn-lg btn-primary btn-block login-button">Login</button>
            <br>
            <p>Not a member? Sign up <a href="secret.php">here</a></p>
        </div>
    </div>
</div>
<footer>
    <div class="row footer">
        <img src="Images/hipaa_blue.png" height="100px" width="200px">
    </div>
</footer>
</body>
</html>
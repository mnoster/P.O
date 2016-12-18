<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Psych Origins</title>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MRH3B8X');
    </script>
    <!-- End Google Tag Manager -->
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
<!-- Google Analytics   -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-88577149-1', 'auto');
        ga('send', 'pageview');
    </script>

</head>
<body ng-app="psychoApp">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MRH3B8X" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
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
                <li ng-show="active"><a href="#logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                <li ng-hide="active"><a href="http://psychorigins.com/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li ng-hide="active"><a href="#contact">Register</a></li>
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
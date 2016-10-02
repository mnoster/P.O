<?php
session_start();
//header('Location: '. 'select_form.php');
?>
<script type='text/javascript'>
    //Since the angular routing is not restoring session on every redirect, the page needs to be refreshed each time
    //this is merely a band-aid approach for now. Need to do more research on solution.
    console.log("hello");
    (function()
    {
        if( window.localStorage )
        {
            if( !localStorage.getItem( 'firstLoad' ) )
            {
                localStorage[ 'firstLoad' ] = true;
                window.location.reload();
            }
            else
                localStorage.removeItem( 'firstLoad' );
        }
    })();
</script>

<div class="container" ng-controller="selectFormController as sfc">
    <h2>Select Form</h2>
    <h3 class="client_name"><?=$_SESSION['first_name'] . ' ' . $_SESSION['last_name']?></h3>
    <hr>
    <div class="row">
        <div class="col-xs-12 col-md-4" ng-model="sfc.form1"  ng-click="sfc.form_type(sfc.form1)">
            <h4>Form 1</h4>
            <a href="#form1"><div class="form-icon glyphicon glyphicon-list-alt"></div></a>
        </div>
        <div class="col-xs-12 col-md-4" ng-model="sfc.form2"  ng-click="sfc.form_type(sfc.form2)">
            <h4>Form 2</h4>
            <a href="#form2"><div class="form-icon glyphicon glyphicon-list-alt"></div></a></div>
        <div class="col-xs-12 col-md-4" ng-model="sfc.form3" ng-click="sfc.form_type(sfc.form3)">
            <h4>Form 3</h4>
            <a href="#form3"><div class="form-icon glyphicon glyphicon-list-alt"></div></a></div>
    </div>
    <div class="row">

    </div>
</div>

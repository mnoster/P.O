<div class="container" ng-controller="selectFormController as sfc">
    <h2>Select Form</h2>
    <hr>
    <div class="row">
        <div class="col-xs-12 col-md-4" ng-init="sfc.form_number ='Form 1'"  ng-click="sfc.form_type()">
            <h4>Form 1</h4>
            <a href="#form1"><div class="form-icon glyphicon glyphicon-list-alt"></div></a>
        </div>
        <div class="col-xs-12 col-md-4"  ng-init="sfc.form_number ='Form 2'"  ng-click="sfc.form_type()">
            <h4>Form 2</h4>
            <a href="#form2"><div class="form-icon glyphicon glyphicon-list-alt"></div></a></div>
        <div class="col-xs-12 col-md-4"   ng-init="sfc.form_number ='Form 3'"  ng-click="sfc.form_type()">
            <h4>Form 3</h4>
            <a href="#form3"><div class="form-icon glyphicon glyphicon-list-alt"></div></a></div>
    </div>
    <div class="row">

    </div>
</div>

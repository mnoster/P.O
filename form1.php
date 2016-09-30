<?php
session_start();
?>
<div class="container" ng-controller="formController as fc">
    <div class="col-md-10 col-sm-12 col-xs 12"  id="logo"  style="z-index: 1">
        <h1 id="about_title">Client Form</h1>
        <form class="client_form">
            <h3 class = 'third_head'>Background Information</h3>
            Ethnicity
            <select name="Ethnicity" class="form-control" ng-model="selectedEthnicity" ng-options="x for x in ethnicity">
                <option disabled selected value> -- select an option -- </option>
<!--                <option value="Asian">Asian / Pacific Islander</option>-->
<!--                <option value="Black">Black or African American</option>-->
<!--                <option value="Hispanic">Hispanic or Latino</option>-->
<!--                <option value="Native">Native American or American Indian</option>-->
<!--                <option value="White">White / Caucasian</option>-->
<!--                <option value="Other">Other</option>-->
            </select>
            <br/>
            Gender
            <select name="Gender" class="form-control" ng-model="selectedGender" ng-options="x for x in gender">
                <option disabled selected value> -- select an option -- </option>

            </select>
            <br/>
            State
            <select name="State" class="form-control" ng-model="selectedState" ng-options="x for x in states">
                <option disabled selected value> -- select an option -- </option>

            </select>
            <br/>
            Relationship Status
            <select name="Relationship Status" class="form-control" ng-model="selectedRelationship" ng-options="x for x in relationship_status">
                <option disabled selected value> -- select an option -- </option>

            </select>
            <br/>
            Education
            <select name="Education" class="form-control" ng-model="selectedEducation" ng-options="x for x in education">
                <option disabled selected value> -- select an option -- </option>
            </select>
            <br/>
            Sexual Orientation
            <select name="Sexual Orientation" class="form-control" ng-model="selectedOrientation" ng-options="x for x in sexual_orientation">
                <option disabled selected value> -- select an option -- </option>

            </select>
            <br/>
            Number of Children
            <select name="Children" class="form-control" ng-model="selectedChildren" ng-options="x for x in children">
                <option disabled selected value> -- select an option -- </option>

            </select>
            
            

            <input type="submit">
        </form>
        <form  class="client_form second-form" >
            <h3 class ="third_head">Past Treatment</h3>
            Combined Years of Therapy
            <select name="Length of Therapy" class="form-control" ng-model="selectedYears" ng-options="x for x in therapy_years">
                <option disabled selected value> -- select an option -- </option>
            </select>
            <br/>
            Reason for visit
            <select name="Reason of visit" class="form-control">
                <option disabled selected value> -- select an option -- </option>

            </select>
        </form>
    </div>
    <footer>
        <div class="row footer"  style="z-index: 0; margin-right:80px">
            <img src="Images/hipaa_blue.png" height="100px" width="200px">
        </div>
    </footer>
</div>

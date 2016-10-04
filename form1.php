<?php
session_start();
?>
<div class="container" ng-controller="formController as fc">
    <div class=" col-sm-12 col-md-10" id="logo" style="z-index: 1">
        <h1 id="about_title">Client Form</h1>
        <form class="client_form">
            <h3 class='third_head'>Background Information</h3>
            Ethnicity
            <select name="Ethnicity" class="form-control" ng-model="selectedEthnicity"
                    ng-options="x for x in ethnicity">
                <option disabled selected value> -- select an option --</option>
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
                <option disabled selected value> -- select an option --</option>

            </select>
            <br/>
            Country
            <select name="State" class="form-control" ng-model="selectedState" ng-options="x for x in country">
                <option disabled selected value> -- select an option --</option>

            </select>
            <br/>
            State
            <select name="State" class="form-control" ng-model="selectedState" ng-options="x for x in states">
                <option disabled selected value> -- select an option --</option>

            </select>
            <br/>
            Relationship Status
            <select name="Relationship Status" class="form-control" ng-model="selectedRelationship"
                    ng-options="x for x in relationship_status">
                <option disabled selected value> -- select an option --</option>

            </select>
            <br/>
            Education
            <select name="Education" class="form-control" ng-model="selectedEducation"
                    ng-options="x for x in education">
                <option disabled selected value> -- select an option --</option>
            </select>
            <br/>
            Sexual Orientation
            <select name="Sexual Orientation" class="form-control" ng-model="selectedOrientation"
                    ng-options="x for x in sexual_orientation">
                <option disabled selected value> -- select an option --</option>

            </select>
            <br/>
            Number of Children
            <select name="Children" class="form-control" ng-model="selectedChildren" ng-options="x for x in children">
                <option disabled selected value> -- select an option --</option>

            </select>
            <br/>
            Do you have military combat experience?
            <select name="Veteran" class="form-control" ng-model="selectedVeteran">
                <option disabled selected value> -- select an option --</option>
                <option> Yes</option>
                <option> No</option>
            </select>
            <input type="submit">
        </form>
        <br>
        <form class="client_form second-form">
            <h3 class="third_head">Past Treatment</h3>
            Combined Years of Therapy
            <select name="Length of Therapy" class="form-control" ng-model="selectedYears"
                    ng-options="x for x in therapy_years">
                <option disabled selected value> -- select an option --</option>
            </select>
            <br/>
            Number of Past Diagnosis's
            <select name="Past Diagnosis" class="form-control" ng-model="selectedNumberDiagnosis" ng-value="fc.displayDiagnosisFields(selectedNumberDiagnosis)"
                    ng-options="x for x in num_of_diagnosis">
                <option disabled selected value> -- select an option --</option>
            </select>
            <br/>
<!--            <diagnosis></diagnosis>-->
            <div class="container-fluid" ng-show="fc.oneField">
                <div class="row">
                    <div class="col-xs-3"><strong>Diagnosis 1 </strong></div>
                    <div class="col-xs-9">
                        <select name="First Diagnosis" class="form-control" ng-model="firstDiagnosis"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment 1</strong></div>
                    <div class="col-xs-9">
                        <select name="First Diagnosis" class="form-control" ng-model="firstTreatment"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment Successful?</strong></div>
                    <div class="col-xs-9">
                        <select name="Past Diagnosis" class="form-control" ng-model="firstTreatmentSuccess">
                            <option disabled selected value> -- select an option --</option>
                            <option> Yes</option>
                            <option> No</option>
                            <option> Temporarily</option>
                        </select>
                    </div>
                </div>
                <br>
            </div>
            <div class="container-fluid" ng-show="fc.twoFields">
                <div class="row">
                    <div class="col-xs-3"><strong>Diagnosis 2 </strong></div>
                    <div class="col-xs-9">
                        <select name="Second Diagnosis" class="form-control" ng-model="secondDiagnosis"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment 2</strong></div>
                    <div class="col-xs-9">
                        <select name="Second Diagnosis" class="form-control" ng-model="secondTreatment"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment Successful?</strong></div>
                    <div class="col-xs-9">
                        <select name="Past Diagnosis" class="form-control" ng-model="secondTreatmentSuccess">
                            <option disabled selected value> -- select an option --</option>
                            <option> Yes</option>
                            <option> No</option>
                            <option> Temporarily</option>
                        </select>
                    </div>
                </div>
                <br>
            </div>
            <div class="container-fluid" ng-show="fc.threeFields">
                <div class="row">
                    <div class="col-xs-3"><strong>Diagnosis 3 </strong></div>
                    <div class="col-xs-9">
                        <select name="Third Diagnosis" class="form-control" ng-model="ThirdDiagnosis"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment 3</strong></div>
                    <div class="col-xs-9">
                        <select name="Third Diagnosis" class="form-control" ng-model="thirdTreatment"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment Successful?</strong></div>
                    <div class="col-xs-9">
                        <select name="Past Diagnosis" class="form-control" ng-model="thirdTreatmentSuccess">
                            <option disabled selected value> -- select an option --</option>
                            <option> Yes</option>
                            <option> No</option>
                            <option> Temporarily</option>
                        </select>
                    </div>
                </div>
                <br>
            </div>
            <div class="container-fluid" ng-show="fc.fourFields">
                <div class="row">
                    <div class="col-xs-3"><strong>Diagnosis 4 </strong></div>
                    <div class="col-xs-9">
                        <select name="Four Diagnosis" class="form-control" ng-model="fourDiagnosis"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment 4</strong></div>
                    <div class="col-xs-9">
                        <select name="Forth Diagnosis" class="form-control" ng-model="forthTreatment"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment Successful?</strong></div>
                    <div class="col-xs-9">
                        <select name="Past Diagnosis" class="form-control" ng-model="forthTreatmentSuccess">
                            <option disabled selected value> -- select an option --</option>
                            <option> Yes</option>
                            <option> No</option>
                            <option> Temporarily</option>
                        </select>
                    </div>
                </div>
                <br>
            </div>
            <div class="container-fluid" ng-show="fc.fiveFields">
                <div class="row">
                    <div class="col-xs-3"><strong>Diagnosis 5 </strong></div>
                    <div class="col-xs-9">
                        <select name="Fifth Diagnosis" class="form-control" ng-model="fifthDiagnosis"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment 5</strong></div>
                    <div class="col-xs-9">
                        <select name="Fifth Diagnosis" class="form-control" ng-model="fifthTreatment"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment Successful?</strong></div>
                    <div class="col-xs-9">
                        <select name="Past Diagnosis" class="form-control" ng-model="fifthTreatmentSuccess">
                            <option disabled selected value> -- select an option --</option>
                            <option> Yes</option>
                            <option> No</option>
                            <option> Temporarily</option>
                        </select>
                    </div>
                </div>
                <br>
            </div>
            <div class="container-fluid" ng-show="fc.sixFields">
                <div class="row">
                    <div class="col-xs-3"><strong>Diagnosis 6 </strong></div>
                    <div class="col-xs-9">
                        <select name="Sixth Diagnosis" class="form-control" ng-model="sixthDiagnosis"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment 6</strong></div>
                    <div class="col-xs-9">
                        <select name="Sixth Diagnosis" class="form-control" ng-model="sixthTreatment"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment Successful?</strong></div>
                    <div class="col-xs-9">
                        <select name="Past Diagnosis" class="form-control" ng-model="sixthTreatmentSuccess">
                            <option disabled selected value> -- select an option --</option>
                            <option> Yes</option>
                            <option> No</option>
                            <option> Temporarily</option>
                        </select>
                    </div>
                </div>
                <br>
            </div>
            <div class="container-fluid" ng-show="fc.sevenFields">
                <div class="row">
                    <div class="col-xs-3"><strong>Diagnosis 7 </strong></div>
                    <div class="col-xs-9">
                        <select name="Seventh Diagnosis" class="form-control" ng-model="seventhDiagnosis"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment 7</strong></div>
                    <div class="col-xs-9">
                        <select name="Seventh Diagnosis" class="form-control" ng-model="seventhTreatment"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment Successful?</strong></div>
                    <div class="col-xs-9">
                        <select name="Seventh Diagnosis" class="form-control" ng-model="seventhTreatmentSuccess">
                            <option disabled selected value> -- select an option --</option>
                            <option> Yes</option>
                            <option> No</option>
                            <option> Temporarily</option>
                        </select>
                    </div>
                </div>
                <br>
            </div>
            <div class="container-fluid" ng-show="fc.eightFields">
                <div class="row">
                    <div class="col-xs-3"><strong>Diagnosis 8 </strong></div>
                    <div class="col-xs-9">
                        <select name="Eighth Diagnosis" class="form-control" ng-model="eighthDiagnosis"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment 8</strong></div>
                    <div class="col-xs-9">
                        <select name="Eighth Diagnosis" class="form-control" ng-model="eighthTreatment"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment Successful?</strong></div>
                    <div class="col-xs-9">
                        <select name="Past Diagnosis" class="form-control" ng-model="eighthTreatmentSuccess">
                            <option disabled selected value> -- select an option --</option>
                            <option> Yes</option>
                            <option> No</option>
                            <option> Temporarily</option>
                        </select>
                    </div>
                </div>
                <br>
            </div>
            Reason for visit
            <select name="Reason of visit" class="form-control">
                <option disabled selected value> -- select an option --</option>

            </select>
        </form>
    </div>
    <footer>
        <div class="row footer" style="z-index: 0; margin-right:80px">
            <img src="Images/hipaa_blue.png" height="100px" width="200px">
        </div>
    </footer>
</div>

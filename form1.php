<?php
session_start();
?>
<div class="container" ng-controller="formController as fc">
    <div class=" col-sm-12 col-md-10" id="logo" style="z-index: 1">
        <h1 id="about_title">Client Form</h1>
        <form class="client_form">
            <h3 class='third_head'>Background Information</h3>
            Age
            <select name="Age" class="form-control" ng-model="fc.form.selectedAge" ng-options="x for x in age">
                <option disabled selected value> -- select an option --</option>

            </select>
            <br/>
            Ethnicity
            <select name="Ethnicity" class="form-control" ng-model="fc.form.selectedEthnicity">
                <option disabled selected value> -- select an option --</option>
                                <option value="Asian">Asian / Pacific Islander</option>
                                <option value="Black">Black or African American</option>
                                <option value="Hispanic">Hispanic or Latino</option>
                                <option value="Native">Native American or American Indian</option>
                                <option value="White">White / Caucasian</option>
                                <option value="Other">Other</option>
            </select>
            <br/>
            Gender
            <select name="Gender" class="form-control" ng-model="fc.form.selectedGender" ng-options="x for x in gender">
                <option disabled selected value> -- select an option --</option>

            </select>
            <br/>
            Country
            <select name="Country" class="form-control" ng-model="fc.form.selectedCountry" ng-options="x for x in country">
                <option disabled selected value> -- select an option --</option>

            </select>
            <br/>
            State
            <select name="State" class="form-control" ng-model="fc.form.selectedState" ng-options="x for x in states">
                <option disabled selected value> -- select an option --</option>

            </select>
            <br/>
            Relationship Status
            <select name="Relationship Status" class="form-control" ng-model="fc.form.selectedRelationship"
                    ng-options="x for x in relationship_status">
                <option disabled selected value> -- select an option --</option>

            </select>
            <br/>
            Education
            <select name="Education" class="form-control" ng-model="fc.form.selectedEducation"
                    ng-options="x for x in education">
                <option disabled selected value> -- select an option --</option>
            </select>
            <br/>
            Sexual Orientation
            <select name="Sexual Orientation" class="form-control" ng-model="fc.form.selectedOrientation"
                    ng-options="x for x in sexual_orientation">
                <option disabled selected value> -- select an option --</option>

            </select>
            <br/>
            Number of Children
            <select name="Children" class="form-control" ng-model="fc.form.selectedChildren" ng-options="x for x in children">
                <option disabled selected value> -- select an option --</option>

            </select>
            <br/>
            Employment
            <select name="Employment" class="form-control" ng-model="fc.form.selectedEmployment" ng-options="x for x in employment">
                <option disabled selected value> -- select an option --</option>

            </select>
            <br/>
            Religious Affiliation
            <select name="Religion" class="form-control" ng-model="fc.form.selectedReligion" ng-options="x for x in religion">
                <option disabled selected value> -- select an option --</option>

            </select>
            <br/>
            Status of your parents
            <select name="Parent" class="form-control" ng-model="fc.form.selectedParentStatus">
                <option disabled selected value> -- select an option --</option>
                <option>Parents Married</option>
                <option>Parents Divorced</option>
                <option>Parents Separated</option>
                <option>Never Married </option>
            </select>
            <br>
            Are you a protected Veteran?
            <select name="Veteran" class="form-control" ng-model="fc.form.selectedVeteran">
                <option disabled selected value> -- select an option --</option>
                <option>Yes</option>
                <option>No</option>
            </select>
            <br/>
            Have you been arrested?
            <select name="Arrested" class="form-control" ng-model="fc.form.selectedArrested">
                <option disabled selected value> -- select an option --</option>
                <option>Yes</option>
                <option>No</option>
            </select>
            <br/>
            Have you been to prison?
            <select name="Prison" class="form-control" ng-model="fc.form.selectedPrison">
                <option disabled selected value> -- select an option --</option>
                <option>Yes</option>
                <option>No</option>
            </select>
            <br/>
            Do you have history of drug/alcohol abuse?
            <select name="DrugAlcohol" class="form-control" ng-model="fc.form.selectedDrugProblems">
                <option disabled selected value> -- select an option --</option>
                <option>Yes</option>
                <option>No</option>
            </select>
            <br>
            Have you ever experienced significant brain trauma?
            <select name="Brian Trauma" class="form-control" ng-model="fc.form.selectedBrainTrauma">
                <option disabled selected value> -- select an option --</option>
                <option>Yes</option>
                <option>No</option>
            </select>
            <br>
            Have your mother or father suffered from mental health problems?
            <select name="Parents" class="form-control" ng-model="fc.form.selectedParentHealth">
                <option disabled selected value> -- select an option --</option>
                <option>Yes</option>
                <option>No</option>
            </select>
            <br>
            Longest you've been without a place to live?
            <select name="Homeless" class="form-control" ng-model="fc.form.selectedHomeless">
                <option disabled selected value> -- select an option --</option>
                <option>I've always had a place to live</option>
                <option>1-2 weeks</option>
                <option>3-4 weeks</option>
                <option>1-3 months</option>
                <option>4-9 months</option>
                <option>10-12 months</option>
                <option>1-2 years</option>
                <option>2+ years</option>
            </select>
            <br>
            How many days per week do you get more than 20 min of physical activity?
            <select name="Activity" class="form-control" ng-model="fc.form.selectedActivity">
                <option disabled selected value> -- select an option --</option>
                <option>0</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
            </select>
            <br>
            <br>
        </form>
        <br>
<!--        SECOND PART OF FORMS------------>
        <form class="client_form second-form">
            <h3 class="third_head">Past Treatment</h3>
            Combined Years of Therapy
            <select name="Length of Therapy" class="form-control" ng-model="fc.form.selectedYears"
                    ng-options="x for x in therapy_years">
                <option disabled selected value> -- select an option --</option>
            </select>
            <br/>
            Number of Past Diagnosis's
            <select name="Past Diagnosis" class="form-control" ng-model="fc.form.selectedNumberDiagnosis" ng-value="fc.displayDiagnosisFields(fc.form.selectedNumberDiagnosis)"
                    ng-options="x for x in num_of_diagnosis">
                <option disabled selected value> -- select an option --</option>
            </select>
            <br/>
<!--            <diagnosis></diagnosis>-->
            <div class="container-fluid" ng-show="fc.oneField">
                <hr>
                <div class="row">
                    <div class="col-xs-3"><strong>Diagnosis 1 </strong></div>
                    <div class="col-xs-9">
                        <select name="First Diagnosis" class="form-control" ng-model="fc.form.firstDiagnosis"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Therapy Treatment</strong></div>
                    <div class="col-xs-9">
                        <select name="First Treatment" class="form-control" ng-model="fc.form.firstTreatment"
                                ng-options="x for x in therapy_types">
                            <option disabled selected value> -- select an option --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Type of Medication</strong></div>
                    <div class="col-xs-9">
                        <select name="First Medication" class="form-control" ng-model="fc.form.firstMedication"
                                ng-options="x for x in treatment_types">
                            <option disabled selected value> -- select an option --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment Successful?</strong></div>
                    <div class="col-xs-9">
                        <select name="Past Diagnosis" class="form-control" ng-model="fc.form.firstTreatmentSuccess">
                            <option disabled selected value> -- select an option --</option>
                            <option>Yes</option>
                            <option>No</option>
                            <option>Temporarily</option>
                        </select>
                    </div>
                </div>
                <br>
            </div>
<!--            -----------------------two------------------------------------------>
            <div class="container-fluid" ng-show="fc.twoFields">
                <hr>
                <div class="row">
                    <div class="col-xs-3"><strong>Diagnosis 2 </strong></div>
                    <div class="col-xs-9">
                        <select name="Second Diagnosis" class="form-control" ng-model="fc.form.secondDiagnosis"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Therapy Treatment</strong></div>
                    <div class="col-xs-9">
                        <select name="Second Treatment" class="form-control" ng-model="fc.form.secondTreatment"
                                ng-options="x for x in therapy_types">
                            <option disabled selected value> -- select an option --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Type of Medication</strong></div>
                    <div class="col-xs-9">
                        <select name="Second Medication" class="form-control" ng-model="fc.form.secondMedication"
                                ng-options="x for x in treatment_types">
                            <option disabled selected value> -- select an option --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment Successful?</strong></div>
                    <div class="col-xs-9">
                        <select name="Past Diagnosis" class="form-control" ng-model="fc.form.secondTreatmentSuccess">
                            <option disabled selected value> -- select an option --</option>
                            <option>Yes</option>
                            <option>No</option>
                            <option>Temporarily</option>
                        </select>
                    </div>
                </div>
                <br>
            </div>
            <div class="container-fluid" ng-show="fc.threeFields">
                <hr>
                <div class="row">
                    <div class="col-xs-3"><strong>Diagnosis 3 </strong></div>
                    <div class="col-xs-9">
                        <select name="Third Diagnosis" class="form-control" ng-model="fc.form.thirdDiagnosis"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Therapy Treatment</strong></div>
                    <div class="col-xs-9">
                        <select name="Third Treatment" class="form-control" ng-model="fc.form.thirdTreatment"
                                ng-options="x for x in therapy_types">
                            <option disabled selected value> -- select an option --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Type of Medication</strong></div>
                    <div class="col-xs-9">
                        <select name="Third Medication" class="form-control" ng-model="fc.form.thirdMedication"
                                ng-options="x for x in treatment_types">
                            <option disabled selected value> -- select an option --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment Successful?</strong></div>
                    <div class="col-xs-9">
                        <select name="Past Diagnosis" class="form-control" ng-model="fc.form.thirdTreatmentSuccess">
                            <option disabled selected value> -- select an option --</option>
                            <option>Yes</option>
                            <option>No</option>
                            <option>Temporarily</option>
                        </select>
                    </div>
                </div>
                <br>
            </div>
            <div class="container-fluid" ng-show="fc.fourFields">
                <hr>
                <div class="row">
                    <div class="col-xs-3"><strong>Diagnosis 4 </strong></div>
                    <div class="col-xs-9">
                        <select name="Four Diagnosis" class="form-control" ng-model="fc.form.fourDiagnosis"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Therapy Treatment</strong></div>
                    <div class="col-xs-9">
                        <select name="Forth Treatment" class="form-control" ng-model="fc.form.forthTreatment"
                                ng-options="x for x in therapy_types">
                            <option disabled selected value> -- select an option --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Type of Medication</strong></div>
                    <div class="col-xs-9">
                        <select name="Forth Medication" class="form-control" ng-model="fc.form.forthMedication"
                                ng-options="x for x in treatment_types">
                            <option disabled selected value> -- select an option --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment Successful?</strong></div>
                    <div class="col-xs-9">
                        <select name="Past Diagnosis" class="form-control" ng-model="fc.form.forthTreatmentSuccess">
                            <option disabled selected value> -- select an option --</option>
                            <option>Yes</option>
                            <option>No</option>
                            <option>Temporarily</option>
                        </select>
                    </div>
                </div>
                <br>
            </div>
            <div class="container-fluid" ng-show="fc.fiveFields">
                <hr>
                <div class="row">
                    <div class="col-xs-3"><strong>Diagnosis 5 </strong></div>
                    <div class="col-xs-9">
                        <select name="Fifth Diagnosis" class="form-control" ng-model="fc.form.fifthDiagnosis"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Therapy Treatment</strong></div>
                    <div class="col-xs-9">
                        <select name="Fifth Treatment" class="form-control" ng-model="fc.form.fifthTreatment"
                                ng-options="x for x in therapy_types">
                            <option disabled selected value> -- select an option --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Type of Medication</strong></div>
                    <div class="col-xs-9">
                        <select name="Fifth Medication" class="form-control" ng-model="fc.form.fifthMedication"
                                ng-options="x for x in treatment_types">
                            <option disabled selected value> -- select an option --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment Successful?</strong></div>
                    <div class="col-xs-9">
                        <select name="Past Diagnosis" class="form-control" ng-model="fc.form.fifthTreatmentSuccess">
                            <option disabled selected value> -- select an option --</option>
                            <option>Yes</option>
                            <option>No</option>
                            <option>Temporarily</option>
                        </select>
                    </div>
                </div>
                <br>
            </div>
            <div class="container-fluid" ng-show="fc.sixFields">
                <hr>
                <div class="row">
                    <div class="col-xs-3"><strong>Diagnosis 6 </strong></div>
                    <div class="col-xs-9">
                        <select name="Sixth Diagnosis" class="form-control" ng-model="fc.form.sixthDiagnosis"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Therapy Treatment</strong></div>
                    <div class="col-xs-9">
                        <select name="Sixth Treatment" class="form-control" ng-model="fc.form.sixthTreatment"
                                ng-options="x for x in therapy_types">
                            <option disabled selected value> -- select an option --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Type of Medication</strong></div>
                    <div class="col-xs-9">
                        <select name="Sixth Medication" class="form-control" ng-model="fc.form.sixthMedication"
                                ng-options="x for x in treatment_types">
                            <option disabled selected value> -- select an option --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment Successful?</strong></div>
                    <div class="col-xs-9">
                        <select name="Past Diagnosis" class="form-control" ng-model="fc.form.sixthTreatmentSuccess">
                            <option disabled selected value> -- select an option --</option>
                            <option>Yes</option>
                            <option>No</option>
                            <option>Temporarily</option>
                        </select>
                    </div>
                </div>
                <br>
            </div>
            <div class="container-fluid" ng-show="fc.sevenFields">
                <hr>
                <div class="row">
                    <div class="col-xs-3"><strong>Diagnosis 7 </strong></div>
                    <div class="col-xs-9">
                        <select name="Seventh Diagnosis" class="form-control" ng-model="fc.form.seventhDiagnosis"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Therapy Treatment</strong></div>
                    <div class="col-xs-9">
                        <select name="Seventh Treatment" class="form-control" ng-model="fc.form.seventhTreatment"
                                ng-options="x for x in therapy_types">
                            <option disabled selected value> -- select an option --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Type of Medication</strong></div>
                    <div class="col-xs-9">
                        <select name="Seventh Medication" class="form-control" ng-model="fc.form.seventhMedication"
                                ng-options="x for x in treatment_types">
                            <option disabled selected value> -- select an option --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment Successful?</strong></div>
                    <div class="col-xs-9">
                        <select name="Seventh Diagnosis" class="form-control" ng-model="fc.form.seventhTreatmentSuccess">
                            <option disabled selected value> -- select an option --</option>
                            <option>Yes</option>
                            <option>No</option>
                            <option>Temporarily</option>
                        </select>
                    </div>
                </div>
                <br>
            </div>
            <div class="container-fluid" ng-show="fc.eightFields">
                <hr>
                <div class="row">
                    <div class="col-xs-3"><strong>Diagnosis 8 </strong></div>
                    <div class="col-xs-9">
                        <select name="Eighth Diagnosis" class="form-control" ng-model="fc.form.eighthDiagnosis"
                                ng-options="x for x in past_diagnosis">
                            <option disabled selected value> -- select a diagnosis --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Therapy Treatment</strong></div>
                    <div class="col-xs-9">
                        <select name="Eighth Treatment" class="form-control" ng-model="fc.form.eighthTreatment"
                                ng-options="x for x in therapy_types">
                            <option disabled selected value> -- select an option --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Type of Medication</strong></div>
                    <div class="col-xs-9">
                        <select name="Eighth Medication" class="form-control" ng-model="fc.form.eighthMedication"
                                ng-options="x for x in treatment_types">
                            <option disabled selected value> -- select an option --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3"><strong>Treatment Successful?</strong></div>
                    <div class="col-xs-9">
                        <select name="Past Diagnosis" class="form-control" ng-model="fc.form.eighthTreatmentSuccess">
                            <option disabled selected value> -- select an option --</option>
                            <option>Yes</option>
                            <option>No</option>
                            <option>Temporarily</option>
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
        <input type="submit" ng-click="fc.submitData(fc.form)">
    </div>
    <footer>
        <div class="row footer" style="z-index: 0; margin-right:80px">
            <img src="Images/hipaa_blue.png" height="100px" width="200px">
        </div>
    </footer>
</div>

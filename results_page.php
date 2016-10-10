<?php
session_start();
$query = $_SESSION['query'];
?>
<style>
    body{
        background-color: transparent;
        background-image: none;
    }
    .navbar{
        margin-bottom: 0;
    }
</style>

<div class="container-fluid main-contain-results" ng-controller="MicrosoftController as mc">
    <div class="container-fluid divider" >
    <div class="container">
    <div class="col-md-10 col-sm-12 col-xs 12">
        <h1>PsychOrigins
            <!--            <small class="text-muted">.com</small>-->
        </h1>
        <form>
            <div class="input-group" ng-init="mc.query='<?=$query?>'; mc.makeQuery(mc.query,mc.order)">

                <input ng-model="mc.query" type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                <div class="input-group-btn">
                    <button class="btn btn-default" ng-click="mc.makeQuery(mc.query,mc.order)"><i class="glyphicon glyphicon-search"></i></button>
                </div>

            </div>
        </form>
        <p class="order-by">Order by year <input type="checkbox" ng-model="mc.order" [ng-true-value="true"] [ng-false-value="false"]></p>

        <div style="color:red" ng-hide="results">No results for this search</div>
    </div>
        </div>
    </div>
    <div class="container-fluid results_page">
        <div class ='row'>
            <ul ng-show="results" ng-repeat="(key,data) in mc.meta_data track by $index" class="result-list">
                <li class="article-title"> {{mc.meta_data.title[$index]}}
                </li>
                <li>
                    <span>{{mc.meta_data.year[$index]}} &nbsp &nbsp  &nbsp  &nbsp</span>
                    <a href="{{mc.meta_data.link1[$index]}}" target='_blank'>link 1 </a> |
                    <a href="{{mc.meta_data.link2[$index]}}" target='_blank'>link 2</a>  |
                    <a href="{{mc.meta_data.link3[$index]}}" target='_blank'>link 3 </a> |
                    <a href="{{mc.meta_data.link4[$index]}}" target='_blank'>link 4</a>
                </li>
                <li>
                    Authors: {{mc.meta_data.author1[$index] | capitalize}}, {{mc.meta_data.author2[$index] | capitalize}}, {{mc.meta_data.author3[$index] | capitalize}}
                </li>
                <li>keywords:  <a ng-click="mc.query =mc.meta_data.keyword1[$index]; mc.makeQuery(mc.query)">{{mc.meta_data.keyword1[$index]}} </a>, <a  ng-click="mc.query =mc.meta_data.keyword2[$index]; mc.makeQuery(mc.query)">{{mc.meta_data.keyword2[$index]}} </a>, <a  ng-click="mc.query =mc.meta_data.keyword3[$index]; mc.makeQuery(mc.query)">{{mc.meta_data.keyword3[$index]}}</a>, <a  ng-click="mc.query =mc.meta_data.keyword4[$index]; mc.makeQuery(mc.query)">{{mc.meta_data.keyword4[$index]}}</a></li>
                <li>
                    <h4 ng-click="sumClick[$index]= !sumClick[$index]">Summary <span class="caret"></span></h4>
                    <p ng-show="sumClick[$index]" class="summary">{{mc.meta_data.summary[$index]}} <a href="{{mc.meta_data.link1[$index]}}"  target='_blank'> more</a></p>
                    <hr>
                </li>
            </ul>

        </div>

    </div>
</div>
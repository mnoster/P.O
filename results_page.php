<?php
session_start();
//$query = $_SESSION['query'];
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
    <div class="col-md-10 col-sm-12 col-xs-12">
        <h1>PsychOrigins
                        <small class="text-muted">academic search</small>
        </h1>
        <form>
<!--            <div class="input-group" ng-init="mc.query='--><?//=$query?><!--'; mc.makeQuery(mc.query,mc.order)">-->
            <div class="input-group" ng-init="mc.micro = 'micro'; mc.makeQuery(query,mc.order,mc.micro,mc.bioMed,0)">

                <input ng-model="query" type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                <div class="input-group-btn">
                    <button class="btn btn-default" ng-click="mc.makeQuery(query,mc.order,mc.micro,mc.bioMed,0,mc.exact)"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </form>
        <p class="order-by">
             All Articles <input type="radio" name="article-type" ng-model="mc.bioMed" value="bioMed" ng-checked="mc.bioMedChecked" ng-click="mc.micro = false">
             Free Articles <input type="radio" name="article-type" ng-model="mc.micro" value="micro" ng-checked="mc.microChecked" ng-click="mc.bioMed = false">
            &nbsp &nbsp Order by year <input type="checkbox" ng-model="mc.order" [ng-true-value="true"] [ng-false-value="false"]>
            <a class="hidden-xs" href="http://www.citationmachine.net/apa/cite-a-journal/manual" target="_blank">
                <img class="citation" src="Images/Citation-machine.png" height="40px">
            </a>
            <span class="response-time">{{numberOfResults | number}}{{numberOfResultsText}}</span>
            <br/>
            <span class="response-time">{{performance}}</span>
        </p>
        <div><h5 ng-click="dropdown=!dropdown"><a style="color:white;text-shadow: 1px 1px black">More Search Options</a><span class="caret"></span></h5></div>
        <div ng-show="dropdown">
            Search Exact Phrase <input type="checkbox" ng-model= "mc.exact" [ng-true-value="true"] [ng-false-value="false"] class="sharp">
            <!--        Year <input type="text" placeholder="year" class="sharp">-->
<!--        DOI <input  type = "text" placeholder="DOI">-->
<!--        Exclude <input  type="text" placeholder="keywords to exclude">-->
            </div>
        <div style="color:red" ng-hide="results">No results for this search</div>
    </div>
        </div>
    </div>
    <div class="container-fluid results_page" ng-init="$scope.$digest()">
        <div ng-hide="loader" class="loader"><img src="Images/loader.gif" height="100px"></div>
        <div class ='row results-row'>
            <ul ng-show="loader" ng-repeat="(key,data) in mc.meta_data track by $index" class="result-list">
                <li class="article-title"> {{mc.meta_data.title[$index]}}
                </li>
                <li>
                    <span>{{mc.meta_data.year[$index]}} &nbsp &nbsp  &nbsp  &nbsp</span>
                    <a href="{{mc.meta_data.link1[$index]}}" target='_blank'>link 1 </a> |
                    <a href="{{mc.meta_data.link2[$index]}}" target='_blank' ng-class="{strikethrough:strikethrough1}">link 2</a>  |
                    <a href="{{mc.meta_data.link3[$index]}}" target='_blank' ng-class="{strikethrough:strikethrough2}">link 3 </a>
<!--                    <a href="{{mc.meta_data.link4[$index]}}" target='_blank' ng-class="{strikethrough:strikethrough3}">link 4</a>-->
                </li>
                <li>
                    Authors: {{mc.meta_data.author1[$index] | capitalize}} || {{mc.meta_data.author2[$index] | capitalize}} || {{mc.meta_data.author3[$index] | capitalize}}
                </li>
                <li>keywords:  <a ng-click="mc.query = mc.meta_data.keyword1[$index]; mc.makeQuery(mc.query,mc.order,mc.micro,mc.bioMed,0)">{{mc.meta_data.keyword1[$index]}} </a>, <a  ng-click="mc.query =mc.meta_data.keyword2[$index]; mc.makeQuery(mc.query,mc.order,mc.micro,mc.bioMed,0)">{{mc.meta_data.keyword2[$index]}} </a>, <a  ng-click="mc.query =mc.meta_data.keyword3[$index]; mc.makeQuery(mc.query,mc.order,mc.micro,mc.bioMed,0)">{{mc.meta_data.keyword3[$index]}}</a>, <a  ng-click="mc.query =mc.meta_data.keyword4[$index]; mc.makeQuery(mc.query,mc.order,mc.micro,mc.bioMed,0)">{{mc.meta_data.keyword4[$index]}}</a></li>
                <li>
                    <h4 ng-click="sumClick[$index]= !sumClick[$index]" id="summary">Summary <span class="caret"></span></h4>
                    <p ng-show="sumClick[$index]" class="summary">{{mc.meta_data.summary[$index]}} <a href="{{mc.meta_data.link1[$index]}}"  target='_blank'> more</a></p>
                    <hr style="margin:0 40px 0 -20px">
                </li>
            </ul>

        </div>
        <div class="pagi-contain" ng-show="loader">
            <ul  class="paginav">
                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 0)" class="active"><span>1</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 13)"><span>2</span></a></li>

                <li><a  ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 26)"><span>3</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 39)"><span>4</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 52)"><span>5</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 65)"><span>6</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 78)"><span>7</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 91)"><span>8</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 104)"><span>9</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 117)"><span>10</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 130)"><span>11</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 143)"><span>12</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 156)"><span>13</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 172)"><span>14</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 185)"><span>15</span></a></li>
            </ul>
            <ul  class="paginav">
                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 199)"><span>16</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 212)"><span>17</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 225)"><span>18</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 238)"><span>19</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 251)"><span>20</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 264)"><span>21</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 277)"><span>22</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 290)"><span>23</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 303)"><span>24</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 316)"><span>25</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 329)"><span>26</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 342)"><span>27</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 355)"><span>28</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 368)"><span>29</span></a></li>

                <li><a ng-click="scrollTop(nav); mc.makeQuery(query,mc.order,mc.micro,mc.bioMed, 381)"><span>30</span></a></li>
            </ul>
    </div>
</div>
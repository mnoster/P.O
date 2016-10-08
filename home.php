<div class="container-fluid" ng-controller="MicrosoftController as mc">
    <div class="container">
    <div class="col-md-10 col-sm-12 col-xs 12"  id="logo">
        <h1 id="title">PsychOrigins
<!--            <small class="text-muted">.com</small>-->
        </h1>
        <form class="row-form" role="search" id="searchbar">
            <div class="input-group">
                <input ng-model="mc.query" type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                <div class="input-group-btn">
                    <a ><button class="btn btn-default" ng-click="mc.makeQuery(mc.query)"><i class="glyphicon glyphicon-search"></i></button></a>
                </div>

            </div>
            <p id="info1">
                New to PsychOrigins.com? Click <a href="howitworks.html">here</a> for help
            </p>
        </form>

    </div>
    </div>
        <div class="container-fluid results_page">
            <div class ='row'>
                <ul ng-repeat="(key,data) in mc.meta_data track by $index" class="result-list">
                        <li class="article-title">{{$index}}. {{mc.meta_data.title[$index]}}
                            </li>
                        <li>
                            <a href="{{mc.meta_data.link1[$index]}}" target='_blank'>link 1 </a> |
                            <a href="{{mc.meta_data.link2[$index]}}" target='_blank'>link 2</a>  |
                            <a href="{{mc.meta_data.link3[$index]}}" target='_blank'>link 3 </a> |
                            <a href="{{mc.meta_data.link4[$index]}}" target='_blank'>link 4</a>
                        </li>
                    <li>
                        Authors: {{mc.meta_data.author1[$index] | capitalize}}, {{mc.meta_data.author2[$index] | capitalize}}, {{mc.meta_data.author3[$index] | capitalize}}
                    </li>
                    <li>
                        <h4 ng-click="sumClick[$index]= !sumClick[$index]">Summary</h4>
                        <p ng-show="sumClick[$index]" class="summary">{{mc.meta_data.summary[$index]}} <a href="{{mc.meta_data.link1[$index]}}"  target='_blank'> more</a></p>
                    </li>
                </ul>
            </div>

        </div>
</div>
<footer>
    <div class="row footer">
    <h5 class='microsoft'>Powered by<br>
        <img src="Images/Microsoft.png" height="42vh" width="160px"></h5>
        <img src="Images/hipaa_blue.png" class="hippa" height="75vh" width="160px">
    </div>
</footer>

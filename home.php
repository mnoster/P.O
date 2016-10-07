<div class="container" ng-controller="MicrosoftController as mc">
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
        </form>
        <p id="info1">
            New to PsychOrigins.com? Click <a href="howitworks.html">here</a> for help
        </p>
        <div class="container-fluid results_page">
            <div class ='row'>
                <ul ng-repeat="(key,data) in mc.meta_data track by $index" class="result-list">
                    <div class="row">
                        <li class="article-title">{{mc.meta_data.title[$index]}}</li>
                        <li>{{mc.meta_data.link1[$index]}}</li>
                    </div>

                    <li>{{mc.meta_data.link2[$index]}}</li>
                    <li>{{mc.meta_data.summary[$index]}}</li>
                </ul>
            </div>

        </div>

    </div>
</div>
<footer>
    <div class="row footer">
        <img src="Images/hipaa_blue.png" height="100px" width="200px">
    </div>
</footer>

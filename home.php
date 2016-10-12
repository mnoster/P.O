<div class="container-fluid main-contain-search" ng-controller="MicrosoftController as mc">
    <div class="container">
    <div class="col-md-10 col-sm-12 col-xs 12"  id="logo">
        <h1 id="title" >PsychOrigins
             <small class="text-muted">academic search</small>
        </h1>
        <form class="row-form" role="search" id="searchbar">
            <div class="input-group">
                <input ng-model="mc.query" type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term" maxlength="150">
                <div class="input-group-btn">
                    <a href="#results_page" ng-click="mc.roots(mc.query)"><button class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button></a>
                </div>

            </div>
            <p id="info1">
                New to PsychOrigins.com? Click <a href="#about">here</a> for help
            </p>
        </form>

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

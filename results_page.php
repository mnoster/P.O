<style>
    body{
        background-color: transparent;
        background-image: none;
    }
</style>
<div class="container" ng-controller="MicrosoftController as mc">
    <div class="col-md-10 col-sm-12 col-xs 12">
        <h1>PsychOrigins
            <!--            <small class="text-muted">.com</small>-->
        </h1>
            <div class="input-group">
                <input ng-model="mc.query" type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                <div class="input-group-btn">
                    <button class="btn btn-default" ng-click="mc.makeQuery(mc.query)"><i class="glyphicon glyphicon-search"></i></button>
                </div>

            </div>
    </div>
    <div class="container-fluid">
        <div class ='row'>
            <div>{{mc.meta_data.title}}</div>
            <ul ng-repeat="(key,data) in mc.meta_data">
                <li>{{data}<p>{{data}}</p></li>
                <li>{{data.author1}}</li>
                <li>{{data.year}}</li>
            </ul>
        </div>

    </div>
</div>
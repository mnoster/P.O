<div class="container" ng-controller="clientController as cc">
    <div class="row">
        <h2>My Clients</h2>
        <hr>
        <div class="col-xs-12">
            <ul>

            </ul>
        </div>
    </div>
</div>
<div class="container client-contain">
    <div >
        <!-- only show this element when the isnt on mobile -->
        <h2 class="page-header hidden-xs col-sm-12 ">Client Table
            <small class="pull-right"><span class="avgGrade label label-default"></span></small>
        </h2>
        <!-- only show this element when the user gets to a mobile version -->
        <h3 class="page-header col-xs-11 h3 hidden-sm hidden-md hidden-lg ">
        </h3>

    </div>
    <!--<div class="row">-->
    <div class="client-add-form form-group col-md-4 pull-right">
        <h4>Add Client</h4>
        <div class="input-group form-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
            </span>
            <input ng-model="cc.client.first_name" type="text" class="form-control" name="firstName" id="lastName" placeholder="First Name">
        </div>
        <div class="input-group form-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
            </span>
            <input ng-model="cc.client.last_name" type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name">
        </div>

        <div class="input-group form-group">
            <h4>Active</h4>
            <input ng-model="cc.client.active" type="checkbox" class="form-control" name="clientGrade" id="clientGrade" checked>
        </div>
        <button type="button" class="btn btn-success" ng-click ="cc.sendClient(cc.client)" >Add</button>
        <button type="button" class="btn btn-default" >Cancel</button>
    </div>
    <!--</div>-->
    <!--<div class="row">-->
    <div class="client-list-container col-sm-7">
        <table id="client-list" class="client-list table table-hover tablesorter">
            <thead>
            <tr>
                <th>Client Name</th>
                <th>Date Added</th>
                <th>Active</th>
                <th>Form</th>
                <th class="hidden-xs">Operations</th>
            </tr>
            </thead>
            <tbody id="people">
            <tr>
                <td>{{cc.client.first_name}} {{cc.client.last_name}}</td>
                <td>{{cc.client.timestamp}}</td>
                <td>{{cc.client.active}}</td>
                <td>{{cc.client.form}}</td>
                <td class="hidden-xs"><button class="btn btn-danger">Delete</button></td>
            </tr>
            </tbody>
        </table>
    </div>
    <!--</div>-->

</div>
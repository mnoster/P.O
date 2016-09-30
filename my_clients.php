<div class="container">
    <div class="row">
        <h2>My Clients</h2>
        <hr>
        <div class="col-xs-12">
            <ul>

            </ul>
        </div>
    </div>
</div>
<div class="container client-contain" ng-controller="clientController as cc">
    <div>
        <!-- only show this element when the isnt on mobile -->
        <h2 class="page-header hidden-xs col-sm-12 ">Client Table
            <small class="pull-right"><span class="avgGrade label label-default"></span></small>
        </h2>
        <!-- only show this element when the user gets to a mobile version -->
        <h3 class="page-header col-xs-11 h3 hidden-sm hidden-md hidden-lg ">
        </h3>

    </div>
    <div class="client-add-form form-group col-md-4 pull-right">
        <h4>Add Client</h4>
        <div class="input-group form-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
            </span>
            <input ng-model="cc.client.first_name" type="text" class="form-control" name="firstName" id="lastName"
                   placeholder="First Name" maxlength="20">
        </div>
        <div class="input-group form-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
            </span>
            <input ng-model="cc.client.last_name" type="text" class="form-control" name="lastName" id="lastName"
                   placeholder="Last Name" maxlength="30">
        </div>
        <div class="col-xs-6">
            <h4>Active</h4>
            <input ng-model="cc.client.active" ng-init="cc.client.active = 'false'" type="checkbox" class="form-control"
                   name="active" id="active" checked>
        </div>
        <div class="input-group form-group ">
            <h4>Form</h4>
            <select ng-model="cc.client.form" ng-options="x for x in cc.form_options">
                <option disabled selected value> -- select a form --</option>
            </select>
        </div>
        <button ng-mouseup="cc.sendClient(cc.client)" class="btn btn-success">Add</button>
        <button type="button" class="btn btn-default">Cancel</button>
        <div ng-hide="cc.display_errors" class="text-danger">Please fill out all the fields</div>
    </div>
    <div class="client-list-container col-sm-8">
        <table id="client-list" class="client-list table table-hover">
            <thead>
            <tr>
                <th>Client Name</th>
                <th>Date Added</th>
                <th>Active</th>
                <th>Form</th>
                <th class="hidden-xs">Operations</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="client in clientArray track by $index">
                <td>{{client.full_name}}</td>
                <td>{{client.date_added}}</td>
                <td>{{client.active}}</td>
                <td>{{client.form}}</td>
                <td class="hidden-xs">
                    <button ng-click="cc.delete_user($index)" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
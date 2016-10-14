<div class="container">
    <div class="row">
        <h2>My Clients</h2>
        <hr>
    </div>
</div>
<div class="container client-contain" ng-controller="clientController as cc">
    <div>
        <!-- only show this element when the isnt on mobile -->
        <h2 class="page-header  col-sm-12 ">Client Table
            <small class="pull-right"><span class="avgGrade label label-default"></span></small>
        </h2>
    </div>
    <div class="client-add-form form-group col-md-4 pull-right">
        <h4>Add Client</h4>
        <div class="input-group form-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
            </span>
            <input ng-model="cc.client.first_name" type="text" class="form-control sharp" name="firstName" id="lastName"
                   placeholder="First Name" maxlength="20">
        </div>
        <div class="input-group form-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
            </span>
            <input ng-model="cc.client.last_name" type="text" class="form-control sharp" name="lastName" id="lastName"
                   placeholder="Last Name" maxlength="30">
        </div>
        <div class="col-xs-6">
            <h4>Active</h4>
            <input ng-model="cc.client.active" ng-init="cc.client.active = 'false'" type="checkbox" class=""
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
    <div class="client-list-container col-md-8">
        <table id="client-list" class="client-list table table-hover">
            <thead>
            <tr>
                <th ng-click="sortData('full_name')">Client Name <div ng-class="getSortClass('full_name')"></div></th>
                <th ng-click="sortData('date_added')">Date Added  <div ng-class="getSortClass('date_added')"></div></th>
                <th ng-click="sortData('active')">Active  <div ng-class="getSortClass('active')"></div></th>
                <th ng-click="sortData('form')">Form  <div ng-class="getSortClass('form')"></div></th>
                <th class="hidden-xs">Operations </th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="client in clientArray | orderBy:sortColumn:reverseSort">
                <td>{{client.full_name}}</td>
                <td>{{client.date_added}}</td>
                <td>{{client.active}}</td>
                <td><a ng-click="cc.getForm(client.full_name,client.date_added)" href = '#pdf_form'>{{client.form}}</a></td>
                <td class="hidden-xs">
                    <button ng-click="cc.delete_user($index)" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
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
<div class="container client-contain">
    <div class="">
        <!-- only show this element when the isnt on mobile -->
        <h2 class="page-header hidden-xs col-sm-12 ">Client Table
            <small class="pull-right">Grade Average : <span class="avgGrade label label-default"></span></small>
        </h2>
        <!-- only show this element when the user gets to a mobile version -->
        <h3 class="page-header col-xs-11 h3 hidden-sm hidden-md hidden-lg ">Client Grade Table
            <small class=" pull-right">Grade Average : <span class="avgGrade label label-default"></span></small>
        </h3>

    </div>
    <!--<div class="row">-->
    <div class="client-add-form form-group col-md-4 pull-right">
        <h4>Add Client</h4>
        <div class="input-group form-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
            </span>
            <input type="text" class="form-control" name="clientName" id="clientName" placeholder="Client Name">
        </div>
        <div class="input-group form-group">
            <span class="input-group-addon">
                <span class=" glyphicon glyphicon-list-alt"></span>
            </span>
            <input type="text" class="form-control" name="course" id="course"
                   placeholder="Client Course">
        </div>
        <div class="input-group form-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-education"></span>
            </span>
            <input type="text" class="form-control" name="clientGrade" id="clientGrade"
                   placeholder="Client Grade">
        </div>
        <button type="button" class="btn btn-success" >Add</button>
        <button type="button" class="btn btn-default" >Cancel</button>
        <button type="button" class="btn btn-default" >Get Data From Server</button>
    </div>
    <!--</div>-->
    <!--<div class="row">-->
    <div class="client-list-container col-sm-7">
        <table class="client-list table table-hover">
            <thead>
            <tr>
                <th>Client Name</th>
                <th>First Appointment</th>
                <th>Number of Appointments</th>
                <th>Operations</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <!--</div>-->

</div>
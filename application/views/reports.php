<div class="static-content">
    <div class="page-content">
        <div class="page-heading">            
            <h1><?php echo $pageTitle; ?></h1>
                <div class="options">
                    <div class="btn-toolbar">
                        <a href="#" class="btn btn-default"><i class="fa fa-fw fa-wrench"></i></a>
                    </div>
                </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Report List</h2>
                        </div>
                        <div class="panel-body">
                            <div>
                                <ul class="list-unstyled">
                                    <li data-jstree='{ "opened" : true, "type":"file" }'>
                                         Clients
                                        <ul>
                                            <li data-jstree='{ "type":"file" }'>
                                                <a href="#">
                                                Tickets</a>
                                            </li>
                                            <li data-jstree='{ "type" : "file" }'>
                                                Rankings
                                            </li>
                                            <li data-jstree='{ "type" : "file" }'>
                                                Support Expired
                                            </li>
                                            <li data-jstree='{ "type" : "file" }'>
                                                Support Hours
                                            </li>
                                        </ul>
                                    </li>
                                    <li data-jstree='{ "opened" : true, "type":"file" }'>
                                        Techs
                                        <ul>
                                            <li data-jstree='{ "type":"file" }'>
                                                <a href="#">
                                                Tickets</a>
                                            </li>
                                            <li data-jstree='{ "type" : "file" }'>
                                                Connections
                                            </li>
                                            <li data-jstree='{ "type" : "file" }'>
                                                Reminders
                                            </li>
                                            <li data-jstree='{ "type" : "file" }'>
                                                Trainings
                                            </li>
                                        </ul>
                                    </li>
                                    <li data-jstree='{ "opened" : true, "type":"file" }'>
                                        Tickets
                                        <ul>
                                            <li data-jstree='{ "type":"file" }'>
                                                <a href="#">
                                                Most Tickets</a>
                                            </li>
                                            <li id="clientResponses" data-jstree='{ "type":"file" }'>
                                                <a href="#">Client Responses</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Report</h2>
                            <div>
                                <ul id="null" class="nav nav-tabs pull-right">
                                    <li class="dropdown pull-right tabdrop hide">
                                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu"></ul>
                                    </li>
                                    <li class="active">
                                        <a data-toggle="tab" href="#tab1" aria-expanded="true">
                                            <i class="fa fa-database"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab1" aria-expanded="true">
                                            <i class="fa fa-bar-chart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab1" aria-expanded="true">
                                            <i class="fa fa-pie-chart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div id="table">
<!--
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-fixed-header m0" id="reports_threeResponses">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th width="20%">Subject</th>
                                        <th>Tech</th>
                                        <th>Priority</th>
                                        <th>Submitted By</th>
                                        <th>Company</th>
                                        <th>Status</th>
                                        <th>Lifespan</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Subject</th>
                                        <th>Tech</th>
                                        <th>Priority</th>
                                        <th>Submitted By</th>
                                        <th>Company</th>
                                        <th>Status</th>
                                        <th>Lifespan</th>
                                    </tr>
                                </tfoot>
                            </table>
-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
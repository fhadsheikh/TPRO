<div class="static-content">
    <div class="page-content">
        <div class="page-heading">
            <div class="row">
                <div class="col-md-12">
                    <h4>Search for Test Cases</h4>
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <select class="form-control">
                                    <option>ClockWork Client</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control">
                                    <option>v5.15.1.22</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control">
                                    <option>All</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control">
                                    <option>All</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="progress progress-striped" style="height: 15px;">
                          <div class="progress-bar progress-bar-success" style="width: 33.333%"></div>
                          <div class="progress-bar progress-bar-danger" style="width: 33.333%"></div>
                          <div class="progress-bar progress-bar-orange" style="width: 33.333%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <table id="qa" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Test Case</th>
                                <th>Module</th>
                                <th>Assinged To</th>
                                <th>Status</th>
                                <th>Jira Code</th>
                            </tr>
                        </thead>
                        <tbody class="table table-striped table-hover">
                            <tr>
                                <td><a href="<?php echo base_url('qa/testcase/1'); ?>">1</a></td>
                                <td>Add an appointment</td>
                                <td>Calendar</td>
                                <td>Sam Goria</td>
                                <td><label class="label label-success">Pass</label></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Edit an appointment</td>
                                <td>Calendar</td>
                                <td>Sam Goria</td>
                                <td><label class="label label-danger">Fail</label></td>
                                <td>CW-2</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Delete an appointment</td>
                                <td>Calendar</td>
                                <td>Sam Goria</td>
                                <td><label class="label label-orange">Untested</label></td>
                                <td></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Test Case</th>
                                <th>Module</th>
                                <th>Assinged To</th>
                                <th>Status</th>
                                <th>Jira Code</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>

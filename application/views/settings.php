<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">
        </ol>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-container tab-left tab-default">
                        <ul class="nav nav-tabs">
                            <li class="active"><a aria-expanded="true" href="#home2" data-toggle="tab">Personal</a></li>
                            <li class=""><a aria-expanded="false" href="#profile2" data-toggle="tab">API</a></li>
                            <li class=""><a aria-expanded="false" href="#modules" data-toggle="tab">Modules</a></li>
                            <li class=""><a aria-expanded="false" href="#profile2" data-toggle="tab">System</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home2">
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <form class="form-horizontal row-border" action="">
                                            <h2><strong>PERSONAL SETTINGS</strong></h2>
                                            <h4 class="col-sm-offset-0 pt-xxl mb-n">Account</h4>
                                            <?php //print_r($techdb); ?>
                                            <div>
                                                <center>
                                                    <img src="<?php echo $this->session->gravatar; ?>" class="img-responsive img-circle">
                                                </center>
                                                <br><br>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">Username</label>
                                                        <div class="col-sm-7">
                                                            <input class="form-control" type="text" value="<?php echo $tech['username']; ?>"></input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">Name</label>
                                                        <div class="col-sm-7">
                                                            <input class="form-control" type="text" value="<?php echo $tech['name']; ?>"></input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">Company</label>
                                                        <div class="col-sm-7">
                                                            <input class="form-control" type="text" value="<?php echo $tech['company']; ?>"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">Tickets Handled</label>
                                                        <div class="col-sm-7">
                                                            <input class="form-control" type="text" value="<?php echo $tech['ticketsHandled']; ?>"></input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">Helpdesk ID</label>
                                                        <div class="col-sm-7">
                                                            <input class="form-control" type="text" value="<?php echo $tech['helpdeskID']; ?>"></input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">ClockWork ID</label>
                                                        <div class="col-sm-7">
                                                            <input class="form-control" type="text" value="<?php echo $tech['clockworkID']; ?>"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 class="col-sm-offset-0 pt-xxl">Preferences</h4>
                                            <h5 class="col-sm-offset-0 pt-xxl">Tickets</h5>
                                            <div class="form-group">
                                                <label class="col-sm-6 control-label">Automatically check off "For techs only" when responding to tickets</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="checkbox" <?php if($techdb[0]->Tech){echo "checked";}else{echo "";}; ?>></input>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile2">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-1">
                                        <form class="form-horizontal row-border" action="">
                                            <h2><strong>API SETTINGS</strong></h2>
                                            <h4 class="col-sm-offset-0 pt-xxl mb-n">Pusher API</h4>
                                            <p class="text-muted">Pusher is heavily used throughout the app to eliminate the need for page refreshes. Pusher also powers desktop notifications and
                                            Teamviewer link creations.</p>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">API Key</label>
                                                <div class="col-sm-11">
                                                    <input class="form-control" type="text" value="<?php echo $pusher_apiKey; ?>"></input>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Secret</label>
                                                <div class="col-sm-11">
                                                    <input class="form-control" type="text" value="<?php echo $pusher_secret; ?>"></input>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">App ID</label>
                                                <div class="col-sm-11">
                                                    <input class="form-control" type="text" value="<?php echo $pusher_app_id; ?>"></input>
                                                </div>
                                            </div>
                                            <h4 class="col-sm-offset-0 pt-xxl">TeamViewer API</h4>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">API Key</label>
                                                <div class="col-sm-11">
                                                    <input class="form-control" type="text" value="<?php echo $pusher_apiKey; ?>"></input>
                                                </div>
                                            </div>
                                            <h4 class="col-sm-offset-0 pt-xxl">Helpdesk API</h4>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">URL</label>
                                                <div class="col-sm-11">
                                                    <input class="form-control" type="text" value="http://clockworks.ca/support/helpdesk/api/"></input>
                                                </div>
                                            </div>
                        
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-12 ">
                                                        <div class="alert alert-info p-sm ">
                                                            <i class="fa fa-fw fa-info-circle"></i>&nbsp; All automated requests will be made on behalf of the account below.
                                                        </div>
                                                    </div>
                                                </div>
                                                <label class="col-sm-1 control-label">Username</label>
                                                <div class="col-sm-11">
                                                    <input class="form-control" type="text" value="<?php echo $pusher_secret; ?>"></input>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Password</label>
                                                <div class="col-sm-11">
                                                    <input class="form-control" type="password" value="<?php echo $pusher_app_id; ?>"></input>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            
                            </div>
                            <div class="tab-pane" id="modules">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-1">
                                        <form class="form row-border" action="">
                                            <h2><strong>Modules</strong></h2>
                                            
                                            <?php foreach($modules as $key => $module): ?>
                                            
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label text-right"><?php echo $module['name']; ?></label>
                                                    <div class="col-sm-5">
                                                       <input id="<?php echo $module['name'];?>" data-module="<?php echo $module['name']; ?>" class="bootstrap-switch moduleEnabled" type="checkbox" data-size="mini" data-on-color="info" data-off-color="default" data-on-text="I" data-off-text="O" <?php if($module['enabled']){echo "checked";}else{echo "";}; ?>>
                                                    </div>
                                                </div>
                                            
                                            <?php endforeach; ?>
                                            
                                        </form>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>

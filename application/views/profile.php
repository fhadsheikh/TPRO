<div class="static-content">
    <div class="page-content">
        <div class="page-heading">            
            <h1>Welcome to your profile, <?php echo $user[0]->name; ?></h1>
                <div class="options">
                    <div class="btn-toolbar">
                        <a href="#" class="btn btn-default"><i class="fa fa-fw fa-wrench"></i></a>
                    </div>
                </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="panel panel-profile">
                        <div class="panel-body">
                            <div class="user-card">
                                <div class="avatar">
                                    <img src="<?php echo $gravatar; ?>" class="img-responsive img-circle">
                                </div>
                                <div class="contact-name"><?php echo $user['0']->name; ?></div>
                                <div class="contact-status">Project Manager</div>
                                <ul class="details">
                                    <li><a href="#">heyfromsmith@themex.co</a></li>
                                    <li>+1 234 567 890</li>
                                    <li><?php echo $geoLocation->city.", ".$geoLocation->region_code; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-plain">
                        <div class="panel-body">
                            <?php //echo "<pre>"; print_r($users); echo "</pre>"; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="panel panel-plain">
                        <div class="panel-body">
                            <div class="page-tabs" style="background:none !important; border-bottom:none;">
                                <ul class="nav nav-tabs"><li class="dropdown pull-right tabdrop hide"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-angle-down"></i> </a><ul class="dropdown-menu"></ul></li>
                                    
                                    <li class="active"><a aria-expanded="true" data-toggle="tab" href="#tab1">Activity</a></li>
                                    <li class=""><a aria-expanded="false" data-toggle="tab" href="#tab2">Mentions</a></li>
                                    <li class=""><a aria-expanded="false" data-toggle="tab" href="#tab3">Achievements</a></li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                        <div class="mt-lg"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel-body mailbox-panel p-n">
                                                    <section class="tabular">
                                                        <?php foreach($comments as $comment): ?>
                                                        <div class="message tabular-row">
                                                            <div class="tabular-cell avatar">
                                                                <a href="<?php echo base_url('user/profile'); ?>"><img src="<?php echo $gravatar; ?>" class="avatar" ></a>
                                                            </div>
                                                            <div class="tabular-cell msg">
                                                                <a href="#" class="msgee"><?php echo $comment->FirstName." ".$comment->LastName; ?></a> <?php if(isset($comment->Subject)){echo $comment->Subject;}; ?> <small><span class="pull-right commentDate"><?php echo $comment->CommentDate; ?></span></small>
                                                                <?php if(isset($comment->Detail)){echo "<div class='p-md m-md' style='background:rgb(251, 251, 251) none repeat scroll 0% 0%; border: 1px solid rgb(228, 228, 228);'><p>".$comment->Detail."</p></div>";} ?>
                                                            </div>
                                                        </div>
                                                        <?php endforeach; ?>
                                                    </section>

                                                </div>

                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab2">

                                        sdfsdf

                                    </div>
                                    <div class="tab-pane" id="tab3">

                                        asdfsdf

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-plain">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <center>
                                                <img  src="<?php echo base_url('assets/images/trophy_5.gif');?>">
                                                <strong><span style="font-size:20pt";?>3000</span><br>Tickets Closed</strong>
                                            </center>
                                        </div>
                                        <div class="col-md-3">
                                            <center>
                                                <img  src="<?php echo base_url('assets/images/trophy_1.gif');?>">
                                                <strong><span style="font-size:20pt";?>200</span><br>High Fives</strong>
                                            </center>
                                        </div>
                                        <div class="col-md-3">
                                            <center>
                                                <img  src="<?php echo base_url('assets/images/trophy_3.gif');?>">
                                                <strong><span style="font-size:20pt";?>2500</span><br>Bugs Found</strong>
                                            </center>
                                        </div>
                                        <div class="col-md-3">
                                            <center>
                                                <img  src="<?php echo base_url('assets/images/trophy_2.gif');?>">
                                                <strong><span style="font-size:20pt";?>10</span><br>Work Orders</strong>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-plain">
                                <div class="panel-body pt-n">
                                    <ul class="chat-users mt-lg">
                                        <h4>Friends<small> (10)</small></h4>
                                        <?php foreach($users as $user): ?>
                                            <li><a href="<?php echo base_url().'user/profile/'.$user->helpdesk_id;?>"><img src="<?php echo $user->Gravatar; ?>" alt=""><span><?php echo $user->name; ?></span></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>

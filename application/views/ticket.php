<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create a new task</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal row-border" action="">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group m-n">
                        <label class="col-sm-3 control-label">Title</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" value=""></input>
                        </div>
                    </div>
                    <div class="form-group m-n">
                        <label class="col-sm-3 control-label">Details</label>
                        <div class="col-sm-6">
                            <textarea class="form-control autosize" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 54px;"></textarea>
                        </div>
                    </div>
                    <div class="form-group m-n">
                        <label class="col-sm-3 control-label">Assign User</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="source">
                                <optgroup label="Technicians">
                                    <option value="AK">Azim Ahmed</option>
                                    <option value="HI">Lester Siew</option>
                                    <option value="HI">Mike James</option>
                                    <option value="HI">Mark Kim</option>
                                    <option value="HI">Krystel Ocampo</option>
                                    <option value="HI">Sam Goria</option>
                                </optgroup>
                                <optgroup label="Developers">
                                    <option value="CA">Mike Dinunzio</option>
                                    <option value="NV">Maikel Garma</option>
                                </optgroup>
                                <optgroup label="Misc">
                                    <option value="CA">Wayne Whitley</option>
                                    <option value="NV">Mary Baddam</option>
                                    <option value="OR">Fhad Sheikh</option>
                                    <option value="OR">Charlene Bartlett</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>

            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button id="createTask" type="button" data-dismiss="modal" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">
            <li class=""><a href="index.html">Home</a></li>
            <li class="active"><a href="index.html"><?php echo $pageTitle; ?></a></li>
        </ol>
        <div class="page-heading">            
            <h1>Ticket ID <span id="ticketID"><?php echo $ticket->TicketID; ?></span> - <?php echo $ticket->Subject; ?></h1>
                <div class="options">
                    <div class="btn-toolbar">
                        <a href="#" class="btn btn-default"><i class="fa fa-fw fa-wrench"></i></a>
                    </div>
                </div>
        </div>
        <div class="container-fluid">
                                             
	<div class="row">
        <div class="col-md-9">
			<div class="panel panel-inbox-read">
				<div class="panel-body">
                    <div class="inbox-read-heading">
						<div class="clearfix">
							<div class="pull-left">
						        <a href="#" id="" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Reply"><i class="fa fa-fw fa-level-up fa-rotate-270"></i></a>
						        
		                            <a href="#" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Create Work Order"><i class="fa fa-fw fa-file-text"></i></a>
		                            <a href="#" class="p-n" href="#" data-toggle="modal" data-target="#myModal">
                                        <span class="btn btn-default" data-toggle="tooltip" data-placement="top" title="New Task"><i class="fa fa-fw fa-tasks"></i></span>
                                    </a>
                                    <a href="#" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Submit Bug"><i class="fa fa-fw fa-bug"></i></a>
		                        
                                <a href="#" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-fw fa-trash-o"></i></a>
						        <div class="btn-group">
						            <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Bug Fix <i class="caret"></i></a>
						            <ul class="dropdown-menu">
						                <li><a href="#">Low</a></li>
						                <li><a href="#">Normal</a></li>
						                <li><a href="#">High</a></li>
						                <li><a href="#">Critical</a></li>
						            </ul>
						        </div>
						        <div class="btn-group">
						            <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Critical <i class="caret"></i></a>
						            <ul class="dropdown-menu">
						                <li><a href="#">Low</a></li>
						                <li><a href="#">Normal</a></li>
						                <li><a href="#">High</a></li>
						                <li><a href="#">Critical</a></li>
						            </ul>
						        </div>
						        <div class="btn-group">
						            <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Assigned to Azim Ahmed <i class="caret"></i></a>
						            <ul class="dropdown-menu">
						                <li><a href="#">Azim Ahmed</a></li>
						                <li><a href="#">Lester Siew</a></li>
						                <li><a href="#">Mark Kim</a></li>
						                <li><a href="#">Mike James</a></li>
						                <li><a href="#">Krystel Ocampo</a></li>
						            </ul>
						        </div>
						    </div>
						    <div class="pull-right">
						    	<strong>1</strong> of <strong>141</strong>&nbsp;
						    	<div class="btn-group">
		                            <a href="#" class="btn btn-default"><i class="fa fa-fw fa-angle-left"></i></a>
		                            <a href="#" class="btn btn-default"><i class="fa fa-fw fa-angle-right"></i></a>
		                        </div>
						    </div>
						</div>
					</div>
                    <div class="clearfix">
						<h3 class="inbox-read-title pull-left"><?php echo $ticket->Subject; ?></h3>
						<a href="#" class="btn btn-sm btn-default pull-right"><i class="fa fa-print"></i></a>
					</div>
                    <hr class=" mb-md">
                    <div class="msg-body">
						<p><?php echo $ticket->Body; ?></p>
					</div>
				</div>
			</div>
            <div class="panel panel-default" id="replyBox">
                <div class="panel-heading">
                    <strong>Reply</strong>
                    <div class="pull-right">
                        <label class="control-label label-input-sm" style="font-size: 12px; ">For techs only</label>
                        <input id="techsOnlySwitch" class="bootstrap-switch" type="checkbox" data-size="mini" data-on-color="info" data-off-color="default" data-on-text="I" data-off-text="O" <?php if($techdb[0]->Tech){echo "checked";}else{echo "";}; ?>>
                    </div>          
                                
                </div>
                <div id="summernote" class="panel-body" style="min-height: 70px">
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button id="replyButton" style="width:100%" class="btn btn-primary">Reply</button>
                    </div>
                </div>
            </div>
            <div class="panel panel-gray" style="margin-left:0px">
			<div class="panel-body mailbox-panel" style="padding: 0px 24px 0px 0px">
                <?php foreach($comments as $comment):?>
                <?php if($comment->UserName == $ticket->SubmitterUserInfo->Username): ?>
                    <section class="tabular pl-md" style="border-left:solid 3px rgb(255, 127, 0);">
                        <div class="message tabular-row">
                            <div class="tabular-cell avatar">
                                <img src="<?php echo $comment->Gravatar; ?>" alt="avatar" class="">
                            </div>
                            <div class="tabular-cell msg">
                                <a href="#" class="msgee"><?php echo $comment->UserName; ?></a>
                                <span class="pull-right"><small><?php echo $comment->CommentDate; ?></small></span>
                                <p><?php echo $comment->Body; ?></p>
                            </div>
                        </div>
                    </section>
                <?php elseif($comment->ForTechsOnly == true): ?>
                    <section class="tabular pl-md" style="border-left:solid 3px rgb(0, 210, 255);">
                        <div class="message tabular-row">
                            <div class="tabular-cell avatar">
                                <img src="<?php echo $comment->Gravatar; ?>" alt="avatar" class="">
                            </div>
                            <div class="tabular-cell msg">
                                <a href="#" class="msgee"><?php echo $comment->UserName; ?></a>
                                <span class="pull-right"><small><?php echo $comment->CommentDate; ?></small></span>
                                <p><?php echo $comment->Body; ?></p>
                            </div>
                        </div>
                    </section>
                <?php else: ?>
                    <section class="tabular pl-md" style="border-left:solid 3px #98E700">
                        <div class="message tabular-row">
                            <div class="tabular-cell avatar">
                                <img src="<?php echo $comment->Gravatar;?>" alt="avatar" class="">
                            </div>
                            <div class="tabular-cell msg">
                                <a href="#" class="msgee"><?php echo $comment->UserName; ?></a>
                                <span class="pull-right"><small><?php echo $comment->CommentDate; ?></small></span>
                                <p><?php echo $comment->Body; ?></p>
                            </div>
                        </div>
                    </section>
                <?php endif; endforeach; ?>

			</div>

		</div>
		</div>
		<div class="col-md-3">
            <div id="pendingTask" class="panel panel-orange" style="border: none;">
                <div class="panel-heading">
                    <h2 style="color:white"><i class="fa fa-exclamation-triangle"></i> Task Pending</h2>
                </div>
                <div class="panel-body p-md" style="background: #fafafa;color: black;">
                    <dl>
                        <dt>Details of Task #432</dt>
                        <dd>Review attached security report</dd>
                        <dt>Tech Status</dt>
                        <dd>Waiting to get answers from developers</dd>
                        <dt>Assigned to</dt>
                        <dd>John Smith.</dd>                    
                        <dt>Date Assigned</dt>
                        <dd>23/11/2015</dd>
                      </dl>
                </div>
            </div>
            <a class="btn btn-block btn-danger btn-compose" href="">Close Ticket</a>
            <div class="inbox-menu mt-lg">

                <div class="collapsible-menu" style="border-top: 0;">
                    <span class="inbox-leftbar-category clearfix">
                        <a href="javascript:;" data-toggle="collapse" data-target="#folders" class="category-heading"><?php echo $ticket->SubmitterUserInfo->Username; ?></a>

                    </span>
                    <div class="collapse in" id="folders">
                        <a id="currentlyOpen" class="inbox-menu-item">Currently Open <span id="allTicketsBadge" class="badge badge-primary"><?php echo $currentlyOpenCount; ?></span></a>
                        <div id="hideBox" class="currentlyOpen">
                            <?php foreach($currentlyOpen as $co): ?>
                            <ul>
                                <li><?php echo $co->Subject; ?></li>
                            </ul>
                            <?php endforeach; ?>
                        </div>
                        <a id="bugfix" class="inbox-menu-item">Total Submitted <span id="bugFixBadge" class="badge badge-primary">34</span></a>
                        <a id="inquiry" class="inbox-menu-item">Recently met with: <br> <strong>Azim, Mark, Lester</strong></a>
                    </div>
                </div>
                <div class="collapsible-menu">
                    <span class="inbox-leftbar-category clearfix">
                        <a href="javascript:;" data-toggle="collapse" data-target="#folders" class="category-heading"><?php echo $ticket->SubmitterUserInfo->CompanyName; ?></a>

                    </span>
                    <div class="collapse in" id="folders">
                        <a id="allTickets" class="inbox-menu-item">Currently Open <span id="allTicketsBadge" class="badge badge-primary">4</span></a>
                        <a id="bugfix" class="inbox-menu-item">Total Submitted <span id="bugFixBadge" class="badge badge-primary">34</span></a>
                        <a id="inquiry" class="inbox-menu-item">Recently met with: <br> <strong>Azim, Mark, Lester</strong></a>
                    </div>
                </div>

                </div>

		</div>

	</div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
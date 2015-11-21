
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
            <div class="input-group mb-lg">
				<input class="form-control" placeholder="Search tickets..." type="text">
				<span class="input-group-btn">
					<a class="btn btn-primary" href="#"><i class="fa fa-fw fa-search"></i></a>
				</span>
			</div>
			<div class="panel panel-inbox-read">
				<div class="panel-body">
                    <div class="inbox-read-heading">
						<div class="clearfix">
							<div class="pull-left">
						        <a href="app-inbox.html" class="btn btn-default"><i class="fa fa-fw fa-level-up fa-rotate-270"></i></a>
						        <div class="btn-group">
		                            <a href="#" class="btn btn-default"><i class="fa fa-fw fa-archive"></i></a>
		                            <a href="#" class="btn btn-default"><i class="fa fa-fw fa-warning"></i></a>
		                            <a href="#" class="btn btn-default"><i class="fa fa-fw fa-trash-o"></i></a>
		                        </div>
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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Reply</strong>
                    <div class="pull-right">
                        <label class="control-label label-input-sm" style="font-size: 12px; ">For techs only</label>
                        <input id="techsOnlySwitch" class="bootstrap-switch" type="checkbox" data-size="mini" data-on-color="info" data-off-color="default" data-on-text="I" data-off-text="O" <?php if($techdb[0]->Tech){echo "checked";}else{echo "";}; ?>>
                    </div>          
                                
                </div>
                <div id="summernote" class="panel-body">
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button id="replyButton" style="width:100%" class="btn btn-primary">Reply</button>
                    </div>
                </div>
            </div>
            <?php foreach($comments as $comment): ?>
                <?php if($comment->UserName == $ticket->SubmitterUserInfo->Username): ?>
                    <div class="panel">
                        <div class="panel-heading" style="background-color:#fff; border-bottom: solid 1px rgb(225, 127, 0);">
                            <span class="pull-right"><strong><?php echo $comment->CommentDate; ?></strong></span> <strong><?php echo $comment->UserName; ?></strong>
                        </div>
                        <div class="panel-body">
                            <?php echo $comment->Body; ?>
                        </div>
                    </div>
                <?php elseif($comment->ForTechsOnly == true): ?>
                    <div class="panel">
                        <div class="panel-heading" style="background-color:#fff; border-bottom: solid 1px rgb(0, 210, 255);">
                            <span class="pull-right"><strong><?php echo $comment->CommentDate; ?></strong></span> <strong><?php echo $comment->UserName; ?></strong>
                        </div>
                        <div class="panel-body">
                            <?php echo $comment->Body; ?>
                        </div>
                    </div>
                <?php else: ?>
                <div class="panel">
                    <div class="panel-heading" style="background-color:#fff; border-bottom: solid 1px #98E700;">
                        <span class="pull-right"><strong><?php echo $comment->CommentDate; ?></strong></span> <strong><?php echo $comment->UserName; ?></strong>
                    </div>
                    <div class="panel-body">
                        <?php echo $comment->Body; ?>
                    </div>
                </div>
            
            <?php endif; endforeach; ?>
		</div>
		<div class="col-md-3">
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
<div id="headerbar">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-midnightblue">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-tags"></i></div>
                        <div class="pull-right"><span class="badge">2</span></div>
					</div>
					<div class="tile-footer">
						My Tickets
					</div>
				</a>
			</div>
			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-midnightblue">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-tasks"></i></div>
						<div class="pull-right"><span class="badge">2</span></div>
					</div>
					<div class="tile-footer">
						My Projects
					</div>
				</a>
			</div>
			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-midnightblue">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-envelope-o"></i></div>
						<div class="pull-right"><span class="badge">10</span></div>
					</div>
					<div class="tile-footer">
						My Messages
					</div>
				</a>
			</div>
			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-midnightblue">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-support"></i></div>
						<div class="pull-right"><span class="badge">3</span></div>
					</div>
					<div class="tile-footer">
						My Jira Tickets
					</div>
				</a>
			</div>

			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-midnightblue">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-calendar"></i></div>
					</div>
					<div class="tile-footer">
						My Calendar
					</div>
				</a>
			</div>
			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-midnightblue">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-cog"></i></div>
					</div>
					<div class="tile-footer">
						My Settings
					</div>
				</a>
			</div>
		</div>
	</div>
</div>
<header id="topnav" class="navbar navbar-midnightblue navbar-fixed-top clearfix" role="banner">
	<span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
		<a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar"><span class="icon-bg"><i class="fa fa-fw fa-bars"></i></span></a>
	</span>

	<a class="navbar-brand" href="index.html"></a>

	<span id="trigger-infobar" class="toolbar-trigger toolbar-icon-bg">
		<a data-toggle="tooltips" data-placement="left" title="Toggle Infobar"><span class="icon-bg"><i class="fa fa-fw fa-bars"></i></span></a>
	</span>
	
	


	<ul class="nav navbar-nav toolbar pull-right">
		<li class="dropdown toolbar-icon-bg">
			<a href="#" id="navbar-links-toggle" data-toggle="collapse" data-target="header>.navbar-collapse">
				<span class="icon-bg">
					<i class="fa fa-fw fa-ellipsis-h"></i>
				</span>
			</a>
		</li>

		<li class="dropdown toolbar-icon-bg demo-search-hidden">
			<a href="#" class="dropdown-toggle tooltips" data-toggle="dropdown"><span class="icon-bg"><i class="fa fa-fw fa-search"></i></span></a>
			
			<div class="dropdown-menu dropdown-alternate arrow search dropdown-menu-form">
				<div class="dd-header">
					<span>Search</span>
					<span><a href="#">Advanced search</a></span>
				</div>
				<div class="input-group">
					<input type="text" class="form-control" placeholder="">
					
					<span class="input-group-btn">
						
						<a class="btn btn-primary" href="#">Search</a>
					</span>
				</div>
			</div>
		</li>

		<li class="toolbar-icon-bg demo-headerdrop-hidden">
            <a href="#" id="headerbardropdown"><span class="icon-bg"><i class="fa fa-fw fa-level-down"></i></span></i></a>
        </li>

        <li class="toolbar-icon-bg hidden-xs" id="trigger-fullscreen">
            <a href="#" class="toggle-fullscreen"><span class="icon-bg"><i class="fa fa-fw fa-arrows-alt"></i></span></i></a>
        </li>

		
		<li class="dropdown toolbar-icon-bg">
			<a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-fw fa-bell"></i></span><span id="notificationsBadge" class="badge badge-info"></span></a>
			<div class="dropdown-menu dropdown-alternate notifications arrow">
				<div class="dd-header">
					<span>Notifications</span>
					<span><a href="#">Settings</a></span>
				</div>
				<div class="scrollthis scroll-pane">
					<ul id="notificationsBox" class="scroll-content">

					</ul>
				</div>
				<div class="dd-footer">
					<a href="#">View all notifications</a>
				</div>
			</div>
		</li>

		<li class="dropdown toolbar-icon-bg hidden-xs">
			<a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-fw fa-tasks"></i></span></a>
			<div class="dropdown-menu dropdown-alternate messages arrow">
				<div class="dd-header">
					<span>Tasks</span>
				</div>

				<div class="scrollthis scroll-pane">
					<ul class="scroll-content">
				        <li class="">
							<a class="p-sm" href="#">
                                <div class="contextual-progress">
                                    <div class="clearfix">
                                        <div class="progress-title"><span style="">Autofind seat</span></div>
                                        <div class="progress-percentage">Due Today</div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" style="width: 75%"></div>
                                    </div>
                                </div>
							</a>
						</li>
				        <li class="">
							<a class="p-sm" href="#">
                                <div class="contextual-progress">
                                    <div class="clearfix">
                                        <div class="progress-title">UI Design</div>
                                        <div class="progress-percentage">75%</div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-lime" style="width: 75%"></div>
                                    </div>
                                </div>
							</a>
						</li>
					</ul>
				</div>

				<div class="dd-footer"><a href="#">View all tasks</a></div>
			</div>
		</li>
		<li class="dropdown toolbar-icon-bg hidden-xs">
			<a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-fw fa-envelope"></i></span></a>
			<div class="dropdown-menu dropdown-alternate messages arrow">
				<div class="dd-header">
					<span>Messages</span>
					<span><a href="#">Settings</a></span>
				</div>

				<div class="scrollthis scroll-pane">
					<ul class="scroll-content">
						<li class="">
							<a class="p-sm" href="#">
                                <div class="contextual-progress">
                                    <div class="clearfix">
                                        <div class="progress-title">UI Design</div>
                                        <div class="progress-percentage">75%</div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-lime" style="width: 75%"></div>
                                    </div>
                                </div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="msg-content">
									<span class="name">Roxann Hollingworth <i class="fa fa-paperclip attachment"></i></span>
									<span class="msg">Lorem ipsum dolor sit amet consectetur adipisicing elit</span>
								</div>
								<span class="msg-time">5m</span>
							</a>
						</li>
					</ul>
				</div>

				<div class="dd-footer"><a href="#">View all messages</a></div>
			</div>
		</li>

		

		<li class="dropdown toolbar-icon-bg">
			<a href="#" class="dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-fw fa-user"></i></span></a>
			<ul class="dropdown-menu userinfo arrow">
				<li><a href="#"><span class="pull-left">Profile</span> <span class="badge badge-info">80%</span></a></li>
				<li><a href="<?php echo base_url('admin/settings'); ?>"><span class="pull-left">Settings</span> <i class="pull-right fa fa-cog"></i></a></li>
				<li><a href="#"><span class="pull-left">Integrations</span> <i class="pull-right fa fa-cog"></i></a></li>
				<li class="divider"></li>
				<li><a href="<?php echo base_url('user/logout'); ?>"><span class="pull-left">Sign Out</span> <i class="pull-right fa fa-sign-out"></i></a></li>
			</ul>
		</li>

	</ul>

</header>


        <div id="wrapper">
            <div id="layout-static">
                <div class="static-sidebar-wrapper sidebar-midnightblue">
                    <div class="static-sidebar">
                        <div class="sidebar">
                            <div class="widget stay-on-collapse" id="widget-welcomebox">
                                <div class="widget-body welcome-box tabular">
                                    <div class="tabular-row">
                                        <div class="tabular-cell welcome-avatar">
                                            <a href="#"><img src="<?php echo $this->session->gravatar; ?>" class="avatar"></a>
                                        </div>
                                        <div class="tabular-cell welcome-options">
                                            <span class="welcome-text">Welcome,</span>
                                            <a href="#" class="name"><?php  echo $this->session->FullName; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget stay-on-collapse" id="widget-sidebar">
                                <nav role="navigation" class="widget-body">
                                    <ul class="acc-menu">
                                        <li class="nav-separator">Modules</li>
                                        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
                                        <li><a href="<?php echo base_url('reports'); ?>"><i class="fa fa-bar-chart-o"></i><span>Reports</span></a></li>
                                        <li><a href="<?php echo base_url('triage'); ?>"><i class="fa fa-crosshairs"></i><span>Triage</span></a></li>
                                        <li><a href="<?php echo base_url('tickets'); ?>"><i class="fa fa-tags"></i><span>Tickets</span></a></li>
                                        <li><a href="<?php echo base_url('support'); ?>"><i class="fa fa-support"></i><span>Support</span></a></li>
                                        <li><a href="<?php echo base_url('qa'); ?>"><i class="fa fa-bug"></i><span>QA</span></a></li>
                                        <li><a href="index.html"><i class="fa fa-users"></i><span>CRM</span></a></li>
                                        <li><a href="index.html"><i class="fa fa-users"></i><span>Project Management</span></a></li>
                                        
                                        <li class="nav-separator">Tools</li>
                                        <li><a href="app-inbox.html"><i class="fa fa-inbox"></i><span>Inbox</span><span class="badge badge-success">3</span></a></li>
                                        <li><a href="app-inbox.html"><i class="fa fa-tasks"></i><span>To Do</span><span class="badge badge-danger">30</span></a></li>
                                        <li><a href="app-inbox.html"><i class="fa fa-calendar"></i><span>Calendar</span></a></li>
                                        <li><a href="app-inbox.html"><i class="fa fa-comments-o"></i><span>Chat</span><span class="badge badge-success">3</span></a></li>
                                        
                                        <li class="nav-separator">External Links</li>
                                        <li><a href="app-inbox.html"><i class="fa fa-inbox"></i><span>Helpdesk</span><span class="badge badge-success">3</span></a></li>
                                        <li><a href="app-tasks.html"><i class="fa fa-tasks"></i><span>Jira</span><span class="badge badge-info">7</span></a></li>
                                        <li><a href="app-notes.html"><i class="fa fa-pencil-square-o"></i><span>Confluence</span></a></li>

                                        
                                        

                                    </ul>
                                </nav>
                            </div>
                            </div>
                            </div>
                            </div>
                                <div class="static-content-wrapper">
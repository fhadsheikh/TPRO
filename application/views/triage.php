<!-- Modal -->
<div class="modal fade" id="ticketSearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Search for a ticket</h4>
      </div>
      <div class="modal-body">
                    <form class="form-horizontal" action="<?php echo base_url('tickets/search'); ?>" method="post">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input id="1" type="text" data-numbers="true" maxlength="1" onkeyup="nextTextBox(this)" class="form-control" autofocus>
                                    </div>
                                    <div class="col-md-3">
                                        <input id="2" type="text" data-numbers="true" maxlength="1" onkeyup="nextTextBox(this)" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <input id="3" type="text" data-numbers="true" maxlength="1" onkeyup="nextTextBox(this)" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <input id="4" type="text" data-numbers="true" maxlength="1" onkeyup="nextTextBox(this)" class="form-control">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </form>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>
<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">
            <li class=""><a href="index.html">Home</a></li>
            <li class="active"><a href="index.html"><?php echo $pageTitle; ?></a></li>
        </ol>
        <div class="page-heading mb0">            
            <h1><?php echo $pageTitle; ?></h1>
                <div class="options">
                    <form class="form-horizontal" action="<?php echo base_url('tickets/search'); ?>" method="post">
                        <div class="form-group">
                            
                                <div class="input-group">
                                    <input id="ticketSearchTextBox" class="form-control" name="ticketID" placeholder="Search for a ticket..." type="text">
                                    <div class="input-group-btn">
                                        <button id="submitTicketSearch" type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            
                        </div>
                    </form>
                </div>
        </div>
        <div class="page-tabs">
            <ul class="nav nav-tabs">

                <li class="active"><a data-toggle="tab" href="#tab1">Ticket Assignment</a></li>
                <li><a data-toggle="tab" href="#tab2">Technician Statistics</a></li>
                <li><a data-toggle="tab" href="#tab3">Open Tickets</a> <span id="openBadge" class="badge badge-danger"></span></li>
                <li><a data-toggle="tab" href="#tab6">Training</a><span id="trainingBadge" class="badge badge-danger"></span></li>

            </ul>
        </div>
        <div class="container-fluid">    

<div class="tab-content">
	<div class="tab-pane active" id="tab1">
        <div class="row">
            
        </div>
		<div class="row">
			<div class="col-md-12">
                
				<div class="panel panel-default">
                    
                    
                   
			<div class="panel-body">
				<form action="" class="form-horizontal">
					<div class="form-group ">
						<div class="col-sm-2">
                           <a href="<?php echo base_url('admin/fullsync');?>" class="btn btn-danger">Sync</a>
                        </div>
                        <div id="progressbar"></div>
						<div class="col-sm-10" style="text-align: right;">
                            <label class="control-label" style="margin-right: 10px">Select Date Range </label>
							<button class="btn btn-default" id="daterangepicker2">
								<i class="fa fa-calendar"></i> 
								<span><?php echo date("F j, Y", strtotime('-30 day')); ?> - <?php echo date("F j, Y"); ?></span> <b class="caret"></b>
							</button>
						</div>
					</div>
				</form>
                			<div class="panel-body panel-no-padding">
				<div id="demo">
                    
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-fixed-header m0" id="example">
						<thead>
							<tr>
								<th width="7%">Ticket ID</th>
								<th width="13%">Assigned Technician</th>
								<th width="">Subject</th>
								<th width="15%">Submitted By</th>
								<th width="20%">Company</th>
								<th width="7%">Status</th>
								<th width="8%">Lifespan</th>
							</tr>
						</thead>
						
						<tfoot>
							<tr>
								<th>Ticket ID</th>
								<th>Assigned Technician</th>
								<th>Subject</th>
								<th>Submitted By</th>
								<th>Company</th>
								<th>Status</th>
								<th>Lifespan</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			</div>
				</div>
			</div>
		</div>

	</div>
	<div class="tab-pane" id="tab2">

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
			<div class="panel-body">
				<form action="" class="form-horizontal">
					<div class="form-group ">
						<div class="col-sm-2">
                           
                        </div>
                        <div id="progressbar"></div>
						<div class="col-sm-10" style="text-align: right;">
                            <label class="control-label" style="margin-right: 10px">Select Date Range </label>
							<button class="btn btn-default" id="techPicker">
								<i class="fa fa-calendar"></i> 
								<span><?php echo date("F j, Y", strtotime('-30 day')); ?> - <?php echo date("F j, Y"); ?></span> <b class="caret"></b>
							</button>
						</div>
					</div>
				</form>
                <div class="panel-body panel-no-padding">
				<div id="demo">
                    
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-fixed-header m0" id="techs">
						<thead>
							<tr>
								<th width="">Technician</th>
								<th width="">Tickets Assigned</th>
								<th width="">Reminders Given</th>
							</tr>
						</thead>
						
						<tfoot>
							<tr>
								<th width="">Technician</th>
								<th width="">Tickets Assigned</th>
								<th width="">Reminders Given</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane" id="tab3">
        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
			<div class="panel-body">
				<form action="" class="form-horizontal">
					<div class="form-group ">
						<div class="col-sm-2">
                        </div>
					</div>
				</form>
                			<div class="panel-body panel-no-padding">
				<div id="demo">
                    
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-fixed-header m0" id="openTable">
						<thead>
							<tr>
								<th width="7%">Ticket ID</th>
								<th width="7%">Assigned Technician</th>
								<th width="61%">Subject</th>
								<th width="7%">User</th>
								<th width="10%">Company</th>
								<th width="7%">Status</th>
								<th width="8%">Lifespan</th>
							</tr>
						</thead>
						
						<tfoot>
							<tr>
								<th>Ticket ID</th>
								<th>Assigned Technician</th>
								<th>Subject</th>
								<th>User</th>
								<th>Company</th>
								<th>Status</th>
								<th>Lifespan</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			</div>
				</div>
			</div>
		</div>

	</div>
    <div class="tab-pane" id="tab6">
        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
			<div class="panel-body">
				<form action="" class="form-horizontal">
					<div class="form-group ">
						<div class="col-sm-2">
                            <a data-toggle="modal" href="#myModal" class='btn btn-danger'>Remind</a>
                        </div>
                        <div id="progressbar"></div>
						<div class="col-sm-10" style="text-align: right;">
                            <label class="control-label" style="margin-right: 10px">Select Date Range </label>
							<button class="btn btn-default" id="trainingPicker">
								<i class="fa fa-calendar"></i> 
								<span><?php echo date("F j, Y", strtotime('-30 day')); ?> - <?php echo date("F j, Y"); ?></span> <b class="caret"></b>
							</button>
						</div>
					</div>
				</form>
                			<div class="panel-body panel-no-padding">
				<div id="demo">
                    
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-fixed-header m0" id="training">
						<thead>
							<tr>
								<th>Technician</th>
								<th>Training Hours</th>
								<th>Workorder Hours</th>
							</tr>
						</thead>
						
						<tfoot>
							<tr>
								<th>Technician</th>
								<th>Training Hours</th>
								<th>Workorder Hours</th>
							</tr>
						</tfoot>
					</table>
				</div>
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


        

				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h2 class="modal-title">Technician Reminder</h2>
                                <p><i class="fa fa-fw fa-info-circle"></i> Fill out the fields below and click submit to send Hipchat message and an Email to Azim</p>
							</div>
                            <br>
							<form class="form-horizontal row-border" action="<?php echo base_url('triage/notify');?>" method="post">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Technician</label>
                                    <div class="col-sm-4">
                                        <select name="tech" id="tech" class="form-control">
                                            <?php foreach($techs as $tech): ?>
                                            <option value="<?php echo $tech->helpdesk_id; ?>"><?php echo $tech->name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Ticket ID</label>
                                    <div class="col-sm-2">
                                        <input name="ticketID" class="form-control" type="text"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Warning type</label>
                                    <div class="col-sm-4">
                                        <select name="warningtype" id="source" class="form-control">
                                            <option value="verbal">Verbal</option>
                                            <option value="written">Written</option>
                                            <option value="written">Meeting</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Date</label>
                                    <div class="col-sm-4">
                                        <input name="date" id="datepicker" class="form-control" type="text"></input>
                                    </div>
                                </div>
                               
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<input type="submit" value="Submit" class="btn btn-primary"></input>
							</div>
                    
                            </form>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

<script type="text/javascript">
    var channel = pusher.subscribe('ticketMonitor');
    channel.bind('tickets_updated', function(data) {
        console.log('pusher checkpoint');
            var siteURL = $('#siteURL').text();
            $.ajax({
                url: siteURL+"triage/get/<?php echo date("Y-m-d")."/".date("Y-m-d");?>",
                dataType: 'json',
                success: function(s){
                    oTable.clear().rows.add(s).draw();

            }
        });
    channel.bind('newTicket', function(data) {
        console.log('pusher checkpoint');
            var siteURL = $('#siteURL').text();
            $.ajax({
                url: siteURL+"triage/get/<?php echo date("Y-m-d")."/".date("Y-m-d");?>",
                dataType: 'json',
                success: function(s){
                    oTable.clear().rows.add(s).draw();

            }
        });
    channel.bind('newComment', function(data) {
        console.log('pusher checkpoint');
            var siteURL = $('#siteURL').text();
            $.ajax({
                url: siteURL+"triage/get/<?php echo date("Y-m-d")."/".date("Y-m-d");?>",
                dataType: 'json',
                success: function(s){
                    oTable.clear().rows.add(s).draw();

            }
        });
//      $('#ticketAlert').slideDown();
//    
//        
//        (function countdown(remaining) {
//            if(remaining <= 0)
//                location.reload(true);
//            document.getElementById('ticketAlert').innerHTML = 'There\'s been a change in the Helpdesk. Page will refresh in '+remaining+' seconds.';
//            setTimeout(function(){ countdown(remaining - 1); }, 1000);
//        })(5); // 5 seconds
        
        
    });
</script>
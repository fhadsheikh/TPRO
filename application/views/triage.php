<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">
            <li class=""><a href="index.html">Home</a></li>
            <li class="active"><a href="index.html"><?php echo $pageTitle; ?></a></li>
        </ol>
        <div class="page-heading mb0">            
            <h1><?php echo $pageTitle; ?></h1>
                <div class="options">
                    <div class="btn-toolbar">
                        <a href="#" class="btn btn-default"><i class="fa fa-fw fa-wrench"></i></a>
                    </div>
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
                <div id="ticketAlert" class="alert alert-dismissable alert-danger">
                    <i class="fa fa-fw fa-rocket"></i> Tickets have been updated
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>
                </div>
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
    var channel = pusher.subscribe('TPROAPP');
    channel.bind('tickets_updated', function(data) {
            $.ajax({
                url: "http://clockwork-fhad:8081/TPRO/triage/get/<?php echo date("Y-m-d")."/".date("Y-m-d");?>",
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
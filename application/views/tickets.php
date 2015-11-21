
<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">
            <li class=""><a href="index.html">Home</a></li>
            <li class="active"><a href="index.html"><?php echo $pageTitle; ?></a></li>
        </ol>
        <div class="page-heading">            
            <h1><?php echo $pageTitle; ?><i class="fa fa-rocket"></i></h1>
                <div class="options">
                    <div class="btn-toolbar">
                        <a href="#" class="btn btn-default"><i class="fa fa-fw fa-wrench"></i></a>
                    </div>
                </div>
        </div>
        <div class="container-fluid">
                                <div id="ticketAlert" class="alert alert-dismissable alert-danger">
                    <i class="fa fa-fw fa-rocket"></i> Tickets have been updated
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>
                </div>             
	<div class="row">
		<div class="col-md-2">
<div class="inbox-menu mt-lg">

	<div class="collapsible-menu" style="border-top: 0;">
		<span class="inbox-leftbar-category clearfix">
			<a href="javascript:;" data-toggle="collapse" data-target="#folders" class="category-heading">Ticket Folders</a>
			
		</span>
		<div class="collapse in" id="folders">
			<a id="allTickets" class="inbox-menu-item active">All Support Tickets <span id="allTicketsBadge" class="badge badge-primary"></span></a>
			<a id="bugfix" class="inbox-menu-item">Bug Fix <span id="bugFixBadge" class="badge badge-primary"></span></a>
			<a id="inquiry" class="inbox-menu-item">Inquiry <span id="inquiryBadge" class="badge badge-primary"></span></a>
		</div>
	</div>

	<div class="collapsible-menu">
		<span class="inbox-leftbar-category clearfix">
			<a href="javascript:;" data-toggle="collapse" data-target="#quicklinks" class="category-heading">Filters</a>
			
			
		</span>
		<div class="collapse in" id="quicklinks">
			<a href="#" class="inbox-menu-item">Handled by Me <span class="badge"></span></a>
			<a href="#" class="inbox-menu-item">Unassigned <span class="badge"></span></a>
			<a href="#" class="inbox-menu-item">Unanswered <span class="badge"></span></a>
			<a href="#" class="inbox-menu-item">Unresponded <span class="badge"></span></a>
			<a href="#" class="inbox-menu-item">Critical <span class="badge"></span></a>
			<a href="#" class="inbox-menu-item">Support Expired <span class="badge"></span></a>
			<a href="#" class="inbox-menu-item">Expired Support <span class="badge"></span></a>
			<a href="#" class="inbox-menu-item">Company <span class="badge"></span></a>
		</div>
	</div>

	<div class="collapsible-menu">
		<span class="inbox-leftbar-category clearfix">
			<a href="javascript:;" data-toggle="collapse" data-target="#customfolders" class="category-heading">Status</a>
			
		</span>
		<div class="collapse in" id="customfolders">
			<a href="#" class="inbox-menu-item"><i class="text-danger fa fa-circle-o mr"></i>New</a>
			<a href="#" class="inbox-menu-item"><i class="text-success fa fa-circle-o mr"></i>Updated by TPRO</a>
			<a href="#" class="inbox-menu-item"><i class="text-warning fa fa-circle-o mr"></i>Updated by Client</a>
			<a href="#" class="inbox-menu-item"><i class="text-info fa fa-circle-o mr"></i>Updated for TPRO</a>
		</div>
	</div>

</div>

		</div>
		<div class="col-md-10">
            <div class="input-group mb-lg">
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
                			<div class="panel-body panel-no-padding">
				<div id="demo">
                    
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-fixed-header m0" id="tickets">
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
				</div>
			</div>
				</div>
			</div>
		</div>
	</div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
<script type="text/javascript">
    var channel = pusher.subscribe('TPROAPP');
    channel.bind('tickets_updated', function(data) {
      $('#ticketAlert').slideDown();
    
        
        (function countdown(remaining) {
            if(remaining <= 0)
                location.reload(true);
            document.getElementById('ticketAlert').innerHTML = 'There\'s been a change in the Helpdesk. Page will refresh in '+remaining+' seconds.';
            setTimeout(function(){ countdown(remaining - 1); }, 1000);
        })(5); // 5 seconds
        
        
    });
</script>


    <body class="focused-form">
        
        
<div class="container" id="login-form">
    <div class="row" style="padding: 100px 0px 10px 0px;">
        <div class="col-md-4 col-md-offset-4">
	       <a href="index.html" class="login-logo"><img src="<?php echo base_url('assets/images/clockwork_logo.png'); ?>"></a>
        </div>   
        </div>
        <div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading"><h2>Login Form</h2></div>
				<div class="panel-body">
					
					<form action="<?php echo base_url('user/authenticate'); ?>" method="post" class="form-horizontal" id="validate-form">
						<div class="form-group">
	                        <div class="col-xs-12">
	                        	<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<input name="username" type="text" class="form-control" placeholder="Username" data-parsley-minlength="6" placeholder="At least 6 characters" required>
								</div>
	                        </div>
						</div>

						<div class="form-group">
	                        <div class="col-xs-12">
	                        	<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-key"></i>
									</span>
									<input type="password" class="form-control" name="password" placeholder="Password">
								</div>
	                        </div>
						</div>

						<div class="form-group">
							<div class="col-xs-12">
								<a href="extras-forgotpassword.html" class="pull-right">Forgot password?</a>
							</div>
						</div>
					

						<div class="panel-footer">
							<div class="clearfix">
								<a href="extras-registration.html" class="btn btn-default pull-left">Register</a>
                                <input type="submit" class="btn btn-primary pull-right" value="Login"></input>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>

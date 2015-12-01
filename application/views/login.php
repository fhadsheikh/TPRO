<body class="focused-form" style="background-image:url(http://www.salbii.com/wp-content/themes/salbii/images/wp-admin/layout-backgrounds/bgimg3.jpg); background-size:cover">
    <div class="container" id="login-form">
        <div class="row" style="margin-top:360px;">
            <div class="col-md-4 col-md-offset-4">
                <form action="<?php echo base_url('user/authenticate'); ?>" method="post" class="form-horizontal" id="validate-form">
                    <div class="login-block">
                        <input name="username" type="text" value="" placeholder="Username" id="username" />
                        <input name="password" type="password" value="" placeholder="Password" id="password" />
                        <button>Submit</button>
                    </div>
                    <a href="#" class="text-danger pull-right pr-lg" data-toggle="tooltip" data-placement="top" title="This application uses your HelpDesk password. Please change your password in the ticketing system if you have forgotten your password.">Forgot password?</a>
                </form>
                <img src="<?php echo base_url('assets/images/clockwork_logo.png'); ?>" style="position:fixed;bottom:50px;right:50px;">
            </div>
        </div>
    </div>
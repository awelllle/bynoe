<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
  
    <title><?php echo $title; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>admin_assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>admin_assets/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url() ?>admin_assets/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>admin_assets/css/style.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>admin_assets/css/custom.css" rel="stylesheet">
                              
    <!-- color CSS -->
    <link href="<?php echo base_url() ?>admin_assets/css/colors/megna.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
                <form class=" login-reg-form" id="loginform" action="<?php echo site_url('login') ?>" method="post">
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            <div class="user-thumb text-center"> 							
							<a href="">
			<!--<img alt="Logo" class="img-circle" width="100" src="<?php echo base_url() ?>admin_assets/plugins/images/users/genmu.jpg">-->
			                 <h2>Tabfad Stores</h2>
			
                                <h3>Welcome back!</h3>
								<!--<h5>Please sign in </h5>-->
							</a>
						</div>
                     </div>
                   </div>
	           
					<div class="form-group">                                        
					   <div class="input-group">                                          
							<div class="input-group-addon"><i class="ti-user"></i></div>                                                                                           
					<input class="form-control" type="text"  id="identity" name="email" placeholder="Email" required>                                               
						  </div>									  
					</div>
					
					<div class="form-group">                                        
					   <div class="input-group">                                          
							<div class="input-group-addon"><i class="ti-lock"></i></div>                                                                                           
				<input class="form-control" type="password"  id="password" name="password" placeholder="Password" required>                                               
						  </div>									  
					</div>					  
                    <div class="form-group text-center">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" id="button" name="submit" type="submit">Login</button>
                        </div>
                    </div>
					
					<span id="error"></span>
					<?php echo $this->session->flashdata('msg'); ?>
					
                </form>
            </div>
        </div>
		
		
    </section>
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>admin_assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>admin_assets/bootstrap/dist/js/tether.min.js"></script>
    <script src="<?php echo base_url() ?>admin_assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>admin_assets/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?php echo base_url() ?>admin_assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?php echo base_url() ?>admin_assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url() ?>admin_assets/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url() ?>admin_assets/js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="<?php echo base_url() ?>admin_assets/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
 <script type="text/javascript" > 
$('#button').click(function() {
    var form_data = {
		submit:'submit',
        identity: $('#identity').val(),
        password: $('#password').val(),
    };
    //var data = $("#sreg-form").serialize();
        $.ajax({
        url: "<?php echo site_url('Admin/login'); ?>",
        type: 'POST',
        data: form_data,
        beforeSend: function()
      { 
        $("#error").fadeOut();
        $("#button").html(' &nbsp; Please wait...');
      },
        success :  function(response)
         {            
          if(response==="success"){       
				$("#button").html(' &nbsp; Logging in...');
				setTimeout(' window.location.href = "<?php echo site_url('Admin'); ?>"; ',1000);
		  }
          else{                
            $("#error").fadeIn(3000, function(){            
                $("#error").html('<div class="alert alert-danger">  &nbsp; '+response+' </div>');
                 $("#button").html('&nbsp;Retry...');
            });
          }
        }
    });
    return false;
});

 </script>
   	
		
		
</html>
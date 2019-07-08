<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   
    <title><?php echo $title; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>admin_assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>admin_assets/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?php echo base_url() ?>admin_assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?php echo base_url() ?>admin_assets/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url() ?>admin_assets/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>admin_assets/css/style.min.css" rel="stylesheet">
	 <link href="<?php echo base_url() ?>admin_assets/css/dashboard_custom.css" rel="stylesheet">
                              
    <!-- color CSS -->
    <link href="<?php echo base_url() ?>admin_assets/css/colors/megna.css" id="theme" rel="stylesheet">
	<!-- jQuery -->
    <script src="<?php echo base_url() ?>admin_assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->



</head>

<body>
    <!-- Preloader --
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>-->
	
	
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="">
				<b class="">
				<!--<img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo" class="logo" />-->
                Bynoe
				</b>
				<span class="hidden-xs hidden-lg hidden-md"><strong>Bynoe</strong></span></a></div>
                <!--<ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                    <li>
                        <form role="search" class="app-search hidden-xs" method="post" action="<?php echo site_url('search'); ?>">
                            <input type="text" name="search_term" placeholder="Search library" class="form-control"> 
							 <button type="submit" name="submit" value="submit" class="search-btn" id="submit" >
                                        <span class=" glyphicon glyphicon-search search-icon"></span>
                              </button>									
						</form>			
                    </li>
                </ul>-->
                <ul class="nav navbar-top-links navbar-right pull-right">
                     <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> 
                        <!--<img src="<?php echo base_url() ?>admin_assets/images/user1.png" alt="user-img" width="36" class="img-circle">-->
                        
                        <b class="hidden-xs"><?php echo $this->session->userdata('username'); ?></b> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                          
                          <!--  <li><a href="javascript:void(0)"><i class="ti-email"></i>  Inbox</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i>  Account Setting</a></li>-->
                            <li><a href="<?php echo site_url('Admin/logout'); ?>"><i class="fa fa-power-off"></i>  Logout</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                   <!-- <li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>-->
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                   
				   <!-- <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                         input-group 
							<form action="" method="get">
								<div class="input-group custom-search-form">
									<input type="text" class="form-control" name="search_term" placeholder="Search..."> 
									  <span class="input-group-btn">
										  <button class="btn btn-default" type="submit"> 
											 <i class="fa fa-search"></i> 
										 </button>
									 </span> 						
								</div>
							</form>
                        <!-- /input-group 
                    </li>-->
					
                    <li class="user-pro">
                        <a href="#" class="waves-effect">
                       <!-- <img src="<?php echo base_url() ?>admin_assets/plugins/images/users/d1.jpg" alt="user-img" class="img-circle">-->
                        <span class="hide-menu"><?php echo $this->session->userdata('username'); ?><span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">                        
                            <li><a href="<?php echo site_url('Admin/logout'); ?> "><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <li class="nav-small-cap m-t-10">--- Main Menu</li>
                   <li> <a href="<?php echo site_url('Admin/manage_tours'); ?>" class="waves-effect"><i class="fa fa-home p-r-10"></i> <span class="hide-menu">Manage Tours</span></a> </li>
                   <li> <a href="<?php echo site_url('Admin/manage_hotels'); ?>" class="waves-effect"><i class="fa fa-cube p-r-10"></i> <span class="hide-menu">Manage Hotels</span></a> </li>
                   <li> <a href="<?php echo site_url('Admin/manage_testimonies'); ?>" class="waves-effect"><i class="fa fa-users p-r-10"></i> <span class="hide-menu">Testimonies</span></a> </li>
                   
                   <li> <a href="<?php echo site_url('Admin/manage_gallery'); ?>" class="waves-effect"><i class="fa fa-image p-r-10"></i> <span class="hide-menu">Manage Gallery</span></a> </li>
                   <li> <a href="<?php echo site_url('Admin/manage_visas'); ?>" class="waves-effect"><i class="fa fa-flag p-r-10"></i> <span class="hide-menu">Manage Visa</span></a> </li>
                   

                    <li><a href="<?php echo site_url('Admin/logout'); ?>" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
                    
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            
			<?php $this->load->view($include); ?>
			
            <footer class="footer text-center"> 2019 &copy; Bynoe </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    
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
    <!--Morris JavaScript -->
    <script src="<?php echo base_url() ?>admin_assets/plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url() ?>admin_assets/plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="<?php echo base_url() ?>admin_assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- jQuery peity -->
    <script src="<?php echo base_url() ?>admin_assets/plugins/bower_components/peity/jquery.peity.min.js"></script>
    <script src="<?php echo base_url() ?>admin_assets/plugins/bower_components/peity/jquery.peity.init.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url() ?>admin_assets/js/custom.min.js"></script>
    <script src="<?php echo base_url() ?>admin_assets/js/dashboard1.js"></script>
    <!--Style Switcher -->
    <script src="<?php echo base_url() ?>admin_assets/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
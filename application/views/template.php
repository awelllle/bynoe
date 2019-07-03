
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title ?></title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>	
		
<!-- For Testimonials slider -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/flexslider.css" type="text/css" media="all" />
<!-- //For Testimonials slider -->
<!-- //custom-theme files-->
<link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet" type="text/css" media="all" />
<!-- //custom-theme files-->

<!-- font-awesome-icons -->
<link href="<?php echo base_url() ?>assets/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<!-- googlefonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,vietnamese" rel="stylesheet">
<!-- //googlefonts -->

</head>
<body>
		
<!-- banner -->


		<!-- Top-Bar -->
				
				<div class="top-bar">
				   <div class="container">
					<div class="header">
						<nav class="navbar navbar-default">
							<div class="navbar-header navbar-left">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<h1><a class="navbar-brand" href="<?php echo base_url() ?>"> 
                                <img class="logo-img" src="<?php echo base_url() ?>assets/images/logo.png" alt=""> Bynoe Travels</span></a></h1>
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
								<nav class="cl-effect-15" id="cl-effect-15">
									<ul class="nav navbar-nav">
										<li class="<?php if(isset($current) && $current === "home" ){ echo "active"; } ?>"><a href="<?php echo site_url() ?>">Home</a></li>
													<li class="<?php if(isset($current) && $current === "about" ){ echo "active"; } ?>"><a href="<?php echo site_url() ?>about">About</a></li>
													
													
													<li><a href="<?php echo site_url() ?>hotels">Hotels</a></li>
													<li><a href="<?php echo site_url() ?>visa">Visa Support</a></li>
													<li><a href="<?php echo site_url() ?>packages">Holiday Packages</a></li>

													<li><a href="<?php echo site_url('gallery'); ?>">Gallery</a></li>
													
													<li class="<?php if(isset($current) && $current === "contact" ){ echo "active"; } ?>"><a href="<?php echo site_url() ?>contact">Contact</a></li>
												
		
												</ul>
									
								</nav>
							</div>
						</nav>
				</div>
			</div>
		</div>
		<!-- //Top-Bar -->
	<?php $this->load->view($include); ?>
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="col-md-4 agile_footer_grid">
				<h3>Contact Info</h3>
				<ul class="w3_address">
					<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i> 23 Oluwalewinu Street off Ladipo Kuku Bus Stop, Ikeja </li>
					<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@bynoetravels.com">info@bynoetravels.com</a></li>
					<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+234 (0) 806 117 9446</li>
				</ul>
			</div>
			<div class="col-md-4 agile_footer_grid">
				<h3>About Us</h3>
				<p>Bynoe Logistic Company is made with assurance and relaxation of
mind with various range of destination with marvellous facilities and
unparalleled selection of holiday’s packages, conference meetings,
good sightseeing and all.</p>
				<ul class="agileits_social_list">
					<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
				</ul>
			</div>
			<div class="col-md-4 agile_footer_grid">
				<h3>Quick Links</h3>
				<ul class="agileits_w3layouts_footer_grid_list">
					<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						<a href="<?php echo site_url('contact') ?>" >
							Contact Us</a>
					</li>
					<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						<a href="<?php echo site_url('about') ?>" >
							About Us</a>
					</li>
					
				</ul>
			</div>
			<div class="clearfix"> </div>
			
		</div>
	</div>
	<div class="agileinfo_copyright">
		<p>© 2019 Bynoetravels. All rights reserved </p>
	</div>
<!-- //footer -->

<!-- bootstrap-modal-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Travel Agency
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
					<div class="modal-body">
						<img src="<?php echo base_url() ?>assets/images/1.jpg" alt=" " class="img-responsive" />
						<p>Ut enim ad minima veniam, quis nostrum 
							exercitationem ullam corporis suscipit laboriosam, 
							nisi ut aliquid ex ea commodi consequatur? Quis autem 
							vel eum iure reprehenderit qui in ea voluptate velit 
							esse quam nihil molestiae consequatur, vel illum qui 
							dolorem eum fugiat quo voluptas nulla pariatur.
							<i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
								esse quam nihil molestiae consequatur.</i></p>
					</div>
			</div>
		</div>
	</div>
<!-- //bootstrap-modal-pop-up --> 
<!-- js -->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
	<!-- for bootstrap working -->
	<script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
<!-- //js -->
<!-- //here starts scrolling icon -->
<script src="<?php echo base_url() ?>assets/js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/move-top.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/easing.js"></script>
	<!-- here stars scrolling script -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<!-- //here ends scrolling script -->
<!-- //here ends scrolling icon -->

<!-- scrolling script -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
<!-- //scrolling script -->
<!-- responsiveslides -->
<script src="<?php echo base_url() ?>assets/js/responsiveslides.min.js"></script>
			<script>
									// You can also use "$(window).load(function() {"
									$(function () {
									 // Slideshow 4
									$("#slider3").responsiveSlides({
										auto: true,
										pager: false,
										nav: true,
										speed: 500,
										namespace: "callbacks",
										before: function () {
									$('.events').append("<li>before event fired.</li>");
									},
									after: function () {
										$('.events').append("<li>after event fired.</li>");
										}
										});
										});
			</script>
<!-- //responsiveslides -->
<!-- stats -->
	<script src="<?php echo base_url() ?>assets/js/jquery.waypoints.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.countup.js"></script>
		<script>
			$('.counter').countUp();
		</script>
<!-- //stats -->
<!-- FlexSlider-JavaScript -->
	<script defer src="<?php echo base_url() ?>assets/js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		
				$(window).load(function(){
				$('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
						$('body').removeClass('loading');
					}
			});
		});
	</script>
<!-- //FlexSlider-JavaScript -->

	<!-- simpleLightbox -->
	<script src="<?php echo base_url() ?>assets/js/simpleLightbox.js"></script>	<script>
		$('.w3_agile_gallery_grid a').simpleLightbox();
	</script>
<!-- //simpleLightbox -->
</body>
</html>
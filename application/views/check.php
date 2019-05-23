 <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="<?php echo base_url() ?>assets/img/background.jpg" data-natural-width="1400" data-natural-height="350">
        <div id="subheader">
            <h1>Available Apartments</h1>
    </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End SubHeader ============================================ -->

        <div class="container margin_60">
    	<div class="row">
 			<div class="col-lg-9 col-md-8">
			
			<?php foreach($prop as $p){ ?>
            	<div class="row">
                
                	<div class="room_desc clearfix" onclick="location.href='room_detail.html';">
                	<div class="col-md-7">
                    	<figure><img src="<?php echo base_url() ?>assets/img/room_list_1.jpg" alt="" class="img-responsive"></figure>
                    </div>
                    <div class="col-md-5 room_list_desc">
                    	<h3><?php echo $p->prop_title ?></h3>
                        <p><?php echo word_limiter ($p->prop_description, 10); ?></p>
                        <ul>
                        	<li>
                            <div class="tooltip_styled tooltip-effect-4">
                            	<span class="tooltip-item"><i class="icon_set_2_icon-104"></i></span>
                                	<div class="tooltip-content">King size bed</div>
                              </div>
                              </li>
                            <li>
                            <div class="tooltip_styled tooltip-effect-4">
                            	<span class="tooltip-item"><i class="icon_set_2_icon-118"></i></span>
                                	<div class="tooltip-content">Shower</div>
                              </div>
                              </li>
                            <li>
                            <div class="tooltip_styled tooltip-effect-4">
                            	<span class="tooltip-item"><i class="icon_set_2_icon-116"></i></span>
                                	<div class="tooltip-content">Plasma TV</div>
                              </div>
                              </li>
                        </ul>
                        <div class="price">about <strong>&#8358; <?php echo number_format($p->prop_price); ?></strong> for 
						<b><?php echo $nights; ?></b> night(s)<small>Breakafst included</small></div>
                    <br>
					<a href="<?php echo site_url('properties/'.$p->prop_slug) ?>" class="btn_1_outline">Book Now</a>
					</div>
                    </div>
                </div><!-- End row room -->  
			<?php } ?> 
                
            </div>
            <div class="col-lg-3 col-md-4 sidebar">
     		
            <div class="theiaStickySidebar">
            <div class="box_style_3" id="general_facilities">
				<h3>General facilities</h3>
				<ul>
					<li><i class="icon_set_1_icon-86"></i>Free Wifi</li>
					<li><i class="icon_set_2_icon-103"></i>Loundry service</li>
					<li><i class="icon_set_2_icon-110"></i>Swimming pool</li>
					<li><i class="icon_set_1_icon-58"></i>Restaurant</li>
					<li><i class="icon_set_1_icon-27"></i>Parking</li>
				</ul>
			</div>
			<div class="box_style_2">
				<i class="icon_set_1_icon-90"></i>
				<h4>Need help? Call us</h4>
				<a href="tel://004542344599" class="phone">+45 423 445 99</a>
				<small>Monday to Friday 9.00am - 7.30pm</small>
			</div>

            </div>
            </div>
            
        </div><!-- End row -->        
    </div><!-- End container -->
    
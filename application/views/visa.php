<div class="main-textgrids">
		<div class="container">
			<div class="wthree_head_section">
				<h3 class="w3l_header">Visa <span>Support</span></h3>
						</div>
			<div class="ab-agile">
			<div class="row">

	
					<?php foreach ($item as $i){ ?>
						<div class="col-md-3 col-sm-6">
								<div class="product-grid">
									<div class="product-image">
										<a href="#">
											<img class="pic-1" src="<?php echo base_url('media/'.$i->image) ?>">
										</a>
									</div>
								
									<div class="product-content">
										
										<div class="price"><?php echo $i->country ?> 
										</div>
										<div class="more">
											<a href="<?php echo  site_url('contact'); ?>">Contact Us!</a>				
										</div>
									</div>
								</div>
							</div>
					<?php } ?>
				<div class="clearfix"> </div>
			</div>
			
		</div>
	</div>
	<!-- //main-textgrids -->
	
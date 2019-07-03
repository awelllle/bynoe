<div class="main-textgrids">
		<div class="container">
			<div class="wthree_head_section">
				<h3 class="w3l_header">Holiday <span>Packages</span></h3>
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
				<h3 class="title"><a href="#"><?php echo $i->country ?></a></h3>
				<div class="price">&#8358;<?php echo number_format($i->price) ?>
				   
				</div>
				<div class="more">
										<a href="<?php echo  site_url('contact'); ?>">Contact Us!</a>				
									</div>
			</div>
		</div>
	</div>
	
<?php } ?>
      
      </div>
    </div>
  </div>
				<div class="clearfix"> </div>
			</div>
			
		</div>
	</div>
	<!-- //main-textgrids -->
	
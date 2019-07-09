<link href="<?php echo base_url() ?>assets/css/simpleLightbox.css" rel="stylesheet" type="text/css" />
<div class="banner-bottom gallery">
		<div class="container">
		<div class="wthree_head_section">
				<h2 class="w3l_header">Our <span>Gallery</span></h2>
				</div>
			<div class="w3ls_gallery_grids">
				
			 <?php foreach($item as $i){ ?>
					<div class="col-md-4 w3_agile_gallery_grid">
						<div class="">
							<a title="<?php echo $i->caption ?>" href="<?php echo base_url() ?>media/<?php echo $i->path ?>">
								<div class="agile_gallery_grid1">
									<img src="<?php echo base_url() ?>media/<?php echo $i->path ?>" alt="Image" class="img-responsive" />
									
								</div>
							</a>
						</div>
					
					</div>

				<?php } ?>
	        <div class="clearfix"></div>
			</div>
		</div>
	</div>

      

	  <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Item</h4> </div>
                   
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                           <!-- <a href="<?php echo site_url('Admin/add_TOUR'); ?>" ><i class="fa fa-arrow-left"></i> Back</a>-->
	                        <?php echo $this->session->flashdata('msg');  ?>
                          <form class="form-material form-horizontal" role="form"  action="<?php echo site_url('Admin/add_testimony'); ?>" enctype="multipart/form-data" method="post">
 
 
                <div class="form-group">
                  <label for=""> Name</label>
                  <input type="text" class="form-control" id="name" placeholder="" name="name" value="<?php set_value('name'); ?>" >
                </div>
				
			   

                <div class="form-group">
                  <label for=""> Testimony</label>
                  <textarea class="form-control" id="testimony" placeholder="" name="testimony" ><?php set_value('testimony'); ?></textarea>
                </div>



			    <input type="submit" name="submit" class="btn btn-info waves-effect waves-light m-r-10">
								
  
                            </form>
                        </div>
                    </div>
                </div>
      </div>
	 
	
	
				
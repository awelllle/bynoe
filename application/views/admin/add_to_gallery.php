      

	  <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Item</h4> </div>
                   
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <?php echo $this->session->flashdata('msg');  ?>
                          <form class="form-material form-horizontal" role="form"  action="<?php echo site_url('Admin/add_to_gallery'); ?>" enctype="multipart/form-data" method="post">
                
                <div class="form-group">
                  <label for=""> Caption</label>
                  <input type="text" class="form-control" required id="caption" placeholder="" name="caption" value="<?php  set_value('caption'); ?>" >
                </div>

                <div class="form-group">
                  <label for="">Images</label>
                 <input type="file" name="userfile[]" required class="form-control" multiple>
                </div>

			    <input type="submit" name="submit" class="btn btn-info waves-effect waves-light m-r-10">
								
  
                            </form>
                        </div>
                    </div>
                </div>
      </div>
	 
	
	
				
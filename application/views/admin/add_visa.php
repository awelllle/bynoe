


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
                          <form class="form-material form-horizontal" role="form"  action="<?php echo site_url('Admin/add_visa'); ?>" enctype="multipart/form-data" method="post">
 

               <div class="form-group">
                  <label for=""> Country</label>
                  <input type="text" class="form-control" required id="country" placeholder="" name="country" value="<?php  set_value('country'); ?>" >
                </div>

                <div class="form-group">
                  <label for="">Image</label>
                 <input type="file" name="userfile[]" required class="form-control" >
                </div>

			    <input type="submit" name="submit" class="btn btn-info waves-effect waves-light m-r-10">
								
  
                            </form>
                        </div>
                    </div>
                </div>
      </div>
	 
	
	
				
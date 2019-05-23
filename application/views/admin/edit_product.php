      
<?php foreach($details as $d) {}?>

  <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">	Edit Property</h4> </div>
                   
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                           <!-- <a href="<?php echo site_url('Admin/register_user'); ?>" ><i class="fa fa-arrow-left"></i> Back</a>-->
	   <?php echo $this->session->flashdata('msg');  ?>
							   <form class="form-material form-horizontal" role="form" action="<?php echo site_url('Admin/edit_product/'.$id); ?>" method="post">
 
 <div class="form-group">
                  <label for=""> Name</label>
                  <input type="text" class="form-control" required id="name" placeholder="" name="name" value="<?php echo $d->name; ?>" >
                </div>
				
				 <div class="form-group">
                  <label for="">price</label>
                  <input type="text" class="form-control" required id="price" placeholder="" name="price" value="<?php echo $d->price; ?>" >
                </div>
				
                 
				
				 <div class="form-group">
                  <label for="">Description</label>
                  <textarea class="form-control" id="description" required name="description" ><?php echo $d->description; ?></textarea>
                </div>
				
				
				         <input type="submit" name="submit" class="btn btn-info waves-effect waves-light m-r-10">
								
  
                            </form>
                        </div>
                    </div>
                </div>
      </div>
	 
	
	
				
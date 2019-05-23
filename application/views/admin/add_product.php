      

	  <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Product</h4> </div>
                   
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                           <!-- <a href="<?php echo site_url('Admin/add_product'); ?>" ><i class="fa fa-arrow-left"></i> Back</a>-->
	                        <?php echo $this->session->flashdata('msg');  ?>
                          <form class="form-material form-horizontal" role="form"  action="<?php echo site_url('Admin/add_product'); ?>" enctype="multipart/form-data" method="post">
 
 
                <div class="form-group">
                  <label for=""> Name</label>
                  <input type="text" class="form-control" id="name" placeholder="" name="name" value="<?php set_value('name'); ?>" >
                </div>
				
			   <div class="form-group">
                  <label for="">Category</label>
				  <select name="category" required class="form-control">
                  <option value="">Please select category</option>
                       <?php foreach($parent_cats as $p){ ?>
				         <option value="<?php echo $p->id; ?>"> <?php echo $p->name ?></option>
                       <?php } ?>
				  </select>
                </div>


                <div class="form-group">
                  <label for="">Subcategory</label>
				   <select name="subcategory" class="form-control">
                   <option value="">Please select subcategory</option>

                      <?php foreach($sub_cat as $p){ ?>
				       <option value="<?php echo $p->id; ?>"> <?php echo $p->name ?></option>
                      <?php } ?>
				  </select>
                </div>

                <div class="form-group">
                  <label for=""> Price</label>
                  <input type="text" class="form-control" id="price" placeholder="" name="price" value="<?php set_value('price'); ?>" >
                </div>

                <div class="form-group">
                  <label for="">Description</label>
                  <textarea class="form-control" id="description"  name="description" ><?php set_value('description'); ?></textarea>
                </div>

                <div class="form-group">
                  <label for="">Images</label>
                 <input type="file" name="userfile[]" class="form-control" multiple>
                </div>

			    <input type="submit" name="submit" class="btn btn-info waves-effect waves-light m-r-10">
								
  
                            </form>
                        </div>
                    </div>
                </div>
      </div>
	 
	
	
				
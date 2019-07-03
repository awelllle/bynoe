            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"> Manage Items 
						
						</h4>
					
						</div>
			
						
						
						
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
					<a href="<?php echo site_url('Admin/add_hotel'); ?>" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline waves-effect waves-light">Add</a>
					   <ol class="breadcrumb">
                            <li><a href="<?php echo site_url(); ?>">Home</a></li>
                            <li class="active">Manage Items</li>
                        </ol>
						
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				<?php echo $this->session->flashdata('msg'); ?>	
                 
                <!-- /row -->
                <div class="row">
                     <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">All Items</h3>
                          
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                       <tr>
                                           <th>Name</th>  
                                           <th>Price</th>                                               
											
											
											<th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php  foreach ($prod as $p){ ?>
                                        <tr>
											 <td><?php echo $p->name; ?></td>
                                             <td><?php echo $p->price; ?></td>
											
											 <td>
						 	<?php echo anchor('Admin/edit_hotel/'.$p->id, '<span class="btn btn-info m-b-5">Edit</span>'); ?>
<?php echo anchor('Admin/delete_item/'.$p->id.'/manage_hotels/hotels', '<span class="btn btn-danger m-b-5">Delete</span>', array('onclick' => "return confirm('Are you sure want to delete this item?')")); ?>								
											 </td>
										
															
										</tr>
                                    <?php } ?>
									
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
               </div>
               
				
                 </div>
				
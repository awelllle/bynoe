<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
      function __construct()
		{
			parent::__construct();
			$this->load->model('Admin_model');

		}
		
	public function index()
	{
	 if($this->session->userdata('logged_in'))
		 {
		   redirect("Admin/manage_tours");   	
  		 }else {
		   redirect("Admin/login");
		 }	
	}
	public function login()
	{
	   if($this->session->userdata('logged_in'))
		 {
		    redirect("Admin/manage_products");   	
  		 }
		 
		 
		 if($this->input->post("submit") ){
		 
			 $identity = $this->input->post("identity");
			 $password = $this->input->post("password");
			 $result = $this->Admin_model->login_user($identity, $password);			 
		 if(count($result) > 0)
              {		
					foreach ($result as $res){				
								  $sessionArray = array('id'=>$res->user_id,                    
													 
													  'username'=>$res->username,
													                                     
													  'logged_in' => TRUE
												   );                                
				    $this->session->set_userdata($sessionArray);	  
					echo "success";                          				                           
	             }				 
		       }
			 else
			 {
		 	     echo "Wrong email or password. Please check.";
		     } 
	        }else
	        {		 
				$data['title'] = 'Admin Login';
				$data['current'] = 'login';			   
				$this->load->view("admin/login", $data);
		   }	 	  
    }
	
	
	
	public function manage_tours()
	{
		if(!$this->session->userdata('logged_in'))
		 {
			redirect("Admin/login");   	
		 }
		 $data['title']                     = 'All Items';
		 $data['prod']                     =  $this->Admin_model->get_items('tours');
		 $data['current']                   = 'tours';	
		 $data['include']                   = 'admin/all_tours';	
		 $this->load->view                  ("admin/template", $data);  
	}

	public function manage_hotels()
	{
		if(!$this->session->userdata('logged_in'))
		 {
			redirect("Admin/login");   	
		 }
		 $data['title']                     = 'All Items';
		 $data['prod']                     =  $this->Admin_model->get_items('hotels');
		 $data['current']                   = 'tours';	
		 $data['include']                   = 'admin/all_hotels';	
		 $this->load->view                  ("admin/template", $data);  
	}

	public function manage_testimonies()
	{
		if(!$this->session->userdata('logged_in'))
		 {
			redirect("Admin/login");   	
		 }
		 $data['title']                     = 'All Items';
		 $data['prod']                     =  $this->Admin_model->get_items('testimonies');
		 $data['current']                   = 'testimonies';	
		 $data['include']                   = 'admin/all_testimonies';	
		 $this->load->view                  ("admin/template", $data);  
	}


	function add_testimony()
  {
	  if(!$this->session->userdata('logged_in'))
		 {
			redirect("Admin/login");   	
		 }
	      $this->load->library('form_validation');
	  
     if($this->input->post("submit"))
     {
			
				      $insert = $this->Admin_model->insert_testimony(
					   $this->input->post("name"),
						$this->input->post("testimony")
						
						);
				if($insert)
				{		

									
						$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Item added!</div>');
					  redirect('Admin/add_testimony');
									
				}else{		   
					  $this->session->set_flashdata('msg', '<div class="alert alert-info text-center">Something went wrong, Please try again</div>');
						redirect('Admin/add_testimony');
				}

	   }else{
		
						$data['title']                      = 'Add Item';	
						$data['current']                    = 'add_testimony';	
					
						
						$data['include']                    = 'admin/add_testimony';	
				        $this->load->view                   ("admin/template", $data); 					
	  }
  }

  public function edit_testimony($id)
		{
			if(!$this->session->userdata('logged_in'))
			{
				redirect("Admin/login");   	
			}


		if($this->input->post("submit"))
		{
				$data['name']         = $this->input->post("name");
				$data['testimony']            = $this->input->post("testimony");
				
				$this->Admin_model->update_post($id, $data,'testimonies');
			
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Item updated!</div>');
				redirect('Admin/edit_testimony/'.$id);

		}else{

			$data['id']                         = $id;
			$data['title']                     = 'All Items';
			$data['details']                     =  $this->Admin_model->get_item_details($id,'testimonies');
			$data['current']                   = 'testimonies';	
			$data['include']                   = 'admin/edit_testimony';	
			$this->load->view                  ("admin/template", $data);  
		}
	}


	function add_hotel()
  {
	  if(!$this->session->userdata('logged_in'))
		 {
			redirect("Admin/login");   	
		 }
	      $this->load->library('form_validation');
	  
     if($this->input->post("submit"))
     {
			
				      $insert = $this->Admin_model->insert_hotel(
					   $this->input->post("name"),
						$this->input->post("price")
						
						);
				if($insert)
				{		

							       $id = $this->Admin_model->get_last_id('hotels');
						           $files = $_FILES;
									$filesCount = sizeof($_FILES['userfile']['name']);
									for($i = 0; $i < $filesCount; $i++){
									echo $filesCount;
						
										$config['upload_path'] = 'media';
										$config['allowed_types'] = '*';
										$config['overwrite'] = false;
										$this->load->library('upload', $config);

										$_FILES['userfile']['name']= $files['userfile']['name'][$i];
										$_FILES['userfile']['type']= $files['userfile']['type'][$i];
										$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
										$_FILES['userfile']['error']= $files['userfile']['error'][$i];
										$_FILES['userfile']['size']= $files['userfile']['size'][$i];   

										if (!$this->upload->do_upload()) {
											 
											$this->Admin_model->delete($id,"tours");
						        	        echo $this->upload->display_errors();
										
										} else {
										

									  $data['type'] = "hotels";
							          $data['source_id']    = $id;
							          $data['path']         =  $files['userfile']['name'][$i];
												$this->db->insert('images', $data);	
										}
									}
									
						$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Item added!</div>');
					  redirect('Admin/add_hotel');
									
				}else{		   
					  $this->session->set_flashdata('msg', '<div class="alert alert-info text-center">Something went wrong, Please try again</div>');
						redirect('Admin/add_hotel');
				}

	   }else{
		
						$data['title']                      = 'Add Item';	
						$data['current']                    = 'add_hotel';	
					
						
						$data['include']                    = 'admin/add_hotel';	
				   $this->load->view                   ("admin/template", $data); 					
	  }
  }

	public function edit_hotel($id)
		{
			if(!$this->session->userdata('logged_in'))
			{
				redirect("Admin/login");   	
			}


		if($this->input->post("submit"))
		{
				$data['name']         = $this->input->post("name");
				$data['price']            = $this->input->post("price");
				
				$this->Admin_model->update_post($id, $data,'hotels');
			
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Item updated!</div>');
				redirect('Admin/edit_hotel/'.$id);

		}else{

			$data['id']                         = $id;
			$data['title']                     = 'All Items';
			$data['details']                     =  $this->Admin_model->get_item_details($id,'hotels');
			$data['current']                   = 'hotels';	
			$data['include']                   = 'admin/edit_hotel';	
			$this->load->view                  ("admin/template", $data);  
		}
	}


	public function edit_tour($id)
	{
		if(!$this->session->userdata('logged_in'))
		 {
			redirect("Admin/login");   	
		 }


     if($this->input->post("submit"))
     {
		 if( $_FILES['userfile']['name'] !== "") 
		 {
			$id = $this->Admin_model->get_last_id('hotels');
			$files = $_FILES;
			$filesCount = sizeof($_FILES['userfile']['name']);
			for($i = 0; $i < $filesCount; $i++){
			echo $filesCount;

			 $config['upload_path'] = 'media';
			 $config['allowed_types'] = '*';
			 $config['overwrite'] = false;
			 $this->load->library('upload', $config);

			 $_FILES['userfile']['name']= $files['userfile']['name'][$i];
			 $_FILES['userfile']['type']= $files['userfile']['type'][$i];
			 $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
			 $_FILES['userfile']['error']= $files['userfile']['error'][$i];
			 $_FILES['userfile']['size']= $files['userfile']['size'][$i];   

			 if (!$this->upload->do_upload()) {
				  
				 $this->Admin_model->delete($id,"tours");
				 echo $this->upload->display_errors();
			 
			 } else {
			 

		   $data['type'] = "hotels";
		   $data['source_id']    = $id;
		   $data['path']         =  $files['userfile']['name'][$i];
					 $this->db->insert('images', $data);	
			 }
		 }
	}

	        $data['country']         = $this->input->post("name");
			$data['price']            = $this->input->post("price");
			
            $this->Admin_model->update_post($id, $data,'tours');
		
		    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Item updated!</div>');
		    redirect('Admin/edit_tour/'.$id);

	 }else{

		 $data['id']                         = $id;
		 $data['title']                     = 'All Items';
		 $data['details']                     =  $this->Admin_model->get_item_details($id,'tours');
		 $data['current']                   = 'tours';	
		 $data['include']                   = 'admin/edit_tour';	
		 $this->load->view                  ("admin/template", $data);  
	}
  }

	function add_tour()
  {
	  if(!$this->session->userdata('logged_in'))
		 {
			redirect("Admin/login");   	
		 }
	      $this->load->library('form_validation');
	  
     if($this->input->post("submit"))
     {
			

					// $url   = strtolower($this->input->post("name"));
					// $find = array(" ",",","-","`","(",")",".",".","&","?",";","%","+","{", "}","'","[","]","@");
					// $replace = " ";
					// $a_url = str_replace($find,$replace,$url);
					// $find2 = array(" ");
					// $replace2 = "-";
					// $b_url = str_replace($find2,$replace2,$a_url);
					// $find3 = array("--");
					// $replace3 = "-";
					// $f_url = str_replace($find3,$replace3,$b_url);
					// $slug = str_replace("--","-",$f_url);


				      $insert = $this->Admin_model->insert_product(
					  $this->input->post("country"),
						$this->input->post("price")
						
						);
				if($insert)
				{		

							       $id = $this->Admin_model->get_last_id('tours');
						           $files = $_FILES;
									$filesCount = sizeof($_FILES['userfile']['name']);
									for($i = 0; $i < $filesCount; $i++){
									echo $filesCount;
						
										$config['upload_path'] = 'media';
										$config['allowed_types'] = '*';
										$config['overwrite'] = false;
										$this->load->library('upload', $config);

										$_FILES['userfile']['name']= $files['userfile']['name'][$i];
										$_FILES['userfile']['type']= $files['userfile']['type'][$i];
										$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
										$_FILES['userfile']['error']= $files['userfile']['error'][$i];
										$_FILES['userfile']['size']= $files['userfile']['size'][$i];   

										if (!$this->upload->do_upload()) {
											 
											$this->Admin_model->delete($id,"tours");
						        	        echo $this->upload->display_errors();
										
										} else {
										

									  $data['type'] = "tours";
							          $data['source_id']    = $id;
							          $data['path']         =  $files['userfile']['name'][$i];
												$this->db->insert('images', $data);	
										}
									}
									
						$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Item added!</div>');
					  redirect('Admin/add_tour');
									
				}else{		   
					  $this->session->set_flashdata('msg', '<div class="alert alert-info text-center">Something went wrong, Please try again</div>');
						redirect('Admin/add_tour');
				}

	   }else{
		
						$data['title']                      = 'Add Item';	
						$data['current']                    = 'add_tour';	
					
						
						$data['include']                    = 'admin/add_tour';	
				   $this->load->view                   ("admin/template", $data); 					
	  }
  }

  public function manage_gallery()
	{
		if(!$this->session->userdata('logged_in'))
		 {
			redirect("Admin/login");   	
		 }
		 $data['title']                     = 'All Items';
		 $data['prod']                     =  $this->Admin_model->get_items('images');
		 $data['current']                   = 'gallery';	
		 $data['include']                   = 'admin/gallery';	
		 $this->load->view                  ("admin/template", $data);  
	}



	function add_to_gallery()
  {
	  if(!$this->session->userdata('logged_in'))
		 {
			redirect("Admin/login");   	
		 }
	      $this->load->library('form_validation');
	  
     if($this->input->post("submit"))
     {

						            $files = $_FILES;
									$filesCount = sizeof($_FILES['userfile']['name']);
									for($i = 0; $i < $filesCount; $i++){
									echo $filesCount;
						
										$config['upload_path'] = 'media';
										$config['allowed_types'] = '*';
										$config['overwrite'] = false;
										$this->load->library('upload', $config);

										$_FILES['userfile']['name']= $files['userfile']['name'][$i];
										$_FILES['userfile']['type']= $files['userfile']['type'][$i];
										$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
										$_FILES['userfile']['error']= $files['userfile']['error'][$i];
										$_FILES['userfile']['size']= $files['userfile']['size'][$i];   

										if (!$this->upload->do_upload()) {
											 
											$this->Admin_model->delete($id,"gallery");
						        	        echo $this->upload->display_errors();
										
										} else {
										

												$data['type'] = "gallery";
												$data['path']         =  $files['userfile']['name'][$i];
												$this->db->insert('images', $data);	
										}
									}
									
						$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Item added!</div>');
					    redirect('Admin/manage_gallery');
				

	   }else{
		
						$data['title']                      = 'Add Item';	
						$data['current']                    = 'add_to_gallery';		
						$data['include']                    = 'admin/add_to_gallery';	
				        $this->load->view                   ("admin/template", $data); 					
	  }
  }


  public function manage_visas()
	{
		if(!$this->session->userdata('logged_in'))
		 {
			redirect("Admin/login");   	
		 }
		 $data['title']                     = 'All Items';
		 $data['prod']                     =  $this->Admin_model->get_items('visas');
		 $data['current']                   = 'visa';	
		 $data['include']                   = 'admin/visas';	
		 $this->load->view                  ("admin/template", $data);  
	}

	function add_visa()
	{
		if(!$this->session->userdata('logged_in'))
		   {
			  redirect("Admin/login");   	
		   }
			$this->load->library('form_validation');
		
	   if($this->input->post("submit"))
	   {
  
		    $insert = $this->Admin_model->insert_visa(
			$this->input->post("country")
			
			  );
			if($insert)
			{		

								$id = $this->Admin_model->get_last_id('tours');
								$files = $_FILES;
								$filesCount = sizeof($_FILES['userfile']['name']);
								for($i = 0; $i < $filesCount; $i++){
								echo $filesCount;
					
									$config['upload_path'] = 'media';
									$config['allowed_types'] = '*';
									$config['overwrite'] = false;
									$this->load->library('upload', $config);

									$_FILES['userfile']['name']= $files['userfile']['name'][$i];
									$_FILES['userfile']['type']= $files['userfile']['type'][$i];
									$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
									$_FILES['userfile']['error']= $files['userfile']['error'][$i];
									$_FILES['userfile']['size']= $files['userfile']['size'][$i];   

									if (!$this->upload->do_upload()) {
										
										$this->Admin_model->delete($id,"visas");
										echo $this->upload->display_errors();
									
									} else {
									

										$data['type'] = "visas";
										$data['source_id']    = $id;
										$data['path']         =  $files['userfile']['name'][$i];
										$this->db->insert('images', $data);	
									}
								}
								
					$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Item added!</div>');
					redirect('Admin/add_visa');
								
			}else{		   
					$this->session->set_flashdata('msg', '<div class="alert alert-info text-center">Something went wrong, Please try again</div>');
					redirect('Admin/add_visa');
			}
  
		 }else{
		  
						  $data['title']                      = 'Add Item';	
						  $data['current']                    = 'add_visa';		
						  $data['include']                    = 'admin/add_visa';	
						  $this->load->view                   ("admin/template", $data); 					
		}
	}
  



  




	
  function delete_item($id, $redirect, $table)
	{
		if(!$this->session->userdata('logged_in'))
		 {
			redirect("Admin/login");   	
		 }
		$this->Admin_model->delete($id, $table);
		redirect("Admin/".$redirect);
	}
	
    public function logout()
   {
	   session_destroy(); 
	   redirect(""); 
   }
}

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
		   redirect("Admin/manage_products");   	
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
				$data['title'] = 'Admin Login - Tabfad';
				$data['current'] = 'login';			   
				$this->load->view("admin/login", $data);
		   }	 	  
    }
	
	
	public function bookings()
	{
		if(!$this->session->userdata('logged_in'))
		 {
			redirect("Admin/login");   	
		 }
		 $data['title']                     = 'All bookings - Shortlet';
		 $data['bookings']                     =  $this->Admin_model->get_bookings();
		 $data['current']                   = 'bookings';	
		 $data['include']                   = 'admin/all_bookings';	
		 $this->load->view                  ("admin/template", $data);  
	}
	
	
	public function manage_products()
	{
		if(!$this->session->userdata('logged_in'))
		 {
			redirect("Admin/login");   	
		 }
		 $data['title']                     = 'All products';
		 $data['prod']                     =  $this->Admin_model->get_products();
		 $data['current']                   = 'products';	
		 $data['include']                   = 'admin/all_products';	
		 $this->load->view                  ("admin/template", $data);  
	}


	function add_product()
  {
	  if(!$this->session->userdata('logged_in'))
		 {
			redirect("Admin/login");   	
		 }
	      $this->load->library('form_validation');
	  
     if($this->input->post("submit"))
     {
			

					$url   = strtolower($this->input->post("name"));
					$find = array(" ",",","-","`","(",")",".",".","&","?",";","%","+","{", "}","'","[","]","@");
					$replace = " ";
					$a_url = str_replace($find,$replace,$url);
					$find2 = array(" ");
					$replace2 = "-";
					$b_url = str_replace($find2,$replace2,$a_url);
					$find3 = array("--");
					$replace3 = "-";
					$f_url = str_replace($find3,$replace3,$b_url);
					$slug = str_replace("--","-",$f_url);


				$insert                              = $this->Admin_model->insert_product(
					  $this->input->post("name"),
						$this->input->post("category"),
						$this->input->post("subcategory"),
						$this->input->post("price"),
						$this->input->post("description"),
						$slug
				);
				if($insert)
				{		

							    $id = $this->Admin_model->get_last_id();
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
											 
											$this->Admin_model->delete($id,"products");
						        	echo $this->upload->display_errors();
										
										} else {

							          $data['source_id']    = $id;
							          $data['path']         =  $files['userfile']['name'][$i];
												$this->db->insert('images', $data);	
										}
									}
									
						$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Product added!</div>');
					redirect('Admin/add_product');
									
				}else{		   
					  $this->session->set_flashdata('msg', '<div class="alert alert-info text-center">Something went wrong, Please try again</div>');
						redirect('Admin/add_product');
				}

	   }else{
		
						$data['title']                      = 'Add Item';	
						$data['current']                    = 'add_product';	
						$data['parent_cats']                =  $this->Admin_model->get_parent_categories();
						$data['sub_cat']                    =  $this->Admin_model->get_sub_categories();
						$data['include']                    = 'admin/add_product';	
				   $this->load->view                   ("admin/template", $data); 					
	  }
  }

	
	public function manage_categories()
	{
			if(!$this->session->userdata('logged_in'))
			{
				redirect("Admin/login");   	
			}
			$data['title']                     = 'All categories';
			$data['categories']                =  $this->Admin_model->get_categories();
			$data['current']                   = 'categories';	
			$data['include']                   = 'admin/all_categories';	
			$this->load->view                  ("admin/template", $data);  
	}


	function add_category()
  {
	  if(!$this->session->userdata('logged_in'))
		 {
			redirect("Admin/login");   	
		 }
	      $this->load->library('form_validation');
	  
     if($this->input->post("submit"))
     {
				if($this->input->post("type") == "")
				{
					$type = 0;

				}else{
					$type = $this->input->post("type");
				}

					$url   = strtolower($this->input->post("name"));
					$find = array(" ",",","-","`","(",")",".",".","&","?",";","%","+","{", "}","'","[","]","@");
					$replace = " ";
					$a_url = str_replace($find,$replace,$url);
					$find2 = array(" ");
					$replace2 = "-";
					$b_url = str_replace($find2,$replace2,$a_url);
					$find3 = array("--");
					$replace3 = "-";
					$f_url = str_replace($find3,$replace3,$b_url);
					$slug = str_replace("--","-",$f_url);


				$insert                              = $this->Admin_model->insert_category(
					  $this->input->post("name"),
						$type,
						$slug
				);
				if($insert)
				{		
						$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Category added!</div>');
						redirect('Admin/add_category');
									
				}else{		   
					  $this->session->set_flashdata('msg', '<div class="alert alert-info text-center">Something went wrong, Please try again</div>');
						redirect('Admin/add_category');
				}

	   }else{
		
						$data['title']                      = 'Add Item';	
						$data['current']                    = 'add_category';	
						$data['parent_cats']                 =  $this->Admin_model->get_parent_categories();
						$data['include']                    = 'admin/add_category';	
						$this->load->view                   ("admin/template", $data); 
						
	  }

  }

	
  function delete_product($id)
	{
		if(!$this->session->userdata('logged_in'))
		 {
			redirect("Admin/login");   	
		 }
		$this->Admin_model->delete($id, 'products');
		redirect("Admin/manage_products");
	}
	
  	
	function edit_product($id)
  {
	  if(!$this->session->userdata('logged_in'))
		 {
			redirect("Admin/login");   	
		 }
     if($this->input->post("submit"))
     {
	    $data['name']         = $this->input->post("name");
			
			$data['price']            = $this->input->post("price");
			$data['description']        = $this->input->post("description");
		
      $this->Admin_model->update_post($id, $data,'products');
		
		   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Product updated!</div>');
		   redirect('Admin/edit_product/'.$id);

		
		

	 }else{
		
		$data['id']                         = $id;
		 $data['details']                     =  $this->Admin_model->get_product($id);
        $data['title']                      = 'Edit Property -  Shortlet';	
		$data['current']                    = 'edit_property';	
		$data['include']                    = 'admin/edit_product';	
		$this->load->view                   ("admin/template", $data); 
		
	 }

  }

    public function logout()
   {
	   session_destroy(); 
	   redirect(""); 
   }
}

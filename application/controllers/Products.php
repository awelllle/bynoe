<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	function __construct()
		{
			parent::__construct();
			$this->load->model('product_model');

		}
	
	public function index()
	{
		
		
		$data['title']                = "Products ";
		$data['prop']           = $this->product_model->get_properties();	
        foreach($data['prop'] as $p)
		{
				$p->image =  $this->product_model->get_image_from_id($p->id);
	
		}		
		$data['include']              = "products";
		$this->load->view('template', $data);
	}
	
	public function get_prop_details()
	{
		$slug                         = $this->uri->segment(2);
		$data['prop_details']         = $this->product_model->get_prop_details($slug);	
    		foreach($data['prop_details'] as $p)
		{
				
		}
		$data['reviews']              = $this->product_model->get_reviews($p->prop_id);
		$data['images']               = $this->product_model->get_images($p->prop_id);
		$data['title']                = $p->prop_title;
		$data['include']              = "prop_details";
		$this->load->view('template', $data);
		
		
	}
	
	public function place_review()
	{
		$name = $this->input->post("name");
		$email = $this->input->post("email");
		$comment = $this->input->post("comment");
		$source_id = $this->input->post("source_id");
		
		$place_review = $this->product_model->place_review($name,$email,$comment,$source_id);
		if($place_review)
		{
			echo "success";
		}else{
			echo "Something went wrong, Please try again";
		}
			
		
	}
	
	public function book()
	{
		$in = $this->input->post("in_date");
		$out = $this->input->post("out_date");
		$email = $this->input->post("book_email");
		$source_id = $this->input->post("bsource_id");
		$name = $this->input->post("name");
		$price = $this->input->post("price");
		
		$book = $this->product_model->book($in,$out,$email,$source_id);
		if($book)
		{

			    $variables = array();
				$variables['name'] = $name;
				$variables['price'] = number_format($price);


				$template = file_get_contents("email_templates/booking.php");
				foreach($variables as $key => $value)
				{
				$template = str_replace('{{ '.$key.' }}', $value, $template);
				}
				$msg= $template;

			    $this->load->library('email');
				$config = array();
				$config['protocol'] = 'SMTP';
				$config['smtp_host'] = 'mail.madeformedical.com';
				$config['smtp_user'] = 'no-reply@apartments9ja.com';
				$config['smtp_pass'] = 'password123';
				$config['mailtype'] = 'html';
				$config['smtp_port'] = 25;
				$this->email->initialize($config);
				 
				$this->email->set_newline("\r\n");

				$this->email->to($email);
				$this->email->from('no-reply@apartments9ja.com','Apartments9ja');
				$this->email->subject('Thank you for booking');
				$this->email->message($msg);
					
				
				
				
				
				
				
				



						if( $this->email->send() ) 
						{
							echo "success";
						}else{
							echo "no";
						}
		}else{
			echo "Something went wrong, Please try again";
		}
			
		
	}
	
	
	
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
      function __construct()
		{
			parent::__construct();
			$this->load->model('product_model');

		}
		
	public function index()
	{
		$data['title']                = "Home - Tabfadstores";
		$data['include']              = "home";
	    $data['products']            = $this->product_model->get_products("6");
	     foreach($data['products'] as $p)
	     {
				$p->image =  $this->product_model->get_image_from_id($p->id);
		
		 }
		
		$this->load->view('template', $data);
	}
	
	
	
	public function contact()
	{
		$data['title']                = "Contact Us - Tabfadstores";
		$data['include']              = "contact";
		$this->load->view('template', $data);
	}
	
	public function about()
	{
		$data['title']                = "About Us - Tabfadstores";
		$data['include']              = "about";
		$this->load->view('template', $data);
	}

	public function faq()
	{
		$data['title']                = "Frequently Asked Questions - Tabfadstores";
		$data['include']              = "faq";
		$this->load->view('template', $data);
	}
	
}

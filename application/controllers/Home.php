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
		$data['item']            = $this->product_model->get_item('tours');
	     foreach($data['item'] as $i)
	     {
				$i->image =  $this->product_model->get_image_from_id($i->id,'tours');
		
		 }

		 $data['testimony']            = $this->product_model->get_item('testimonies');
	     
		$data['title']                = "Home - Bynotravels";
		$data['include']              = "home";
	    
		
		$this->load->view('template', $data);
	}
	
	
	
	public function contact()
	{
		$data['title']                = "Contact Us - Bynotravels";
		$data['include']              = "contact";
		$this->load->view('template', $data);
	}

	public function visa()
	{
		 $data['item']            = $this->product_model->get_item('visas');
	     foreach($data['item'] as $i)
	     {
				$i->image =  $this->product_model->get_image_from_id($i->id, 'visas');
		
		 }
		$data['title']                = "Visa Support - Bynotravels";
		$data['include']              = "visa";
		$this->load->view('template', $data);
	}

	public function hotels()
	{
		 $data['item']            = $this->product_model->get_item('hotels');
	     foreach($data['item'] as $i)
	     {
				$i->image =  $this->product_model->get_image_from_id($i->id, 'hotels');
		
		 }
		$data['title']                = "Hotels - Bynotravels";
		$data['include']              = "hotels";
		$this->load->view('template', $data);
	}

	public function packages()
	{
		$data['item']            = $this->product_model->get_item('tours');
	     foreach($data['item'] as $i)
	     {
				$i->image =  $this->product_model->get_image_from_id($i->id, 'tours');
		
		 }
		$data['title']                = "Holiday Packages - Bynotravels";
		$data['include']              = "packages";
		$this->load->view('template', $data);
	}
	
	public function about()
	{
		$data['title']                = "About Us - Bynotravels";
		$data['include']              = "about";
		$this->load->view('template', $data);
	}

	public function gallery()
	{
		$data['item']            = $this->product_model->get_item('images');
	     foreach($data['item'] as $i)
	     {
				$i->image =  $this->product_model->get_image_from_id($i->id, 'gallery');
		
		 }
		$data['title']                = "Gallery - Bynotravels";
		$data['include']              = "gallery";
		$this->load->view('template', $data);
	}
	
}

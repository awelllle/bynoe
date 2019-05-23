<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
      function __construct()
		{
			parent::__construct();
			$this->load->model('prop_model');

		}
		
	public function index()
	{
		$data['title']                = "Blog - Shortletpro";
		$data['include']              = "blog";
		$this->load->view('template', $data);
	}
	
	
}

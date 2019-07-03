<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model
{
    var $tablename = 'companies';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    
    function get_properties()
    {
        $this->db->select("*");
        $this->db->from('properties');
        return $this->db->get()->result();
    }
	function get_item($table)
	{
		$this->db->select("*");
		$this->db->from($table);
	
		if($table === "images"){
			$this->db->where('type', "gallery");
		}
		$this->db->order_by('id', "desc");
		//$this->db->limit($limit);
		return $this->db->get()->result();
	}
	
	function get_available_prop($type, $location)
    {
        $this->db->select("*");
		$this->db->from('properties');
		$this->db->where('prop_cat', $type);
		$this->db->where('prop_location', $location);
		
		$this->db->where('status',0);
        return $this->db->get()->result();
    }
	
	function get_image_from_id($id, $type)
	{
		$this->db->select("*");
		$this->db->from('images');
		$this->db->where('type', $type);
		$this->db->where('source_id', $id);
		$this->db->limit("1");
        return $this->db->get()->row('path');
	}
	
	function get_prop_details($slug)
	{
		$this->db->select("*");
        $this->db->from('properties');
		$this->db->where('prop_slug', $slug);
        return $this->db->get()->result();
		
	}
	function get_images($id)
	{
		$this->db->select("*");
        $this->db->from('images');
		$this->db->where('source_id', $id);
        return $this->db->get()->result();
		
	}

	
	function place_review($name,$email,$comment,$source_id)
	{  
	    $data = array(
		 'name'  => $name,
		  'email' => $email,
		  'comment' => $comment,
		  'source_id' => $source_id,
		  'type'  => 'review',
		);
		return $this->db->insert("comments",$data);
	}
	
	function book($in,$out,$email,$source_id)
	{
		  $data = array(
		 'check_in'  => $in,
		  'check_out' => $out,
		  'email' => $email,
		  'source_id' => $source_id,	
		);
		return $this->db->insert("bookings",$data);
		
	}



}
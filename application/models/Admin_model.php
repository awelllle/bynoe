<?php
Class Admin_model extends CI_Model
{ 
	
    private function verifyHashedPassword($plainPassword, $hashedPassword)
    {
            return password_verify($plainPassword, $hashedPassword) ? true : false;
    }
    public function login_user($identity, $password)
	{
			$this->db->select('*');
			$this->db->from('users');
			//$this->db->where('email', $identity);
			$this->db->where('username', $identity);
			$this->db->limit("1");
			$query                         = $this->db->get()->result(); 		
			   
			if(!empty($query)){	
					 foreach($query as $val){
					 $userpassword        = $val->password;
				 }	 
			if($this->verifyHashedPassword($password, $userpassword)){
					return $query;
				 } 
			  else
				 {
					return array();
				 }
			   } 
			   else {
				return array();
			 }
     }
	
	public function insert_product($country,$price)
	{
	
	 $data = array(
	  'country'           => $country, 
	  'price'        => $price,
	
     
	 );
		return $this->db->insert('tours', $data);
	}
	public function insert_testimony($name,$testimony)
	{
	
	 $data = array(
	  'name'           => $name, 
	  'testimony'        => $testimony,
	
     
	 );
		return $this->db->insert('testimonies', $data);
	}

	public function insert_hotel($name,$price)
	{
	
	 $data = array(
	  'name'           => $name, 
	  'price'        => $price,
	
     
	 );
		return $this->db->insert('hotels', $data);
	}

	public function insert_visa($country)
	{
	
	 $data = array(
	  'country'           => $country,  
	 );
		return $this->db->insert('visas', $data);
	}
	
	public function delete($post_id, $type)
	{
			$this->db->delete($type, array('id' => $post_id));
			return TRUE;
	} 
	
	 public function get_last_id($table)
	 {
		   $this -> db -> select('id');
		   $this -> db -> from($table);
		   $this -> db -> order_by('id', "desc");
		   $query = $this -> db -> get()->row("id");
		   return $query;	
	 }
	 
	 
	 public function get_items($table)
	 {
		   $this -> db -> select('*');
		   $this -> db -> from($table);
		   if($table === "images")
		    {
				$this->db->where('type', "gallery");
			}
		   $query = $this -> db -> get();
		   return $query->result();	
	 }

	 
	 public function get_item_details($id, $table)
	 {
		$this -> db -> select('*');
		$this -> db -> from($table);
		$this -> db -> where('id', $id);
		$query = $this -> db -> get();
		return $query->result();	

	 }

	
	 public function get_parent_categories()
	 {
		   $this -> db -> select('*');
			 $this -> db -> from('categories');
			 $this -> db ->where('type', 0);
		   $query = $this -> db -> get();
		   return $query->result();	
	 }
	 public function get_product($id)
	 {
		$this -> db -> select('*');
		$this -> db -> from('products');
		$this -> db -> where('id', $id);
		$query = $this -> db -> get();
		return $query->result();	

	 }

	 public function get_sub_categories()
	 {
			$this -> db -> select('*');
			$this -> db -> from('categories');
			$this -> db ->where('type !=', 0);
			$query = $this -> db -> get();
			return $query->result();	

	 }

	 public function insert_category($name,$type,$slug)
	{
		$data = array(
			'name'           => $name, 
			'type'           => $type, 
			'slug'           => $slug
		);
		return $this->db->insert('categories', $data);

	}


	 
	 
	 public function update_post($post_id,$post,$type)
	{
		if(empty($post))
		return FALSE;		
		$this->db->where('id',$post_id);
		$this->db->update($type,$post);
	}   
	
	 public function update_option($post_id,$option)
	{	
	    $this->db->set('option', $option);
		$this->db->where('id',$post_id);
		$this->db->update('question_options',$option);
	} 
	

	
}
?>

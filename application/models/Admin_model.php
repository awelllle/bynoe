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
	
	public function insert_product($name,$category,$subcategory,$price,$description,$slug)
	{
	
	 $data = array(
	  'name'           => $name, 
	  'category'        => $category,
	  'subcategory'     => $subcategory,
	  'price'           =>  $price,
		'description'    => $description,
		'slug'          => $slug
     
	 );
		return $this->db->insert('products', $data);
	}
	
	public function delete($post_id, $type)
	{
			$this->db->delete($type, array('id' => $post_id));
			return TRUE;
	} 
	
	 public function get_last_id()
	 {
		   $this -> db -> select('id');
		   $this -> db -> from('products');
		   $this -> db -> order_by('id', "desc");
		   $query = $this -> db -> get()->row("id");
		   return $query;	
	 }
	 
	 
	 public function get_products()
	 {
		   $this -> db -> select('*');
		   $this -> db -> from('products');
		   $query = $this -> db -> get();
		   return $query->result();	
	 }

	 public function get_categories()
	 {
		   $this -> db -> select('*');
		   $this -> db -> from('categories');
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

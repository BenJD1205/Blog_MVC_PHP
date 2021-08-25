<?php
	 class postmodel extends DModel
	 {
	     public function __construct()
	     {
	     	parent::__construct();
	     }

	     public function category_post($table){
	     	$sql = "SELECT * from $table ORDER BY id_category_post DESC";
	     	return $this->db->select($sql);
	     }


	     public function insertpost($table,$data)
	     {
	     	return $this->db->insert($table,$data);
	     }

	     public function deletepost($table,$cond){
	     	return $this->db->delete($table,$cond);
	     }
	     //category_post
	     public function insertcategory_post($table,$data){
	     	return $this->db->insert($table,$data);
	     }

	     public function post_category($table){
	     	$sql = "SELECT * from $table ORDER BY id_category_post DESC";
	     	return $this->db->select($sql);
	     }

	     public function deletecategory_post($table,$cond){
	     	return $this->db->delete($table,$cond);
	     }

	     public function categorybyid_post($table,$cond){
	     	
	     	$sql = "SELECT * FROM $table WHERE $cond";

	     	return $this->db->select($sql);
	     }

	     public function updatecategory_post($table,$data,$cond){
	     	return $this->db->update($table,$data,$cond);
	     }

	     public function post($table,$table_category){
	     	$sql = "SELECT * from $table,$table_category WHERE $table.id_category_post= $table_category.id_category_post ORDER BY $table.id_post DESC";
	     	return $this->db->select($sql);
	     }

	     public function listpost_home($post){
	     	$sql = "SELECT * FROM $post ORDER BY id_post DESC";
	     	return $this->db->select($sql);
	     }

	     public function postid($table,$cond){
	     	
	     	$sql = "SELECT * FROM $table WHERE $cond";

	     	return $this->db->select($sql);
	     }

	     public function updatepost($table,$data,$cond){
	     	return $this->db->update($table,$data,$cond);
	     }

	 } 
?>
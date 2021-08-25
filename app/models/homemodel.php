<?php
	 class homemodel extends DModel
	 {
	     public function __construct()
	     {
	     	parent::__construct();
	     }

	     public function category($table_category_product){
	     	return $this->db->select($table_category_product);
	     	// return $result;
	     	// $sql = "SELECT * FROM category_product ORDER BY id_category_product DESC";
	     	// $query = $this->db->query($sql);
	     	// $result = $query->fetchAll();
	     	// return $result;
	     }

	     public function categorybyid($table_category_product,$id){
	     	
	     	$sql = "SELECT * FROM $table_category_product WHERE id_category_product=:id";
	     	$data = array(':id'=>$id);

	     	return $this->db->select($sql,$data);
	     }

	 } 
?>
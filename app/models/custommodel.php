<?php
	 class custommodel extends DModel
	 {
	     public function __construct()
	     {
	     	parent::__construct();
	     }

	     // public function category($table_category_product){
	     // 	$sql = "SELECT * from $table_category_product ORDER BY id_category_product DESC";
	     // 	return $this->db->select($sql);
	     // }

	     public function insertcustomer($table_custom,$data){
	     	return $this->db->insert($table_custom,$data);
	     }

	     public function login($table_custom,$username,$password){
	    	$sql= "SELECT * FROM $table_custom WHERE custom_email=? AND custom_password=?";
	    	return $this->db->affectedRows($sql,$username,$password);	
	    }

	    public function getLogin($table_custom,$username,$password){
	    	$sql= "SELECT * FROM $table_custom WHERE custom_email=? AND custom_password=?";
	    	return $this->db->selectUser($sql,$username,$password);
	    }

	 } 
?>
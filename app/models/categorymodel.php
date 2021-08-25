<?php
	 class categorymodel extends DModel
	 {
	     public function __construct()
	     {
	     	parent::__construct();
	     }

	     public function category($table_category_product){
	     	$sql = "SELECT * from $table_category_product ORDER BY id_category_product DESC";
	     	return $this->db->select($sql);
	     }
	     #Hàm lấy ra sản phẩm
	     public function category_home($table_category_product){
	     	$sql = "SELECT * from $table_category_product ORDER BY id_category_product DESC";
	     	return $this->db->select($sql);
	     }
	     //Hàm lấy ra danh mục tin tức
	     public function category_post($table_post){
	     	$sql = "SELECT * from $table_post ORDER BY id_category_post DESC";
	     	return $this->db->select($sql);
	     }

	     public function categorybyid_home($table,$table_product,$id)	{
	     	$sql = "SELECT * from $table,$table_product WHERE $table.id_category_product = $table_product.id_category_product AND $table_product.id_category_product='$id' ORDER BY $table_product.id_product DESC";
	     	return $this->db->select($sql);
	     }

	     public function postbyid_home($post,$table_post,$id){
	     	$sql = "SELECT * from $post,$table_post WHERE $post.id_category_post = $table_post.id_category_post AND $post.id_category_post='$id' ORDER BY $post.id_post DESC";
	     	return $this->db->select($sql);
	     }

	     public function categorybyid($table,$cond){
	     	
	     	$sql = "SELECT * FROM $table WHERE $cond";

	     	return $this->db->select($sql);
	     }

	     public function insertcategory($table_category_product,$data)
	     {
	     	return $this->db->insert($table_category_product,$data);
	     }

	     public function updatecategory($table_category_product,$data,$cond){
	     	return $this->db->update($table_category_product,$data,$cond);
	     }

	     public function deletecategory($table_category_product,$cond){
	     	return $this->db->delete($table_category_product,$cond);
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

	     public function insertproduct($table,$data){
	     	return $this->db->insert($table,$data);
	     }

	     public function listproduct_home($table_product){
	     	
	     	$sql = "SELECT * FROM $table_product ORDER BY $table_product.id_product DESC";
	     	return $this->db->select($sql);
	     }

	     public function product_hot($table_product){
	     	$sql = "SELECT * FROM $table_product WHERE product_hot =1 ORDER BY $table_product.id_product DESC";
	     	return $this->db->select($sql);	
	     }

	     public function listproduct_index($table_product){
	     	
	     	$sql = "SELECT * FROM $table_product ORDER BY $table_product.id_product DESC";
	     	return $this->db->select($sql);
	     }

	     public function product($table,$table_category){
	     	$sql = "SELECT * from $table,$table_category WHERE $table.id_category_product= $table_category.id_category_product ORDER BY $table.id_product DESC";
	     	return $this->db->select($sql);
	     }

	     public function deleteproduct($table,$cond){
	     	return $this->db->delete($table,$cond);
	     }

	     public function productid($table,$cond){
	     	
	     	$sql = "SELECT * FROM $table WHERE $cond";

	     	return $this->db->select($sql);
	     }

	     public function relatedproduct_home($table,$table_product,$cond_related){
	     	$sql = "SELECT * FROM $table,$table_product WHERE $cond_related";

	     	return $this->db->select($sql);
	     }

	     public function updateproduct($table,$data,$cond){
	     	return $this->db->update($table,$data,$cond);
	     }

	     public function detailsproduct_home($table,$table_product,$cond){
	     	
	     	$sql = "SELECT * FROM $table,$table_product WHERE $cond";

	     	return $this->db->select($sql);
	     }

	     public function detailspost_home($table_post,$post,$cond){
	     	$sql = "SELECT * FROM $table_post,$post WHERE $cond";

	     	return $this->db->select($sql);
	     }

	     public function relatedpost_home($table_post,$post,$cond_related){
	     	$sql = "SELECT * FROM $table_post,$post WHERE $cond_related ORDER BY $post.id_post DESC" ;

	     	return $this->db->select($sql);
		}

		public function post_index($post){
			$sql = "SELECT * FROM $post ORDER BY id_post DESC LIMIT 4";

	     	return $this->db->select($sql);
		}

	 } 
?>
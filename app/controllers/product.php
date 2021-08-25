<?php
	class product extends DController {

		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$this->add_category();
		}

		public function	add_category(){
      		$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$this->load->view('cpanel/product/add_category');
			$this->load->view('cpanel/footer');
    	}

    	public function	add_product(){
      		$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$table = "category_product";
			$categorymodel = $this->load->model('categorymodel');
			$data['category'] = $categorymodel->category($table);

			$this->load->view('cpanel/product/add_product',$data);
			$this->load->view('cpanel/footer');
    	}

    	public function	insert_category(){
      		$title = $_POST['title_category_product'];
      		$desc = $_POST['description'];
      		$table = "category_product";
      		$data = array(
      			'title_category_product' => $title,
      			'description' => $desc
      		);
      		$categorymodel = $this->load->model('categorymodel');
      		$result = $categorymodel->insertcategory($table,$data);
      		if($result ==1){
      			$message['msg'] = "Thêm danh mục sản phẩm thành công";
      			header("Location: ".BASE_URL."/product/list_category?msg=".urldecode(serialize($message)));
      		}else{
      			$message['msg'] = "Thêm danh mục sản phẩm thất bại";
      			header("Location: ".BASE_URL."/product/list_category?msg=".urldecode(serialize($message)));
      		}
    	}

    	public function	insert_product(){
      		$title = $_POST['title_product'];
      		$price = $_POST['price_product'];
      		$desc = $_POST['desc_product'];
      		$hot = $_POST['product_hot'];
      		$quantity = $_POST['quantity_product'];
      		$image = $_FILES['image_product']['name'];
      		$tmp_image = $_FILES['image_product']['tmp_name'];

      		$div = explode('.',$image);
      		$file_ext = strtolower(end($div));
      		$unique_image = $div[0].time().'.'.$file_ext;
      		$path_uploads= "public/uploads/product/".$unique_image;

      		$category = $_POST['category_product'];
      		$table = "product";
      		$data = array(
      			'title_product' => $title,
      			'price_product' => $price,
      			'desc_product' => $desc,
      			'quantity_product' => $quantity,
      			'image_product' => $unique_image,
      			'id_category_product' => $category,
      			'product_hot' => $hot
      		);
      		$categorymodel = $this->load->model('categorymodel');
      		$result = $categorymodel->insertproduct($table,$data);
      		
      		if($result==1){
				move_uploaded_file($tmp_image, $path_uploads);
				$message['msg'] = "Thêm sản phẩm thành công";
				header('Location:'.BASE_URL."/product/add_product?msg=".urlencode(serialize($message)));
			}else{
				$message['msg'] = "Thêm sản phẩm thất bại";
				header('Location:'.BASE_URL."/product/add_product?msg=".urlencode(serialize($message)));
			}
    	}

    	public function	list_category(){
      		$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$table = "category_product ";
			$categorymodel = $this->load->model('categorymodel');
			$data['category'] = $categorymodel->category($table);

			$this->load->view('cpanel/product/list_category',$data);
			$this->load->view('cpanel/footer');
    	}

    	public function	list_product(){
      		$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$table = "product";
			$table_category = "category_product ";
			$categorymodel = $this->load->model('categorymodel');
			$data['product'] = $categorymodel->product($table,$table_category);

			$this->load->view('cpanel/product/list_product',$data);
			$this->load->view('cpanel/footer');
    	}

    	public function delete_category($id){
    		$table = "category_product";
    		$cond = "id_category_product='$id'";
    		$categorymodel = $this->load->model('categorymodel');
			$result = $categorymodel->deletecategory($table,$cond);

			if($result ==1){
      			$message['msg'] = "Xóa danh mục sản phẩm thành công";
      			header("Location: ".BASE_URL."/product/list_category?msg=".urldecode(serialize($message)));
      		}else{
      			$message['msg'] = "Xóa danh mục sản phẩm thất bại";
      			header("Location: ".BASE_URL."/product/list_category?msg=".urldecode(serialize($message)));
      		}
    	}

    	public function delete_product($id){
    		$table = "product";
    		$cond = "id_product='$id'";
    		$categorymodel = $this->load->model('categorymodel');
			$result = $categorymodel->deleteproduct($table,$cond);

			if($result ==1){
      			$message['msg'] = "Xóa danh mục sản phẩm thành công";
      			header("Location: ".BASE_URL."/product/list_product?msg=".urldecode(serialize($message)));
      		}else{
      			$message['msg'] = "Xóa danh mục sản phẩm thất bại";
      			header("Location: ".BASE_URL."/product/list_product?msg=".urldecode(serialize($message)));
      		}
    	}

    	public function edit_category($id){
    		$table = "category_product";
    		$cond = "id_category_product='$id'";
    		$categorymodel = $this->load->model('categorymodel');

    		$data['categoryid'] = $categorymodel->categorybyid($table,$cond);
    		$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$this->load->view('cpanel/product/edit_category',$data);
			$this->load->view('cpanel/footer');
    	}

    	public function edit_product($id){
    		$table = "product";
    		$cond = "id_product='$id'";
    		$table_category = "category_product";
    		$categorymodel = $this->load->model('categorymodel');

    		$data['productid'] = $categorymodel->productid($table,$cond);
    		$data['category'] = $categorymodel->category($table_category);
    		$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$this->load->view('cpanel/product/edit_product',$data);
			$this->load->view('cpanel/footer');
    	}

    	public function update_cate_product($id){
    		$table = "category_product";
    		$cond = "id_category_product='$id'";
    		$title = $_POST['title_category_product'];
      		$desc = $_POST['description'];
    		$data = array(
    			'title_category_product' => $title,
      			'description' => $desc
    		);
    		$categorymodel = $this->load->model('categorymodel');

    		$result = $categorymodel->updatecategory($table,$data,$cond);

    		if($result ==1){
      			$message['msg'] = "Cập nhật danh mục sản phẩm thành công";
      			header("Location: ".BASE_URL."/product/list_category?msg=".urldecode(serialize($message)));
      		}else{
      			$message['msg'] = "Cập nhật danh mục sản phẩm thất bại";
      			header("Location: ".BASE_URL."/product/list_category?msg=".urldecode(serialize($message)));
      		}
    	}

    	public function update_product($id){
    		$title = $_POST['title_product'];
      		$price = $_POST['price_product'];
      		$desc = $_POST['desc_product'];
      		$hot = $_POST['product_hot'];
      		$quantity = $_POST['quantity_product'];
      		$image = $_FILES['image_product']['name'];
      		$tmp_image = $_FILES['image_product']['tmp_name'];

      		$div = explode('.',$image);
      		$file_ext = strtolower(end($div));
      		$unique_image = $div[0].time().'.'.$file_ext;
      		$path_uploads= "public/uploads/product/".$unique_image;

      		$category = $_POST['category_product'];
      		$table = "product";
      		$cond = "id_product='$id'";
      		if($image){
      			$data['productid'] = $categorymodel->productid($table,$cond);
      			foreach ($data['productid'] as $key => $value) {
      				$path_unlink = "public/uploads/product/";
  					unlink($path_unlink.$value['image_product']);
      				
      			}
      			$data = array(
	      			'title_product' => $title,
	      			'price_product' => $price,
	      			'desc_product' => $desc,
	      			'quantity_product' => $quantity,
	      			'image_product' => $unique_image,
	      			'id_category_product' => $category,
	      			'product_hot' => $hot
      			);
      			move_uploaded_file($tmp_image, $path_uploads);
      		}else{
      			$data = array(
	      			'title_product' => $title,
	      			'price_product' => $price,
	      			'desc_product' => $desc,
	      			'quantity_product' => $quantity,
	      			// 'image_product' => $unique_image,
	      			'id_category_product' => $category,
	      			'product_hot' =>$hot
	      		);
      		}
      		$categorymodel = $this->load->model('categorymodel');
      		$result = $categorymodel->updateproduct($table,$data,$cond);
      		
      		if($result==1){
				
				$message['msg'] = "Cập nhật sản phẩm thành công";
				header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
			}else{
				$message['msg'] = "Cập nhật sản phẩm thất bại";
				header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
			}
    	}
	} 
?>
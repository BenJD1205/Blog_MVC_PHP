<?php
	class post extends DController {

		public function __construct(){
			parent::__construct();
		}

		public function index(){
      		$this->add_category();
    	}

    	public function	add_category(){
      		$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$this->load->view('cpanel/post/add_category');
			$this->load->view('cpanel/footer');
    	}

    	public function	insert_category(){
      		$title = $_POST['title_category_post'];
      		$desc = $_POST['desc_category_post'];
      		$table = "category_post";
      		$data = array(
      			'title_category_post' => $title,
      			'desc_category_post' => $desc
      		);
      		$categorymodel = $this->load->model('categorymodel');
      		$result = $categorymodel->insertcategory_post($table,$data);
      		if($result ==1){
      			$message['msg'] = "Thêm danh mục sản phẩm thành công";
      			header("Location: ".BASE_URL."/post/list_category?msg=".urldecode(serialize($message)));
      		}else{
      			$message['msg'] = "Thêm danh mục sản phẩm thất bại";
      			header("Location: ".BASE_URL."/post/list_category?msg=".urldecode(serialize($message)));
      		}
    	}

    	public function	list_category(){
      		$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$table = "category_post";
			$categorymodel = $this->load->model('categorymodel');
			$data['category'] = $categorymodel->post_category($table);

			$this->load->view('cpanel/post/list_category',$data);
			$this->load->view('cpanel/footer');
    	}

    	public function delete_category($id){
    		$table = "category_post";
    		$cond = "id_category_post='$id'";
    		$categorymodel = $this->load->model('categorymodel');
			$result = $categorymodel->deletecategory_post($table,$cond);

			if($result ==1){
      			$message['msg'] = "Xóa danh mục sản phẩm thành công";
      			header("Location: ".BASE_URL."/post/list_category?msg=".urldecode(serialize($message)));
      		}else{
      			$message['msg'] = "Xóa danh mục sản phẩm thất bại";
      			header("Location: ".BASE_URL."/post/list_category?msg=".urldecode(serialize($message)));
      		}
    	}

    	public function edit_category($id){
    		$table = "category_post";
    		$cond = "id_category_post='$id'";
    		$categorymodel = $this->load->model('categorymodel');

    		$data['categoryid'] = $categorymodel->categorybyid_post($table,$cond);
    		$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$this->load->view('cpanel/post/edit_category',$data);
			$this->load->view('cpanel/footer');
    	}

    	public function update_product($id){
    		$table = "category_post";
    		$cond = "id_category_post='$id'";
    		$title = $_POST['title_category_post'];
      		$desc = $_POST['description'];
    		$data = array(
    			'title_category_post' => $title,
      			'desc_category_post' => $desc
    		);
    		$categorymodel = $this->load->model('categorymodel');

    		$result = $categorymodel->updatecategory_post($table,$data,$cond);

    		if($result ==1){
      			$message['msg'] = "Cập nhật danh mục sản phẩm thành công";
      			header("Location: ".BASE_URL."/post/list_category?msg=".urldecode(serialize($message)));
      		}else{
      			$message['msg'] = "Cập nhật danh mục sản phẩm thất bại";
      			header("Location: ".BASE_URL."/post/list_category?msg=".urldecode(serialize($message)));
      		}
    	 
    	}

    	public function add_post(){
    		$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$postmodel = $this->load->model('postmodel');
			$table = "category_post";
			$data['category'] = $postmodel->category_post($table);
			$this->load->view('cpanel/post/add_post',$data);
			$this->load->view('cpanel/footer');
    	}

    	public function	insert_post(){
      		$title = $_POST['title_post'];
      		$desc = $_POST['content_post'];
      		$image = $_FILES['image_post']['name'];
      		$tmp_image = $_FILES['image_post']['tmp_name'];

      		$div = explode('.',$image);
      		$file_ext = strtolower(end($div));
      		$unique_image = $div[0].time().'.'.$file_ext;
      		$path_uploads= "public/uploads/post/".$unique_image;

      		$category = $_POST['category_post'];
      		$table = "post";
      		$data = array(
      			'title_post' => $title,
       			'content_post' => $desc,
      			'image_post' => $unique_image,
      			'id_category_post' => $category
      		);
      		$postmodel = $this->load->model('postmodel');
      		$result = $postmodel->insertpost($table,$data);
      		
      		if($result==1){
				move_uploaded_file($tmp_image, $path_uploads);
				$message['msg'] = "Thêm sản phẩm thành công";
				header('Location:'.BASE_URL."/post/add_post?msg=".urlencode(serialize($message)));
			}else{
				$message['msg'] = "Thêm sản phẩm thất bại";
				header('Location:'.BASE_URL."/post/add_post?msg=".urlencode(serialize($message)));
			}
    	}

    	public function	list_post(){
      		$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$table = "post";
			$table_category = "category_post ";
			$postmodel = $this->load->model('postmodel');
			$data['post'] = $postmodel->post($table,$table_category);

			$this->load->view('cpanel/post/list_post',$data);
			$this->load->view('cpanel/footer');
    	}


    	public function delete_post($id){
    		$table = "post";
    		$cond = "id_post='$id'";
    		$postmodel = $this->load->model('postmodel');
			$result = $postmodel->deletepost($table,$cond);

			if($result ==1){
      			$message['msg'] = " Xóa bài viết thành công";
      			header("Location: ".BASE_URL."/post/list_post?msg=".urldecode(serialize($message)));
      		}else{
      			$message['msg'] = "Xóa bài viết thất bại";
      			header("Location: ".BASE_URL."/post/list_post?msg=".urldecode(serialize($message)));
      		}
    	}


    	public function edit_post($id){
    		$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
    		$table = "post";
    		$cond = "id_post='$id'";
    		$table_category = "category_post";
    		$postmodel = $this->load->model('postmodel');

    		$data['postid'] = $postmodel->postid($table,$cond);
    		$data['category'] = $postmodel->category_post($table_category);
			$this->load->view('cpanel/post/edit_post',$data);
			$this->load->view('cpanel/footer');
    	}

    	public function update_post($id){
    		$title = $_POST['title_post'];
      		$content = $_POST['content_post'];
      		$image = $_FILES['image_post']['name'];
      		$tmp_image = $_FILES['image_post']['tmp_name'];

      		$div = explode('.',$image);
      		$file_ext = strtolower(end($div));
      		$unique_image = $div[0].time().'.'.$file_ext;
      		$path_uploads= "public/uploads/post/".$unique_image;

      		$category = $_POST['category_post'];
      		$table = "post";
      		$cond = "id_post='$id'";
      		if($image){
      			$data['postid'] = $postmodel->postid($table,$cond);
      			foreach ($data['postid'] as $key => $value) {
      				$path_unlink = "public/uploads/post/";
  					unlink($path_unlink.$value['image_post']);
      				
      			}
      			$data = array(
	      			'title_post' => $title,
	      			'content_post' => $content,
	      			'image_post' => $unique_image,
	      			'id_category_post' => $category
      			);
      			move_uploaded_file($tmp_image, $path_uploads);
      		}else{
      			$data = array(
	      			'title_post' => $title,
	      			'content_post' => $content,
	      			// 'image_post' => $unique_image,
	      			'id_category_post' => $category
	      		);
      		}
      		$postmodel = $this->load->model('postmodel');
      		$result = $postmodel->updatepost($table,$data,$cond);
      		
      		if($result==1){
				
				$message['msg'] = "Cập nhật sản phẩm thành công";
				header('Location:'.BASE_URL."/post/list_post?msg=".urlencode(serialize($message)));
			}else{
				$message['msg'] = "Cập nhật sản phẩm thất bại";
				header('Location:'.BASE_URL."/post/list_post?msg=".urlencode(serialize($message)));
			}
    	}
	} 
?>
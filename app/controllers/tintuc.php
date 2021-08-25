<?php
	class tintuc extends DController {
		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$this->danhmuc();
		}

		public function tatca(){
			$table = 'category_product';
			$table_post = 'category_post';
			$post = "post";
			$categorymodel = $this->load->model('categorymodel');
			$postmodel = $this->load->model('postmodel');
			$data['category'] = $categorymodel->category_home($table);
			$data['cate_post'] = $categorymodel->category_post($table_post);
			$data['listpost'] = $postmodel->listpost_home($post);
			
			$this->load->view('header',$data);
			// $this->load->view('slider');
			$this->load->view('listpost',$data);	
			$this->load->view('footer');
		}

		public function danhmuc($id){
			$table = 'category_product';
			$table_post = 'category_post';
			$post = "post";
			$categorymodel = $this->load->model('categorymodel');
			$data['category'] = $categorymodel->category_home($table);
			$data['cate_post'] = $categorymodel->category_post($table_post);
			$data['postbyid'] = $categorymodel->postbyid_home($post,$table_post,$id);
			
			$this->load->view('header',$data);
			// $this->load->view('slider');
			$this->load->view('categorypost',$data);	
			$this->load->view('footer');
		}


		public function chitiettin($id){
			$table_post = 'category_post';
			$table = 'category_product';
			$post = 'post';
			$cond = "$post.id_category_post=$table_post.id_category_post AND $post.id_post='$id'";
			$categorymodel = $this->load->model('categorymodel');
			$data['category'] = $categorymodel->category_home($table);
			$data['cate_post'] = $categorymodel->category_post($table_post);
			// $data['postbyid'] = $categorymodel->postbyid_home($table_post,$post,$id);
			$data['details_post'] = $categorymodel->detailspost_home($table_post,$post,$cond);

			foreach ($data['details_post'] as $key => $cate){
				$id_cate = $cate['id_category_post'];
			}
			$cond_related = "$table_post.id_category_post=$post.id_category_post AND $post.id_category_post='$id_cate' AND $post.id_post NOT IN('$id')";
			$data['related'] = $categorymodel->relatedpost_home($table_post,$post,$cond_related);
			$this->load->view('header',$data);
			// $this->load->view('slider');
			$this->load->view('details_post',$data);
			$this->load->view('footer');
		}

	} 
?>
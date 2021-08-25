<?php
	class index extends DController {
		public function __construct(){
			parent::__construct();
		}

		public function index(){

			$this->homepage();
		}

		public function homepage(){
			$table = 'category_product';
			$table_post = 'category_post';
			$table_product = 'product';
			$post = 'post';
			$categorymodel = $this->load->model('categorymodel');
			$data['category'] = $categorymodel->category_home($table);
			$data['cate_post'] = $categorymodel->category_post($table_post);
			$data['product'] = $categorymodel->listproduct_index($table_product);
			$data['post'] = $categorymodel->post_index($post);
			$this->load->view('header',$data);
			$this->load->view('slider',$data);
			$this->load->view('home',$data);
			$this->load->view('footer');
		}

		public function danhmuc(){
			$this->load->view('header');
			// $this->load->view('slider');
			$this->load->view('categoryproduct');
			$this->load->view('footer');
		}

		public function chitietsanpham(){
			$this->load->view('header');
			// $this->load->view('slider');
			$this->load->view('details_product');
			$this->load->view('footer');
		}

		public function lienhe(){
			$table_post = 'category_post';
			$table = 'category_product';
			$categorymodel = $this->load->model('categorymodel');
			$data['category'] = $categorymodel->category_home($table);
			$data['cate_post'] = $categorymodel->category_post($table_post);
			$this->load->view('header',$data);
			// $this->load->view('slider');
			$this->load->view('contact');
			$this->load->view('footer');
		}

		public function notfound(){
			$this->load->view('header');	
			$this->load->view('404');
			$this->load->view('footer');
		}

	} 
?>
<?php
	class sanpham extends DController {
		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$this->homepage();
		}

		public function tatca(){
			
			// $this->load->view('slider');
			$table_post = 'category_post';
			$table = 'category_product';
			$table_product = 'product';
			$categorymodel = $this->load->model('categorymodel');
			$data['category'] = $categorymodel->category_home($table);
			$data['cate_post'] = $categorymodel->category_post($table_post);
			$data['list_product'] = $categorymodel->listproduct_home($table_product);
			
			$this->load->view('header',$data);	
			$this->load->view('listproduct',$data);
			$this->load->view('footer');
		}

		public function danhmuc($id){
			
			// $this->load->view('slider');
			$table_post = 'category_post';
			$table = 'category_product';
			$table_product = 'product';
			$categorymodel = $this->load->model('categorymodel');
			$data['category'] = $categorymodel->category_home($table);
			$data['cate_post'] = $categorymodel->category_post($table_post);
			$data['categorybyid'] = $categorymodel->categorybyid_home($table,$table_product,$id);
			
			$this->load->view('header',$data);	
			$this->load->view('categoryproduct',$data);
			$this->load->view('footer');
		}

		public function sanphamhot(){
			$table_post = 'category_post';
			$table = 'category_product';
			$table_product = 'product';
			$categorymodel = $this->load->model('categorymodel');
			$data['category'] = $categorymodel->category_home($table);
			$data['cate_post'] = $categorymodel->category_post($table_post);
			$data['product_hot'] = $categorymodel->product_hot($table_product);
			
			$this->load->view('header',$data);	
			$this->load->view('product_hot',$data);
			$this->load->view('footer');	
		}

		public function chitietsanpham($id){
			$table_post = 'category_post';
			$table = 'category_product';
			$table_product = 'product';
			$cond = "$table_product.id_category_product = $table.id_category_product AND $table_product.id_product='$id'";
			
			$categorymodel = $this->load->model('categorymodel');
			$data['category'] = $categorymodel->category_home($table);
			$data['cate_post'] = $categorymodel->category_post($table_post);
			$data['details_product'] = $categorymodel->detailsproduct_home($table,$table_product,$cond);

			foreach ($data['details_product'] as $key => $cate){
				$id_cate = $cate['id_category_product'];
			}
			$cond_related = "$table_product.id_category_product = $table.id_category_product AND $table.id_category_product = '$id_cate' AND $table_product.id_product NOT IN('$id')";
			$data['related'] = $categorymodel->relatedproduct_home($table,$table_product,$cond_related);
			
			$this->load->view('header',$data);
			// $this->load->view('slider');
			$this->load->view('details_product',$data);
			$this->load->view('footer');
		}

		public function lienhe(){
			$this->load->view('header');
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
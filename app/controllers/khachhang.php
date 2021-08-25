<?php
	class khachhang extends DController {
		public function __construct(){
			parent::__construct();
		}

		public function index(){

			$this->homepage();
		}

		public function lichsudonhang(){
		}

		public function login_customer(){
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			$table_custom = 'custom';
			$custommodel = $this->load->model('custommodel');

			$cond = $custommodel->login($table_custom,$username,$password);

			if($cond==0){
				$message['msg'] = "Username hoặc password sai ";
				header("Location: ".BASE_URL."/khachhang/dangnhap?msg=".urlencode(serialize($message)));
				echo $message;
			}else{
				$result = $custommodel->getLogin($table_custom,$username
					,$password);

				Session::init();

				Session::set('customer',true);
				Session::set('username',$result[0]['custom_name']);
				Session::set('custom_id',$result[0]['custom_id']);
				$message['msg'] = "Đăng nhập thành công ";
				header("Location: ".BASE_URL."/khachhang/dangnhap?msg=".urlencode(serialize($message)));
			}
		}


		public function dangxuat (){
			Session::init();
			Session::unset('customer');
			$message['msg'] = "Đăng xuất tài khoản thành công";
			header('Location:'.BASE_URL."/khachhang/dangnhap?msg=".urlencode(serialize($message)));	
		}


		public function dangnhap(){
			$table = 'category_product';
			$table_post = 'category_post';
			$table_product = 'product';
			$post = 'post';
			$categorymodel = $this->load->model('categorymodel');
			$data['category'] = $categorymodel->category_home($table);
			$data['cate_post'] = $categorymodel->category_post($table_post);
			$data['post'] = $categorymodel->post_index($post);
			Session::init();
			$this->load->view('header',$data);
			// $this->load->view('slider',$data);
			$this->load->view('custom_login');
			$this->load->view('footer');
		}

		public function dangki(){
			$name = $_POST['name'];
      		$email = $_POST['email'];
      		$phone = $_POST['dienthoai'];
      		$address = $_POST['diachi'];
      		$password = $_POST['password'];

      		$table_custom = "custom";
      		$data = array(
      			'custom_name' => $name,
      			'custom_phone' => $phone,
      			'custom_email' => $email,
      			'custom_password' => md5($password),
      			'custom_address' => $address,
      		);
      		$custommodel = $this->load->model('custommodel');
      		$result = $custommodel->insertcustomer($table_custom,$data);
      		
      		if($result==1){
				move_uploaded_file($tmp_image, $path_uploads);
				$message['msg'] = "Đăng kí thành công";
				header('Location:'.BASE_URL."/khachhang/dangnhap?msg=".urlencode(serialize($message)));
			}else{
				$message['msg'] = "Đăng kí thất bại";
				header('Location:'.BASE_URL."/khachhang/dangnhap?msg=".urlencode(serialize($message)));
			}
		}

		public function notfound(){
			$this->load->view('header');	
			$this->load->view('404');
			$this->load->view('footer');
		}

	} 
?>
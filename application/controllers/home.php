<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {
	
	public function index(){
		$data = array(
			'urlCari' => base_url('home/cari'),
			'title' => 'Result . . .',
		);
		$this->load->view('front/index',$data);
	}
	function admin(){
		if($this->session->userdata('login') === TRUE){
            $this->load->view('newindex');
		}else{
			$this->load->view('login');
		}
	}
	function login(){
		$_POST = $this->security->xss_clean($_POST);
		$user = $this->auth->login($_POST['username'],$_POST['password']);
		if($user == false){
			echo json_encode(array("msg"=>"Login Anda Salah"));
		}elseif($user == true){
			echo json_encode(array("success"=>true));
		}else{
			echo json_encode(array("msg"=>"Login Anda Salah"));
		}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(site_url());
	}
	function cari(){
		$hal	= isset($_GET['hal']) ? $_GET['hal'] : 1;
		$batas  = isset($_GET_GET['batas']) ? $_GET['batas'] : 25;
		/*posisi*/
		if(empty($_GET['hal'])){
			$posisi=0;
			$_GET['hal']=1;
		}else{
			$posisi = ($_GET['hal']-1) * $batas;
		}
		$q = $_GET['q'];
		$sql = "select * from barang where nama like '%$q%' order by id desc";
		$query	= $this->db->query("$sql LIMIT $posisi,$batas");
		$jmldata= $this->db->query($sql)->num_rows();
		$jmlhalaman = ceil($jmldata/$batas);
		$link_halaman = "";

		// Link halaman 1,2,3, ...
		for ($i=1; $i<=$jmlhalaman; $i++){
			if ($i == $hal){
				$link_halaman .= "<li class=\"active\"><a href=\"#\">$i</a></li>";
			}else{
				$link_halaman .= "<li><a href='".base_url('cari')."?hal=$i&q=$q'>$i</a></li>";
			}
			$link_halaman .= " ";
		}
		$data = array(
			'data' => $this->db->query($sql),
			'link' => $link_halaman,
			'urlDetail' => base_url('barang/detail'),
			);
		$this->load->view('home_cari',$data);
	}
	public function register_member()
	{
		$x = $this->db->get_where('pelanggan',(array('username'=>$_POST['email'])));
		if($x->num_rows() > 0){
			echo "<script>alert('Data Sudah Ada')</script>";
			#redirect(site_url('blog/login'));
		}else{
			$this->load->model('pelanggan_model');
			$_POST['password'] = sha1(md5($_POST['password']));
			$_POST['no_pelanggan'] = 'CUST-'.generateRandomString();
			$_POST['username'] = $_POST['email'];
			unset($_POST['email']);
			$this->pelanggan_model->simpan('pelanggan');
			redirect(site_url('home/my_account'));
		}
	}
	public function login_member()
	{
		if(isset($_POST['email']) and isset($_POST['password'])){
			$this->load->model('pelanggan_model');
			$this->load->model('shop_model');
			$username  =$_POST['email'];
			$password  = sha1(md5($_POST['password']));
			$cek = $this->db->get_where('pelanggan',array('username'=>$username,'password'=>$password));
			if($cek->num_rows() > 0){
				$row = $cek->row_array();
				$data = array(
					'login'				=> false,
					'id'				=> $row['id'],
					'username'			=> $row['email'],
					'nama'				=> $row['nama'],
					'tipe'				=> sha1(md5(MEMBER)),
				);
				$this->session->set_userdata($data);
				$this->shop_model->loginCekTempAndUpdate();
				redirect(site_url('home/my_account'));
			}else{
				echo "<script>alert('Data Login Salah');window.open('".site_url('blog/login')."','_self');</script>";
			}
		}
	}
	public function capth()
	{
		$this->load->helper('captcha');
		$this->load->helper('file');
		$cva = array(
	        'img_path'      => './captcha/',
	        'img_url'       => base_url('captcha').'/',
	        /*'font_path'     => './path/to/fonts/texb.ttf',*/
	        'img_width'     => '150',
	        'img_height'    => 30,
	        'expiration'    => 7200,
	        'word_length'   => 6,
	        'font_size'     => 16,
	        'img_id'        => 'Imageid',
	        'pool'          => '0123456789',

	        // White background and border, black text and red grid
	        'colors'        => array(
	                'background' => array(255, 255, 255),
	                'border' => array(255, 255, 255),
	                'text' => array(0, 0, 0),
	                'grid' => array(255, 40, 40)
	        )
			);
		$cap = create_captcha($cva);
		echo $cap['image'];
		echo '<input type="text" name="captcha" value="" />';
		/*
			value $cap['word'];
			file image name must be unlink $cap['time'];
		*/
		unlink(base_url('captcha/'.$cap['time'].'.jpg'));
	}
	public function my_account($param='my_account')
	{
		if($this->session->userdata('tipe') == sha1(md5(MEMBER))){
			if(isset($_POST['nama'])){
				$this->load->model('pelanggan_model');
				$this->pelanggan_model->profile_save();
			}else{
				$this->load->model('pelanggan_model');
				$this->load->model('shop_model');
				$data = array(
					'data' => $this->pelanggan_model->getById($this->session->userdata('id')),
					'list' => array(
						array('nama'=>'My Account','url'=>site_url('home/my_account')),
						array('nama'=>'My Cart','url'=>site_url('home/my_cart')),
						array('nama'=>'History Belanja','url'=>site_url('home/my_account/history')),
						array('nama'=>'Message','url'=>site_url('home/my_account/message')),
						array('nama'=>'Logout','url'=>site_url('home/logout')),
						),
					'param'=>$param
					);
				if($param == 'history'){
					$data['data'] = $this->db->get_where('shop',array('pelanggan_id'=>$this->session->userdata('id')));
				}
				if($param == 'message'){
					$this->load->model('pesan_model');
					$data['data'] = $this->pesan_model->forCustomer();	
				}
				$this->load->view('front/my_account',$data);
			}
		}else{
			redirect(site_url('blog/login'));
		}
	}
	public function my_cart()
	{	
		$this->load->model('shop_model');
		$data = array(
			'data' => $this->shop_model->get_temp_shop(),
			);
		$this->load->view('front/cart_form',$data);
	}
	public function simpan($value='')
	{
		$this->load->model('shipping_model');
		$this->shipping_model->simpan($value);
	}
	public function hapus($value='')
	{
		$this->load->model('shipping_model');
		$this->shipping_model->hapus($value);
	}
	public function coba($value='')
	{
		$config = Array(
	      'protocol' => 'smtp',
	      // 'smtp_host' => 'ssl://smtp.gmail.com',
	      'smtp_host' => 'ssl://leios.rapidplex.com',
	      'smtp_port' => 465,
	      'smtp_user' => 'sales@oenlez.com', //isi dengan gmailmu!
	      'smtp_pass' => 'oenlez1234', //isi dengan password gmailmu!
	      'mailtype' => 'html',
	      'charset' => 'utf-8',
	      'newline' => "\r\n",
	      'wordwrap' => TRUE
	    );
		$this->load->library('email');
		$this->email->initialize($config);
		
		$this->email->from('sales@oenlez.com', 'Oenlez Sales');
		$this->email->to('alfhan@yahoo.co.id'); 

		$this->email->subject('New Order');
		$this->email->message('Order Number #1234');	

		$this->email->send();

		echo $this->email->print_debugger();
	}
}
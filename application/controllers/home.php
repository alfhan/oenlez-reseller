<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {
	
	public function index(){
		$data = array(
			'urlCari' => base_url('home/cari'),
			'title' => 'Result . . .',
		);
		$this->load->view('home',$data);
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
		redirect(base_url("/admin"));
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
}
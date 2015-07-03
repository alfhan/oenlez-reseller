<?php

class blog extends CI_Controller {
	
	protected $kelas = 'blog';
	function __construct(){
        parent::__construct();

		$this->load->model('artikel_model');
		$this->load->model('kategori_artikel_model');
    }
	public function index($kategoriId=0){
		$data = array(
			'kategori'=> $this->kategori_artikel_model->getWhere("id <> 9"),
			'artikel'=> $this->artikel_model->getSearch("and id > 7"),
			'detail' => false
			);
		if($kategoriId){
			$where = " and kategori_artikel_id = '$kategoriId' and id > 7";
			$data['artikel'] = $this->artikel_model->getSearch($where);
		}
		$this->load->view('front/artikel',$data);
	}
	public function contact_us()
	{
		#3 id contacct_us
		$data = array(
			'data' => $this->artikel_model->getById(3),
			);
		if(isset($_POST['submit'])){
			#kirim email
			$data['email'] = true;
		}
		$this->load->view('front/contact_us',$data);
	}
	public function detail($id)
	{
		$data = array(
			'kategori'=> $this->kategori_artikel_model->getWhere("id <> 9"),
			'artikel' => $this->artikel_model->getSearch(" and id = $id"),
			'detail' => true
			);
		$this->load->view('front/artikel',$data);
	}
	public function login()
	{
		if($this->session->userdata('tipe') == sha1(md5(MEMBER))){
			redirect(site_url('home/my_account'));
		}else{
			$this->load->view('front/login');
		}
	}
}
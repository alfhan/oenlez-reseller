<?php

class shipping extends CI_Controller {
	
	protected $kelas = 'shipping';
	function __construct(){
        parent::__construct();
		if($this->session->userdata('login') === FALSE){	
            redirect(base_url());
		}else{
			$this->load->model('shipping_model');
		}
    }
	public function index(){
		$this->load->library('parser');
		$index = array(
			'title' => 'Shipping Management',
			'link' => $this->kelas, 
			'list' => array(
					'provinsi'=>'Provinsi',
					'kabkota'=>'Kab/Kota',
					'kecamatan'=>'Kecamatan',
					'kurir'=>'Kurir',
					'harga_kurir'=>'Harga Kurir',
				)
			);
		$js = array(
			'urlSave' => base_url($this->kelas . "/simpan"),
			'urlDelete' => base_url($this->kelas . "/hapus"),
			);
		$content['content'] = $this->parser->parse($this->kelas .'/index', $index, true);
		$content['js'] = $this->load->view($this->kelas .'/js', $js, true);
		$this->load->view('newindex', $content);
	}
	public function simpan($table){
		$this->shipping_model->simpan($table);
	}
	public function hapus($table){
		$this->shipping_model->hapus($table);
	}
	public function loadformdata()
	{
		$mode = $_POST['mode'];
		$data = array(
			'data'=>$this->shipping_model->$mode(),
			);
		$this->load->view("shipping/$mode", $data);
	}
}
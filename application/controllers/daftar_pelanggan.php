<?php

class daftar_pelanggan extends CI_Controller {
	
	protected $kelas = 'daftar_pelanggan';
	function __construct(){
        parent::__construct();
		if($this->session->userdata('login') === FALSE){	
            redirect(base_url());
		}else{
			$this->load->model('pelanggan_model');
		}
    }
	public function index(){
		$this->load->library('parser');
		$index = array(
			'title' => 'Daftar Pelanggan',
			'link' => $this->kelas, 
			'data' => $this->pelanggan_model->get(),
			);
		$js = array(
			'urlSave' => base_url($this->kelas . "/simpan"),
			'urlDelete' => base_url($this->kelas . "/hapus"),
			);
		$content['content'] = $this->parser->parse($this->kelas .'/index', $index, true);
		$content['js'] = $this->load->view($this->kelas .'/js', $js, true);
		$this->load->view('newindex', $content);
	}
	public function form($id=0)
	{
		$this->load->library('parser');
		$index = array(
			'title' => 'Form Pelanggan',
			'link' => $this->kelas, 
			'r' => $this->pelanggan_model->getById($id),
			);
		$js = array(
			'urlSave' => base_url($this->kelas . "/simpan"),
			);
		$content['content'] = $this->parser->parse($this->kelas .'/form', $index, true);
		$content['js'] = $this->load->view($this->kelas .'/form_js', $js, true);
		$this->load->view('newindex', $content);
	}
	public function simpan(){
		if(empty($_POST['password'])){
			unset($_POST['password']);
		}else{
			$_POST['password'] = md5($_POST['password']);
		}
		$this->pelanggan_model->simpan('pelanggan');
	}
	public function hapus(){
		$this->pelanggan_model->hapus('pelanggan');
	}
}
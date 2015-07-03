<?php

class daftar_penjualan extends CI_Controller {
	
	protected $kelas = 'daftar_penjualan';
	function __construct(){
        parent::__construct();
		if($this->session->userdata('login') === FALSE){	
            redirect(base_url());
		}else{
			$this->load->model('penjualan_model');
		}
    }
	public function index(){
		$this->load->library('parser');
		$index = array(
			'title' => 'Daftar Penjualan',
			'link' => $this->kelas, 
			'data' => $this->penjualan_model->get(),
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
			'title' => 'Form Penjualan',
			'link' => $this->kelas, 
			'r' => $this->penjualan_model->getById($id),
			);
		$js = array(
			'urlSave' => base_url($this->kelas . "/simpan"),
			);
		$content['content'] = $this->parser->parse($this->kelas .'/form', $index, true);
		$content['js'] = $this->load->view($this->kelas .'/form_js', $js, true);
		$this->load->view('newindex', $content);
	}
	public function simpan(){
		$this->pelanggan_model->simpan('pelanggan');
	}
	public function hapus(){
		$this->pelanggan_model->hapus('pelanggan');
	}
}
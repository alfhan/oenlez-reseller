<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class barang_masuk extends CI_Controller {
	
	protected $kelas = 'barang_masuk';
	function __construct(){
        parent::__construct();
		if($this->session->userdata('login') === FALSE){	
            redirect(base_url());
		}else{
			$this->load->model('barang_masuk_model');
			$this->load->model('jenis_barang_model');
		}
    }
	public function index(){
		$this->load->library('parser');
		$index = array(
			'title' => 'Barang Masuk',
			'link' => $this->kelas, 
			'jenis' => $this->jenis_barang_model->get(),
			);
		$js = array(
			'urlSave' => base_url($this->kelas . "/simpan"),
			'urlDelete' => base_url($this->kelas . "/hapus"),
			'urlCari' => base_url($this->kelas . "/cari"),
			);
		$content['content'] = $this->parser->parse($this->kelas .'/index', $index, true);
		$content['js'] = $this->load->view($this->kelas .'/js', $js, true);
		$this->load->view('newindex', $content);
	}
	public function cari(){
		$r = $this->barang_masuk_model->cari();
		$data = $r->row_array();
		echo json_encode($data);
	}
	public function simpan(){
		$this->barang_masuk_model->simpan_data();
	}
}
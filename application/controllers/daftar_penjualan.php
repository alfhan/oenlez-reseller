<?php

class daftar_penjualan extends CI_Controller {
	
	protected $kelas = 'daftar_penjualan';
	function __construct(){
        parent::__construct();
		if($this->session->userdata('login') === FALSE){	
            redirect(base_url());
		}else{
			$this->load->model('shop_model');
		}
    }
	public function index(){
		$this->load->library('parser');
		$index = array(
			'title' => 'Daftar Penjualan',
			'link' => $this->kelas, 
			'data' => $this->shop_model->daftar_penjualan(),
			);
		$js = array(
			'urlSave' => base_url($this->kelas . "/simpan"),
			'urlDelete' => base_url($this->kelas . "/hapus"),
			);
		$content['content'] = $this->load->view($this->kelas .'/index', $index, true);
		$content['js'] = $this->load->view($this->kelas .'/js', $js, true);
		$this->load->view('newindex', $content);
	}
	public function form($id=0)
	{
		$this->load->library('parser');
		$index = array(
			'title' => 'Detail Order',
			'link' => $this->kelas, 
			'list' => $this->shop_model->getById($id)->result_array(),
			);
		$js = array(
			'urlSave' => base_url($this->kelas . "/simpan"),
			'id'=>$id
			);
		$content['content'] = $this->load->view($this->kelas .'/form', $index, true);
		$content['js'] = $this->load->view($this->kelas .'/form_js', $js, true);
		$this->load->view('newindex', $content);
	}
	public function simpan(){
		$this->shop_model->simpan('shop');
	}
	public function hapus(){
		$this->db->where(array('shop_id'=>$_POST['id']));
		$this->db->delete('shop_detail');
		$this->shop_model->hapus('shop');
	}
}
<?php

class notifikasi extends CI_Controller {
	
	protected $kelas = 'notifikasi';
	function __construct(){
        parent::__construct();
		if($this->session->userdata('login') === FALSE){	
            redirect(base_url());
		}else{
			$this->load->model('pesan_model');
		}
    }
	public function index(){
		$this->load->library('parser');
		$index = array(
			'title' => 'Daftar Notifikasi',
			'link' => $this->kelas, 
			'data' => $this->pesan_model->getall(),
			);
		$js = array(
			'urlSave' => base_url($this->kelas . "/simpan"),
			'urlDelete' => base_url($this->kelas . "/hapus"),
            'data' => $this->pesan_model->getall(),
			);
		$content['content'] = $this->parser->parse($this->kelas .'/index', $index, true);
		$content['js'] = $this->load->view($this->kelas .'/js', $js, true);
		$this->load->view('newindex', $content);
	}
	public function form($id=0)
	{
		$this->pesan_model->dibaca($id);
		$this->load->library('parser');
		$index = array(
			'title' => 'Detail Pesan',
			'link' => $this->kelas, 
			'data' => $this->pesan_model->detailpesan($id),
			);
		$js = array(
			'urlSave' => base_url($this->kelas . "/simpan"),
			);
		$content['content'] = $this->parser->parse($this->kelas .'/form', $index, true);
		$content['js'] = $this->load->view($this->kelas .'/form_js', $js, true);
		$this->load->view('newindex', $content);
	}
	public function simpan(){
		$this->pesan_model->balaspesan();
	}
	public function hapus(){
		$this->db->where(array('parent_id'=>$_POST['id']));
		$this->db->delete('pesan');
		$this->pesan_model->hapus('pesan');
	}
}
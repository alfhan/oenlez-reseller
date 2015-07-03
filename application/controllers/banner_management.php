<?php

class banner_management extends CI_Controller {
	
	protected $kelas = 'banner_management';
	function __construct(){
        parent::__construct();
		if($this->session->userdata('login') === FALSE){	
            redirect(base_url());
		}else{
			$this->load->model('banner_model');
		}
    }
	public function index(){
		$this->load->library('parser');
		$index = array(
			'title' => 'Banner Management',
			'link' => $this->kelas, 
			'data' =>$this->banner_model->get(),
			);
		$js = array(
			'urlSave' => base_url($this->kelas . "/simpan"),
			'urlDelete' => base_url($this->kelas . "/hapus"),
			);
		$content['content'] = $this->parser->parse($this->kelas .'/index', $index, true);
		$content['js'] = $this->load->view($this->kelas .'/js', $js, true);
		$this->load->view('newindex', $content);
	}
	public function simpan(){
		$this->banner_model->profile_save();
	}
	public function hapus(){
		$this->banner_model->delete();
	}
}
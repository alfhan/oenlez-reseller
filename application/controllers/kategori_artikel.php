<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kategori_artikel extends CI_Controller {
	
	protected $kelas = 'kategori_artikel';
	function __construct(){
        parent::__construct();
		if($this->session->userdata('login') === FALSE){	
            redirect(base_url());
		}else{
			$this->load->model('kategori_artikel_model');
		}
    }
	public function index(){
		$index = array(
			'title' => 'Kategori Artikel',
			'link' => $this->kelas, 
			'data' => $this->kategori_artikel_model->get(),
			);
		$js = array(
			'urlSave' => base_url($this->kelas . "/simpan"),
			'urlDelete' => base_url($this->kelas . "/hapus"),
			);
		$content['content'] = $this->load->view($this->kelas .'/index',$index,true);
		$content['js'] = $this->load->view($this->kelas .'/js',$js,true);
		$this->load->view('newindex',$content);
	}
	public function simpan(){
		$this->kategori_artikel_model->save();
	}
	public function hapus(){
		$this->kategori_artikel_model->delete();
	}
}
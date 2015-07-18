<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profil extends CI_Controller {
	
	protected $kelas = 'profil';
	function __construct(){
        parent::__construct();
		if($this->session->userdata('login') === FALSE){	
            redirect(base_url());
		}else{
			$this->load->model('profil_model');
		}
    }
	public function index(){
		$index = array(
			'title' => 'Profil Usaha',
			'link' => $this->kelas, 
			'data' => $this->profil_model->get(),
			'es' => $this->profil_model->email_setting(),
			);
		$js = array(
			'urlSave' => base_url($this->kelas . "/simpan"),
			'urlEmailSave' => base_url($this->kelas . "/simpan_email"),
			);
		$content['content'] = $this->load->view($this->kelas .'/index',$index,true);
		$content['js'] = $this->load->view($this->kelas .'/js',$js,true);
		$this->load->view('newindex',$content);
	}
	public function simpan(){
		$this->profil_model->profil_save();
	}
	public function simpan_email(){
		$this->profil_model->simpan('email_setting');
	}
}
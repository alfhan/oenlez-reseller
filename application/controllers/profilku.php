<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profilku extends CI_Controller {
	
	protected $kelas = 'profilku';
	function __construct(){
        parent::__construct();
		if($this->session->userdata('login') === FALSE){	
            redirect(base_url());
		}
    }
	public function index(){
		$this->load->model('usermanagement_model');
		$id = $this->session->userdata('id');
		$data['row'] = $this->usermanagement_model->getWhere("id='$id'");
		$data['title'] = 'Profil Ku';
		$index['content'] = $this->load->view('usermanagement/profilku',$data,true);
		$this->load->view('index',$index);
	}
	public function save(){
		$this->load->model('usermanagement_model');
		$this->usermanagement_model->save();
	}
}
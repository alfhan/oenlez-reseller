<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usermanagement extends CI_Controller {
	
	protected $kelas = 'usermanagement';
	function __construct(){
        parent::__construct();
		if($this->session->userdata('login') === FALSE){	
            redirect(base_url());
		}else{
			$this->load->model('group_model');
			$this->load->model('usermanagement_model');
		}
    }
	public function index(){
		$index = array(
			'title' => 'Pengguna Aplikasi',
			'link' => $this->kelas, 
			'data' => $this->usermanagement_model->get(),
			'group' => $this->group_model->get(),
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
		$this->usermanagement_model->profile_save();
	}
	public function hapus(){
		$this->usermanagement_model->delete();
	}
	public function datagrid(){
		$this->usermanagement_model->datagrid();
	}
	public function profile(){
		$index = array(
			'user' => $this->usermanagement_model->getById(),
			'group_id' => $this->group_model->get(),
			'link' => $this->kelas .'/profile',
			);
		$js = array(
			'urlSave' => base_url($this->kelas.'/profile_save'),
			);
		$content['content'] = $this->load->view('profile/index',$index,true);
		$content['js'] = $this->load->view('profile/js',$js,true);
		$this->load->view('newindex',$content);
	}
	function profile_save(){
		$this->usermanagement_model->profile_save();
	}
}
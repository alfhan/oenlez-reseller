<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gantipassword extends CI_Controller {
	
	protected $kelas = 'gantipassword';
	
	function __construct(){
        parent::__construct();
		if($this->session->userdata('login') === FALSE){	
            redirect(base_url());
		}
    }
	
	public function index(){
		$data['title'] = 'Ganti Password';
		$data['url'] = $this->kelas;
		$data['user'] = $this->db->get_where('sys_user',array('id'=>$this->session->userdata('id')))->row_array();
		$index['content'] = $this->load->view($this->kelas . '/index',$data,true);
		$this->load->view('index',$index);
	}
	public function save(){
		$this->load->model('usermanagement_model');
		$password = $this->input->post('passwordbaru');
		unset($_POST['passwordbaru'],$_POST['passwordagain']);
		$_POST['password'] = $password;
		$this->usermanagement_model->save();
	}
	public function delete(){
		$this->load->model('usermanagement_model');
		$this->usermanagement_model->delete();
	}
	public function datagrid(){
		$this->load->model('usermanagement_model');
		$this->usermanagement_model->datagrid();
	}
}
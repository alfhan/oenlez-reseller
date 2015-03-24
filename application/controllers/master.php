<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class master extends CI_Controller {
	
	protected $kelas = 'master';
	function __construct(){
        parent::__construct();
		if($this->session->userdata('login') === FALSE){	
            redirect(base_url());
		}
    }
	public function index(){
		$this->load->model('main_model');
		$data['title'] = 'Upload Data Kondisi';
		$data['url'] = $this->kelas;
		$data['uptWilayah'] = $this->main_model->uptWilayah(1);
		$data['upt'] = $this->main_model->uptWilayah(0);
		$data['saveUrl'] = base_url($this->kelas . "/upload");
		$index['content'] = $this->load->view('formupload/kondisi',$data,true);
		$this->load->view('index',$index);
	}
	public function get_by_wilayah(){
		$wilayahId = $this->input->post('wilayah');
		$by = array(
			'wilayah_id' => $wilayahId,
		);
		$this->load->model('mst_model');
		$data = array(
			'mst' => $this->mst_model->get_by($by),
			'updateUrl' => base_url($this->kelas .'/simpan'),
		);
		$this->load->view('master/by_wilayah',$data);
	}
	public function simpan($id=0){
		$data = array(
			'vcr' => $this->input->post('vcr'),
			'lhrt' => $this->input->post('lhrt'),
		);
		$this->load->model('mst_model');
		$this->mst_model->save($data,$id);
	}
}
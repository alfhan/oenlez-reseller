<?php

class wilayah extends CI_Controller {
	
	protected $kelas = 'wilayah';
	function __construct(){
        parent::__construct();
        if($this->session->userdata('login') === FALSE){	
            redirect(base_url());
		}else{
			
		}
    }
	public function index(){
		$this->load->model('wilayah_model');
		$this->load->model('kurir_model');
		$this->load->library('parser');
		$index = array(
			'title' => 'Shipping Management',
			'link' => $this->kelas, 
			'provinsi' => $this->wilayah_model->provinsi(),
			'kurir' => $this->kurir_model->get()
			);
		$js = array(
			'urlSave' => site_url($this->kelas . "/simpan"),
			'urlDelete' => site_url($this->kelas . "/hapus"),
			);
		$content['content'] = $this->parser->parse($this->kelas .'/index', $index, true);
		$content['js'] = $this->load->view($this->kelas .'/js', $js, true);
		$this->load->view('newindex', $content);
	}
	public function dt_provinsi(){
		$this->load->model('wilayah_model');
		$this->wilayah_model->dt_provinsi();
	}
	public function dt_kabkota(){
		$this->load->model('wilayah_model');
		$this->wilayah_model->dt_kabkota();
	}
	public function dt_kecamatan(){
		$this->load->model('wilayah_model');
		$this->wilayah_model->dt_kecamatan();
	}
	public function dt_kurir(){
		$this->load->model('wilayah_model');
		$this->wilayah_model->dt_kurir();
	}
	public function dt_tarif(){
		$this->load->model('wilayah_model');
		$this->wilayah_model->dt_tarif();
	}
	public function hapus($table){
		$this->load->model('wilayah_model');
		$this->wilayah_model->delete($table);
	}
	public function simpan($table)
	{
		$this->load->model('wilayah_model');
		$this->wilayah_model->save($table);
	}
	public function kabkota($value='')
	{
		$this->load->model('wilayah_model');
		$rs = $this->wilayah_model->kabkota($_POST['provinsi_id']);
		$opt = "<option value='0'>--Pilih Salah Satu--</option>";
		foreach ($rs as $r) {
			$opt .= "<option value='$r[id]'>$r[nama]</option>";
		}
		echo "$opt";
	}
	public function kecamatan($value='')
	{
		$this->load->model('wilayah_model');
		$rs = $this->wilayah_model->kecamatan($_POST['kabkota_id']);
		$opt = "<option value='0'>--General--</option>";
		foreach ($rs as $r) {
			$opt .= "<option value='$r[id]'>$r[nama]</option>";
		}
		echo "$opt";
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class daftar_artikel extends CI_Controller {
	
	protected $kelas = 'artikel';
	function __construct(){
        parent::__construct();
		if($this->session->userdata('login') === FALSE){	
            redirect(base_url());
		}else{
			$this->load->model('kategori_artikel_model');
			$this->load->model('artikel_model');
		}
    }
	public function index(){
		$index = array(
			'title' => 'Artikel / Blog',
			'link' => 'daftar_artikel', 
			'data' => $this->artikel_model->get(),
			);
		$js = array(
			'urlSave' => base_url("daftar_artikel/simpan"),
			'urlDelete' => base_url("daftar_artikel/hapus"),
			);
		$content['content'] = $this->load->view($this->kelas .'/index',$index,true);
		$content['js'] = $this->load->view($this->kelas .'/js',$js,true);
		$this->load->view('newindex',$content);
	}
	public function form($id=0)
	{
		$index = array(
			'title' => 'Form Artikel',
			'link' => 'daftar_artikel', 
			'kategori' => $this->kategori_artikel_model->get(),
			);
		if($id){
			$index['data'] = $this->artikel_model->getById($id);
		}
		$js = array(
			'urlSave' => base_url("daftar_artikel/simpan"),
			'urlDeleteFoto' => base_url("daftar_artikel/delete_foto"),
			);
		$content['content'] = $this->load->view($this->kelas .'/form',$index,true);
		$content['js'] = $this->load->view($this->kelas .'/form_js',$js,true);
		$content['css'] = $this->load->view($this->kelas .'/form_css',$js,true);
		$this->load->view('newindex',$content);
	}
	public function simpan(){
		$this->artikel_model->profile_save();
	}
	public function hapus(){
		$this->artikel_model->delete();
	}
	public function delete_foto($value='')
	{
		$this->artikel_model->delete_foto();
	}
}
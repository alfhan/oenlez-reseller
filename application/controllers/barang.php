<?php

class barang extends CI_Controller {
	
	protected $kelas = 'barang';
	function __construct(){
        parent::__construct();
		if($this->session->userdata('login') === FALSE){	
            redirect(base_url());
		}else{
			$this->load->model('barang_model');
			$this->load->model('jenis_barang_model');
		}
    }
	public function index(){
		$this->load->library('parser');
		$index = array(
			'title' => 'Daftar Produk',
			'link' => $this->kelas, 
			'jenis' => $this->jenis_barang_model->get(),
			'data' => $this->barang_model->tb_bootstrap(),
			'q' => isset($_GET['q']) ? $_GET['q'] : "",
			);
		$js = array(
			'urlSave' => base_url($this->kelas . "/simpan"),
			'urlDelete' => base_url($this->kelas . "/hapus"),
            'data' => $this->barang_model->tb_bootstrap(),
			);
		$content['content'] = $this->parser->parse($this->kelas .'/index', $index, true);
		$content['js'] = $this->load->view($this->kelas .'/js', $js, true);
		$this->load->view('newindex', $content);
	}
	public function form($id=0)
	{
		$this->load->model('kategori_barang_model');
		$this->load->model('barang_model');
		$this->load->library('parser');
		$index = array(
			'title' => 'Form Produk',
			'link' => $this->kelas, 
			'kategori' => $this->kategori_barang_model->get(),
			'data' => $this->barang_model->getById($id),
			);
		$js = array(
			'urlSave' => base_url($this->kelas . "/simpan"),
			);
		$content['content'] = $this->parser->parse($this->kelas .'/form', $index, true);
		$content['js'] = $this->load->view($this->kelas .'/form_js', $js, true);
		$content['css'] = $this->load->view($this->kelas .'/form_css', $js, true);
		$this->load->view('newindex', $content);
	}
	public function simpan(){
		$this->barang_model->profile_save();
	}
	public function hapus(){
		$this->barang_model->delete();
	}
	public function detail(){
		$id =$this->input->post('id');
		$this->db->where('id',$id);
		$data = array(
			'data' => $this->db->get($this->kelas)->row(),
			);
		$this->load->view($this->kelas .'/detail',$data);
	}
}
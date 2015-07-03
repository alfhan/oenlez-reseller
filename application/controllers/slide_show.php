<?php

class slide_show extends CI_Controller {
	
	protected $kelas = 'slide_show';
	function __construct(){
        parent::__construct();
		if($this->session->userdata('login') === FALSE){	
            redirect(base_url());
		}else{
			$this->load->model('slide_show_model');
		}
    }
	public function index(){
		$this->load->library('parser');
		$index = array(
			'title' => 'Slide Show',
			'link' => $this->kelas, 
			'data' => $this->slide_show_model->get(),
			);
		$js = array(
			'urlDelete' => base_url($this->kelas . "/hapus"),
			);
		$content['content'] = $this->parser->parse($this->kelas .'/index', $index, true);
		$content['js'] = $this->load->view($this->kelas .'/js', $js, true);
		$this->load->view('newindex', $content);
	}
	public function form($id=0)
	{
		$this->load->library('parser');
		$index = array(
			'title' => 'Form Slide Show',
			'link' => $this->kelas,
			'data' => $this->slide_show_model->getById($id),
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
		$this->slide_show_model->profile_save();
	}
	public function hapus(){
		$this->slide_show_model->delete();
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
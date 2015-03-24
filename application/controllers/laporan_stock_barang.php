<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_stock_barang extends CI_Controller {
	
	protected $kelas = 'laporan_stock_barang';
	function __construct(){
        parent::__construct();
		if($this->session->userdata('login') === FALSE){	
            redirect(base_url());
		}else{
			$this->load->model('jenis_barang_model');
		}
    }
	public function index(){
		$this->load->library('parser');
		$index = array(
			'title' => 'Laporan Data Barang',
			'link' => $this->kelas, 
			'jenis' => $this->jenis_barang_model->get(),
			);
		$js = array(
			'urlCari' => base_url($this->kelas . "/cari"),
			'urlCetak' => base_url($this->kelas . "/cetak"),
			);
		$content['content'] = $this->parser->parse($this->kelas .'/index', $index, true);
		$content['js'] = $this->load->view($this->kelas .'/js', $js, true);
		$this->load->view('newindex', $content);
	}
	public function cari(){
		$this->load->model('barang_model');
		$data = array(
			'data' => $this->barang_model->getLaporanDataBarang(),
			'jenis' => $this->jenis_barang_model->getById($this->input->post('jenis_barang_id'))
		);
		$this->load->view($this->kelas .'/cari', $data);
	}
	public function cetak(){
		
	}
}
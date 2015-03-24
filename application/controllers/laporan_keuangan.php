<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_keuangan extends CI_Controller {
	
	protected $kelas = 'laporan_keuangan';
	function __construct(){
        parent::__construct();
		if($this->session->userdata('login') === FALSE){	
            redirect(base_url());
		}
    }
    public function index(){
		$this->load->library('parser');
		$index = array(
			'title' => 'Rekap Transaksi',
			'link' => $this->kelas, 
			'urlCetak' => base_url($this->kelas . "/cetak"),
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
		$this->load->model('penjualan_model');
		$mode = $this->input->post('mode');
		$data = array(
			'data' => $this->penjualan_model->laporanKeuangan(),
			'urlCetak' => base_url($this->kelas . "/cetak"),
		);
		$this->load->view($this->kelas .'/'. $mode, $data);
	}
	public function cetak(){
		$this->load->model('penjualan_model');
		$mode = $this->input->post('mode');
		$data = array(
			'data' => $this->penjualan_model->laporanKeuangan(),
			);
		$content = array(
			'content' => $this->load->view($this->kelas .'/cetak_'. $mode, $data, true),
			'profil' => $this->auth->profil(),
			'title' => 'Rekap Transaksi '. ucwords($mode),
			'tanggal' => dateToIndo(date("Y-m-d"))
			);
		$this->load->view($this->kelas .'/html_cetak', $content);
	}
}
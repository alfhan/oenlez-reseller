<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_penjualan extends CI_Controller {
	
	protected $kelas = 'laporan_penjualan';
	function __construct(){
        parent::__construct();
		if($this->session->userdata('login') === FALSE){	
            redirect(base_url());
		}
    }
	public function index(){
		$this->load->library('parser');
		$index = array(
			'title' => 'Cetak Nota/Transaksi',
			'subtitle' => '(Cetak Nota Ulang)',
			'link' => $this->kelas, 
			);
		$js = array(
			'urlCari' => base_url($this->kelas . "/cari"),
			);
		$content['content'] = $this->parser->parse($this->kelas .'/index', $index, true);
		$content['js'] = $this->load->view($this->kelas .'/js', $js, true);
		$this->load->view('newindex', $content);
	}
	public function cari(){
		$this->load->model('penjualan_model');
		$data = array(
			'data' => $this->penjualan_model->laporanPenjualan(),
			'urlCetak' => base_url("penjualan/cetak"),
			);
		$this->load->view($this->kelas .'/cari', $data);
	}
}
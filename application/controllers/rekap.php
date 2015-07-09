<?php

class rekap extends CI_Controller {
	
	protected $kelas = 'rekap';
	function __construct(){
        parent::__construct();
		$this->load->model('shop_model');
    }
	public function index(){
		$index = array(
				'title' => 'Rekap Penjualan',
				'link' => 'rekap', 
				);
			$js = array();
			$content['content'] = $this->load->view('rekap/index', $index, true);
			$content['js'] = $this->load->view('rekap/js', $js, true);
			$this->load->view('newindex', $content);
	}
	public function total_pendapatan()
	{
		$index = array(
				'title' => 'Dasdboard',
				'link' => 'home', 
				'data' => $this->shop_model->total_pendapatan(),
				);
			$js = array();
			$content['content'] = $this->load->view('rekap/total_pendapatan', $index, true);
			$this->load->view('newindex', $content);
	}
	public function pendapatan_bulan_ini()
	{
		$index = array(
				'title' => 'Dasdboard',
				'link' => 'home', 
				'data' => $this->shop_model->pendapatan_bulan_ini(),
				);
			$js = array();
			$content['content'] = $this->load->view('rekap/pendapatan_bulan_ini', $index, true);
			$this->load->view('newindex', $content);
	}
	public function content_index($tgl1,$tgl2)
	{
		/*$tgl1 = $_POST['tgl1'];
		$tgl2 = $_POST['tgl2'];*/
		$data = array(
			'data'=>$this->shop_model->content_index($tgl1,$tgl2),
			'tgl1'=>$tgl1,
			'tgl2'=>$tgl2,
			);
		$this->load->view('rekap/content_index', $data);
	}
}
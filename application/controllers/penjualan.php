<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class penjualan extends CI_Controller {
	
	protected $kelas = 'penjualan';
	protected $session_id;
    protected $id;
	function __construct(){
        parent::__construct();
		if($this->session->userdata('login') === FALSE){	
            redirect(base_url());
		}else{
			$this->load->model('barang_masuk_model');
			$this->load->model('jenis_barang_model');
			$this->load->model('penjualan_model');
			$this->session_id = $this->session->userdata('session_id');
            $this->id = $this->session->userdata('id');
		}
    }
	public function index(){
		$this->load->library('parser');
        $where = array(
            'sys_user_id' => $this->id,
            'tanggal' => date("Y-m-d"),
            );
		$saldo_awal = $this->db->get_where('saldo_awal',$where);
		if($saldo_awal->num_rows() > 0){
			$saldo_awal = $saldo_awal->row();
			$so = $saldo_awal->nominal;
		}else{
			$so = 0;
		}
		$index = array(
			'title' => 'Penjualan',
			'link' => $this->kelas, 
			'jenis' => $this->jenis_barang_model->get(),
			'session_id' => $this->session_id,
            'so' => $so,
			);
		$js = array(
			'urlSave' => base_url($this->kelas . "/simpan"),
			'urlCari' => base_url($this->kelas . "/cari"),
			'urlViewCart' => base_url($this->kelas . "/view_cart"),
			'urlResetCart' => base_url($this->kelas . "/reset_cart"),
            'urlSaldoAwal' => base_url($this->kelas . "/saldo_awal"),
			);
		$content['content'] = $this->parser->parse($this->kelas .'/index', $index, true);
		$content['js'] = $this->load->view($this->kelas .'/js', $js, true);
		$this->load->view('newindex', $content);
	}
    public function saldo_awal(){
		$this->penjualan_model->saldo_awal();
	}
	public function cari(){
		$r = array(
			'data'=>$this->barang_masuk_model->cari(1)->result_array(),
			'urlBeli'=>base_url($this->kelas .'/temp_jual'),
		);
		$this->load->view($this->kelas .'/result_pencarian',$r);
	}
	public function temp_jual(){
		$cekStock = $this->penjualan_model->cekStock();
		if($cekStock == true){
			$return = $this->penjualan_model->temp_jual($this->session_id);
			$data = array(
				'data' => $return,
				'link' => $this->kelas,
				'saveMove' => base_url($this->kelas .'/save_move'),
				'urlDeleteItem' => base_url($this->kelas .'/delete_item'),
				'urlDecriment' => base_url($this->kelas .'/decriment_item'),
			);
			$this->load->view($this->kelas .'/temp_jual',$data);
		}else{
			echo FALSE;
		}
		
	}
	public function view_cart(){
		$return = $this->penjualan_model->withBarang($this->session_id);
		$data = array(
			'data' => $return,
			'link' => $this->kelas,
			'saveMove' => base_url($this->kelas .'/save_move'),
			'urlDeleteItem' => base_url($this->kelas .'/delete_item'),
			'urlDecriment' => base_url($this->kelas .'/decriment_item'),
		);
		$this->load->view($this->kelas .'/temp_jual',$data);	
	}
	public function save_move(){
		$id_penjualan = $this->penjualan_model->move_penjualan();
		echo $id_penjualan;
	}
	function delete_item(){
		$this->penjualan_model->delete_item();
	}
	function decriment_item(){
		$this->penjualan_model->decriment_item();
	}
	function reset_cart(){
		$this->penjualan_model->reset_cart();
	}
	function cetak($id){
		$data = $this->penjualan_model->notaPenjualan($id);
		$this->load->view($this->kelas .'/cetak',$data);
	}
}
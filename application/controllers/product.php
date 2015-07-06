<?php

class product extends CI_Controller {
	
	protected $kelas = 'product';
	function __construct(){
        parent::__construct();

		$this->load->model('kategori_barang_model');
		$this->load->model('barang_model');
		$this->load->model('shop_model');
    }
	public function index($kategoriId=0){
		$data = array(
			'kategori'=>$this->kategori_barang_model->get(),
			'produk'=>$this->barang_model->get(),
			);
		if($kategoriId){
			$where = " and kategori_barang_id = '$kategoriId'";
			$data['produk'] = $this->barang_model->getSearch($where);
		}
		$this->load->view('front/product',$data);
	}
	public function add($id)
	{
		$result = $this->shop_model->create_temp_shop($id);
		if($result == true){
			redirect(site_url('home/my_cart'));
		}else{
			redirect(site_url('home/my_cart'));
		}
	}
	public function xupdate()
	{
		$this->shop_model->update_temp_shop();
		return true;
	}

	public function detail($id)
	{
		$data = array(
			'id' => $id,
			'data' => $this->barang_model->getById($id),
			'kategori'=>$this->kategori_barang_model->get(),
			);
		$this->load->view('front/product_detail',$data);
	}
	public function review($id)
	{
		$this->load->model('review_model');
		$_POST['barang_id'] = $id;
		$_POST['updated_at'] = date("Y-m-d");
		$this->review_model->simpan('reviews');
		redirect(site_url('product/detail/'.$id));
	}
	public function checkout_cart()
	{
		if($this->session->userdata('tipe') == sha1(md5(MEMBER))){
			$this->load->model('shop_model');
			$data = array(
				'list' => $this->shop_model->get_temp_shop(),
				'provinsi' => $this->db->get('provinsi')->result_array(),
				'kurir' => $this->db->get('kurir')->result_array(),
				);
			$this->load->view('front/check_out',$data);
		}else{
			redirect(site_url('blog/login'));
		}
	}
	public function checkout($value='')
	{
		if($this->session->userdata('tipe') == sha1(md5(MEMBER))){
			$this->load->model('shop_model');
			$this->shop_model->checkout();
		}else{
			redirect(site_url('blog/login'));
		}
	}
	public function invoice($value='')
	{
		$this->load->model('shop_model');
		$data = array(
			'list' => $this->shop_model->invoice($value),
			);
		$this->load->view('front/invoice',$data);
	}
	public function history_trx($value='')
	{
		$this->load->model('shop_model');
		$data = array(
			'list' => $this->shop_model->history_trx(),
			);
		$this->load->view('front/history',$data);
	}
	public function kabkota($value='')
	{
		$rs = $this->db->get_where('kabkota',array('provinsi_id'=>$_POST['id']));
		$opt = "<option value=\"0\">--Pilih Kabupaten / Kota--</option>";
		foreach ($rs->result_array() as $r) {
			$opt .= "<option value='$r[id]'>$r[nama]</option>";
		}
		echo $opt;
	}
	public function kecamatan($value='')
	{
		$rs = $this->db->get_where('kecamatan',array('kabkota_id'=>$_POST['id']));
		$opt = "<option value=\"0\">--Pilih Kecamatan--</option>";
		foreach ($rs->result_array() as $r) {
			$opt .= "<option value='$r[id]'>$r[nama]</option>";
		}
		echo $opt;
	}
	public function harga_kurir($value='')
	{
		$this->load->model('shipping_model');
		$rs = $this->shipping_model->cekHarga();
		if($rs->num_rows() > 0){
			$r = $rs->row_array();
			$berat = ($_POST['berat']/1000);
			$n = $r['harga'];
			if($berat > $r['berat']){
				$b = ($berat/$r['berat']);
				$c = ceil($b);
				$n = $r['harga']*$c;
			}
			$id = $r['id'];
			echo json_encode(array('success'=>true,'harga'=>$n,'id'=>$id));
		}else{
			echo json_encode(array('msg'=>'data tidak ditemukan'));
		}
	}
}

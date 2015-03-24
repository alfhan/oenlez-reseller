<?php
class barang_masuk_model extends MY_Model {

    protected $table = 'barang_masuk';
	
	function __construct(){
        parent::__construct();
    }
    public function simpan_data(){
    	$r = $this->cari()->row_array();
    	$barang_id = $r['id'];
    	
    	$qty_awal = $r['qty'];
    	$qty_masuk = $this->input->post('qty');
    	$qty_akhir = $qty_awal+$qty_masuk;

    	$harga_beli_awal = $r['harga_beli'];
    	$harga_beli_akhir = $this->input->post('harga_beli');
    	
    	$harga_jual_awal = $r['harga_jual'];
    	$harga_jual_akhir = $this->input->post('harga_jual');

    	$dari = $this->input->post('dari');
    	$no_nota = $this->input->post('no_nota');
    	$tanggal = $this->input->post('tanggal');

    	$barang = array(
    		'qty' => $qty_akhir,
    		'harga_beli' => $harga_beli_akhir,
    		'harga_jual' => $harga_jual_akhir,
    		);
    	$this->db->where(array('id'=>$barang_id));
    	$this->db->update('barang',$barang);
    	$barang_masuk = array(
    		'barang_id' => $barang_id,
    		'qty_awal' => $qty_awal,
    		'qty_masuk' => $qty_masuk,
    		'qty_akhir' => $qty_akhir,
    		'harga_beli_awal' => $harga_beli_awal,
    		'harga_beli_akhir' => $harga_beli_akhir,
    		'harga_jual_awal' => $harga_jual_awal,
    		'harga_jual_akhir' => $harga_jual_akhir,
    		'dari' => $dari,
    		'no_nota' => $no_nota,
    		'tanggal' => date("Y-m-d",strtotime($tanggal))
    		);
    	$this->db->insert($this->table,$barang_masuk);
    }
    public function cari($mode=0){
    	$q = $this->input->post('q');
    	if($mode == 0)
    		$modeW = "kode_barang = '$q' or kode_barcode = '$q'";
    	else
    		$modeW = "kode_barang like '%$q%' or kode_barcode like '%$q%' order by id desc limit 5";
		$sql= "select * from barang where $modeW";
		return  $this->db->query($sql);
    }
}
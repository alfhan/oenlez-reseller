<?php
class wilayah_model extends MY_Model {

    protected $table = 'wilayah';
	
	function __construct(){
        parent::__construct();
    }
	
	public function save($table){
		$this->simpan($table);
	}
	
	public function delete($table){
		$this->hapus($table);
	}

	public function dt_provinsi()
	{
		return $this->defaultDataTable('provinsi','nama');
	}
	public function dt_kabkota()
	{
		return $this->defaultDataTable("kabkota where provinsi_id = '$_GET[provinsi_id]'",'nama');
	}
	public function dt_kecamatan()
	{
		$kabkota_id = isset($_GET['kabkota_id']) ? $_GET['kabkota_id'] : 0;
		return $this->defaultDataTable("kecamatan where kabkota_id = '$kabkota_id'",'nama');
	}
	public function dt_kurir()
	{
		return $this->defaultDataTable('kurir','nama');
	}
	public function dt_tarif()
	{
		$kabkota_id = isset($_GET['kabkota_id']) ? $_GET['kabkota_id'] : 0;
		$kecamatan_id = isset($_GET['kecamatan_id']) ? $_GET['kecamatan_id'] : 0;
		$kurir_id = isset($_GET['kurir_id']) ? $_GET['kurir_id'] : 0;
		return $this->defaultDataTable("harga_kurir where kabkota_id = '$kabkota_id' and kecamatan_id = '$kecamatan_id' and kurir_id = '$kurir_id'",'berat');
	}
	public function provinsi($value='')
	{
		return $this->db->get('provinsi')->result_array();
	}
	public function kabkota($provinsi_id)
	{
		return $this->db->get_where('kabkota',array('provinsi_id'=>$provinsi_id))->result_array();
	}
	public function kecamatan($kabkota_id)
	{
		return $this->db->get_where('kecamatan',array('kabkota_id'=>$kabkota_id))->result_array();
	}
}
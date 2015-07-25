<?php
class kurir_model extends MY_Model {

    protected $table = 'kurir';
	
	function __construct(){
        parent::__construct();
    }
	
	public function get(){
		$result = $this->db->get($this->table);
		return $result->result_array();
	}
	
	public function save(){
		$this->simpan($this->table);
	}
	
	public function datagrid(){
		$this->grid($this->table);
	}
	
	public function delete(){
		$this->hapus($this->table);
	}
	
	public function getWhere($where){
		$query = "select * from {$this->table} where $where";
		return $this->db->query($query)->row_array();
	}
	function getById($id){
		$this->db->where('id',$id);
		return $this->db->get($this->table)->row();
	}
	public function cek_harga_kurir()
	{
		$berat = $_POST['berat'];
		$kabkota_id = $_POST['kabkota_id'];
		$provinsi_id = $_POST['provinsi_id'];
		$kecamatan_id = $_POST['kecamatan_id'];
		$sql = "select hk.* ,k.nama kurir_nama
		from harga_kurir hk 
		left join kurir k on hk.kurir_id = k.id
		where (kabkota_id = '$kabkota_id' and kecamatan_id = 0)";
		if($kecamatan_id > 0){
			$sql .= " or kecamatan_id = '$kecamatan_id'";
		}
		return $this->db->query($sql)->result_array();
	}
}
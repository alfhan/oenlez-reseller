<?php
class kategori_barang_model extends MY_Model {

    protected $table = 'kategori_barang';
	
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
}
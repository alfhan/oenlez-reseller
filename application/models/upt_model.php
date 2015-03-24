<?php
class upt_model extends MY_Model {

    private $table = 'upt';
	private $group_id;
	private $upt_id;
	private $where;
	
	function __construct(){
        parent::__construct();
		$this->group_id = $this->session->userdata('group');
		$this->upt_id = $this->session->userdata('upt');
    }
	
	public function get(){
		if($this->group_id == 2){
			$this->db->where('id',$this->upt_id);
		}
		$this->db->order_by('nama','asc');
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
<?php
class mst_model extends MY_Model {

    protected $table = 'dj_mst';
	
	function __construct(){
        parent::__construct();
    }
	
	public function get(){
		$this->db->order_by('id','asc');
		$result = $this->db->get($this->table);
		return $result->result_array();
	}
	public function get_by($where){
		$result = $this->db->get_where($this->table,$where);
		return $result;
	}
	public function getLhrt($id){
		$array = array('id' => $id);
		$mst = $this->get_by($array)->row_array();
		return $mst['lhrt'];
		/* if($mst['lhrt'] >= TCODE_RAYA_SEDANG)
			$rayaSedang = 14;
		else
			$rayaSedang = 7;
			
		return $rayaSedang; */
	}
	public function save($data,$id){
		$this->xSimpan($this->table,$data,$id);
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
<?php
class mode1_model extends MY_Model {

    protected $table = 'mode1';
	
	function __construct(){
        parent::__construct();
    }
	
	public function get($where="*"){
		if($where != "*"){
			$this->db->where($where);
		}
		$result = $this->db->get($this->table);
		return $result->result_array();
	}
}
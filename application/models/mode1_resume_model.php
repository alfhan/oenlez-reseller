<?php
class mode1_resume_model extends MY_Model {

    protected $table = 'mode1_resume';
	
	function __construct(){
        parent::__construct();
    }
	
	public function get(){
		$result = $this->db->get($this->table);
		return $result->result_array();
	}
}
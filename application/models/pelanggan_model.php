<?php
class pelanggan_model extends MY_Model {

    protected $table = 'pelanggan';
	
	function __construct(){
        parent::__construct();
    }
	public function get(){
		$this->db->order_by('id','desc');
		$result = $this->db->get($this->table);
		return $result->result_array();
	}
	public function getById($id){
		$result = false;
		if($id){
			$this->db->where(array('id'=>$id));
			$result = $this->db->get($this->table)->row_array();
		}
		return $result;
	}
	public function getWhere($where){
		$query = "select * from {$this->table} where $where";
		return $this->db->query($query)->row_array();
	}
	public function profile_save(){
		@$tmp_name = $_FILES['foto']['tmp_name'];
		
		$foto = false;

		if($tmp_name) $foto = $this->image_resize_pelanggan($tmp_name);
		
		if(empty($_POST['password'])) unset($_POST['password']);
		else $_POST['password'] = sha1(md5($_POST['password']));

		if($foto){
			$_POST['foto'] = "$foto.jpg";
			$this->load->helper('file');
			$old_file = $this->input->post('old_file');
			@unlink('images/pelanggan/'.$old_file);
		}
		$id = $this->input->post('id');
		unset($_POST['old_file']);
		if(empty($id) or $id == ''){
			$this->db->insert($this->table,$_POST);
		}elseif($id > 0){
			$this->db->update($this->table,$_POST,array('id'=>$id));
		}
	}
	public function image_resize_pelanggan($images)
    {
    	$this->load->library('image_lib');
    	$result = array();
    	$uniqid = uniqid();
		$config['image_library'] = 'gd2';
		$config['source_image'] = $images;
		/*$config['create_thumb'] = TRUE;*/
		$config['maintain_ratio'] = false;
		$config['width']         = 150;
		$config['height']       = 150;
		$config['new_image'] = "images/pelanggan/$uniqid.jpg";
		$this->image_lib->initialize($config);
		$this->image_lib->clear();
	    $this->image_lib->initialize($config);
	    $this->image_lib->resize();	
		if ( ! $this->image_lib->resize()){
        	return $this->image_lib->display_errors();
		}else{
			return $uniqid;
		}
	}
}
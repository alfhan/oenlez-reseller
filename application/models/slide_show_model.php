<?php
class slide_show_model extends MY_Model {

    protected $table = 'slide_show';
	
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
	public function delete(){
		$this->hapus($this->table);
		$this->load->helper('file');
		$foto = $this->input->post('foto');
		if($foto){
			@unlink('images/slide_show/'.$foto);
		}
	}
	public function getWhere($where){
		$query = "select * from {$this->table} where $where";
		return $this->db->query($query)->row_array();
	}
	public function profile_save(){
		@$tmp_name = $_FILES['foto']['tmp_name'];
		$foto = false;
		if($tmp_name){
			$foto = $this->image_resize_slide($tmp_name);
		}
		$data = array(
			'keterangan' => $this->input->post('keterangan'),
			'foto' => "$foto.jpg",
			'judul' => $this->input->post('judul'),
			);
		if(!$foto){
			unset($data['foto']);
		}else{
			$this->load->helper('file');
			$old_file = $this->input->post('old_file');
			if($old_file)
				@unlink('images/slide_show/'.$old_file);
		}
		$id = $this->input->post('id');
		if(empty($id) or $id == ''){
			$this->db->insert($this->table,$data);
		}elseif($id > 0){
			$this->db->update($this->table,$data,array('id'=>$id));
		}
	}
	public function image_resize_slide($images)
    {
    	#slide
    	$slide_path = 'images/slide_show';
    	$slide_width = 484;
    	$slide_height = 441;
    	$this->load->library('image_lib');
    	$uniqid = uniqid();
		$config['image_library'] = 'gd2';
		$config['source_image'] = $images;
		/*$config['create_thumb'] = TRUE;*/
		$config['maintain_ratio'] = false;
		$config['width']         = $slide_width;
		$config['height']       = $slide_height;
		$config['new_image'] = "$slide_path/$uniqid.jpg";
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
<?php
class banner_model extends MY_Model {

    protected $table = 'banner';
	
	function __construct(){
        parent::__construct();
    }
	public function get(){
		$this->db->order_by('id','desc');
		$result = $this->db->get($this->table);
		return $result->result_array();
	}
	public function profile_save(){
		@$tmp_name = $_FILES['foto']['tmp_name'];
		$tipe = $_POST['tipe'];
		$foto = false;
		if($tmp_name){
			$foto = $this->image_resize_banner($tmp_name,$tipe);
		}
		$data = array(
			'foto' => "$foto.jpg",
			'is_aktif' => $this->input->post('is_aktif'),
			);
		if(!$foto){
			unset($data['foto']);
		}else{
			$this->load->helper('file');
			$old_file = $this->input->post('old_file');
			if($old_file)
				@unlink('images/banner/'.$old_file);
		}
		$id = $this->input->post('id');
		if(empty($id) or $id == ''){
			$this->db->insert($this->table,$data);
		}elseif($id > 0){
			unset($data['tanggal']);
			$this->db->update($this->table,$data,array('id'=>$id));
		}
	}
	public function image_resize_banner($images,$tipe)
    {
    	#blog
    	$blog_path = 'images/banner';
    	$blog_width = 1170;
    	$blog_height = 150;
    	if($tipe=='left'){
    		$blog_width = 270;
    		$blog_height = 329;
    	}
    	$this->load->library('image_lib');
    	$uniqid = uniqid();
		$config['image_library'] = 'gd2';
		$config['source_image'] = $images;
		/*$config['create_thumb'] = TRUE;*/
		$config['maintain_ratio'] = false;
		$config['width']         = $blog_width;
		$config['height']       = $blog_height;
		$config['new_image'] = "$blog_path/$uniqid.jpg";
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
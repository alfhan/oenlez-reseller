<?php
class artikel_model extends MY_Model {

    protected $table = 'artikel';
	
	function __construct(){
        parent::__construct();
    }
	public function get(){
		$this->db->order_by('id','desc');
		$result = $this->db->get($this->table);
		return $result->result_array();
	}
	public function getSearch($where){
		$query = "select * from {$this->table} where 1=1 $where";
		return $this->db->query($query)->result_array();
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
			@unlink('images/blog/'.$foto);
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
			$foto = $this->image_resize_artikel($tmp_name);
		}
		$data = array(
			'judul' => $this->input->post('judul'),
			'isi' => $this->input->post('isi'),
			'foto' => "$foto.jpg",
			'kategori_artikel_id' => $this->input->post('kategori_artikel_id'),
			'tanggal' => date("Y-m-d"),
			'user_id' => $this->session->userdata('id'),
			'is_aktif' => $this->input->post('is_aktif'),
			);
		if(!$foto){
			unset($data['foto']);
		}else{
			$this->load->helper('file');
			$old_file = $this->input->post('old_file');
			if($old_file)
				@unlink('images/blog/'.$old_file);
		}
		$id = $this->input->post('id');
		if(empty($id) or $id == ''){
			$this->db->insert($this->table,$data);
		}elseif($id > 0){
			unset($data['tanggal']);
			$this->db->update($this->table,$data,array('id'=>$id));
		}
	}
	public function image_resize_artikel($images)
    {
    	#blog
    	$blog_path = 'images/blog';
    	$blog_width = 862;
    	$blog_height = 398;
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
    public function delete_foto($value='')
    {
    	$id = $_POST['id'];
    	$data['foto'] = null;
    	$this->db->where(array('id'=>$id));
    	$this->db->update($this->table,$data);
    	$this->load->helper('file');
		$foto = $this->input->post('foto');
		if($foto){
			@unlink('images/blog/'.$foto);
		}
    }
}
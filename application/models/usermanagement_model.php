<?php
class usermanagement_model extends MY_Model {

    protected $table = 'sys_user';
	
	function __construct(){
        parent::__construct();
    }
	
	public function get(){
		$this->db->order_by('id','asc');
		$result = $this->db->get($this->table);
		return $result->result_array();
	}
	
	public function save(){
		$_POST['password'] = md5($_POST['password']);
		$this->simpan($this->table);
	}
	
	public function datagrid(){
		$this->grid($this->table);
	}
	
	public function delete(){
		$this->hapus($this->table);
		$this->load->helper('file');
		$foto = $this->input->post('foto');
		if($foto)
			unlink("uploads/".$foto);
	}
	
	public function getWhere($where){
		$query = "select * from {$this->table} where $where";
		return $this->db->query($query)->row_array();
	}
	public function getById(){
	$where = array('id'=>$this->session->userdata('id'));
		$this->db->where($where);
		$result = $this->db->get('sys_user')->row();
		return $result;
	}
	public function profile_save(){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '500';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['encrypt_name']  = true;
		$config['remove_spaces']  = true;

		$this->load->library('upload', $config);
		$this->upload->do_upload('foto');
		$data_foto = $this->upload->data();
		$return = $this->upload->display_errors();
		$data = array(
			'password' => md5($this->input->post('password')),
			'nama' => $this->input->post('nama'),
			'foto' => $data_foto['file_name'],
			'group_id' => $this->input->post('group_id'),
			'email' => $this->input->post('email'),
			'telp' => $this->input->post('telp'),
			'hp' => $this->input->post('hp'),
			);
		if($return or empty($data_foto['file_name'])){
			unset($data['foto']);
		}else{
			$this->load->helper('file');
			$old_file = $this->input->post('old_file');
			unlink($data_foto['file_path'].$old_file);
		}
		if(empty($_POST['password'])){
			unset($data['password']);
		}
		$id = $this->input->post('id');
		if(empty($id)){
			$data['username'] = $this->input->post('username');
			$this->db->insert('sys_user',$data);
		}else{
			$this->db->update('sys_user',$data,array('id'=>$id));
		}
	}
}
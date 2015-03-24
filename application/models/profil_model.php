<?php
class profil_model extends MY_Model {

    protected $table = 'profil';
	
	function __construct(){
        parent::__construct();
    }
	public function get(){
		$result = $this->db->get($this->table);
		return $result->row();
	}
	public function profil_save(){
		$config['upload_path'] = './'.FILE_PERUSAHAAN;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1024';
		$config['max_width']  = '1380';
		$config['max_height']  = '1024';
		$config['encrypt_name']  = true;
		$config['remove_spaces']  = true;

		$this->load->library('upload', $config);
		$this->upload->do_upload('foto');
		$data_foto = $this->upload->data();
		$return = $this->upload->display_errors();
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telepon'),
			'website' => $this->input->post('website'),
			'foto' => $data_foto['file_name'],
			);
		if($return or empty($data_foto['file_name'])){
			unset($data['foto']);
		}else{
			$this->load->helper('file');
			$old_file = $this->input->post('old_file');
			unlink($data_foto['file_path'].$old_file);
		}
		$id = $this->input->post('id');
		if(empty($id) or $id == ''){
			$this->db->insert($this->table,$data);
		}elseif($id > 0){
			$this->db->update($this->table,$data,array('id'=>$id));
		}
	}
}
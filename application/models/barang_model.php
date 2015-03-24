<?php
class barang_model extends MY_Model {

    protected $table = 'barang';
	
	function __construct(){
        parent::__construct();
    }
	public function get(){
		$this->db->order_by('id','desc');
		$result = $this->db->get($this->table);
		return $result->result_array();
	}
	public function getLaporanDataBarang(){
		$where = array(
			'jenis_barang_id' => $this->input->post('jenis_barang_id'),
		);
		$this->db->where($where);
		$result = $this->db->get($this->table);
		return $result->result_array();
	}
	public function tb_bootstrap(){
		$q 		= isset($_GET['q']) ? $_GET['q'] : "";
		$hal	= isset($_GET['hal']) ? $_GET['hal'] : 1;
		$batas  = isset($_GET['batas']) ? $_GET['batas'] : 12;
		$posisi = $this->cariPosisi($batas);
		$this->db->like('nama',$q); 
		$this->db->order_by('id','desc');
		$query = $this->db->get($this->table,$batas,$posisi);
		$data = $query->result_array();
		$this->db->like('nama',$q); 
		$this->db->order_by('id','desc');
		$jmldata = $this->db->get($this->table)->num_rows();
		$jmlhalaman  = $this->jumlahHalaman($jmldata, $batas);
		$linkHalaman = $this->navHalaman($hal, $jmlhalaman,$this->table);
		return array('query'=>$data,'linkHalaman'=>$linkHalaman);
	}
	public function delete(){
		$this->hapus($this->table);
		$this->load->helper('file');
		$foto = $this->input->post('foto');
		if($foto)
			unlink(FILE_BARANG .$foto);
	}
	public function getWhere($where){
		$query = "select * from {$this->table} where $where";
		return $this->db->query($query)->row_array();
	}
	public function findBy(){
		$kode_barang = $this->input->post('q');
		$kode_barcode = $this->input->post('q');
		$nama = $this->input->post('q');
		$where = "kode_barcode like '%$kode_barcode%' or kode_barang like '%$kode_barang%' or nama like '%nama%' ";
		return $this->getWhere($where);
	}
	public function profile_save(){
		$config['upload_path'] = './'.FILE_BARANG;
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
			'kode_barang' => $this->input->post('kode_barang'),
			'kode_barcode' => $this->input->post('kode_barcode'),
			'nama' => $this->input->post('nama'),
			'harga_jual' => $this->input->post('harga_jual'),
			'harga_beli' => $this->input->post('harga_beli'),
			'qty' => $this->input->post('qty'),
			'foto' => $data_foto['file_name'],
			'keterangan' => $this->input->post('keterangan'),
			'jenis_barang_id' => $this->input->post('jenis_barang_id'),
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
			unset($data['qty'],$data['harga_beli'],$data['harga_jual']);
			$this->db->update($this->table,$data,array('id'=>$id));
		}
	}
}
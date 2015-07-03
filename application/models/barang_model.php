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
	public function getById($id){
		$result = false;
		if($id){
			$this->db->where(array('id'=>$id));
			$result = $this->db->get($this->table)->row_array();
		}
		return $result;
	}
	public function getSearch($where)
	{
		$sql = "select * from barang where 1=1 $where";
		return $this->db->query($sql)->result_array();
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
		if($foto){
			@unlink('images/recomended/'.$foto);
			@unlink('images/kategori_feature/'.$foto);
		}
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
		/*$config['upload_path'] = './'.FILE_BARANG;
		$config['allowed_types'] = 'jpg';
		$config['max_size']	= '1024';
		$config['max_width']  = '1380';
		$config['max_height']  = '1024';
		$config['encrypt_name']  = true;
		$config['remove_spaces']  = true;

		$this->load->library('upload', $config);*/
		@$tmp_name = $_FILES['foto']['tmp_name'];
		@$tmp_name2 = $_FILES['foto2']['tmp_name'];
		$foto = false;
		if($tmp_name){
			$foto = $this->image_resize_barang($tmp_name,$tmp_name2,$_POST['recomended_item']);
		}
		/*$this->upload->do_upload('foto');
		$data_foto = $this->upload->data();
		$return = $this->upload->display_errors();*/
		// image_resize_barang()
		$data = array(
			'kode_barang' => $this->input->post('kode_barang'),
			'recomended_item' => $this->input->post('recomended_item'),
			'nama' => $this->input->post('nama'),
			'harga_jual' => $this->input->post('harga_jual'),
			'harga_beli' => $this->input->post('harga_beli'),
			'ready_stock' => $this->input->post('ready_stock'),
			'berat' => $this->input->post('berat'),
			'foto' => "$foto.jpg",
			'keterangan' => $this->input->post('keterangan'),
			'kategori_barang_id' => $this->input->post('kategori_barang_id'),
			);
		if(!$foto){
			unset($data['foto']);
		}else{
			$this->load->helper('file');
			$old_file = $this->input->post('old_file');
			@unlink('images/recomended/'.$old_file);
			@unlink('images/kategori_feature/'.$old_file);
		}
		$id = $this->input->post('id');
		if(empty($id) or $id == ''){
			$this->db->insert($this->table,$data);
		}elseif($id > 0){
			$this->db->update($this->table,$data,array('id'=>$id));
		}
	}
	public function image_resize_barang($images,$images2,$isRecom)
    {
    	#recomended
    	$recomended_path = 'images/recomended';
    	$recomended_width = 268;
    	$recomended_height = 134;
    	#kategori&feature
    	$kategori_feature_path = 'images/kategori_feature';
    	$kategori_feature_width = 268;
    	$kategori_feature_height = 249;
		$data[] = array(
    			'path'=>$kategori_feature_path,
    			'width'=>$kategori_feature_width,
    			'height'=>$kategori_feature_height,
    			'img'=>$images,
    			);
		if($isRecom and $images2){
			$data[] = array(
    			'path'=>$recomended_path,
    			'width'=>$recomended_width,
    			'height'=>$recomended_height,
    			'img'=>$images2,
    			);
		}
    	$this->load->library('image_lib');
    	$result = array();
    	$uniqid = uniqid();
    	foreach ($data as $r) {
    		$config['image_library'] = 'gd2';
			$config['source_image'] = $r['img'];
			/*$config['create_thumb'] = TRUE;*/
			$config['maintain_ratio'] = false;
			$config['width']         = $r['width'];
			$config['height']       = $r['height'];
			$config['new_image'] = "$r[path]/$uniqid.jpg";
			$this->image_lib->initialize($config);
			$this->image_lib->clear();
		    $this->image_lib->initialize($config);
		    $this->image_lib->resize();	
    	}
		if ( ! $this->image_lib->resize()){
        	return $this->image_lib->display_errors();
		}else{
			return $uniqid;
		}
    }
}
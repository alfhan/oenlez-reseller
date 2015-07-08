<?php
class pesan_model extends MY_Model {

    protected $table = 'pesan';
    protected $session_id;
	
	function __construct(){
        parent::__construct();
        $this->session_id = $this->session->userdata('session_id');
    }
    public function getall($value='')
    {
    	$this->db->where(array('parent_id'=>0));
    	return $this->db->get($this->table)->result_array();
    }
	public function konfirmasi($value='')
	{
		$this->db->trans_begin();
		$id = $this->session->userdata('id');
		$rs = $this->db->get_where('pelanggan',array('id'=>$id))->row_array();
		$data = array(
			'pelanggan_id' => $id, 
			'isi'=>$_POST['isi'],
			'waktu'=>date("Y-m-d H:i:s"),
			'tipe'=>'Order Barang',
			'status'=>0,
			'subject'=>'Konfirmasi Pembayaran',
			'email'=>$rs['username'],
			);
		$this->db->insert('pesan',$data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			echo json_encode(array('msg'=>'Gagal disimpan'));
		}else{
			$this->db->trans_commit();
			echo json_encode(array('success'=>'Tersimpan'));
		}
	}
	public function balaspesan($value='')
	{
		$this->db->trans_begin();
		$data = array(
			'pelanggan_id' => $this->session->userdata('id'),
			'isi'=>$_POST['isi'],
			'waktu'=>date("Y-m-d H:i:s"),
			/*'tipe'=>'Konfirmasi Pembayaran',*/
			'parent_id'=>$_POST['id'],
			);
		if($this->session->userdata('tipe') == sha1(md5(OWNER))){
			unset($data['pelanggan_id']);
			$data['user_id'] = $this->session->userdata('id');
		}else{
			$this->db->update('pesan',array('status'=>0),array('id'=>$_POST['id']));
		}
		$this->db->insert('pesan',$data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			echo json_encode(array('msg'=>'Gagal disimpan'));
		}else{
			$this->db->trans_commit();
			echo json_encode(array('success'=>'Tersimpan'));
		}
	}
	public function dibaca($value='')
	{
		$this->db->update('pesan',array('status'=>1),array('id'=>$value));
	}
	public function detailpesan($value='')
	{
		$result['child'] = $this->db->get_where('pesan',array('parent_id'=>$value))->result_array();
		$this->db->order_by('waktu','desc');
		$this->db->order_by('status','asc');
		$this->db->order_by('updated_at','desc');
		$result['parent'] = $this->db->get_where('pesan',array('id'=>$value))->row_array();
		return $result;
	}

	public function forCustomer($value='')
	{
		$pelangganId = $this->session->userdata('id');
		$sql = "select * from pesan where parent_id = 0 and pelanggan_id = '$pelangganId' order by waktu asc";
		return $this->db->query($sql)->result_array();
	}
	public function detailMessageCustomers($id)
	{
		$sql = "select * from pesan where parent_id = '$id' or id='$id' order by waktu asc";
		$rs = $this->db->query($sql)->result_array();
		return $rs;
	}
}
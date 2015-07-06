<?php
class shipping_model extends MY_Model {

    protected $table = 'shop';
    protected $session_id;
	
	function __construct(){
        parent::__construct();
        $this->session_id = $this->session->userdata('session_id');
    }
    public function provinsi()
    {
    	return $this->db->get('provinsi');
    }
    public function kabkota($value='')
    {
    	$data = array(
    		'list' => $this->kabkota_provinsi(),
    		'provinsi' => $this->provinsi(),
    		);
    	return $data;
    }
    public function kurir($value='')
    {
    	return $this->db->get('kurir');
    }
    public function harga_kurir($value='')
    {
    	$data = array(
    		'kurir' => $this->kurir(),
    		'provinsi' => $this->provinsi(),
    		'list' => $this->kurirList(),
    		);
    	return $data;
    }
    public function kabkota_provinsi($value='')
    {
    	$sql = "select k.*, p.nama provinsi_nama from kabkota k left join provinsi p on k.provinsi_id = p.id order by p.id asc, k.id asc";
    	return $this->db->query($sql);
    }
    public function kurirList($value='')
    {
    	$sql = "select hk.*,p.nama provinsi_nama,kk.nama kabkota_nama,k.nama kurir_nama,kec.nama kecamatan_nama
    		from harga_kurir hk
    		left join kurir k on hk.kurir_id = k.id
    		left join kabkota kk on hk.kabkota_id = kk.id 
    		left join provinsi p on hk.provinsi_id = p.id
    		left join kecamatan kec on hk.kecamatan_id = kec.id
    	";
    	return $this->db->query($sql);
    }
    public function cekHarga($value='')
    {
    	$kurirId = $_POST['kurir_id'];
    	$provinsi_id = $_POST['provinsi_id'];
    	$kabkota_id = $_POST['kabkota_id'];
    	$kecamatan_id = $_POST['kecamatan_id'];
    	$sql = "select * from harga_kurir where provinsi_id='$provinsi_id' and kabkota_id='$kabkota_id' and kecamatan_id = '$kecamatan_id' order by harga asc limit 1";
    	return $this->db->query($sql);
    }
    public function kecamatan($value='')
    {
    	$data = array(
    		'list' => $this->listGridKecamatan(),
    		'provinsi' => $this->db->get('provinsi'),
    		);
    	return $data;
    }
    public function listGridKecamatan($value='')
    {
    	$sql = "
    		select k.*, kk.nama kabkota_nama, p.nama provinsi_nama
    		from kecamatan k 
    		left join kabkota kk on k.kabkota_id = kk.id
    		left join provinsi p on kk.provinsi_id = p.id
    	";
    	return $this->db->query($sql);
    }
}
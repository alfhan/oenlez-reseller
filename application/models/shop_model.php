<?php
class shop_model extends MY_Model {

    protected $table = 'shop';
    protected $session_id;
	
	function __construct(){
        parent::__construct();
        $this->session_id = $this->session->userdata('session_id');
    }
    public function get_temp_shop()
    {
    	if($this->session->userdata('tipe') == sha1(md5(MEMBER)) ){
    		$pelangganId = $this->session->userdata('id');
    		$where = "pelanggan_id = '$pelangganId'";
    	}else{
    		$where = "sesi_id = '{$this->session_id}'";
    	}
    	$sql = "select tj.*, b.nama barang_nama, b.kode_barang, b.berat
    	from temp_jual tj 
    	left join barang b on tj.barang_id = b.id
    	where $where";
    	return $this->db->query($sql);
    }
	public function create_temp_shop($barang_id){
		#temp_jual
		$barang = $this->db->get_where('barang',array('id'=>$barang_id))->row_array();
		$this->db->trans_begin();
		$data = array(
			'sesi_id' => $this->session_id,
			'barang_id' => $barang_id,
			'qty' => 1,
			'harga' => $barang['harga_jual'],
			'berat' => $barang['berat'],
			'tanggal' => date("Y-m-d"),
			);
		if($this->session->userdata('tipe') == sha1(md5(MEMBER)) ){
    		$data['pelanggan_id'] = $this->session->userdata('id');
    	}
		$this->db->insert('temp_jual',$data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	public function update_temp_shop($value='')
	{
		$id = $_POST['id'];
		$count = count($id);
		$this->db->trans_begin();
		for ($i=0; $i < $count; $i++) { 
			$data = array(
				'barang_id' => $_POST['barang_id'][$i],
				'qty' => $_POST['qty'][$i],
				);
			if($this->session->userdata('tipe') == sha1(md5(MEMBER)) ){
	    		$data['pelanggan_id'] = $this->session->userdata('id');
	    	}
			$this->db->where(array('id'=>$id[$i]));
			$this->db->update('temp_jual',$data);
		}
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			echo json_encode(array('msg'=>'Gagal disimpan'));
		}else{
			$this->db->trans_commit();
			echo json_encode(array('success'=>'Tersimpan'));
		}
	}
	public function delete_temp_shop($value='')
	{
		$id = $_POST['id'];
		$this->db->delete('temp_jual',array('id'=>$id));
		echo json_encode(array('success'=>'Tersimpan'));
	}
	public function loginCekTempAndUpdate()
	{
		$rs = $this->db->get_where('temp_jual',array('sesi_id'=>$this->session_id));
		if($rs->num_rows() > 0){
			$data = array(
				'pelanggan_id'=> $this->session->userdata('id'),
				);
			$this->db->where(array('sesi_id'=>$this->session_id));
			$this->db->update('temp_jual',$data);
		}
	}
	public function checkout(){
		#prepare & inisialization
		$this->load->library('uuidclass');
		$pelanggan_id = $this->session->userdata('id');
		$shop_id = $this->uuidclass->v4();
		$this->db->trans_begin();
		$no_invoice = generateRandomString(6);
		#select temp
		$this->db->where(array('pelanggan_id'=>$pelanggan_id));
		$temp = $this->db->get('temp_jual')->result_array();
		#create detail shop
		$total = 0;
		$tanggal = date("Y-m-d");
		foreach ($temp as $r) {
			$jumlah = $r['qty']*$r['harga'];
			$data = array(
				'id' => $this->uuidclass->v4(),
				'barang_id' => $r['barang_id'],
				'qty' => $r['qty'],
				'harga' => $r['harga'],
				'shop_id' => $shop_id,
				'berat' => $r['berat'],
				);
			$this->db->insert('shop_detail',$data);
			$total += $jumlah;
		}
		#create shop
		$data = array(
			'id' => $shop_id,
			'pelanggan_id' => $pelanggan_id,
			'nama' => $_POST['nama'],
			'alamat' => $_POST['alamat'],
			'hp' => $_POST['hp'],
			'kode_pos' => $_POST['kode_pos'],
			'kabkota_id' => $_POST['kabkota_id'],
			'provinsi_id' => $_POST['provinsi_id'],
			'kecamatan_id' => $_POST['kecamatan_id'],
			'total' => $total,
			'harga_kirim_id' => $_POST['harga_kirim_id'],
			'harga_kirim' => $_POST['harga_kirim'],
			'no_invoice' => $no_invoice,
			'tanggal' => $tanggal,
			'catatan' => $_POST['catatan'],
			);
		$this->db->insert('shop',$data);
		#delete temp_jual
		$this->db->where(array('pelanggan_id'=>$pelanggan_id));
		$this->db->delete('temp_jual');
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			echo json_encode(array('msg'=>'Gagal disimpan'));
		}else{
			$this->db->trans_commit();
			$this->kirim_invoice($shop_id);
			echo json_encode(array('success'=>'Tersimpan','id'=>$shop_id));
		}
	}
	public function kirim_invoice($shop_id)
	{
		$infoPembayaran = $this->auth->infoPembayaran();
		$list = $this->invoice($shop_id);
		$to = $list[0]['username'];
		$no_invoice = $list[0]['no_invoice'];
		$nama = $list[0]['nama'];
		$alamat = $list[0]['alamat'];
		$kode_pos = $list[0]['kode_pos'];
		$provinsi = $list[0]['provinsi_nama'];
		$kabkota = $list[0]['kabkota_nama'];
		$kec = $list[0]['kecamatan_nama'];
		$harga_kirim = $list[0]['harga_kirim'];

		$message = "
		<!DOCTYPE html>
			<html>
			<head>
				<title>Invoice $shop_id</title>
			</head>
			<body>
			<h3>Invoice</h3>
				<table width='100%' border='1' rules='all'>
				  <tr>
				    <th width='50%'>No Invoice #$no_invoice</th>
				    <th>Pay to</th>
				  </tr>
				  <tr>
				    <td valign='top'>
				      $nama
				      <br />
				      $alamat $kode_pos
				      <br />
				      
				    </td>
				    <td valign='top'>
				      ".nl2br($infoPembayaran['isi'])."
				    </td>
				  </tr>
				</table>
				<h3>Detail Invoice</h3>
				<table width='100%' rules='all' border='1'>
				  <tr>
				    <th><center>Items</center></th>
				    <th width='120'><center>Harga</center></th>
				    <th width='120'><center>Jumlah (Rp)</center></th>
				  </tr>";
				  
				  $subT = 0;
				  foreach ($list as $r) {
				    $jml = $r['harga']*$r['qty'];
				    $subT += $jml;
				    $message .= "<tr>
				    <td>$r[barang_kode] - $r[barang_nama] - Qty : $r[qty]</td>
				    <td align='right'>$r[harga]</td>
				    <td align='right'>$jml</td>
				    </tr>";  
				  }
				  $total = $harga_kirim+$subT;
			$message .= "<tr>
				    <td colspan='2' align='right'>Sub Total (Rp)</td>
				    <td align='right'><b><?=$subT?></b></td>
				  </tr>
				  <tr>
				    <td colspan='2' align='right'>Delivery (Rp)</td>
				    <td align='right'><b>$harga_kirim</b></td>
				  </tr>
				  <tr>
				    <td colspan='2' align='right'>Total (Rp)</td>
				    <td align='right'><b>$total</b></td>
				  </tr>
				</table>
			</body>
		</html>
		";
		$subject = "New Order #$no_invoice";
		/*$config = array(
			'protocol'=>'smtp',
			'smtp_host'=>'ssl://smtp.gmail.com',
			'smtp_post'=>465,
			'smtp_user'=>'alfhanz@gmail.com',
			'smtp_pass'=>'010988alfhan',
			'mail_type'=>'html',
			'charset'=>'utf-8',
			'newline'=>"\r\n",
			'wordwrap'=>TRUE
			);
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->from('sales@oenlez.com','Oenlez Sales');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();*/
		$config = Array(
	      'protocol' => 'smtp',
	      'smtp_host' => 'ssl://smtp.gmail.com',
	      'smtp_port' => 465,
	      'smtp_user' => 'alfhanz@gmail.com', //isi dengan gmailmu!
	      'smtp_pass' => '010988alfhan', //isi dengan password gmailmu!
	      'mailtype' => 'html',
	      'charset' => 'utf-8',
	      'newline' => "\r\n",
	      'wordwrap' => TRUE
	    );
		$this->load->library('email');
		$this->email->initialize($config);
		
		$this->email->from('sales@oenlez.com', 'Oenlez Sales');
		$this->email->to($to); 

		$this->email->subject($subject);
		$this->email->message($message);	

		$this->email->send();

		echo $this->email->print_debugger();
	}
	public function invoice($id){
		$sql = "select s.*,sd.*,k.nama kecamatan_nama, kk.nama kabkota_nama, p.nama provinsi_nama,b.nama barang_nama,b.kode_barang barang_kode,
		pel.username
		from shop s
		left join shop_detail sd on s.id = sd.shop_id
		left join provinsi p on s.provinsi_id = p.id
		left join kabkota kk on s.kabkota_id = kk.id
		left join kecamatan k on s.kecamatan_id = k.id
		left join barang b on sd.barang_id = b.id
		left join pelanggan pel on s.pelanggan_id = pel.id
		where s.id = '$id'";
		return $this->db->query($sql)->result_array();
	}
	public function konfirmasi($value='')
	{
		$this->db->trans_begin();
		$data = array(
			'pelanggan_id' => $this->session->userdata('id'),
			'isi'=>$_POST['isi'],
			'waktu'=>date("Y-m-d H:i:s"),
			'tipe'=>'konfirmasi Pembayaran',
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
	public function daftar_penjualan($value='')
	{
		$sql = "select s.*,p.nama pelanggan_nama, pov.nama provinsi_nama, kk.nama kabkota_nama,k.nama kecamatan_nama
		from shop s 
		left join pelanggan p on s.pelanggan_id = p.id
		left join kabkota kk on s.kabkota_id = kk.id
		left join provinsi pov on s.provinsi_id = pov.id
		left join kecamatan k on s.kecamatan_id = k.id
		order by tanggal desc";
		return $this->db->query($sql);
	}
	public function getById($id)
	{
		$sql = "select s.*,p.nama pelanggan_nama,p.no_pelanggan,p.alamat pelanggan_alamat,p.username, pov.nama provinsi_nama, 
		kk.nama kabkota_nama,k.nama kecamatan_nama, b.kode_barang barang_kode,b.nama barang_nama,
		sd.harga, sd.qty
		from shop s 
		left join shop_detail sd on sd.shop_id = s.id
		left join barang b on sd.barang_id = b.id
		left join pelanggan p on s.pelanggan_id = p.id
		left join kabkota kk on s.kabkota_id = kk.id
		left join provinsi pov on s.provinsi_id = pov.id
		left join kecamatan k on s.kecamatan_id = k.id
		where s.id = '$id'
		order by tanggal desc";
		return $this->db->query($sql);
	}
}
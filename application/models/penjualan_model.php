<?php
class penjualan_model extends MY_Model {

    protected $tbtemp = 'temp_penjualan';
    protected $tbjual = 'penjualan';
    protected $tbdetail = 'penjualan_detail';
    protected $tbbarang = 'barang';
	protected $session_id;
    protected $id;
	function __construct(){
        parent::__construct();
        $this->session_id = $this->session->userdata('session_id');
        $this->id = $this->session->userdata('id');
    }
    public function get()
    {
        $this->session->userdata('session_id');
    }
    function temp_jual($session_id){
    	$id = $this->input->post('id');
    	if(isset($_POST['qty'])){
    		$qty = $this->input->post('qty');
    	}else{
    		$qty = 1;
    	}
    	
    	$barang = $this->getBarang($id);
    	$harga = $barang['harga_jual'];
    	$tanggal = date("Y-m-d");

    	$data = array(
    		'barang_id' => $id,
    		'data_session_id' => $session_id,
    		'qty' => $qty,
    		'harga' => $harga,
			'tanggal' => $tanggal,
    	);
    	$mode = $this->input->post('mode');
    	$where = array(
			'data_session_id' => $session_id,
			'barang_id' => $id
    	);
    	$this->db->trans_begin();
    	$rs = $this->db->get_where($this->tbtemp,$where);
    	
    	if($rs->num_rows() > 0){
    		$rows = $rs->row();
    		$mode = 1;
    		$rs_qty = $rows->qty;
    		$qty = $rs_qty+1;
    	}

    	if($mode == 0){
    		#insert
    		$this->db->insert($this->tbtemp,$data);
    	}else{
    		#update
    		$data = array(
    			'qty' => $qty,
    		);
    		$this->db->where($where);
    		$this->db->update($this->tbtemp,$data);
    	}
    	if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
		} else {
			$this->db->trans_commit();
		}
		$return_data = $this->withBarang($session_id);
    	return $return_data;
    }
    function getBarang($id){
    	$this->load->model('barang_model');
    	return $this->barang_model->getWhere("id='$id'");
    }
    function withBarang($session_id){
    	$sql = "
    		select a.*,b.nama nama_barang, b.kode_barang
    		from {$this->tbtemp} a 
    		left join barang b on a.barang_id = b.id 
    		where a.data_session_id = '$session_id'
    	";
    	return $this->db->query($sql)->result_array();
    }
    public function move_penjualan(){
        /*properties*/
        $bayar = $this->input->post('bayar');
        $grand_total = $this->input->post('grand_total');
        $kembali = $this->input->post('kembali');
        /*end*/
    	$this->load->library('uuidclass');
    	$no_trx = generateRandomString(5);
		$uuid =  $this->uuidclass->v4();
		$session_id = $this->session_id;
		$gettempjual = $this->getTempJual();
		$data_temp_jual = $gettempjual->result_array();
		$this->db->trans_begin();
		#save penjualan
		$total = 0;
		foreach ($data_temp_jual as $row) {
            $qty = $row['qty'];
            $harga = $row['harga'];
			$total += $qty*$harga;
		}
		$data = array(
			'id' => $uuid,
			'tanggal' => date("Y-m-d"),
			'total' => $total,
			'no_trx' => $no_trx,
            'bayar' => $bayar,
            'grand_total' => $grand_total,
            'kembali' => $kembali,
		);

		$this->db->insert($this->tbjual,$data);
		#save penjualan_detail
		foreach ($data_temp_jual as $row) {
            $sql = "insert into {$this->tbdetail} 
                (penjualan_id,qty,harga,barang_id) values 
                ('$uuid','$row[qty]','$row[harga]','$row[barang_id]')";
			$this->db->query($sql);
            $sql = "select * from {$this->tbbarang} where id = '$row[barang_id]'";
            $barang = $this->db->query($sql)->row();
            $qtyAwal = $barang->qty;
            $qtyKurang = $row['qty'];
            $qtyAkhir = $qtyAwal-$qtyKurang;
            $sql = "update {$this->tbbarang} set qty = '$qtyAkhir' where id = '$row[barang_id]'";
            $this->db->query($sql);
            /*$data = array(
				'penjualan_id' => $uuid,
				'qty' => $row['qty'],
				'harga' => $row['harga'],
				'barang_id' => $row['barang_id'],
			);
			$this->db->insert($this->tbdetail,$data);
			$barang = $this->db->get_where($this->tbbarang,array('id'=>$row['barang_id']))->row();
			$qtyAwal = $barang->qty;
			$qtyKurang = $row['qty'];
			$qtyAkhir = $qtyAwal-$qtyKurang;
			$databarang = array(
                
				'qty' => $qtyAkhir,
                
			);
			$this->db->where('id',$row['barang_id']);
			$this->db->update($this->tbbarang,$databarang);*/
		}
				
		#commit or false
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
            #delete temp_penjualan
            $this->delete_temp_penjualan();
			return $uuid;
		}
    }
    function delete_temp_penjualan(){
        $session_id = $this->session_id;
        $this->db->where('data_session_id',$session_id);
        $this->db->delete($this->tbtemp);
    }
    public function getTempJual(){
    	$this->db->where(array('data_session_id'=>$this->session_id));
    	return $this->db->get($this->tbtemp);
    }
    function reset_cart(){
    	$this->db->where(array('data_session_id'=>$this->session_id));
		return $this->db->delete($this->tbtemp);
    }
    function delete_item(){
    	$this->db->trans_begin();
    	$where = array(
    		'data_session_id' => $this->session_id,
    		'barang_id' => $this->input->post('barang_id'),
    		);
    	$this->db->delete($this->tbtemp,$where);
    	#commit or false
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
    }
    function decriment_item(){
    	$this->db->trans_begin();
    	$where = array(
    		'data_session_id' => $this->session_id,
    		'barang_id' => $this->input->post('barang_id'),
    		);
        $qty = $this->input->post('qty');
        $decriment_qty = $qty-1;
    	$data = array(
    		'qty' => $decriment_qty,
    		);
    	$this->db->where($where);
    	$this->db->update($this->tbtemp,$data);
    	#commit or false
        if($decriment_qty == 0){
            $this->db->where($where);
            $this->db->delete($this->tbtemp);
        }
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
    }
    function notaPenjualan($id){
    	$sql = "
	    	select a.*,b.nama nama_barang, b.kode_barang
	    	from {$this->tbdetail} a 
	    	left join {$this->tbbarang} b on a.barang_id = b.id 
	    	where a.penjualan_id = '$id'
    	";
    	$data = array(
    		'penjualan' => $this->db->get_where($this->tbjual,array('id'=>$id)),
    		'penjualan_detail' => $this->db->query($sql),
            'profil' => $this->db->get('profil')->row(),
    	);
    	return $data;
    }
    function laporanPenjualan(){
    	$start = $this->input->post('tgl_awal');
		$end = $this->input->post('tgl_akhir');
    	$sql = "select * from {$this->tbjual} where tanggal between '$start' and '$end'";
    	return $this->db->query($sql);
    }
    function cekStock(){
        #barang_id
        $barang_id = $this->input->post('id');
        #temp
        $where = array(
            'data_session_id' => $this->session_id,
            'barang_id' => $barang_id,
            );
        $temp = $this->db->get_where($this->tbtemp,$where);
        if($temp->num_rows() > 0){
            $temp = $temp->row_array();
            #barang
            $where = array(
                'id' => $barang_id,
                );
            $barang = $this->db->get_where($this->tbbarang,$where)->row_array();
            $qtyTemp = $temp['qty']+1;
            $qtyBarang = $barang['qty'];
            if($qtyTemp > $qtyBarang){
                return false;
            }else{
                return true;
            }
        }else{
            return true;
        }
    }
    function laporanKeuangan(){
        $where = "";
        if(isset($_POST['bulan'])){
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $where = "WHERE date_format(p.tanggal,'%m') = $bulan and date_format(p.tanggal,'%Y') = $tahun";
        }elseif(isset($_POST['tanggal'])){
            $tanggal = $this->input->post('tanggal');
            $where = "where p.tanggal = '$tanggal' ";
        }
        $sql = "SELECT 
            pd.qty,pd.harga,b.nama,b.kode_barang,p.no_trx,p.tanggal 
        FROM penjualan_detail pd 
        LEFT JOIN penjualan p on pd.penjualan_id = p.id 
        LEFT JOIN barang b on pd.barang_id = b.id $where 
        order by p.tanggal asc";
        
        return $this->db->query($sql);
    }
    public function saldo_awal(){
        $this->db->trans_begin();
        $nominal = $this->input->post('nominal');
        $data = array(
            'sys_user_id' => $this->id,
            'tanggal' => date("Y-m-d"),
            );
        $result = $this->db->get_where('saldo_awal',$data);
        if($result->num_rows() > 0){
            $row = $result->row();
            $data['nominal'] = $nominal;
            $this->db->where('id',$row->id);
            $this->db->update('saldo_awal',$data);
        }else{
            $data['nominal'] = $nominal;
            $this->db->insert('saldo_awal',$data);
        }
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            echo json_encode(array('msg'=>'Gagal disimpan','nominal'=>$nominal));
        }else{
            $this->db->trans_commit();
            echo json_encode(array('success'=>'Tersimpan','nominal'=>$nominal));
        }
    }
}
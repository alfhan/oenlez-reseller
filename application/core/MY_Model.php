<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Model extends CI_Model {
    function __construct(){
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
    }
    function grid($table,$where=""){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$offset = ($page-1)*$rows;
		$result = array();
		$sort = 'id';
		$by = 'desc';
		
		if(isset($_REQUEST['sort']) and isset($_REQUEST['order'])){
			$sort = $_REQUEST['sort'];
			$by  =$_REQUEST['order'];
		}
		
		$rs = $this->db->query("select count(id) id from $table $where");
		$row = $rs->row_array();
		$result["total"] = $row['id'];
		$rs = $this->db->query("
							select * from $table $where
							order by `$sort` $by limit $offset,$rows
							");
		
		$items = array();
		
		foreach($rs->result_array() as $row){
			array_push($items, $row);
		}
		$result["rows"] = $items;

		echo json_encode($result);
	}
	function custom_grid($sql){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$offset = ($page-1)*$rows;
		$result = array();
		$sort = 'id';
		$by = 'desc';
		
		if(isset($_REQUEST['sort']) and isset($_REQUEST['order'])){
			$sort = $_REQUEST['sort'];
			$by  =$_REQUEST['order'];
		}
		
		$rs = $this->db->query("select count(*) id from ($sql) a");
		$row = $rs->row_array();
		$result["total"] = $row['id'];
		$rs = $this->db->query("
							$sql
							order by $sort $by limit $offset,$rows
							");
		
		$items = array();
		
		foreach($rs->result_array() as $row){
			array_push($items, $row);
		}
		$result["rows"] = $items;

		echo json_encode($result);
	}
	function simpan($table){
		$this->db->trans_begin();
		if(isset($_POST['id']) and !empty($_POST['id'])){
			$this->db->where('id', $_POST['id']);
			$return = $this->db->update($table, $_POST);
		}else{
			$return = $this->db->insert($table, $_POST);
		}
		#$this->db->trans_start();
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			echo json_encode(array('msg'=>'Gagal disimpan'));
		}else{
			$this->db->trans_commit();
			echo json_encode(array('success'=>'Tersimpan'));
		}
	}
	function xSimpan($table,$data,$id){
		$this->db->trans_begin();
		if(isset($id) and !empty($id)){
			$this->db->where('id', $id);
			$return = $this->db->update($table, $data);
		}else{
			$return = $this->db->insert($table, $data);
		}
		
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			echo json_encode(array('msg'=>'Gagal disimpan'));
		}else{
			$this->db->trans_commit();
			echo json_encode(array('success'=>'Tersimpan'));
		}
	}
	function hapus($table){
		$this->db->trans_begin();
		$this->db->delete($table, array('id' => $_POST['id'])); 
		#$this->db->trans_start();
		
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			echo json_encode(array('msg'=>'Data gagal dihapus'));
		} else {
			$this->db->trans_commit();
			echo json_encode(array('success'=>'Delete Success'));
		}
	}
	public function datagrid($array){
		$tbl = strtolower($array['tbl']);
		$count_field = $array['count_field'];
		$where = isset($array['where']) ? $array['where'] : '';
		$custom_query = isset($array['sql']) ? $array['sql'] : false;
		
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$offset = ($page-1)*$rows;
		$result = array();
		$sort = $count_field;
		$by = 'desc';
		
		if(isset($_REQUEST['sort']) and isset($_REQUEST['order'])){
			$sort = $_REQUEST['sort'];
			$by  =$_REQUEST['order'];
		}
		
		$rs = $this->db->query("select count($count_field) $count_field from $tbl $where");
		$row = $rs->row_array();
		$result["total"] = $row[$count_field];
		
		if($custom_query){
			$rs = $this->db->query("$custom_query $where order by `$sort` $by limit $offset,$rows ");
		}else{
			$rs = $this->db->query("select * from $tbl $where order by `$sort` $by limit $offset,$rows ");
		}
                
		$items = array();
		
		foreach($rs->result_array() as $row){
			array_push($items, $row);
		}
		$result["rows"] = $items;

		echo json_encode($result);
	}
	function cariPosisi($batas){
		if(empty($_GET['hal'])){
			$posisi=0;
			$_GET['hal']=1;
		}else{
			$posisi = ($_GET['hal']-1) * $batas;
		}
		return $posisi;
	}

	function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
	}

	function navHalaman($halaman_aktif, $jmlhalaman,$url){
		$link_halaman = "";

		// Link halaman 1,2,3, ...
		for ($i=1; $i<=$jmlhalaman; $i++){
			if ($i == $halaman_aktif){
				$link_halaman .= "<li class=\"active\"><a href=\"#\">$i</a></li>";
			}else{
				$link_halaman .= "<li><a href='".base_url($url)."?hal=$i'>$i</a></li>";
			}
			$link_halaman .= " ";
		}
		return $link_halaman;
	}
	public function halaman($sql,$url){
		$hal	= isset($_GET['hal']) ? $_GET['hal'] : 1;
		$batas  = isset($_GET['batas']) ? $_GET['batas'] : 12;
		$posisi = $this->cariPosisi($batas);
		$query	= $this->db->query("$sql LIMIT $posisi,$batas")->result_array();
		$jmldata= $this->db->query($sql)->num_rows();
		$jmlhalaman  = $this->jumlahHalaman($jmldata, $batas);
		$linkHalaman = $this->navHalaman($hal, $jmlhalaman,$url);
		return array('query'=>$query,'linkHalaman'=>$linkHalaman);
	}
	public function isiData($table)
	{
		return $this->db->get($table);
	}
}
?>
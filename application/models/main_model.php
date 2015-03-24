<?php
class main_model extends MY_Model {
	
	function __construct(){
        parent::__construct();
    }
	
	public function uptWilayah($mode=0){
		$this->load->model('upt_model');
		$this->load->model('wilayah_model');
		$upt = $this->upt_model->get();
		$wilayah = $this->wilayah_model->get();
		if($mode == 0){
			$data = array('upt'=>$upt,'wilayah'=>$wilayah);
		}else{
			$data = "";
			foreach($upt as $r){
				$data .= "<optgroup label='$r[nama]'>";
				foreach($wilayah as $row){
					if($row['upt_id'] == $r['id']){
						$data .= "<option value='$row[id]'>$row[nama]</option>";
					}
				}
				$data .= "</optgroup>";
			}
		}
		return $data;
	}
	
	public function getWhere($where){
		$query = "select * from {$this->table} where $where";
		return $this->db->query($query)->row_array();
	}
	
	public function tahunSasaran1(){
		$query = "select distinct(tahun) tahun from mode1 order by tahun asc";
		return $this->db->query($query)->result_array();
	}
	
	public function tahunTrx(){
		$query = "SELECT DISTINCT(tahun) tahun from kondisi
					UNION
					SELECT DISTINCT(tahun) tahun from kelandaian
					UNION
					SELECT DISTINCT(tahun) tahun from lebar_bahu_kanan
					UNION
					SELECT DISTINCT(tahun) tahun from lebar_bahu_kiri
					UNION
					SELECT DISTINCT(tahun) tahun from lebar_jalur_lalu_lintas
					order by tahun asc";
		return $this->db->query($query)->result_array();
	}
	public function data_mst($wilayah_id){
		$where = array(
			'wilayah_id' => $wilayah_id,
		);
		$result = $this->db->get_where('dj_mst',$where);
		return $result;
	}
	function laporan_sasaran_1($where){
		$sql = "
			select 
			 djm.ruas,djm.sub_ruas,djm.nama,djm.wilayah_id,
			 djk.start,djk.end,djk.panjang_jalan,djk.baik,djk.sedang,djk.rusak_ringan,djk.rusak_berat
			from (select * from dj_kondisi where triwulan = $where[triwulan] and tahun = $where[tahun]) djk
			right join dj_mst djm on djk.dj_mst_id = djm.id
			order by ruas,sub_ruas asc
		";
		return $this->db->query($sql)->result_array();
	}
	function laporan_sasaran_2($where){
		$isWhere = "where tahun = $where[tahun] and triwulan = $where[triwulan]";
		echo $sql = "
			select  m.wilayah_id,m.ruas,m.sub_ruas,m.nama,m.vcr,m.lhrt,
					k.start ks,k.end ke,k.panjang_jalan kpj,k.memenuhi k_memenuhi,k.tidak_memenuhi k_tidak_memenuhi,
					lbkn.start lbkns,lbkn.end lbkne,lbkn.panjang_jalan lbknpj,lbkn.memenuhi lbkn_memenuhi,lbkn.tidak_memenuhi lbkn_tidak_memenuhi,
					lbkr.start lbkrs,lbkr.end lbkre,lbkr.panjang_jalan lbkrpj,lbkr.memenuhi lbkr_memenuhi,lbkr.tidak_memenuhi lbkr_tidak_memenuhi,
					ljll.start ljlls,ljll.end ljlle,ljll.panjang_jalan ljllpj,ljll.memenuhi ljll_memenuhi,ljll.tidak_memenuhi ljll_tidak_memenuhi,
					bp.panjang_jalan bp_panjang_jalan,bp.memenuhi bp_memenuhi,bp.tidak_memenuhi bp_tidak_memenuhi
			from (select * from dj_kelandaian $isWhere) k 
			left join (select * from dj_lebar_bahu_kanan $isWhere) lbkn 
					on k.dj_mst_id = lbkn.dj_mst_id and k.tahun = lbkn.tahun and k.triwulan = lbkn.triwulan
			left join (select * from dj_lebar_bahu_kiri $isWhere) lbkr 
					on lbkn.dj_mst_id = lbkr.dj_mst_id and lbkn.tahun = lbkr.tahun and lbkn.triwulan = lbkr.triwulan
			left join (select * from dj_lebar_jalur_lalu_lintas $isWhere) ljll 
					on lbkr.dj_mst_id = ljll.dj_mst_id and lbkr.tahun = ljll.tahun and lbkr.triwulan = ljll.triwulan
			left join (select * from dj_bangunan_pelengkap $isWhere) bp 
					on ljll.dj_mst_id = bp.dj_mst_id and ljll.tahun = bp.tahun and ljll.triwulan = bp.triwulan
			right join dj_mst m 
					on k.dj_mst_id = m.id
		";
		return $this->db->query($sql)->result_array();
	}
}
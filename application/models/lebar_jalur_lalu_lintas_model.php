<?php
class lebar_jalur_lalu_lintas_model extends MY_Model {

    protected $table = 'dj_lebar_jalur_lalu_lintas';
    protected $table_detail = 'lebar_jalur_lalu_lintas_detail';
	
	function __construct(){
        parent::__construct();
    }
	
	public function upload_data(){
		$this->load->helper('file');
		$this->load->file('plugins/excel.php');
		$this->load->library('uuidclass');
		$uuid =  $this->uuidclass->v4();
		error_reporting(E_ALL ^ E_NOTICE);
		$triwulan 	= $this->input->post('triwulan');
		$tahun 		= $this->input->post('tahun');
		$master		= $this->input->post('master');
		$fileTmpName 	= $_FILES['fileupload']['tmp_name'];
		
		@$data 	= new Spreadsheet_Excel_Reader($fileTmpName);
		$row 	= 5;
		$col 	= 5;
		
		$where = array(
			'triwulan'=>$triwulan,
			'tahun'=>$tahun,
			'dj_mst_id'=>$master,
		);
		/*get LHRT*/
		$this->load->model('mst_model');
		$lhrt = $this->mst_model->getLhrt($master);
		/*END*/
		
		$this->db->trans_begin();
		
		$kondisi['id'] = $uuid;
		$kondisi['triwulan'] = $triwulan;
		$kondisi['tahun'] = $tahun;
		$kondisi['dj_mst_id'] = $master;
		$kondisi['created_by'] = $this->session->userdata('id');
		
		$cek = $this->db->get_where($this->table,$where);
		if($cek->num_rows() > 0){
			$rs = $cek->row_array();
			$this->db->where('kondisi_id',$rs['id']);
			$this->db->delete($this->table_detail);
			$uuid = $rs['id'];
		}else{
			$this->db->insert($this->table,$kondisi);
		}
		
		unset(
			$kondisi['id'],
			$kondisi['triwulan'],
			$kondisi['tahun'],
			$kondisi['dj_mst_id']
		);
		
		$kondisi['kondisi_id'] = $uuid;
		$no = 1;
		$replace = array("*"," ");
		$nilai = 0;
		$memenuhi = 0;
		$tidakMemenuhi = 0;
		
		while($row++){
			$kondisi['urutan'] 			= $no;
			$kondisi['dari_1'] 			= trim($data->val($row,$col));
			$kondisi['dari_2'] 			= trim($data->val($row,$col+2));
			$kondisi['sd_1'] 			= trim($data->val($row,$col+4));
			$kondisi['sd_2'] 			= trim($data->val($row,$col+6));
			$kondisi['panjang_jalan'] 	= trim(str_replace($replace,'',$data->val($row,$col+7)));
			$kondisi['nilai']			= trim($data->val($row,$col+8));
			if($lhrt >= TCODE_RAYA_SEDANG){
				if($kondisi['nilai'] >= 14){
					$memenuhi += $kondisi['panjang_jalan'];
				}else{
					$tidakMemenuhi += $kondisi['panjang_jalan'];
				}
			}else{
				if($kondisi['nilai'] >= 7){
					$memenuhi += $kondisi['panjang_jalan'];
				}else{
					$tidakMemenuhi += $kondisi['panjang_jalan'];
				}
			}
			/*Dari*/
			if($no == 1){ $dari = $kondisi['dari_1'].".".$kondisi['dari_2']; }
			/*End*/
			$no++;
			if(empty($kondisi['dari_1'])){
				/*Sd*/
				$kondisi['sd_1'] 		= trim($data->val($row-1,$col+4));
				$kondisi['sd_2'] 		= trim($data->val($row-1,$col+6));
				$sd = $kondisi['sd_1'].".".$kondisi['sd_2'];
				/*End*/
				break;
			}else{
				$this->db->insert($this->table_detail,$kondisi);
			}
		}
		$panjang_jalan 	= trim(str_replace($replace,'',$data->val($row+1,$col+7)));
		$nilai 			= trim(str_replace($replace,'',$data->val($row+1,$col+8)));
		$update = array(
			'start' 		=> $dari,
			'end'			=> $sd,
			'panjang_jalan'	=> $panjang_jalan,
			'memenuhi'		=> $memenuhi,
			'tidak_memenuhi'=> $tidakMemenuhi,
			'modified_by'	=> $this->session->userdata('id'),
		);
		$this->db->where('id',$uuid);
		$this->db->update($this->table,$update);
		
		if($this->db->trans_status() === false){
			$this->db->trans_rollback();
			echo json_encode(array('msg'=>'Gagal disimpan'));
		}else{
			$this->db->trans_commit();
			echo json_encode(array('success'=>'Tersimpan','data'=>$arrTidakMemenuhi));
		}
	}
}
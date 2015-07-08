<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function get_hari_all(){
    return array(
        '1'=>'Senin',
        '2'=>'Selasa',
        '3'=>'Rabu',
        '4'=>'Kamis',
        '5'=>"Jum'at",
        '6'=>'Sabtu',
        '7'=>'Minggu'
        );
}
function get_hari_all2(){
    return array(
        '1'=>'Senin',
        '2'=>'Selasa',
        '3'=>'Rabu',
        '4'=>'Kamis',
        '5'=>"Jum'at",
        '6'=>'Sabtu',
        );
}

function get_bulan_all($getBulan=null){
    $bulan=array(
        '01'=>'Januari',
        '02'=>'Februari',
        '03'=>'Maret',
        '04'=>'April',
        '05'=>'Mei',
        '06'=>'Juni',
        '07'=>'Juli',
        '08'=>'Agustus',
        '09'=>'September',
        '10'=>'Oktober',
        '11'=>'November',
        '12'=>'Desember'
    );
	if($getBulan == null)
		return $bulan;
	else{
		$i = $getBulan;
		if($getBulan < 10) $i = $getBulan;
		return $bulan[$i];
	}
}

function dateToIndo($date="",$day=false,$time=false){

    $bulan=get_bulan_all();
    $hari=get_hari_all();
    $d=date('d',  strtotime($date));
    $m=date('m',  strtotime($date));
    $y=date('Y',  strtotime($date));
    $n=date('N',  strtotime($date));
    $t=date('H:i', strtotime($date));
    if($day)
        $date = $hari[$n].", ".$d." ".$bulan[$m]." ".$y." ";
    else
        $date = $d." ".$bulan[$m]." ".$y." ";
        
    if($time)
        $date .= $t;
        
    return $date;
}

function dateIndo($date=0,$day=false,$time=false,$format=0){ // 0=01 Januari 1970,1 = 01/01/1970
    $bulan=get_bulan_all();
    $hari=get_hari_all();
    $d=date('d',$date);
    $m=date('m',$date);
    $y=date('Y',$date);
    $n=date('N',$date);
    $t=date('H:i',$date);
    if($day){
        switch($format){
            case 0 : $date = $hari[$n].", ".$d." ".$bulan[$m]." ".$y." ";
            break;
            case 1 : $date = "$hari[$n], $d/$m/$y ";
        }
    }else{
        $date = $d." ".$bulan[$m]." ".$y." ";
    }    
    if($time)
        $date .= $t;
        
    return $date;
}

function numIndo($num,$precision=2,$decimal=',',$thousand='.'){
	return number_format($num,$precision,$decimal,$thousand);
}
function terbilang($x){
  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return Terbilang($x - 10) . " belas";
  elseif ($x < 100)
    return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
  elseif ($x < 200)
    return " seratus" . Terbilang($x - 100);
  elseif ($x < 1000)
    return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
  elseif ($x < 2000)
    return " seribu" . Terbilang($x - 1000);
  elseif ($x < 1000000)
    return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
  elseif ($x < 1000000000)
    return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
}
function triwulan(){
	$array = array();
	$array[] = array('id'=>1, 'nama'=>'Triwulan 1');
	$array[] = array('id'=>2, 'nama'=>'Triwulan 2');
	$array[] = array('id'=>3, 'nama'=>'Triwulan 3');
	$array[] = array('id'=>4, 'nama'=>'Triwulan 4');
	return $array;
}
function combobox($array){
	$option = "";
	foreach($array as $row){
		$option .= "<option value='$row[id]'>$row[nama]</option>";
	}
	return $option;
}
function numFormat($num){
	if(is_numeric($num)){
		return number_format($num,3,',','.');
	}elseif($num == 0){
		return "<center>-</center>";
	}else{
		return $num;
		
	}	
}
function numIndoNull($num,$precision=3){
	if($num > 0){
		return number_format($num,$precision,',','.');
	}else{
		return "";
	}
}
function generateRandomString($length = 4) {
    return substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}
function statusOrder($value='')
{
    $data = array(
        1=>'New Order',
        2=>'Terbayar',
        3=>'Packing',
        4=>'Pengiriman',
        5=>'Selesai',
        );
    if($value)
        return $data[$value];
    else
        return $data;
}
function colorStatusOrder($id=''){
    $data = array(
        1=>'bg-blue',
        2=>'bg-green',
        3=>'bg-olive',
        4=>'bg-orange',
        5=>'bg-marron',
        );
    if($id)
        return $data[$id];
    else
        return $data;
}
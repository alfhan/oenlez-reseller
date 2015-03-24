<script>
function dateToIndo(tgl){
    var newDate = tgl.split('-');
	var tgl = newDate[2];
	var bln = newDate[1];
	var thn = newDate[0];
	return tgl+' - '+bulan(bln)+' - '+thn;
}
function bulan(bln){
	
    bulan['01'] = 'Januari'
    bulan['02'] = 'Februari';
	bulan['03'] = 'Maret';
    bulan['04'] = 'April';
	bulan['05'] = 'Mei';
	bulan['06'] = 'Juni';
	bulan['07'] = 'Juli';
	bulan['08'] = 'Agustus';
	bulan['09'] = 'September';
	bulan['10'] = 'Oktober';
	bulan['11'] = 'November';
	bulan['12'] = 'Desember'
	return bulan[bln];
}
</script>
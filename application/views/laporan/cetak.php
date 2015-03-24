<!DOCTYPE html>
<html>
<head>
	<title>T-Code => Data Jalan::Cetak</title>
</head>
<style>
	body{
		font-size:13px;
	}
</style>
<body>
<table width="100%" rules="all" border="1">
	<tr>
		<th colspan="3">Urut</th>
		<th colspan="2">Baru</th>
		<th rowspan="3">Nama Ruas</th>
		<th rowspan="3" colspan="3">Dari Km s/d Km</th>
		<th width="50" rowspan="3">Panjang Jalan<br/>(KM)</th>
		<th colspan="4">Kondisi Jalan</th>
		<th rowspan="3">Ket</th>
	</tr>
	<tr>
		<th rowspan="2" width="35">Urut</th>
		<th rowspan="2" width="35">Ruas</th>
		<th rowspan="2" width="35">Sub Ruas</th>
		<th rowspan="2" width="35">Ruas</th>
		<th rowspan="2" width="35">Sub Ruas</th>
		<th rowspan="2" width="50">Baik (KM)</th>
		<th rowspan="2" width="50">Sedang (KM)</th>
		<th rowspan="2" width="50">R. Ringan (KM)</th>
		<th rowspan="2" width="50">R. Berat (KM)</th>
	</tr>
	<tr></tr>
	<tr>
		<?php for($i=1;$i<=13;$i++){?>
			<?php if($i == 7){ ?>
			<th colspan="3" ><?php echo $i;?></th>
			<?php }else{ ?>
			<th><?php echo $i;?></th>
			<?php } ?>
		<?php } ?>
	</tr>
	<?php foreach($mode1 as $r){ ?>
	<tr>
		<td><?php echo $r['no_urut'];?></td>
		<td><?php echo $r['ruas_lama'];?></td>
		<td><?php echo $r['sub_lama'];?></td>
		<td><?php echo $r['ruas_baru'];?></td>
		<td><?php echo $r['sub_baru'];?></td>
		<td><?php echo $r['nama'];?></td>
		<td width="100"><?php echo $r['txt_dari_sd'];?></td>
		<td width="50"><?php echo $r['dari_km'];?></td>
		<td width="50"><?php echo $r['sd_km'];?></td>
		<td><?php echo $r['panjang_jalan'];?></td>
		<td><?php echo $r['kondisi_jalan_baik'];?></td>
		<td><?php echo $r['kondisi_jalan_sedang'];?></td>
		<td><?php echo $r['kondisi_jalan_ringan'];?></td>
		<td><?php echo $r['kondisi_jalan_berat'];?></td>
		<td><?php echo $r['keterangan'];?></td>
	</tr>
	<?php } ?>
</table>
</body>
</html>
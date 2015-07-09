<!DOCTYPE html>
<html>
<head>
	<title>Cetak</title>
	<style type="text/css">
	body{
		width: 780px;
		font-size: 13px;
		font-family: Calibri;
		margin: auto;
	}
	@media print{
		body{
			width: 100%;
		}
	}
	</style>
</head>
<body>
<h3>
	<center>
		Rekap Penjualan
		<br />
		Periode 
		<?php if(isset($tgl1) and isset($tgl1)){ ?>
		<?=dateToIndo($tgl1)?> - <?=dateToIndo($tgl2)?>
		<?php } ?>
	</center>
</h3>
<table width="100%" rules="all" border="1">
	<thead>
		<tr>
			<th width="25">No</th>
			<th width="100">Tanggal</th>
			<th width="75">No Invoice</th>
			<th>Tujuan</th>
			<th width="100">Total Pembelian</th>
			<th width="100">Biaya Kirim</th>
			<th width="75">Total</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$no=1;
		foreach ($data->result_array() as $r) {
	?>
		<tr>
			<td><?=$no++;?></td>
			<td><?=dateToIndo($r['tanggal'])?></td>
			<td align="center"><?=$r['no_invoice']?></td>
			<td>
				<?=$r['provinsi_nama']?> / <?=$r['kabkota_nama']?> / <?=$r['kecamatan_nama']?>
				<br />
				<?=$r['alamat']?>, <?=$r['kode_pos']?>
			</td>
			<td align="right"><?=numIndoNull($r['total'],0)?></td>
			<td align="center"><b><?=$r['kurir_nama']?></b><br /><?=numIndoNull($r['harga_kirim'],0)?></td>
			<td align="right"><?=numIndoNull($r['total']+$r['harga_kirim'],0)?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
</body>
</html>
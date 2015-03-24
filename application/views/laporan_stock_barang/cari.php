<b>Tanggal : <?=dateToIndo(date("Y-m-d"))?></b>
<br />
<b>Jenis Barang (<?=$jenis->nama?>)</b>
<hr />
<table class="table table-bordered" style="font-size:12px">
	<tr bgcolor="#F4543C">
		<th><center>Kode Barang</center></th>
		<th><center>Nama Barang</center></th>
		<th><center>Harga Beli</center></th>
		<th><center>Harga Jual</center></th>
		<th><center>Stock</center></th>
	</tr>
	<?php foreach ($data as $r) { ?>
	<tr>
		<td><?=$r['kode_barang']?></td>
		<td><?=$r['nama']?></td>
		<td align="right">Rp<?=numIndoNull($r['harga_beli'],0)?></td>
		<td align="right">Rp<?=numIndoNull($r['harga_jual'],0)?></td>
		<td align="center"><?=$r['qty']?></td>
	</tr>
	<?php } ?>
</table>
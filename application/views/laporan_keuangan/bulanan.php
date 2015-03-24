<table class="table table-bordered" style="font-size:12px">
	<tr>
		<th>Tanggal</th>
		<th>No Trx</th>
		<th>Kode Barang</th>
		<th>Harga Jual</th>
		<th>Qty</th>
		<th>Sub Total</th>
	</tr>
	<?php 
		$total = 0;
		$qtyTotal = 0;
		foreach ($data->result_array() as $r) { 
			$subTotal = $r['qty'] * $r['harga'];
			$total += $subTotal;
			$qtyTotal += $r['qty'];
	?>
	<tr>
		<td><?=$r['tanggal']?></td>
		<td><?=$r['no_trx']?></td>
		<td><?=$r['kode_barang']?></td>
		<td><?=numIndoNull($r['harga'],0)?></td>
		<td><?=$r['qty']?></td>
		<td><?=numIndoNull($subTotal,0)?></td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="4" align="right"><b>Grand Total</b></td>
		<td align="center"><b><?=$qtyTotal?></b></td>
		<td align="rigth"><b>Rp<?=numIndoNull($total,0)?></b></td>
	</tr>
</table>
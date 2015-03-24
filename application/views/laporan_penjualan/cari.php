<table class="table table-bordered" style="font-size:12px">
	<tr>
		<th>No Transaksi</th>
		<th>Tanggal Penjualan</th>
		<th>Total</th>
		<th>Cetak</th>
	</tr>
	<?php foreach ($data->result_array() as $r) { ?>
	<tr>
		<td><?=$r['no_trx']?></td>
		<td><?=dateToIndo($r['tanggal'])?></td>
		<td><?=numIndoNull($r['total'],0)?></td>
		<td>
			<a target="_blank" href="<?=$urlCetak.'/'.$r['id']?>" class="btn btn-info btn-sm">
				<i class="fa fa-print"></i>
				Cetak
			</a>
		</td>
	</tr>
	<?php } ?>
</table>
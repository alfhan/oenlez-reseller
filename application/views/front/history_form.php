<table id="tb" class="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>No Invoice</th>
			<th>Total</th>
			<th>Penerima</th>
			<th>Detail</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$n=1; 
	foreach ($data->result_array() as $r) {
		echo "<tr>
		<td>$n</td>
		<td>".dateToIndo($r['tanggal'])."</td>
		<td>$r[no_invoice]</td>
		<td>$r[total]</td>
		<td>$r[nama]</td>
		<td><a href='".site_url('product/invoice')."/$r[id]' class='btn btn-xs btn-info'><i class='fa fa-search'></i> Detail</a></td>
		</tr>";
		$n++;	
	}
	?>
	</tbody>
</table>
<script type="text/javascript">
	
</script>
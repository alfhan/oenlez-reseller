<?php
	$xberat = ($berat/1000);
?>
<tr>
	<th><center>Jasa Kurir</center></th>
	<th><center>Harga (Rp)</center></th>
	<th><center>EST (Day)</center></th>
</tr>
<tr>
	<td colspan="3"><b>Total Berat <?=$xberat?> Kg</b></td>
</tr>
<?php
	foreach ($data as $r) {
		$n = $r['harga'];
		if($xberat > $r['berat']){
			$b = ($xberat/$r['berat']);
			$c = ceil($b);
			$n = $r['harga']*$c;
		}
		$harga = number_format($n,0,',','.');
		echo "<tr>
		<td>
			<input type='radio' name='harga_kirim_id' value='$r[kurir_id]' checked='true' /> <label>$r[kurir_nama]</label>
		</td>
		<td><center>$harga</center></td>
		<td><center>$r[est]</center></td>
		</tr>";
	}
?>
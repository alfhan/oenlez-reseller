<!DOCTYPE html>
<html>
<head>
	<title>Cetak Invoice</title>
	<style type="text/css">
	body{
		font-family: calibri;
		font-size: 13px;
	}
	</style>
</head>
<body>
	<h3>Pengirim</h3>
	<table width="100%" border="1" rules="all">
		<tr>
			<td width="150">No Customers</td>
			<td><?=$list[0]['no_pelanggan']?></td>
			<td width="150">Nama Pelanggan</td>
			<td><?=$list[0]['pelanggan_nama']?></td>
		</tr>
		<tr>
			<td>Alamat Pelanggan</td>
			<td><?=$list[0]['pelanggan_alamat']?></td>
			<td>Username/Email</td>
			<td><?=$list[0]['username']?></td>
		</tr>
	</table>
	<h3>Invoice & Pengiriman</h3>
    <table width="100%" border="1" rules="all">
      <tr>
        <th width="50%">No Invoice <i style="color:red"><u>#<?=$list[0]['no_invoice']?></u></i></th>
        <th>Status Invoice : <i style="color:red"><u><?=statusOrder($list[0]['status_order'])?></u></i></th>
      </tr>
      <tr>
        <td valign="top">
          <?=$list[0]['nama'];?>
          <br />
          <?=$list[0]['alamat'];?> <?=$list[0]['kode_pos'];?>
          <br />
          <?=$list[0]['provinsi_nama'];?> - <?=$list[0]['kabkota_nama'];?> - <?=$list[0]['kecamatan_nama'];?>
        </td>
        <td></td>
      </tr>
    </table>
    <h3>Detail Invoice</h3>
    <table width="100%" rules="all" border="1">
      <tr>
        <th><center>Items</center></th>
        <th width="120"><center>Harga</center></th>
        <th width="120"><center>Jumlah (Rp)</center></th>
      </tr>
      <?php 
      $subT = 0;

      foreach ($list as $r) {
        $jml = $r['harga']*$r['qty'];
        $subT += $jml;
        echo "<tr>
        <td>$r[barang_kode] - $r[barang_nama] - Qty : $r[qty]</td>
        <td align='right'>".numIndo($r['harga'],0)."</td>
        <td align='right'>".numIndo($jml,0)."</td>
        </tr>";  
      }
      $total = $list[0]['harga_kirim']+$subT;
      ?>
      <tr>
        <td colspan="2" align="right">Sub Total (Rp)</td>
        <td align="right"><b><?=numIndo($subT,0)?></b></td>
      </tr>
      <tr>
        <td colspan="2" align="right">Delivery (Rp)</td>
        <td align="right"><b><?=numIndo($list[0]['harga_kirim'],0)?></b></td>
      </tr>
      <tr>
        <td colspan="2" align="right">Total (Rp)</td>
        <td align="right"><b><?=numIndo($total,0)?></b></td>
      </tr>
    </table>
</body>
</html>
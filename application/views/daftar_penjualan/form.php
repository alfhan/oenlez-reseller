<section class="content-header">
	<h1><?=$title?></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-shopping-cart"></i> Sales Mangement</a></li>
        <li><a href="<?php echo base_url($link);?>"><i class="fa fa-angle-double-right"></i> {title}</a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title"><?=$title?></h3>
				</div>
				<div class="box-body">
				<h3>Pengirim</h3>
				<form id="x">
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
				</form>
				<h3>Invoice</h3>
				<form id="myForm">
					<input type="hidden" name="id" value="<?=$list[0]['id']?>">
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
			            <td valign="top" align="center">
				            <label class="col-md-3">Update Status</label>
				            <div class="col-md-3">
				              <select class="form-control input-sm" name="status_order" id="status_order">
				              	<?php
				              	foreach (statusOrder() as $key => $value) {
				              		if($key == $list[0]['status_order']){
				              			$sl = "selected='selected'";
				              		}else{
				              			$sl = "";
				              		}
				              		echo "<option value='$key' $sl>$value</option>";
				              	}
				              	?>
				              </select>
				            </div>
				            <div class="col-md-6">
				            	<a href="<?=base_url('daftar_penjualan');?>" class="btn btn-sm btn-info"><i class="fa fa-angle-double-left"></i> Kembali</a>
						<a href="javascript:void(0)" class="btn btn-sm btn-primary save-click pull-right"><i class="fa fa-save"></i> Simpan</a>
						<a href="javascript:void(0)" class="btn btn-sm btn-success cetak-click pull-right"><i class="fa fa-print"></i> Cetak</a>
				            </div>
			            </td>
			          </tr>
			        </table>
		        </form>
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
				</div>
				<div class="box-footer">
					
				</div>
			</div>
		</div>
	</div>
</section>
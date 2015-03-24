<table class="table table-bordered">
	<tr>
		<th>#</th>
		<th>QTY/Beli</th>
	</tr>
	<?php foreach($data as $r){ ?>
	<tr>
		<td>
			<img src="<?=base_url().FILE_BARANG.$r['foto']?>" height="100" style="float:left;margin:5px" />
			<b><?=$r['kode_barang']?></b>
			<br />
			<b><?=$r['nama']?></b>
			<br />
			<?=nl2br($r['keterangan'])?>
		</td>
		<td>
			<b>Rp<?=numIndoNull($r['harga_jual'],0)?>,-</b>
			<br />
			<b>Stock : <?=$r['qty']?></b>
			<br />
			<?php if($r['qty'] > 0){?>
			<a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="beliClick('<?=$r['id'];?>')">
				<i class="fa fa-shopping-cart"></i> Beli &nbsp;
			</a>
			<?php } ?>
		</td>
	</tr>
	<?php } ?>
</table>
<script>
var errorStock = bootbox.dialog({
  title: "ERROR. . .",
  message: "<div class='alert alert-danger alert-dismissable'>"+
                "<i class='fa fa-ban'></i>"+
                "<b>Alert!</b> Stok tidak cukup"+
            "</div>",
  closeButton: true,
  show: false,
});
function beliClick(id) {
	$.ajax({
		type:'POST',
		data:{id:id,mode:0},
		url:'<?=$urlBeli?>',
		success:function(r){
			if(r){
				$('.trx').html(r);
			}else{
				errorStock.modal('show');
			}
		}
	})
}
</script>
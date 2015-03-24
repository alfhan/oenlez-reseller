<table class="table table-bordered" style="font-size:12px">
	<tr>
		<th>Item</th>
		<th width="75">Sub Total</th>
	</tr>
	<?php 
		$total = 0;
		foreach($data as $r){ 
	?>
	<tr>
		<td>
			<?=$r['kode_barang'];?> / <?=$r['nama_barang'];?> @<?=numIndoNull($r['harga'],0)?> / 
			<?=$r['qty']?>pc
		</td>
		<td style="text-align:right">
			<?php
				$sub_total = $r['harga']*$r['qty'];
				$total += $sub_total;
			?>
			Rp<?=numIndoNull($sub_total,0)?>
			<button class="btn btn-xs btn-danger" onclick="deleteClick('<?=$r['barang_id']?>')">
				<i class="fa fa-minus"></i>
			</button>
			<button class="btn btn-xs btn-warning" onclick="decrimentClick('<?=$r['barang_id']?>','<?=$r['qty']?>')">
				<i class="fa fa-angle-double-down"></i>
			</button>
		</td>
	</tr>
	<?php } ?>
	<tr>
		<td><b>Total</b></td>
		<td style="text-align:right;font-weight:bold">
			<input type="hidden" value="<?=$total?>" id="grand_total"/>
			Rp<?=numIndoNull($total,0)?>
		</td>
	</tr>
	<?php if($total > 0){ ?>
	<tr>
		<td>Bayar</td>
		<td>
			<input name="bayar" id="bayar" class="form-control input-sm" />
		</td>
	</tr>
	<tr>
		<td>Kembali</td>
		<td>
			<input name="kembali" id="kembali" class="form-control input-sm" readonly />
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<button class="btn btn-sm btn-primary pull-right" onclick="savePrint()" id="simpan_cetak" disabled>
				<i class="fa fa-print"></i>
				Simpan & Cetak
			</button>
		</td>
	</tr>
	<?php } ?>
</table>
<script>
$("#bayar").change(function(){
	var grand_total = $("#grand_total").val();
	var bayar = $("#bayar").val();
	var kembali = parseInt(bayar) - grand_total;
	$("#kembali").val(kembali);
	if(grand_total > bayar){
		$("#simpan_cetak").attr("disabled","true");
	}else{
		$("#simpan_cetak").removeAttr("disabled");
	}
})
function savePrint() {
	var grand_total = $("#grand_total").val();
	var bayar = $("#bayar").val();
	var kembali = parseInt(bayar) - grand_total;
	$.ajax({
		type:'POST',
		data:{bayar:bayar,grand_total:grand_total,kembali:kembali},
		url:'<?=$saveMove?>',
		success:function(r){
			window.open("<?=base_url($link)?>/cetak/"+r,"_blank");
			window.open("<?=base_url($link)?>","_self");
		},
	});
}
function deleteClick(id) {
	$.ajax({
		type:'POST',
		url:'<?=$urlDeleteItem?>',
		data:{barang_id:id},
		success:function(r){
			window.open("<?=base_url($link)?>","_self");
		},
	});
}
function decrimentClick(id,qty) {
	$.ajax({
		type:'POST',
		url:'<?=$urlDecriment?>',
		data:{barang_id:id,qty:qty},
		success:function(r){
			window.open("<?=base_url($link)?>","_self");
		},
	});
}
</script>
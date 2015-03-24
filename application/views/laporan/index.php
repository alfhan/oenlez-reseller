<div class="easyui-panel" data-options="title:'<?php echo $title;?>',fit:true,border:false" style="padding:10px">
	<form id="frm" enctype="multipart/form-data" method="POST" action="<?php echo $urlCetak;?>" target="_blank">
		<table width="100%">
			<tr>
				<td>Triwulan</td>
				<td colspan="2"> : 
					<select name="triwulan_ke" id="triwulan_ke" style="width:10%;height:25px;">
						<?php for($i=1;$i<=4;$i++){ ?>
						<option value="<?php echo $i?>"><?php echo $i?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td width="100">Tahun</td>
				<td colspan="2"> : 
					<select id="tahun" name="tahun" style="width:10%;height:25px;">
						<?php foreach($tahun as $r){ ?>
						<option value="<?php echo $r['tahun'];?>"><?php echo $r['tahun'];?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Model</td>
				<td width="200"> : 
					<select name="sasaran" id="sasaran" style="width:90%;height:25px;">
						<option value="sasaran_1">Sasaran 1</option>
						<option value="sasaran_2">Sasaran 2</option>
					</select>
				</td>
				<td>
					<a href="#" onclick="cetak()" class="easyui-linkbutton" data-options="iconCls:'icon-print'"> Cetak</a>
				</td>
			</tr>
		</table>
	</form>
</div>
<script>
function cetak(){
	$("#frm").submit();
}
</script>
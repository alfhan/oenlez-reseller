<div class="easyui-panel" data-options="title:'<?php echo $title;?>',fit:true,border:false" style="padding:10px">
	<form id="frm">
		<input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
		<table width="100%">
			<tr>
				<td class="frm-lable sm-3">Username</td>
				<td>
					<div class="sm-5">
						<input value="<?php echo $row['username'];?>" name="username" maxlength="35" required class="form-control easyui-validatebox" />
					</div>
				</td>
			</tr>
			<tr>
				<td class="frm-lable">Password</td>
				<td>
					<div class="sm-6">
						<input type="password" name="password" maxlength="36" required class="form-control easyui-validatebox" />
					</div>
				</td>
			</tr>
			<tr>
				<td class="frm-lable">Email</td>
				<td>
					<div class="sm-3">
						<input value="<?php echo $row['email'];?>" name="email" maxlength="35" required class="form-control easyui-validatebox" />
					</div>
				</td>
			</tr>
			<tr>
				<td class="frm-lable">No Telp</td>
				<td>
					<div class="sm-3">
						<input value="<?php echo $row['telp'];?>" name="telp" maxlength="15" class="form-control easyui-validatebox" /> 
					</div>
				</td>
			</tr>
			<tr>
				<td class="frm-lable">No HP</td>
				<td>
					<div class="sm-3">
						<input value="<?php echo $row['hp'];?>" name="hp" maxlength="15" required class="form-control easyui-validatebox" />
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<a href="#" class="easyui-linkbutton" onclick="save()" data-options="iconCls:'icon-save'"> Simpan </a>
				</td>
			</tr>
		</table>
	</form>
</div>
<script>
function save(){
	var isValid = $("#frm").form('validate');
	if(isValid){
		$.ajax({
			type:'POST',
			data:$("#frm").serialize(),
			url:'<?php echo base_url("profilku/save");?>',
			success:function(respon){
				var result = eval('('+respon+')');
				if (result.success){
					$.messager.show({
						title: 'Success',
						msg: result.success
					});
				}else{
					$.messager.alert('Error',result.msg,'error');
				}
			},
			error:function(respon){
				$.messager.alert('Error','Fatal error, terjadi kesalahan sistem','error');
			}
		});
	}
}
</script>
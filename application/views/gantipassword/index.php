<div class="easyui-panel" data-options="title:'<?php echo $title;?>',fit:true,border:false" style="padding:10px;">
	<form id="frm">
		<input type="hidden" name="id" value="<?php echo $user['id'];?>" />
		<table width="100%">
			<tr>
				<td>Password Baru</td>
				<td>
					<input type="password" id="passwordbaru" name="passwordbaru" class="easyui-validatebox" required/>
				</td>
			</tr>
			<tr>
				<td>Konfirmasi Password</td>
				<td>
					<input name="passwordagain" id="passwordagain" type="password" class="easyui-validatebox" required/>
				</td> 
			</tr>
			<tr>
				<td colspan="2">
					<a href="#" class="easyui-linkbutton" iconCls="icon-save" onclick="simpan()">Simpan</a>
				</td>
			</tr>
		</table>
	</form>
</div>
<?php $this->load->view("$url/js");?>
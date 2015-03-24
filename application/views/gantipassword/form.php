<div id="dlg" class="easyui-dialog" data-options="chace:false,closed:true,title:'Jabatan',modal:true" style="width:400px;height:200px;padding:10px;">
<div class="ftitle"><center>JABATAN</center></div>
	<form id="frm">
		<input type="hidden" name="id" />
		<table width="100%">
			<tr>
				<td>Nama Jabatan</td>
				<td>
					<input name="nama" class="easyui-validatebox" required/>
				</td>
			</tr>
			<tr>
				<td>Pendapatan</td>
				<td>
					<input name="gajipokok" class="easyui-numberbox" 
					data-options="precision:2,decimalSeparator:',',groupSeparator:'.'" required/>
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
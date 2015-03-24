<div id="dlg" class="easyui-dialog" data-options="chace:false,closed:true,title:'User Management',modal:true" style="width:700px;height:250px;padding:10px;">
<div class="ftitle"><center>USER MANAGEMENT</center></div>
	<form id="frm">
		<input type="hidden" name="id" />
		<table width="100%">
			<tr>
				<td>Username</td>
				<td><input name="username" required class="easyui-validatebox" /></td>
				<td>Nama</td>
				<td><input name="nama" required class="easyui-validatebox" /></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" class="easyui-validatebox" required/></td>
				<td>Email</td>
				<td><input name="email" type="email" /></td>
			</tr>
			<tr>
				<td>No Telp</td>
				<td><input name="telp" /></td>
				<td>No HP</td>
				<td><input name="hp" /></td>
			</tr>
			<tr>
				<td>Hak Akses</td>
				<td>
					<select name="group_id" class="easyui-combobox" required>
						<?php foreach($group_id as $r){ ?>
						<option value="<?php echo $r['id'];?>"><?php echo $r['nama'];?></option>
						<?php } ?>
					</select>
				</td>
				<td>UPT</td>
				<td>
					<select name="upt_id" class="easyui-combobox" required>
						<?php foreach($upt as $r){ ?>
						<option value="<?php echo $r['id'];?>"><?php echo $r['nama'];?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<a href="#" class="easyui-linkbutton" iconCls="icon-save" onclick="simpan()">Simpan</a>
				</td>
			</tr>
		</table>
	</form>
</div>
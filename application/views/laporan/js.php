<script>
$(document).ready(function(){
	$("#dg").datagrid({
		url:'<?php echo base_url("$url/datagrid");?>',
		columns:[[
			{field:'kode',title:'Kode',halign:'center',width:150},
			{field:'nama',title:'Nama',halign:'center',width:150},
		]],
		singleSelect:false,
		striped:true, 
		fit:true,
		border:true,
		fitColumns:true,
		rownumbers:true,
		singleSelect:true,
		pagination:true,
		pageList:[25,50,75,100],
		sortOrder:'asc',
		sortName:'kode',
		toolbar:'#tb'
	});
});

function baru(){
	$('#frm').form('clear');
	$("#dlg").dialog('open');
}
function ubah(){
	var row = $('#dg').datagrid('getSelected');
	if (row){
		$('#frm').form('load',row);
	}
	$("#dlg").dialog('open');
}
function simpan(){
	var isValid = $("#frm").form('validate');
	if(isValid){
		$.ajax({
			type:'POST',
			url:'<?php echo base_url("$url/save");?>',
			data:$('#frm').serialize(),
			success: function(result){
				var result = eval('('+result+')');
				if (result.success){
					$('#dg').datagrid('reload');
					$.messager.show({
						title: 'Success',
						msg: result.success
					});
					$("#dlg").dialog('close');
				}else{
					$.messager.alert('Error',result.msg,'error');
				}
			}
		});
	}
}
function hapus(){
	var row = $('#dg').datagrid('getSelected');
	if (row){
		$.messager.confirm('Konfirmasi','Yakin akan menghapus data ini?',function(r){
			if (r){
				$.ajax({
					type:'POST',
					url:'<?php echo base_url("$url/delete");?>',
					data:{id:row.id},
					success: function(result){
						var result = eval('('+result+')');
						if (result.success){
							$('#dg').datagrid('reload');
							$.messager.show({
								title: 'Success',
								msg: result.success
							});
							$("#dlg").dialog('close');
						}else{
							$.messager.alert('Error',result.msg,'error');
						}
					},
					error:function(respon){
						$.messager.alert('Error','Prosedur anda salah','error');
					}
				});
			}
		});
	}
}
</script>
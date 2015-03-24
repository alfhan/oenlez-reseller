<script>
var saveFormDg = function(idForm,linkSave,idDg){
	var isValid = $(idForm).form('validate');
	if(isValid){
		$.ajax({
			beforeSend:function(r){
				$.messager.progress();
			},
			type:'POST',
			url:linkSave,
			data:$(idForm).serialize(),
			success: function(result){
				var result = eval('('+result+')');
				if (result.success){
					$.messager.show({
						title: 'Success',
						msg: result.success
					});
				}else{
					$.messager.alert('Error',result.msg,'error');
				}
				$.messager.progress('close');
				$(idDg).datagrid();
			},
			error:function(respon){
				$.messager.progress('close');
				$.messager.alert('Error','Prosedur penggunaan anda salah','error');
				$(idDg).datagrid();
			}
		});
	}
};
var deleteDg = function(linkDelete,idDg){
	var row = $(idDg).datagrid('getSelected');
	if (row){
		$.messager.confirm('Konfirmasi','Anda yakin akan menghapus data ini?',function(r){
			if (r){
				$.ajax({
					beforeSend:function(r){
						$.messager.progress();
					},
					type:'POST',
					url: idDg,
					data:{id:row.id},
					success: function(result){
						var result = eval('('+result+')');
						if (result.success){
							$.messager.show({
								title: 'Success',
								msg: result.success
							});
						}else{
							$.messager.alert('Error',result.msg,'error');
						}
						$.messager.progress('close');
						$(idDg).datagrid('reload');
					},
					error:function(respon){
						$.messager.progress('close');
						$.messager.alert('Error','Prosedur penggunaan anda salah','error');
						$(idDg).datagrid('reload');
					}
				});
			}
		});
	}
};
</script>
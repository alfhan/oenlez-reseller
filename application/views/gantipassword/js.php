<script>
function simpan(){
	var passwordbaru = $("#passwordbaru").val();
	var passwordagain = $("#passwordagain").val();
	if(passwordbaru == passwordagain){
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
				},
				error:function(respon){
					$.messager.alert('Error','Ada prosedur anda yang salah','error');
				}
			});
		}
	}else{
		$.messager.alert('Error','Password anda tidak sama','error');
	}
}
</script>
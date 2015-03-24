<script type="text/javascript">
function cariClick(){
	$.ajax({
		type:'post',
		data:{jenis_barang_id:$("#jenis_barang_id").val()},
		url:'<?=$urlCari?>',
		success:function(r){
			$(".result").html(r)
		}
	})
}
</script>
<script src="<?php echo base_url('adminlte/js/plugins/datepicker/bootstrap-datepicker.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('adminlte/js/bootbox.min.js');?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#tanggal').datepicker({
		format: 'yyyy-mm-dd',
	});
})
function lapClick(param){
	$.ajax({
		type:'post',
		data:$("#frm_"+param).serialize(),
		url:'<?=$urlCari?>/'+param,
		success:function(r){
			$(".result").html(r)
		}
	});
}
function cetakClick(param){
	$("#frm_"+param).submit();
}
</script>
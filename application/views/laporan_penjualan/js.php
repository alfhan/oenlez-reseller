<script src="<?php echo base_url('adminlte/js/plugins/datepicker/bootstrap-datepicker.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('adminlte/js/bootbox.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('adminlte/js/jquery.form.min.js');?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#tgl_awal,#tgl_akhir').datepicker({
		format: 'yyyy-mm-dd',
	});
})
function cariClick(){
	$.ajax({
		type:'post',
		data:{tgl_awal:$("#tgl_awal").val(),tgl_akhir:$("#tgl_akhir").val()},
		url:'<?=$urlCari?>',
		success:function(r){
			$(".result").html(r)
		}
	})
}
</script>
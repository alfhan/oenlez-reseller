<script type="text/javascript">
$(document).ready(function(){
	$('.datepicker').datepicker({
	    format: 'yyyy-mm-dd',
	});
});
function cetak() {
	var tgl1 = $("#tgl1").val();
	var tgl2 = $("#tgl2").val();
	window.open("<?=site_url('rekap/content_index')?>/"+tgl1+'/'+tgl2,"_blank");
}
</script>
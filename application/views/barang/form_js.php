<script src="<?=base_url('adminlte/js/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('adminlte/js/bootbox.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('adminlte/js/jquery.form.min.js');?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".textarea").wysihtml5();
	$("#is_grosir").change(function(){
		if($(this).val() == 1){
			// $("#harga_jual,#harga_beli").attr("readonly","true");
			$("#grosir").show();
		}else{
			// $("#harga_jual,#harga_beli").removeAttr("readonly");
			$("#grosir").hide();
		}
	});
});
	var berforeSendLoading = bootbox.dialog({
          title: "Loading",
          message: "<div class='progress sm progress-striped active'>"+
                        "<div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='100'"+
                            "aria-valuemin='0' aria-valuemax='100' style='width: 100%'>"+
                            "<span class='sr-only'>Loading</span>"+
                        "</div>"+
                    "</div>",
          closeButton: false,
          show: false,
        });
    var successDialog = bootbox.dialog({
          title: "Success",
          message: "<div class='alert alert-success alert-dismissable'>"+
                        "<i class='fa fa-check'></i>"+
                        "<b>Alert!</b> Success Saved"+
                    "</div>",
          closeButton: true,
          show: false,
        });
    var errorDialog = bootbox.dialog({
          title: "ERROR. . .",
          message: "<div class='alert alert-danger alert-dismissable'>"+
                        "<i class='fa fa-ban'></i>"+
                        "<b>Alert!</b> Error, terjadi kesalahan pada server. hubungi admin aplikasi"+
                    "</div>",
          closeButton: true,
          show: false,
        });
	$(".save-click").click(function(){
		saveClick();
	});
	$(".btn-info").click(function(){
		window.open("<?=base_url('barang')?>","_self");
	});
	function saveClick(){
	    $('#myForm').ajaxSubmit({
	        url:'<?php echo $urlSave;?>',
	        type:'POST',
	        beforeSend:function(r){
	          berforeSendLoading.modal('show');
	        },
	        success:function(r){
	          berforeSendLoading.modal('hide');
	          successDialog.modal('show');
	          window.open("<?=base_url('barang')?>","_self");
	        },
	        error:function(r){
	          berforeSendLoading.modal('hide');
	          errorDialog.modal('show');
	        },
	    }).data('jqxhr').done(function(r){
	        
	    });
	}
</script>
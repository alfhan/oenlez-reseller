<script src="<?php echo base_url('adminlte/js/plugins/datepicker/bootstrap-datepicker.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('adminlte/js/bootbox.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('adminlte/js/jquery.form.min.js');?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.datepicker').datepicker({
		format: 'dd/mm/yyyy',
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
    var errorDialog = bootbox.dialog({
      title: "ERROR. . .",
      message: "<div class='alert alert-danger alert-dismissable'>"+
                    "<i class='fa fa-ban'></i>"+
                    "<b>Alert!</b> Error, terjadi kesalahan pada server. hubungi admin aplikasi"+
                "</div>",
      closeButton: true,
      show: false,
    });
	$("#q").change(function(){
		$.ajax({
			beforeSend:function(r){
				berforeSendLoading.modal('show');
			},
			type:'post',
			data:{q:$("#q").val()},
			url:"<?=$urlCari?>",
			success:function(r){
				var ok = eval("("+r+")");
				berforeSendLoading.modal('hide');
				$("#nama").val(ok.nama);
				$("#qty_awal").text(ok.qty);
				$("#harga_jual_awal").text(ok.harga_jual);
				$("#harga_beli_awal").text(ok.harga_beli);
			},
			error:function(r){
				berforeSendLoading.modal('hide');
          		errorDialog.modal('show');
			}
		})
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
          //window.open("<?php echo base_url($link);?>","_self");
        },
        error:function(r){
          berforeSendLoading.modal('hide');
          errorDialog.modal('show');
        },
    }).data('jqxhr').done(function(r){
        
    });
}
function editClick(id,nama,kode_barang,kode_barcode,foto,jenis_barang_id) {
	$("#id").val(id);
	$("#kode_barang").val(kode_barang);
$("#kode_barang").focus();
	$("#kode_barcode").val(kode_barcode);
	$("#nama").val(nama);
	$("#jenis_barang_id").val(jenis_barang_id);
	$("#old_file").val(foto);
	$("#qty,#harga_jual,#harga_beli").attr("disabled","true");
	$('#modal').modal('show');
}
function addClick(){
	$("#id,#nama,#old_file,#qty,#harga_jual,#harga_beli,#kode_barang,#kode_barcode").val('');
	$("#qty,#harga_jual,#harga_beli").removeAttr("disabled");
	$("#jenis_barang_id").val(1);
$('#modal').modal('show');
}
function deleteClick(id,foto){
	bootbox.confirm("Apakah anda yakin ingin menghapus?", function(result) {
		if (result == true) {
            $.ajax({
            	data:{id:id,foto:foto},
            	type:'POST',
            	url:'<?php echo $urlDelete;?>',
            	success:function(r){
	              berforeSendLoading.modal('hide');
	              successDialog.modal('show');
	              window.open("<?php echo base_url($link);?>","_self");
	            },
	            error:function(r){
	              berforeSendLoading.modal('hide');
	              errorDialog.modal('show');
	            },
            	beforeSend:function(r){
            	  berforeSendLoading.modal('show');
            	}
            });
        }
	});
}
</script>
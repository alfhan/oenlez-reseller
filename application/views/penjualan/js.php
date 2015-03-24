<script src="<?php echo base_url('adminlte/js/bootbox.min.js');?>" type="text/javascript"></script>
<script>
$(document).ready(function(){
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
    $("#saldo_awal").change(function(){
    	var saldo_awal = $("#saldo_awal").val();
    	
    	$.ajax({
    		beforeSend:function(r){
    			berforeSendLoading.modal('show');
    		},
    		type:'POST',
    		data:{nominal:saldo_awal},
    		url:'<?=$urlSaldoAwal?>',
    		success:function(r){
    			var result = eval("("+r+")");
    			if(result.success){
    				$("#saldo_awal").val(result.nominal);
    			}else{
    				errorDialog.modal('hide');
    			}
    			berforeSendLoading.modal('hide');
    		}
    	});
    });
	$("#myForm").submit(function(){
		pencarian($("#q").val());
		return false;
	});
	$("#cari").click(function(){
		pencarian($("#q").val());
	});
	$("#q").change(function(){
		pencarian($("#q").val());
	});
	$("#baru").click(function(){
		$.ajax({
			type:'POST',
			url:'<?=$urlResetCart?>',
			success:function(r){
				window.open("<?=$link?>","_self");
			}
		});
	});
	var pencarian = function(q){
		$.ajax({
			type:'post',
			data:{q:q},
			url:"<?=$urlCari?>",
			success:function(r){
				$(".result").html(r);
				berforeSendLoading.modal('hide');
			},
			error:function(r){
				berforeSendLoading.modal('hide');
          		errorDialog.modal('show');
			},
			beforeSend:function(r){
				berforeSendLoading.modal('show');
			}
		});
	};
	pencarian($("#q").val());
	$.ajax({
		type:'POST',
		url:'<?=$urlViewCart?>',
		success:function(r){
			$('.trx').html(r);
		}
	});

});
</script>
<script src="<?php echo base_url('adminlte/js/bootbox.min.js');?>" type="text/javascript"></script>
<script type="text/javascript">
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
	    var successDialog = bootbox.dialog({
	          title: "Success",
	          message: "<div class='alert alert-success alert-dismissable'>"+
	                        "<i class='fa fa-check'></i>"+
	                        "<b>Alert!</b> Success"+
	                    "</div>",
	          closeButton: true,
	          show: false,
	        });
	    var errorDialog = bootbox.dialog({
	          title: "ERROR. . .",
	          message: "<div class='alert alert-danger alert-dismissable'>"+
	                        "<i class='fa fa-ban'></i>"+
	                        "<b>Alert!</b> Error, terjadi kesalahan pada server. try again"+
	                    "</div>",
	          closeButton: true,
	          show: false,
	        });
		var dt_provinsi = $("#dt-provinsi").DataTable({
			'sDom':"rtip",
			'sort':false,
			"processing": true,
	        "serverSide": true,
	        "ajax": {
	        	"url":"<?=site_url('wilayah/dt_provinsi');?>",
	        	"type": "GET",
	        },
	        "columns": [
	            { "data": null },
	            { "data": "nama" },
	        ],
	        "drawCallback": function(setting){
	        	for (var i = 0, iLen = setting.aiDisplay.length; i < iLen; i++){
			        var start = setting._iDisplayStart+1;
		            $('td:eq(0)', setting.aoData[ setting.aiDisplay[i] ].nTr).html(start+i);
		        }
	        }
		});
		$('#dt-provinsi tbody').on( 'click', 'tr', function () {
	        if($(this).hasClass('active') ) {
	            $(this).removeClass('active');
	        }else{
				dt_provinsi.$('tr.active').removeClass('active');
	            $(this).addClass('active');
			}
	    });
	    $(".edit-provinsi").click(function(){
	    	var row = ( dt_provinsi.rows('.active').data()[0]);
	    	$("#frm-provinsi #id").val(row.id);
	    	$("#frm-provinsi #nama").val(row.nama);
	    });
	    $(".delete-provinsi").click(function(){
	    	var row = ( dt_provinsi.rows('.active').data()[0]);
	    	if(row){
		    	bootbox.confirm("Apakah anda yakin ingin menghapus?", function(result) {
					if (result == true) {
		                $.ajax({
		                	data:{id:row.id},
		                	type:'POST',
		                	url:"<?=$urlDelete?>/provinsi",
		                	success:function(r){
				              berforeSendLoading.modal('hide');
				              successDialog.modal('show');
				              dt_provinsi.ajax.reload();
		    				  $("#frm-provinsi #id").val(0);
		    				  $("#frm-provinsi #nama").val('');
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
	    });
	    $(".save-provinsi").click(function(){
	    	$.ajax({
	    		beforeSend:function(){
	    			berforeSendLoading.modal('show');
	    		},
	    		type:"POST",
	    		url:"<?=$urlSave?>/provinsi",
	    		data:$("#frm-provinsi").serialize(),
	    		success:function(r){
	    			berforeSendLoading.modal('hide');
	    			successDialog.modal('show');
	    			dt_provinsi.ajax.reload();
	    			$("#frm-provinsi #id").val(0);
		    		$("#frm-provinsi #nama").val('');
	    		},
	    		error:function(){
	    			berforeSendLoading.modal('hide');
	    			errorDialog.modal('show');
	    		}	
	    	});
	    });
	    $(".add-provinsi").click(function(){
	    	$("#frm-provinsi #id").val(0);
			$("#frm-provinsi #nama").val('');
	    	$("#frm-provinsi #nama").focus();
	    });
	    var dt_kabkota = $("#dt-kabkota").DataTable({
			'sDom':"rtip",
			'sort':false,
			"processing": true,
	        "serverSide": true,
	        "ajax": {
	        	"url":"<?=site_url('wilayah/dt_kabkota');?>",
	        	"type": "GET",
	        	"data":function(d){
					d.provinsi_id = $("#frm-kabkota #provinsi_id").val();
				}
	        },
	        "columns": [
	            { "data": null },
	            { "data": "nama" },
	        ],
	        "drawCallback": function(setting){
	        	for (var i = 0, iLen = setting.aiDisplay.length; i < iLen; i++){
			        var start = setting._iDisplayStart+1;
		            $('td:eq(0)', setting.aoData[ setting.aiDisplay[i] ].nTr).html(start+i);
		        }
	        }
		});
		$('#dt-kabkota tbody').on( 'click', 'tr', function () {
	        if($(this).hasClass('active') ) {
	            $(this).removeClass('active');
	        }else{
				dt_kabkota.$('tr.active').removeClass('active');
	            $(this).addClass('active');
			}
	    });
	    $(".edit-kabkota").click(function(){
	    	var row = ( dt_kabkota.rows('.active').data()[0]);
	    	$("#frm-kabkota #id").val(row.id);
	    	$("#frm-kabkota #provinsi_id").val(row.provinsi_id);
	    	$("#frm-kabkota #nama").val(row.nama);
	    });
	    $(".delete-kabkota").click(function(){
	    	var row = ( dt_kabkota.rows('.active').data()[0]);
	    	if(row){
		    	bootbox.confirm("Apakah anda yakin ingin menghapus?", function(result) {
					if (result == true) {
		                $.ajax({
		                	data:{id:row.id},
		                	type:'POST',
		                	url:"<?=$urlDelete?>/kabkota",
		                	success:function(r){
				              berforeSendLoading.modal('hide');
				              successDialog.modal('show');
				              dt_kabkota.ajax.reload();
		    				  $("#frm-kabkota #id").val(0);
	    					  $("#frm-kabkota #nama").val('');
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
	    });
	    $(".save-kabkota").click(function(){
	    	$.ajax({
	    		beforeSend:function(){
	    			berforeSendLoading.modal('show');
	    		},
	    		type:"POST",
	    		url:"<?=$urlSave?>/kabkota",
	    		data:$("#frm-kabkota").serialize(),
	    		success:function(r){
	    			berforeSendLoading.modal('hide');
	    			successDialog.modal('show');
	    			dt_kabkota.ajax.reload();
	    			$("#frm-kabkota #id").val(0);
	    			$("#frm-kabkota #nama").val('');
	    		},
	    		error:function(){
	    			berforeSendLoading.modal('hide');
	    			errorDialog.modal('show');
	    		}	
	    	});
	    });
	    $("#frm-kabkota #provinsi_id").change(function(){
	    	dt_kabkota.ajax.reload();
	    });
	    $(".add-kabkota").click(function(){
	    	$("#frm-kabkota #id").val(0);
	    	$("#frm-kabkota #nama").val('');
	    	$("#frm-kabkota #nama").focus();
	    });
	    function getListKabkota(){
	    	var provinsi_id = $("#frm-kecamatan #provinsi_id").val();
	    	$.ajax({
	    		type:'POST',
	    		data:{provinsi_id:provinsi_id},
	    		url:"<?=site_url('wilayah/kabkota')?>",
	    		success:function(r){
	    			$("#frm-kecamatan #kabkota_id").html(r);
	    		}
	    	})
	    }
	    getListKabkota();
	    $("#frm-kecamatan #provinsi_id").change(function(){
	    	getListKabkota();
	    });
	    var dt_kecamatan = $("#dt-kecamatan").DataTable({
			'sDom':"rtip",
			'sort':false,
			"processing": true,
	        "serverSide": true,
	        "ajax": {
	        	"url":"<?=site_url('wilayah/dt_kecamatan');?>",
	        	"type": "GET",
	        	"data":function(d){
					d.kabkota_id = $("#frm-kecamatan #kabkota_id").val();
				}
	        },
	        "columns": [
	            { "data": null },
	            { "data": "nama" },
	        ],
	        "drawCallback": function(setting){
	        	for (var i = 0, iLen = setting.aiDisplay.length; i < iLen; i++){
			        var start = setting._iDisplayStart+1;
		            $('td:eq(0)', setting.aoData[ setting.aiDisplay[i] ].nTr).html(start+i);
		        }
	        }
		});
	    $('#dt-kecamatan tbody').on( 'click', 'tr', function () {
	        if($(this).hasClass('active') ) {
	            $(this).removeClass('active');
	        }else{
				dt_kecamatan.$('tr.active').removeClass('active');
	            $(this).addClass('active');
			}
	    });
	    $(".edit-kecamatan").click(function(){
	    	var row = ( dt_kecamatan.rows('.active').data()[0]);
	    	$("#frm-kecamatan #id").val(row.id);
	    	$("#frm-kecamatan #nama").val(row.nama);
	    });
	    $(".delete-kecamatan").click(function(){
	    	var row = ( dt_kecamatan.rows('.active').data()[0]);
	    	if(row){
		    	bootbox.confirm("Apakah anda yakin ingin menghapus?", function(result) {
					if (result == true) {
		                $.ajax({
		                	data:{id:row.id},
		                	type:'POST',
		                	url:"<?=$urlDelete?>/kecamatan",
		                	success:function(r){
				              berforeSendLoading.modal('hide');
				              successDialog.modal('show');
				              dt_kecamatan.ajax.reload();
		    				  $("#frm-kecamatan #id").val(0);
		    				  $("#frm-kecamatan #nama").val('');
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
	    });
	    $(".save-kecamatan").click(function(){
	    	$.ajax({
	    		beforeSend:function(){
	    			berforeSendLoading.modal('show');
	    		},
	    		type:"POST",
	    		url:"<?=$urlSave?>/kecamatan",
	    		data:$("#frm-kecamatan").serialize(),
	    		success:function(r){
	    			berforeSendLoading.modal('hide');
	    			successDialog.modal('show');
	    			dt_kecamatan.ajax.reload();
	    			$("#frm-kecamatan #id").val(0);
					$("#frm-kecamatan #nama").val('');
	    		},
	    		error:function(){
	    			berforeSendLoading.modal('hide');
	    			errorDialog.modal('show');
	    		}	
	    	});
	    });
	    $(".add-kecamatan").click(function(){
	    	$("#frm-kecamatan #id").val(0);
			$("#frm-kecamatan #nama").val('');
	    	$("#frm-kecamatan #nama").focus();
	    });
	    $("#frm-kecamatan #kabkota_id").change(function(){
	    	dt_kecamatan.ajax.reload();
	    });
	    var dt_kurir = $("#dt-kurir").DataTable({
			'sDom':"rtip",
			'sort':false,
			"processing": true,
	        "serverSide": true,
	        "ajax": {
	        	"url":"<?=site_url('wilayah/dt_kurir');?>",
	        	"type": "GET",
	        },
	        "columns": [
	            { "data": null },
	            { "data": "nama" },
	        ],
	        "drawCallback": function(setting){
	        	for (var i = 0, iLen = setting.aiDisplay.length; i < iLen; i++){
			        var start = setting._iDisplayStart+1;
		            $('td:eq(0)', setting.aoData[ setting.aiDisplay[i] ].nTr).html(start+i);
		        }
	        }
		});
	    $('#dt-kurir tbody').on( 'click', 'tr', function () {
	        if($(this).hasClass('active') ) {
	            $(this).removeClass('active');
	        }else{
				dt_kurir.$('tr.active').removeClass('active');
	            $(this).addClass('active');
			}
	    });
	    $(".edit-kurir").click(function(){
	    	var row = ( dt_kurir.rows('.active').data()[0]);
	    	$("#frm-kurir #id").val(row.id);
	    	$("#frm-kurir #nama").val(row.nama);
	    });
	    $(".delete-kurir").click(function(){
	    	var row = ( dt_kurir.rows('.active').data()[0]);
	    	if(row){
		    	bootbox.confirm("Apakah anda yakin ingin menghapus?", function(result) {
					if (result == true) {
		                $.ajax({
		                	data:{id:row.id},
		                	type:'POST',
		                	url:"<?=$urlDelete?>/kurir",
		                	success:function(r){
				              berforeSendLoading.modal('hide');
				              successDialog.modal('show');
				              dt_kurir.ajax.reload();
		    				  $("#frm-kurir #id").val(0);
		    				  $("#frm-kurir #nama").val('');
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
	    });
	    $(".save-kurir").click(function(){
	    	$.ajax({
	    		beforeSend:function(){
	    			berforeSendLoading.modal('show');
	    		},
	    		type:"POST",
	    		url:"<?=$urlSave?>/kurir",
	    		data:$("#frm-kurir").serialize(),
	    		success:function(r){
	    			berforeSendLoading.modal('hide');
	    			successDialog.modal('show');
	    			dt_kurir.ajax.reload();
	    			$("#frm-kurir #id").val(0);
					$("#frm-kurir #nama").val('');
	    		},
	    		error:function(){
	    			berforeSendLoading.modal('hide');
	    			errorDialog.modal('show');
	    		}	
	    	});
	    });
	    $(".add-kurir").click(function(){
	    	$("#frm-kurir #id").val(0);
			$("#frm-kurir #nama").val('');
	    	$("#frm-kurir #nama").focus();
	    });
	    /*TARIF KURIR*/
	    function getListKabkotaKurir(){
	    	var provinsi_id = $("#frm-tarif #provinsi_id").val();
	    	$.ajax({
	    		type:'POST',
	    		data:{provinsi_id:provinsi_id},
	    		url:"<?=site_url('wilayah/kabkota')?>",
	    		success:function(r){
	    			$("#frm-tarif #kabkota_id").html(r);
	    			getListKecamatanKurir();
	    		}
	    	});
	    }
	    getListKabkotaKurir();
	    $("#frm-tarif #provinsi_id").change(function(){
	    	getListKabkotaKurir();
	    });
	    function getListKecamatanKurir(){
	    	var kabkota_id = $("#frm-tarif #kabkota_id").val();
	    	$.ajax({
	    		type:'POST',
	    		data:{kabkota_id:kabkota_id},
	    		url:"<?=site_url('wilayah/kecamatan')?>",
	    		success:function(r){
	    			$("#frm-tarif #kecamatan_id").html(r);
	    		}
	    	});
	    }
	    $("#frm-tarif #kabkota_id").change(function(){
	    	getListKecamatanKurir();
	    });
	    var dt_tarif = $("#dt-tarif").DataTable({
			'sDom':"rtip",
			'sort':false,
			"processing": true,
	        "serverSide": true,
	        "ajax": {
	        	"url":"<?=site_url('wilayah/dt_tarif');?>",
	        	"type": "GET",
	        	"data":function(d){
					d.kurir_id = $("#frm-tarif #kurir_id").val();
					d.kabkota_id = $("#frm-tarif #kabkota_id").val();
					d.kecamatan_id = $("#frm-tarif #kecamatan_id").val();
				}
	        },
	        "columns": [
	            { "data": null },
	            { "data": "berat" },
	            { "data": "harga" },
	            { "data": "est" },
	        ],
	        "drawCallback": function(setting){
	        	for (var i = 0, iLen = setting.aiDisplay.length; i < iLen; i++){
			        var start = setting._iDisplayStart+1;
		            $('td:eq(0)', setting.aoData[ setting.aiDisplay[i] ].nTr).html(start+i);
		        }
	        }
		});
	    $('#dt-tarif tbody').on( 'click', 'tr', function () {
	        if($(this).hasClass('active') ) {
	            $(this).removeClass('active');
	        }else{
				dt_tarif.$('tr.active').removeClass('active');
	            $(this).addClass('active');
			}
	    });
	    $(".edit-tarif").click(function(){
	    	var row = ( dt_tarif.rows('.active').data()[0]);
	    	$("#frm-tarif #id").val(row.id);
	    	$("#frm-tarif #harga").val(row.harga);
	    	$("#frm-tarif #berat").val(row.berat);
	    	$("#frm-tarif #est").val(row.est);
	    });
	    $(".delete-tarif").click(function(){
	    	var row = ( dt_tarif.rows('.active').data()[0]);
	    	if(row){
		    	bootbox.confirm("Apakah anda yakin ingin menghapus?", function(result) {
					if (result == true) {
		                $.ajax({
		                	data:{id:row.id},
		                	type:'POST',
		                	url:"<?=$urlDelete?>/harga_kurir",
		                	success:function(r){
				              berforeSendLoading.modal('hide');
				              successDialog.modal('show');
				              dt_tarif.ajax.reload();
		    				  $("#frm-tarif #id").val(0);
		    				  $("#frm-tarif #harga,#frm-tarif #est,#frm-tarif #berat").val('');
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
	    });
	    $(".save-tarif").click(function(){
	    	$.ajax({
	    		beforeSend:function(){
	    			berforeSendLoading.modal('show');
	    		},
	    		type:"POST",
	    		url:"<?=$urlSave?>/harga_kurir",
	    		data:$("#frm-tarif").serialize(),
	    		success:function(r){
	    			berforeSendLoading.modal('hide');
	    			successDialog.modal('show');
	    			dt_tarif.ajax.reload();
	    			$("#frm-tarif #id").val(0);
					$("#frm-tarif #harga,#frm-tarif #est,#frm-tarif #berat").val('');
	    		},
	    		error:function(){
	    			berforeSendLoading.modal('hide');
	    			errorDialog.modal('show');
	    		}	
	    	});
	    });
	    $(".add-tarif").click(function(){
	    	$("#frm-tarif #id").val(0);
			$("#frm-tarif #harga,#frm-tarif #est,#frm-tarif #berat").val('');
	    	$("#frm-tarif #nama").focus();
	    });
	    $("#frm-tarif #kabkota_id,#frm-tarif #kecamatan_id,#frm-tarif #kurir").change(function(){
	    	dt_tarif.ajax.reload();
	    });
	});
</script>
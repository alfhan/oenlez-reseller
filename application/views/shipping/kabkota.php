<br/>
<?php
	  $dataJson = json_encode($data['list']->result_array());
?>
<div class="col-md-4 col-sm-4">
	<div class="box box-success">
		<div class="box-header">
			<h3 class="box-title">Kabupaten/Kota</h3>
		</div>
		<div class="box-body">
			<form class="cmxform form-horizontal tasi-form" role="form" id="myFrm">
				<input type="hidden" id="id" name="id">
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3">Provinsi</label>
					<div class="col-md-9 col-sm-5">
						<select class="form-control input-sm" name="provinsi_id" id="provinsi_id">
						<?php foreach ($data['provinsi']->result_array() as $r) {
							echo "<option value='$r[id]'>$r[nama]</option>";
						}?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3">Nama</label>
					<div class="col-md-9 col-sm-5">
						<input class="form-control input-sm" name="nama" id="nama" autofocus />
					</div>
				</div>
			</form>
		</div>
		<div class="box-footer">
			<a href="#" class="btn btn-sm btn-primary" onclick="simpanClick()">
				<i class="fa fa-save"></i> Simpan
			</a>
		</div>
	</div>
</div>
<div class="col-md-8">
	<div class="box box-success">
		<div class="box-header">
			<h3 class="box-title">List Kab Kota</h3>
		</div>
		<div class="box-body">
			<table class="table" id="tb">
				<thead>
					<tr>
						<th>No</th>
						<th>Provinsi</th>
						<th>Kab/Kota</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php 	
					$n =1;
					foreach ($data['list']->result_array() as $r) { 
				?>
					<tr>
						<td><?=$n++?></td>
						<td><?=$r['provinsi_nama']?></td>
						<td><?=$r['nama']?></td>
						<td>
							<a href="#" class="btn btn-xs btn-info" onclick="editClick('<?=$r['id']?>')"><i class="fa fa-edit"></i> Edit</a>
							<a href="#" class="btn btn-xs btn-danger" onclick="hapusClick('<?=$r['id']?>')"><i class="fa fa-edit"></i> Delete</a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#tb").DataTable({
		'bSort':false
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
	function simpanClick () {
		$.ajax({
			beforeSend:function(){
				berforeSendLoading.modal('show');
			},
			url:"<?=site_url('home/simpan/kabkota')?>",
			type:"POST",
			data:$("#myFrm").serialize(),
			success:function(){
				berforeSendLoading.modal('hide');
			},
			error:function(){
				berforeSendLoading.modal('hide');
				errorDialog.modal('show');
			}
		})
	}
	function editClick(id){
		var dataJson = eval(<?=$dataJson;?>);
		$.each(dataJson, function (index, data) {
			if(data.id == id){
				$("#id").val(id);
				$("#provinsi_id").val(data.provinsi_id);
				$("#nama").val(data.nama);
				return false;
			}
		});
	}
	function hapusClick(id){
		bootbox.confirm("Apakah anda yakin ingin menghapus?", function(result) {
			if (result == true) {
                $.ajax({
                	data:{id:id},
                	type:'POST',
                	url:"<?=site_url('home/hapus/kabkota')?>",
                	success:function(r){
		              berforeSendLoading.modal('hide');
		              successDialog.modal('show');
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
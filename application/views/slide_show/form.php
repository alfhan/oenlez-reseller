<section class="content-header">
	<h1><?=$title?></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Article Management</a></li>
        <li><a href="<?php echo base_url($link);?>"><i class="fa fa-angle-double-right"></i> <?=$title?></a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Form Slide Show</h3>
				</div>
				<div class="box-body">
					<form class="cmxform form-horizontal tasi-form" role="form" id="myForm">
		                <input type="hidden" name="id" id="id" value="<?=@$data['id']?>" />
		                <input type="hidden" name="old_file" id="old_file" value="<?=@$data['foto']?>" />
		                <div class="form-group">
		                    <label for="judul" class="col-sm-3 control-label">Judul</label>
		                    <div class="col-sm-3">
		                        <input name="judul" value="<?=@$data['judul']?>" id="judul" class="form-control input-sm" required />
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label for="keterangan" class="col-sm-3 control-label">Deskripsi</label>
		                    <div class="col-sm-9">
		                        <textarea class="textarea" name="keterangan" id="keterangan" rows="10" style="width:100%"><?=@$data['keterangan']?></textarea>
		                    </div>
		                </div>
		                <div class="form-group">
		                	<label for="foto" class="col-sm-3 control-label">Foto</label>
		                    <div class="col-sm-3">
		                        <input type="file" name="foto" id="foto" class="form-control input-sm" />
		                    </div>
						</div>
		            </form>
				</div>
				<div class="box-footer">
					<a href="javascript:void(0)" class="btn btn-sm btn-info"><i class="fa fa-angle-double-left"></i> Kembali</a>
					<a href="javascript:void(0)" class="btn btn-sm btn-primary save-click pull-right"><i class="fa fa-save"></i> Simpan</a>
				</div>
			</div>
		</div>
	</div>
</section>
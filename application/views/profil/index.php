<section class="content-header">
    <h1>
        <?=$title?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Transaksi</a></li>
        <li><a href="<?php echo base_url($link);?>"><i class="fa fa-angle-double-right"></i> <?=$title?></a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-7">
			<div class="box box-success">
				<div class="box-header">
                    <h3 class="box-title">Data <?=$title?></h3>
                </div>
                <form class="cmxform form-horizontal tasi-form" role="form" id="myForm">
                <div class="box-body">
                    <input type="hidden" name="id" id="id" value="<?=$data->id?>" />
                    <input type="hidden" name="old_file" id="old_file" value="<?=$data->foto?>" />
                    <div class="form-group">
                        <label for="nama" class="col-sm-3 control-label">Nama Usaha</label>
                        <div class="col-sm-5">
                            <input name="nama" id="nama" class="form-control input-sm" required value="<?=$data->nama?>" autofocus />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-8">
                            <input name="alamat" id="alamat" class="form-control input-sm" required value="<?=$data->alamat?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telepon" class="col-sm-3 control-label">Telepon</label>
                        <div class="col-sm-5">
                            <input name="telepon" id="telepon" class="form-control input-sm" required value="<?=$data->telp?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="website" class="col-sm-3 control-label">Website</label>
                        <div class="col-sm-5">
                            <input name="website" id="website" class="form-control input-sm" required value="<?=$data->website?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="col-sm-3 control-label">Logo</label>
                        <div class="col-sm-5">
                            <input type="file" id="foto" name="foto">
                            <p class="help-block">Image Only</p>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="button" onclick="saveClick()" class="btn btn-primary btn-sm">
                    <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
                </form>
			</div>
		</div>
        <div class="col-md-5">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Logo <?=$title?></h3>
                </div>
                <div class="box-body">
                    <center><img src="<?=FILE_PERUSAHAAN . $data->foto?>"></center>
                </div>
            </div>
        </div>
	</div>
</section>
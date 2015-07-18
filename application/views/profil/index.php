<section class="content-header">
    <h1>
        <?=$title?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Master</a></li>
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
                        <label for="kabkota" class="col-sm-3 control-label">Kab/Kota</label>
                        <div class="col-sm-8">
                            <input name="kabkota" id="kabkota" class="form-control input-sm" required value="<?=$data->kabkota?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telepon" class="col-sm-3 control-label">Telepon</label>
                        <div class="col-sm-5">
                            <input name="telepon" id="telepon" class="form-control input-sm" required value="<?=$data->telp?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-5">
                            <input name="email" id="email" class="form-control input-sm" required value="<?=$data->email?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fb" class="col-sm-3 control-label">Facebook</label>
                        <div class="col-sm-5">
                            <input name="fb" id="fb" class="form-control input-sm" required value="<?=$data->fb?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="twitter" class="col-sm-3 control-label">Twitter</label>
                        <div class="col-sm-5">
                            <input name="twitter" id="twitter" class="form-control input-sm" required value="<?=$data->twitter?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="col-sm-3 control-label">Logo</label>
                        <div class="col-sm-5">
                            <input type="file" id="foto" name="foto">
                            <p class="help-block">Image Only (139x39)</p>
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
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Email Setting</h3>
                </div>
                <div class="box-body">
                    <form id="frmemail">
                        <input type="hidden" value="<?=$es['id']?>" name="id" />
                        <div class="form-group">
                            <label class="control-label col-md-3">Protocol</label>
                            <div class="col-md-9">
                                <input class="input-sm form-control" name="protocol" value="<?=$es['protocol']?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Host</label>
                            <div class="col-md-9">
                                <input class="input-sm form-control" name="host" value="<?=$es['host']?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Port</label>
                            <div class="col-md-9">
                                <input class="input-sm form-control" name="port" value="<?=$es['port']?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">User Email</label>
                            <div class="col-md-9">
                                <input class="input-sm form-control" name="user" value="<?=$es['user']?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">User Pass</label>
                            <div class="col-md-9">
                                <input class="input-sm form-control" type="password" name="pass" value="<?=$es['pass']?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Mail Type</label>
                            <div class="col-md-9">
                                <input class="input-sm form-control" name="mailtype" value="<?=$es['mailtype']?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Mail From</label>
                            <div class="col-md-9">
                                <input class="input-sm form-control" name="mailfrom" value="<?=$es['mailfrom']?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">From Name</label>
                            <div class="col-md-9">
                                <input class="input-sm form-control" name="fromnamer" value="<?=$es['fromnamer']?>" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-footer">
                    <button type="button" onclick="saveEmailSettingClick()" class="btn btn-primary btn-sm">
                    <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
	</div>
</section>
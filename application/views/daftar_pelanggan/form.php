<section class="content-header">
	<h1>{title}</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-shopping-cart"></i> Sales Mangement</a></li>
        <li><a href="<?php echo base_url($link);?>"><i class="fa fa-angle-double-right"></i> {title}</a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">{title}</h3>
				</div>
				<div class="box-body">
					<form class="cmxform form-horizontal tasi-form" role="form" id="myForm">
		                <input type="hidden" name="id" id="id" value="<?=@$r['id']?>" />
		                <div class="form-group">
		                	<label class="col-md-3 control-label">Kode Pelanggan</label>
		                	<div class="col-md-3">
		                		<input name="no_pelanggan" id="no_pelanggan" class="form-control input-sm" value="<?=@$r['no_pelanggan']?>">
		                	</div>
		                	<label class="col-md-2 control-label">Username(Email)</label>
		                	<div class="col-md-2">
		                		<input name="username" id="username" type="email" class="form-control input-sm" value="<?=@$r['username']?>">
		                	</div>
		                </div>
		                <div class="form-group">
		                	<label class="col-md-3 control-label">Nama Pelanggan</label>
		                	<div class="col-md-3">
		                		<input name="nama" id="nama" class="form-control input-sm" value="<?=@$r['nama']?>" autocomplete="off">
		                	</div>
		                	<label class="col-md-2 control-label">Password</label>
		                	<div class="col-md-2">
		                		<input name="password" type="password" id="password" class="form-control input-sm" value="">
		                	</div>
		                </div>
		                <div class="form-group">
		                	<label class="col-md-3 control-label">Alamat</label>
		                	<div class="col-md-4">
		                		<input name="alamat" id="alamat" class="form-control input-sm" value="<?=@$r['alamat']?>">
		                	</div>
		                	<label class="col-md-1 control-label">Kode Pos</label>
		                	<div class="col-md-2">
		                		<input name="kode_pos" id="kode_pos" class="form-control input-sm" value="<?=@$r['kode_pos']?>">
		                	</div>
		                </div>
		                <div class="form-group">
		                	<label class="col-md-3 control-label">Kab/Kota</label>
		                	<div class="col-md-3">
		                		<input name="kab_kota" id="kab_kota" class="form-control input-sm" value="<?=@$r['kab_kota']?>">
		                	</div>
		                </div>
		                <div class="form-group">
		                	<label class="col-md-3 control-label">No HP</label>
		                	<div class="col-md-2">
		                		<input name="hp" id="hp" class="form-control input-sm" value="<?=@$r['hp']?>">
		                	</div>
		                </div>
		            </form>
				</div>
				<div class="box-footer">
					<a href="<?=base_url('daftar_pelanggan');?>" class="btn btn-sm btn-info"><i class="fa fa-angle-double-left"></i> Kembali</a>
					<a href="javascript:void(0)" class="btn btn-sm btn-primary save-click pull-right"><i class="fa fa-save"></i> Simpan</a>
				</div>
			</div>
		</div>
	</div>
</section>
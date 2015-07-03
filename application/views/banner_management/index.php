<section class="content-header">
    <h1>{title}</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Other</a></li>
        <li><a href="<?php echo base_url($link);?>"><i class="fa fa-angle-double-right"></i> {title}</a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Produk Top <small> (width = 1170 x height = 150)</small></h3>
                </div>
                <div class="box-body" style="text-align:center">
                    <img src="<?=base_url('images/banner/'.$data[3]['foto'])?>">
                </div>
                <div class="box-footer">
                    <form class="cmxform form-horizontal tasi-form" role="form" id="frm-top">
                        <input type="hidden" name="id" id="id" value="<?=$data[3]['id']?>" />
                        <input type="hidden" name="old_file" id="old_file" value="<?=$data[3]['foto']?>" />
                        <input type="hidden" name="tipe" id="tipe" value="top" />
                        <label class="control-label col-md-1">Image</label>
                        <div class="col-md-3">
                            <input type="file" name="foto" class="form-control input-sm" />
                        </div>
                        <label class="col-md-1">Status</label>
                        <div class="col-md-2">
                            <select class="form-control input-sm" name="is_aktif">
                                <option value="1" <?=$data[3]['is_aktif'] == 1 ? "selected='secleted'":"";?>>Aktif</option>
                                <option value="0" <?=$data[3]['is_aktif'] == 0 ? "selected='secleted'":"";?>>Non-Aktif</option>
                            </select>
                        </div>
                    </form>
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="updateClick('frm-top')"><i class="fa fa-save"></i> Update</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Banner Left 1<small> (width = 270 x height = 239)</small></h3>
                </div>
                <div class="box-body" style="text-align:center">
                    <img src="<?=base_url('images/banner/'.$data[2]['foto'])?>">
                </div>
                <div class="box-footer">
                    <form class="cmxform form-horizontal tasi-form" role="form" id="frm-left-1">
                        <input type="hidden" name="id" id="id" value="<?=$data[2]['id']?>" />
                        <input type="hidden" name="old_file" id="old_file" value="<?=$data[2]['foto']?>" />
                        <input type="hidden" name="tipe" id="tipe" value="left" />
                        <label class="col-md-3">Status</label>
                        <div class="col-md-9">
                            <select class="form-control input-sm" name="is_aktif">
                                <option value="1" <?=$data[2]['is_aktif'] == 1 ? "selected='secleted'":"";?>>Aktif</option>
                                <option value="0" <?=$data[2]['is_aktif'] == 0 ? "selected='secleted'":"";?>>Non-Aktif</option>
                            </select>
                        </div>
                        <br /><br />
                        <input type="hidden" name="id" id="id" value="<?=$data[2]['id']?>" />
                        <input type="hidden" name="old_file" id="old_file" value="<?=$data[2]['foto']?>" />
                        <label class="control-label col-md-3">Image</label>
                        <div class="col-md-6">
                            <input type="file" name="foto" class="form-control input-sm" />
                        </div>
                    </form>
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="updateClick('frm-left-1')"><i class="fa fa-save"></i> Update</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Banner Left 2<small> (width = 270 x height = 239)</small></h3>
                </div>
                <div class="box-body" style="text-align:center">
                    <img src="<?=base_url('images/banner/'.$data[1]['foto'])?>">
                </div>
                <div class="box-footer">
                    <form class="cmxform form-horizontal tasi-form" role="form" id="frm-left-2">
                        <input type="hidden" name="id" id="id" value="<?=$data[1]['id']?>" />
                        <input type="hidden" name="old_file" id="old_file" value="<?=$data[1]['foto']?>" />
                        <input type="hidden" name="tipe" id="tipe" value="left" />
                        <label class="col-md-3">Status</label>
                        <div class="col-md-9">
                            <select class="form-control input-sm" name="is_aktif">
                                <option value="1" <?=$data[1]['is_aktif'] == 1 ? "selected='secleted'":"";?>>Aktif</option>
                                <option value="0" <?=$data[1]['is_aktif'] == 0 ? "selected='secleted'":"";?>>Non-Aktif</option>
                            </select>
                        </div>
                        <br /><br />
                        <input type="hidden" name="id" id="id" value="<?=$data[1]['id']?>" />
                        <input type="hidden" name="old_file" id="old_file" value="<?=$data[1]['foto']?>" />
                        <label class="control-label col-md-3">Image</label>
                        <div class="col-md-6">
                            <input type="file" name="foto" class="form-control input-sm" />
                        </div>
                    </form>
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="updateClick('frm-left-2')"><i class="fa fa-save"></i> Update</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Banner Left 3<small> (width = 270 x height = 239)</small></h3>
                </div>
                <div class="box-body" style="text-align:center">
                    <img src="<?=base_url('images/banner/'.$data[0]['foto'])?>">
                </div>
                <div class="box-footer">
                    <form class="cmxform form-horizontal tasi-form" role="form" id="frm-left-3">
                        <input type="hidden" name="id" id="id" value="<?=$data[0]['id']?>" />
                        <input type="hidden" name="old_file" id="old_file" value="<?=$data[0]['foto']?>" />
                        <input type="hidden" name="tipe" id="tipe" value="left" />
                        <label class="col-md-3">Status</label>
                        <div class="col-md-9">
                            <select class="form-control input-sm" name="is_aktif">
                                <option value="1" <?=$data[0]['is_aktif'] == 1 ? "selected='secleted'":"";?>>Aktif</option>
                                <option value="0" <?=$data[0]['is_aktif'] == 0 ? "selected='secleted'":"";?>>Non-Aktif</option>
                            </select>
                        </div>
                        <br /><br />
                        <input type="hidden" name="id" id="id" value="<?=$data[0]['id']?>" />
                        <input type="hidden" name="old_file" id="old_file" value="<?=$data[0]['foto']?>" />
                        <label class="control-label col-md-3">Image</label>
                        <div class="col-md-6">
                            <input type="file" name="foto" class="form-control input-sm" />
                        </div>
                    </form>
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="updateClick('frm-left-3')"><i class="fa fa-save"></i> Update</a>
                </div>
            </div>
        </div>
    </div>
</div>
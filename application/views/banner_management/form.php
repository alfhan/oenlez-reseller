<section class="content-header">
	<h1>{title}</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Master</a></li>
        <li><a href="<?php echo base_url($link);?>"><i class="fa fa-angle-double-right"></i> {title}</a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Form Produk</h3>
				</div>
				<div class="box-body">
					<form class="cmxform form-horizontal tasi-form" role="form" id="myForm">
		                <input type="hidden" name="id" id="id" value="<?=@$data['id']?>" />
		                <input type="hidden" name="old_file" id="old_file" value="<?=@$data['foto']?>" />
		                <div class="form-group">
		                    <label for="kode_barang" class="col-sm-3 control-label">Kode Barang</label>
		                    <div class="col-sm-3">
		                        <input name="kode_barang" value="<?=@$data['kode_barang']?>" id="kode_barang" class="form-control input-sm" required />
		                    </div>
		                    <label for="recomended_item" class="col-sm-2 control-label">Recomended Item</label>
		                    <div class="col-md-3">
		                    	<select name="recomended_item" id="recomended_item" class="form-control input-sm">
		                    		<option value="1">Ya</option>
		                    		<option value="0">Tidak</option>
		                    	</select>
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label for="berat" class="col-sm-3 control-label">Berat (gr)</label>
		                    <div class="col-sm-2">
		                        <input name="berat" id="berat" value="<?=@$data['berat']?>" class="form-control input-sm" required />
		                    </div>
		                    <label for="kategori_barang_id" class="col-sm-3 control-label">Kategori Barang</label>
		                    <div class="col-sm-3">
		                        <select name="kategori_barang_id" id="kategori_barang_id" class="form-control input-sm">
		                            <?php 
		                            	foreach($kategori as $r){ 
		                            		$select = $r['id'] == $data['kategori_barang_id'] ? "selected='selected'":"";
		                            ?>
		                            <option value="<?=$r['id']?>" <?=$select?> ><?=$r['nama']?></option>
		                            <?php } ?>
		                        </select>
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label for="nama" class="col-sm-3 control-label">Nama</label>
		                    <div class="col-sm-8">
		                        <input name="nama" id="nama" class="form-control input-sm" value="<?=@$data['nama']?>" required />
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label for="ready_stock" class="col-sm-3 control-label">Ready Stock</label>
		                    <div class="col-sm-2">
		                        <!-- <input name="qty" id="qty" class="form-control input-sm" required value="<?=@$data['qty']?>" /> -->
		                        <select class="form-control input-sm" name="ready_stock" id="ready_stock">
		                        	<option value="1" <?=@$data['ready_stock'] == 1 ? "selected='selected'":""?>>Ready</option>
		                        	<option value="0" <?=@$data['ready_stock'] == 0 ? "selected='selected'":""?>>Not-Ready</option>
		                        </select>
		                    </div>
		                    <label for="foto" class="col-sm-3 control-label">Gambar 1</label>
		                    <div class="col-sm-3">
		                        <input type="file" name="foto" id="foto" class="form-control input-sm" />
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label for="harga_jual" class="col-sm-3 control-label">Harga Jual/Beli</label>
		                    <div class="col-sm-1">
		                        <input name="harga_jual" id="harga_jual" class="form-control input-sm" required value="<?=@$data['harga_jual']?>" />
		                    </div>
		                    <div class="col-sm-1">
		                        <input name="harga_beli" id="harga_beli" class="form-control input-sm" required value="<?=@$data['harga_beli']?>" />
		                    </div>
		                    <label for="foto2" class="col-sm-3 control-label">Gambar 2 (Recomended Image)</label>
		                    <div class="col-sm-3">
		                        <input type="file" name="foto2" id="foto2" class="form-control input-sm" />
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label for="harga_jual" class="col-sm-3 control-label">Deskripsi Produk</label>
		                    <div class="col-sm-9">
		                        <textarea class="textarea" name="keterangan" id="keterangan" rows="10" style="width:100%"><?=@$data['keterangan']?></textarea>
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
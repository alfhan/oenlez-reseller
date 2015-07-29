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
		                    		<option value="1" <?=$data['recomended_item'] == 1 ? "selected='selected'":""?>>Ya</option>
		                    		<option value="0" <?=$data['recomended_item'] == 0 ? "selected='selected'":""?>>Tidak</option>
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
		                    <div class="col-sm-4">
		                        <input name="nama" id="nama" class="form-control input-sm" value="<?=@$data['nama']?>" required />
		                    </div>
		                    <label for="min_pembelian" class="col-sm-3 control-label">Minimal Pembelian</label>
		                    <div class="col-sm-1">
		                        <input name="min_pembelian" id="min_pembelian" value="<?=@$data['min_pembelian']?>" class="form-control input-sm" required />
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
		                    <label for="foto" class="col-sm-1 control-label">Gambar 1</label>
		                    <div class="col-sm-3">
		                        <input type="file" name="foto" id="foto" class="form-control input-sm" />
		                    </div>
		                    <label for="harga_jual" class="col-sm-1 control-label">Grosir</label>
		                	<div class="col-sm-2">
		                		<select class="form-control input-sm" name="is_grosir" id="is_grosir">
		                			<option value="0" <?=@$data['is_grosir'] == 0 ? "selected='selected'":""?>>Tidak</option>
		                			<option value="1" <?=@$data['is_grosir'] == 1 ? "selected='selected'":""?>>Ya</option>
		                		</select>
		                	</div>
		                </div>
		                <div class="form-group">
		                    <label for="harga_jual" class="col-sm-3 control-label">Harga Jual/Awal</label>
		                    <div class="col-sm-1">
		                        <input <?=@$data['is_grosir'] == 0 ? "":"readonly='true'"?> name="harga_jual" id="harga_jual" class="form-control input-sm" required value="<?=@$data['harga_jual']?>" />
		                    </div>
		                    <div class="col-sm-1">
		                        <input <?=@$data['is_grosir'] == 0 ? "":"readonly='true'"?> name="harga_beli" id="harga_beli" class="form-control input-sm" required value="<?=@$data['harga_beli']?>" />
		                    </div>
		                    <label for="foto2" class="col-sm-3 control-label">Gambar 2 (Recomended Image)</label>
		                    <div class="col-sm-3">
		                        <input type="file" name="foto2" id="foto2" class="form-control input-sm" />
		                    </div>
		                </div>
		                <div class="form-group" id="grosir" <?=@$data['is_grosir'] == 0 ? "style='display:none'":""?> >
		                	<div class="col-sm-1"></div>
		                	<?php 
								for($i=1;$i<=5;$i++){ 
									$min = 'min'.$i;
									$max = 'max'.$i;
									$harga = 'harga'.$i;
							?>
		                	<div class="col-sm-2">
		                		<b>Harga Grosir <?=$i?></b>
		                		<input name="min<?=$i?>" id="min<?=$i?>" value="<?=@$data[$min]?>" class="form-control input-sm" placeholder="QTY Min" required />
		                		<input name="max<?=$i?>" id="max<?=$i?>" value="<?=@$data[$max]?>" class="form-control input-sm" placeholder="QTY Max" required />
		                		<input name="harga<?=$i?>" id="harga<?=$i?>" value="<?=@$data[$harga]?>" class="form-control input-sm" placeholder="Harga" required />
		                	</div>
		                	<?php } ?>
		                	<div class="col-sm-1"></div>
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
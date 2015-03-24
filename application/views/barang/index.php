<section class="content-header">
    <h1>{title}</h1>
    <ul class="pagination pagination-sm" style="margin:0;">
      <?php echo $data['linkHalaman'];?>
    </ul>
    <br />
    <div style="position:relative;float:left;margin-right:10px">
        <!-- Keterangan : 
    <button class="btn btn-xs bg-green">Harga Beli</button>
    <button class="btn btn-xs bg-red">Harga Jual</button> -->
    </div>
    <form id="frm" name="frm" method="get">
    <input class="form-control input-sm" autofocus id="q"  name="q" style="width:50%;" placeholder="Cari Data Disini . . ." value="{q}" />
    </form>
    <div class="col-sm-1 col-md-1 pull-right" style="bottom:30px">
        <button class="btn btn-sm bg-blue" onclick="addClick()">
            <i class="fa fa-plus"></i>
            Tambah
        </button>
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Master</a></li>
        <li><a href="<?php echo base_url($link);?>"><i class="fa fa-angle-double-right"></i> {title}</a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
        <?php 
            foreach ($data['query'] as $r) { 
        ?>
        <div class="col-md-3">
            <div class="box box-success">
                <!-- <div class="box-header">
                    <h3 class="box-title"><?php echo $r['nama'];?></h3>
                </div> -->
                <div class="box-body">
                <span style="font-size:14px"><?=ucwords(strtolower($r['nama']));?></span>
                    <br />
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="110">
                                <img src="<?php echo base_url(FILE_BARANG.$r['foto']);?>" height="120" width="100"/>
                            </td>
                            <td style="font-size:11px;" valign="top">
                            <button class="btn btn-xs pull-right bg-red" onclick="deleteClick('<?=$r['id']?>','<?=$r['foto']?>')" title="delete" style="margin:2px;">
                        <i class="fa fa-minus-circle"></i>
                    </button>
                    <button class="btn btn-xs pull-right bg-blue" onclick="editClick('<?=$r['id']?>')" 
                        title="edit" style="margin:2px;">
                        <i class="fa fa-edit"></i>
                    </button>
                    <br />
                    <br />
                            <b>Harga Jual : </b>
                            <button class="btn bg-red btn-xs" style="font-size:11px;display:block;width:100%;">
                                Rp<?php echo numIndo($r['harga_jual'],0);?>
                            </button>
                            <b>Harga Beli : </b>
                            <button class="btn bg-green btn-xs" style="font-size:11px;display:block;width:100%;">
                                Rp<?php echo numIndo($r['harga_beli'],0);?>
                            </button>
                            </td>
                        </tr>    
                    </table>
                </div>
            </div>
        </div>
        <?php } ?>
	</div>
</section>
<div class="modal fade col-md-12" data-backdrop="static" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Data {title}</h4>
            </div>
            <div class="modal-body">
                <form class="cmxform form-horizontal tasi-form" role="form" id="myForm">
                    <input type="hidden" name="id" id="id" />
                    <input type="hidden" name="old_file" id="old_file" />
                    <div class="form-group">
                        <label for="kode_barang" class="col-sm-3 control-label">Kode Barang</label>
                        <div class="col-sm-5">
                            <input name="kode_barang" id="kode_barang" class="form-control input-sm" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kode_barcode" class="col-sm-3 control-label">Kode Barcode</label>
                        <div class="col-sm-5">
                            <input name="kode_barcode" id="kode_barcode" class="form-control input-sm" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-8">
                            <input name="nama" id="nama" class="form-control input-sm" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenis_barang_id" class="col-sm-3 control-label">Jenis Barang</label>
                        <div class="col-sm-4">
                            <select name="jenis_barang_id" id="jenis_barang_id" class="form-control input-sm">
                                <?php foreach($jenis as $r){ ?>
                                <option value="<?=$r['id']?>"><?=$r['nama']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="qty" class="col-sm-3 control-label">Qty</label>
                        <div class="col-sm-2">
                            <input name="qty" id="qty" class="form-control input-sm" required />
                        </div>
                        <label for="foto" class="col-sm-2 control-label">Foto</label>
                        <div class="col-sm-5">
                            <input type="file" name="foto" id="foto" class="form-control input-sm" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="harga_jual" class="col-sm-3 control-label">Harga Jual/Beli</label>
                        <div class="col-sm-3">
                            <input name="harga_jual" id="harga_jual" class="form-control input-sm" required />
                        </div>
                        <div class="col-sm-3">
                            <input name="harga_beli" id="harga_beli" class="form-control input-sm" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="harga_jual" class="col-sm-3 control-label">Deskripsi Produk</label>
                        <div class="col-sm-9">
                            <textarea name="keterangan" id="keterangan" rows="5" style="width:100%"></textarea>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button class="btn btn-warning btn-sm" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary btn-sm" onclick="saveClick()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
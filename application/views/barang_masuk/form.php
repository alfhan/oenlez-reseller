<form id="myForm" enctype="multipart/form-data" method="POST" class="form-horizontal">
	<input type="hidden" id="id" name="id" />
    <div class="box-body">
        <div class="form-group">
            <label for="q" class="col-sm-5">Kode Barang/ Barcode</label>
            <div class="col-sm-7">
                <input type="text" class="form-control input-sm" required="true" id="q" name="q" autofocus>
            </div>
        </div>
        <div class="form-group">
            <label for="nama" class="col-sm-5">Nama</label>
            <div class="col-sm-7">
                <input disabled class="form-control input-sm" id="nama">
            </div>
        </div>
        <div class="form-group">
            <label for="tanggal" class="col-sm-5">Tanggal</label>
            <div class="col-md-3 col-sm-3">
                <input class="form-control input-sm datepicker" id="tanggal" name="tanggal" value="<?=date('d/m/Y');?>">
            </div>
        </div>
        <div class="form-group">
            <label for="dari" class="col-sm-5">Dari</label>
            <div class="col-sm-7">
                <input class="form-control input-sm" id="dari" name="dari">
            </div>
        </div>
        <div class="form-group">
            <label for="no_nota" class="col-sm-5">No Nota</label>
            <div class="col-sm-7">
                <input class="form-control input-sm" id="no_nota" name="no_nota">
            </div>
        </div>
        <div class="form-group">
            <label for="qty" class="col-sm-5">Qty Masuk</label>
            <div class="col-sm-2">
                <input class="form-control input-sm" id="qty" name="qty">
            </div>
            <label class="col-sm-3" id="qty_awal"></label>
        </div>
        <div class="form-group">
            <label for="harga_beli" class="col-sm-5">Harga Beli /pc</label>
            <div class="col-sm-3">
                <input class="form-control input-sm" id="harga_beli" name="harga_beli">
            </div>
            <label class="col-sm-3" id="harga_beli_awal"></label>
        </div>
        <div class="form-group">
            <label for="harga_jual" class="col-sm-5">Harga Jual /pc</label>
            <div class="col-sm-3">
                <input class="form-control input-sm" id="harga_jual" name="harga_jual">
            </div>
            <div class="col-sm-3">
                <label class="col-sm-3" id="harga_jual_awal"></label>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="button" onclick="saveClick()" class="btn btn-primary btn-sm">
        <i class="fa fa-save"></i> Simpan
        </button>
    </div>
</form>
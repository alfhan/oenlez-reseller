<section class="content-header">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-md-12 col-sm-12">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">&laquo;</a></li>
                    <?=$link?>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="row" id="result">
        <?php foreach ($data->result_array() as $r) { ?>
        <div class="col-md-2">
            <div class="box box-success" style="padding-left:10px;padding-right:10px;">
                <div class="box-body"></div>
                <span style="font-size:16px"><a href="javascript:void(0)" onclick="detailClick('<?=$r['id']?>')"><?=$r['nama'];?></a></span>
                <img src="<?php echo base_url(FILE_BARANG.$r['foto']);?>" height="150" onclick="detailClick('<?=$r['id']?>')">
                <div class="box-footer">
                    <button class="btn bg-red btn-xs" style="font-size:13px;" onclick="detailClick('<?=$r['id']?>')">
                        Rp<?php echo numIndo($r['harga_jual'],0);?>
                    </button>
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
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div id="foto" style="float:left;"></div>
                    <div id="keterangan" style="float:left"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning btn-sm" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?php 
    $dataJson = json_encode($data->result_array());
?>
<script type="text/javascript">

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
function detailClick(id) {
    $('#modal').modal('show');
    var dataJson = eval(<?=$dataJson;?>);
     $.each(dataJson, function (key, data) {
      if(data.id == id){
        $("#myModalLabel").text(data.nama);
        $("#foto").html("<img src='<?=FILE_BARANG?>"+data.foto+"' style='max-width:300px;max-height:300px;min-width:auto;min-height:auto;' />")
        var keterangan = data.keterangan;
        var keteranganReplace = keterangan.replace(/(\r\n|\n\r|\r|\n)/g,'<br />');
        $("#keterangan").html(keteranganReplace);
      }
    });
}
</script>
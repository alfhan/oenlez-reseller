<?php  
    $this->load->view('front/header');
?>
<body>
    <?php $this->load->view('front/nav');?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                <h2 class="title text-center">Reply</h2>
                    <textarea name="isi" id="isi" autofocus class="form-control input-sm" rows="5"></textarea>
                    <a href="#" class="btn btn-sm btn-primary" onclick="simpan()"><i class="fa fa-save"></i> Update</a>
                </div>
                <div class="col-sm-10">
                    <h2 class="title text-center">Message</h2>
                    <table cellpadding="2" cellspacing="2" width="100%" class="table">
                    <?php
                    foreach ($data as $r) { 
                        $nama = $r['pelanggan_id'] > 0 ? $this->session->userdata('nama') : "Administrator";
                    ?>
                        <tr>
                            <td width="200" valign="top"><b><?=$nama?></b><br /><?=dateToIndo($r['waktu'],true,true)?></td>        
                            <td><?=nl2br($r['isi'])?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view('front/footer');?>
    <script src="<?=base_url()?>asset/js/jquery.js"></script>
    <script src="<?=base_url()?>asset/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>asset/js/jquery.scrollUp.min.js"></script>
    <script src="<?=base_url()?>asset/js/price-range.js"></script>
    <script src="<?=base_url()?>asset/js/jquery.prettyPhoto.js"></script>
    <script src="<?=base_url()?>asset/js/main.js"></script>
    <script src="<?=base_url('adminlte/js/bootbox.min.js');?>" type="text/javascript"></script>
    <script type="text/javascript">
    var berforeSendLoading = bootbox.dialog({
      title: "Loading",
      message: "<div class='progress sm progress-striped active'>"+
                    "<div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='100'"+
                        "aria-valuemin='0' aria-valuemax='100' style='width: 100%'>"+
                        "<span class='sr-only'>Loading</span>"+
                    "</div>"+
                "</div>",
      closeButton: false,
      show: false,
    });
    function simpan (argument) {
        $.ajax({
            beforeSend:function(){
                berforeSendLoading.modal('show');
            },
            type:"POST",
            data:{isi:$("#isi").val(),id:"<?=$id?>"},
            url:"<?=site_url('shop/simpan_pesan')?>",
            success:function(){
                berforeSendLoading.modal('hide');
                /*window.open("<?=site_url('shop/detailmessage/'.$id)?>","_self");*/
            }
        })
    }
    </script>
</body>
</html>
<?php  
    $this->load->view('front/header');
    $left = $this->auth->bannerLoad("and posisi = 0");
    $infoPembayaran = $this->auth->infoPembayaran();
?>
<body>
    <?php $this->load->view('front/nav');?>
    <section>
      <div class="container">
        <h3>Invoice</h3>
        <table width="100%" border="1" rules="all">
          <tr>
            <th width="50%">No Invoice #<?=$list[0]['no_invoice']?></th>
            <th>Pay to</th>
          </tr>
          <tr>
            <td valign="top">
              <?=$list[0]['nama'];?>
              <br />
              <?=$list[0]['alamat'];?> <?=$list[0]['kode_pos'];?>
              <br />
              <?=$list[0]['provinsi_nama'];?> - <?=$list[0]['kabkota_nama'];?> - <?=$list[0]['kecamatan_nama'];?>
            </td>
            <td valign="top">
              <?=nl2br($infoPembayaran['isi'])?>
            </td>
          </tr>
        </table>
        <h3>Detail Invoice</h3>
        <table width="100%" rules="all" border="1">
          <tr>
            <th><center>Items</center></th>
            <th width="120"><center>Harga</center></th>
            <th width="120"><center>Jumlah (Rp)</center></th>
          </tr>
          <?php 
          $subT = 0;
          foreach ($list as $r) {
            $jml = $r['harga']*$r['qty'];
            $subT += $jml;
            echo "<tr>
            <td>$r[barang_kode] - $r[barang_nama] - Qty : $r[qty]</td>
            <td align='right'>".numIndo($r['harga'],0)."</td>
            <td align='right'>".numIndo($jml,0)."</td>
            </tr>";  
          }
          $total = $list[0]['harga_kirim']+$subT;
          ?>
          <tr>
            <td colspan="2" align="right">Sub Total (Rp)</td>
            <td align="right"><b><?=numIndo($subT,0)?></b></td>
          </tr>
          <tr>
            <td colspan="2" align="right">Delivery (Rp)</td>
            <td align="right"><b><?=numIndo($list[0]['harga_kirim'],0)?></b></td>
          </tr>
          <tr>
            <td colspan="2" align="right">Total (Rp)</td>
            <td align="right"><b><?=numIndo($total,0)?></b></td>
          </tr>
        </table>
        <br />
        <a href="<?=site_url('home/my_account/history')?>" class="btn btn-md btn-success">
          <i class="fa fa-arrow-left"></i> Kembali
        </a>
        <?php if($list[0]['status_order'] == 1){ ?>
        <a href="javascript:void(0)" class="btn btn-md btn-danger pull-right" onclick="konfirmasi()">
          <i class="fa fa-money"></i> Konfirmasi Pembayaran
        </a>
        <?php } ?>
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
    <script src="<?=base_url('adminlte/js/jquery.form.min.js');?>" type="text/javascript"></script>
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
    var successDialog = bootbox.dialog({
          title: "Success",
          message: "<div class='alert alert-success alert-dismissable'>"+
                        "<i class='fa fa-check'></i>"+
                        "<b>Alert!</b> Success Saved"+
                    "</div>",
          closeButton: true,
          show: false,
        });
    function konfirmasi() {
      bootbox.dialog({
        title: "Masukkan Data Transfer Anda",
        message: "<textarea class='form-control input-sm' name='isi' id='isi' rows='5' placeholder='Contoh : Bank Mandiri, Taufik Ute Alfan, No Invoice GHS121, 125000'></textarea>",
        buttons: {
          danger: {
            label: "Batal",
            className: "btn-warning",
            /*callback: function() {
              alert('batal');
            }*/
          },
          success: {
            label: "Simpan",
            className: "btn-success",
            callback: function() {
              $.ajax({
                beforeSend:function(){
                  berforeSendLoading .modal('show');
                },
                type:'POST',
                data:{isi:$("#isi").val()},
                url:"<?=site_url('shop/konfirmasi')?>",
                success:function(r){
                  berforeSendLoading .modal('hide');
                  successDialog.modal('show');
                }
              })
            }
          },
        }
      });
    }
    </script>
</body>
</html>
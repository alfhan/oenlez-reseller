<?php  
    $this->load->view('front/header');
    $left = $this->auth->bannerLoad("and posisi = 0");
?>
<body>
    <?php $this->load->view('front/nav');?>
    <section>
      <div class="container">
        <div class="col-md-12 col-sm-12">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">Checkout</h3>
            </div>
            <div class="panel-body">
              <form id="myForm">
                <table class="table">
                  <tr>
                    <td>Alamat</td>
                    <td colspan="3"><input name="alamat" id="alamat" class="form-control input-sm"></td>
                    <td>Kode Pos</td>
                    <td><input name="kode_pos" class="form-control input-sm"></td>
                  </tr>
                  <tr>
                    <td>Nama Penerima</td>
                    <td colspan="5"><input name="nama" id="nama" class="form-control input-sm"></td>
                    <!-- <td>Jasa Kurir</td>
                    <td>
                    <select class="form-control input-sm" name="kurir_id" id="kurir_id">
                      <?php
                        foreach ($kurir as $r) {
                          echo "<option value='$r[id]'>$r[nama]</option>";
                        }
                      ?>
                    </select>
                    </td>
                    <td>
                      <input name="harga_kirim" id="harga_kirim" readonly class="form-control input-sm">
                      <input name="harga_kirim_id" id="harga_kirim_id" type="hidden" class="form-control input-sm">
                    </td> -->
                  </tr>
                  <tr>
                    <td>No Hp</td>
                    <td><input name="hp" class="form-control input-sm" id="hp"></td>
                    <td>Catatan</td>
                    <td colspan="3"><input name="catatan" class="form-control input-sm"></td>
                  </tr>
                  <tr>
                    <td>Provinsi</td>
                    <td>
                      <select class="form-control input-sm" name="provinsi_id" id="provinsi_id" onchange="provCh()">
                        <option value="0">--Pilih Provinsi--</option>
                        <?php
                        foreach ($provinsi as $r) {
                          echo "<option value='$r[id]'>$r[nama]</option>";
                        }
                        ?>
                      </select>
                    </td>
                    <td>Kab/Kota</td>
                    <td>
                      <select id="kabkota_id" name="kabkota_id" class="form-control input-sm" onchange="kabkotaCh()">
                        
                      </select>
                    </td>
                    <td>Kecamatan</td>
                    <td>
                      <select id="kecamatan_id" name="kecamatan_id" class="form-control input-sm" onchange="kecamatanCh()">
                        
                      </select>
                    </td>
                  </tr>
                </table>
              <hr/>
              <table id="harga-kurir" width="100%" rules="all" border="1">
                
              </table>
              </form>
              <table class="table">
                <tr>
                  <th>No</th>
                  <th>Item</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                </tr>
                <?php $b=0; $no=1; $ttl = 0; foreach ($list->result_array() as $r) { ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$r['kode_barang']?> - <?=$r['barang_nama']?> - Qty : <?=$r['qty']?> - @Weight : <?=$r['berat']?></td>
                  <td><?=$r['harga']?></td>
                  <td>
                    <?php
                      $jml = $r['qty']*$r['harga'];
                      echo $jml;
                      $ttl += $jml;
                      $b += $r['berat']*$r['qty'];
                    ?>
                  </td>
                </tr>
                <?php } ?>
                <tr>
                  <td><b>Total</b></td>
                  <td colspan="2">Weight <input type="hidden" id="berat_total" value="<?=$b?>" /><?=$b?>gr</td>
                  <td><?=$ttl?></td>
                </tr>
              </table>
            </div>
            <div class="panel-footer">
              <a href="#" onclick="saveClick()" class="btn btn-md btn-success"><i class="fa fa-save"></i> Checkout</a>
            </div>
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
    var errorDialog = bootbox.dialog({
          title: "ERROR. . .",
          message: "<div class='alert alert-danger alert-dismissable'>"+
                        "<i class='fa fa-ban'></i>"+
                        "<b>Alert!</b> Error, terjadi kesalahan pada server. hubungi admin aplikasi"+
                    "</div>",
          closeButton: true,
          show: false,
        });
    function saveClick(){
      var validasi = isVlaid();
      if(validasi == true){
        var ht = $("input[name='harga_kirim_id']:checked","#myForm").val();
        if(ht){
          $('#myForm').ajaxSubmit({
            url:"<?=site_url('product/checkout');?>",
            type:'POST',
            beforeSend:function(r){
              berforeSendLoading.modal('show');
            },
            success:function(r){
              berforeSendLoading.modal('hide');
              window.open("<?=site_url('home/my_account/history')?>","_self");
            },
            error:function(r){
              berforeSendLoading.modal('hide');
              errorDialog.modal('show');
            },
          }).data('jqxhr').done(function(r){
              
          });
        }else{
          alert('Anda belum memilih jasa kurir');
        }
      }else{
        alert('Harap Lengkapi Data');
      }
    }
    function isVlaid() {
      if($("#nama").val()){
        return true;
      }else if($("#alamat").val()){
        return true;
      }else if ($("#hp").val()) {
        return true;
      }else{
        return false;
      }
    }
    function provCh(){
      $("#harga_kirim,#harga_kirim_id").val('');
      $.ajax({
        type:'POST',
        data:{id:$("#provinsi_id").val()},
        url:"<?=site_url('product/kabkota')?>",
        success:function(t){
          $("#kabkota_id").html(t);
        }
      })
    }
    function kabkotaCh(){
      $("#harga_kirim,#harga_kirim_id").val('');
      $.ajax({
        type:'POST',
        data:{id:$("#kabkota_id").val()},
        url:"<?=site_url('product/kecamatan')?>",
        success:function(r){
          $("#kecamatan_id").html(r);
        }
      })
    }
    function kecamatanCh(){
      var provinsiId = $("#provinsi_id").val();
      var kabkotaId = $("#kabkota_id").val();
      var kecamatanId = $("#kecamatan_id").val();
      var berat = $("#berat_total").val();
      $.ajax({
        type:'POST',
        data:{provinsi_id:provinsiId,kabkota_id:kabkotaId,kecamatan_id:kecamatanId,berat:berat},
        url:"<?=site_url('shop/cek_harga_kurir')?>",
        success:function(r){
          $("#harga-kurir").html(r);
        }
      });
    }
    </script>
</body>
</html>
<?php  
    $this->load->view('front/header');
    $left = $this->auth->bannerLoad("and posisi = 0");
?>
<body>
    <?php $this->load->view('front/nav');?>
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <form id="myForm">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <th class="description">Item</th>
                            <th class="price">Price</th>
                            <th class="quantity">Quantity</th>
                            <th class="jumlah" width="120">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($data->num_rows() == 0){ ?>
                        <tr>
                            <td colspan="3"><center>Data Masih Kosong</center></td>
                            <td>
                                <a href="<?=site_url('product')?>" class="btn btn-sm btn-warning pull-right"><i class="fa fa-shopping-cart"></i> Mulai Belanja</a>
                            </td>
                        </tr>
                    <?php 
                        }else{ 
                            $t = 0;
                            $b = 0;
                            foreach ($data->result_array() as $r) {
                                $jumlah = $r['qty']*$r['harga'];
                                $berat = $r['qty']*$r['berat'];
                                $t += $jumlah;
                                $b += $berat;
                                echo "<tr>
                                <td>
                                    <b>$r[kode_barang]</b> - $r[barang_nama] - $r[berat]gr - Min Pembelian ($r[min_pembelian])
                                    <a href='javascript:void(0)' class='btn btn-xs btn-danger' onclick=\"hapusClick('$r[id]')\"><i class='fa fa-minus'></i></a>
                                </td>
                                <td>$r[harga]</td>
                                <td>
                                    <input style='text-align:center' name='qty[]' value='$r[qty]' size='5' />
                                    <input type='hidden' value='$r[barang_id]' name='barang_id[]'  />
                                    <input type='hidden' value='$r[id]' name='id[]'  />
                                    $berat gr
                                </td>
                                <td align='right'>
                                    $jumlah
                                </td>
                                </tr>";
                            }
                            echo "<tr>
                            <td colspan='2' align='center'><b>Total</b></td>
                            <td><b>$b</b>gr</td>
                            <td align='right'><b>$t</b></td>
                            </tr>";
                            echo "<tr>
                                <td colspan='4'>
                                    <a href='".site_url('product')."' class='btn btn-sm btn-info'> Belanja Lagi</a>
                                    <a href='".site_url('product/checkout_cart')."' class='btn btn-sm btn-success pull-right'> Check Out</a>
                                    <a href='javascript:void(0)' onclick='saveClick()' class='btn btn-sm btn-danger pull-right'> Update Belanja</a>
                                </td>
                            </tr>";
                        }
                    ?>
                    </tbody>
                </table>
                </form>
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
        $('#myForm').ajaxSubmit({
            url:"<?=site_url('product/xupdate');?>",
            type:'POST',
            beforeSend:function(r){
              berforeSendLoading.modal('show');
            },
            success:function(r){
              berforeSendLoading.modal('hide');
              successDialog.modal('show');
              window.open("<?=site_url('home/my_cart')?>","_self");
            },
            error:function(r){
              berforeSendLoading.modal('hide');
              errorDialog.modal('show');
            },
        }).data('jqxhr').done(function(r){
            
        });
    }
    function hapusClick (id) {
        $.ajax({
          url:"<?=site_url('home/hapus/temp_jual');?>",
          type:'POST',
          data:{id:id},
          beforeSend:function(r){
            berforeSendLoading.modal('show');
          },
          success:function(r){
            berforeSendLoading.modal('hide');
            successDialog.modal('show');
            window.open("<?=site_url('home/my_cart')?>","_self");
          },
          error:function(r){
            berforeSendLoading.modal('hide');
            errorDialog.modal('show');
          },
        })
    }
    </script>
</body>
</html>
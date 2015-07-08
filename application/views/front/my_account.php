<?php  
    $this->load->view('front/header');
    $left = $this->auth->bannerLoad("and posisi = 0");
?>
<link href="<?php echo base_url('adminlte/css/datatables/dataTables.bootstrap.css');?>" rel="stylesheet" type="text/css" />
<body>
    <?php $this->load->view('front/nav');?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Account</h2>
                        <div class="panel-group category-products" id="accordian">
                        <?php foreach($list as $r){ ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="<?=$r['url']?>"><?=$r['nama'];?></a></h4>
                            </div>
                        </div>
                        <?php } ?>
                        </div>
                    </div>
                    <?php 
                        foreach ($left as $r) {
                    ?>
                    <div class="shipping text-center"><!--shipping-->
                        <img src="<?=base_url('images/banner/'.$r['foto'])?>" alt="" />
                    </div>
                    <?php } ?>
                </div>
                <div class="col-sm-9">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Info Account</h2>
                        <div class="single-blog-post">
                            <?php $this->load->view('front/'.$param.'_form');?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    &nbsp;
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view('front/footer');?>
    <script src="<?=base_url()?>asset/js/jquery.js"></script>
    <script src="<?php echo base_url('adminlte/js/plugins/datatables/jquery.dataTables.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('adminlte/js/plugins/datatables/dataTables.bootstrap.js');?>" type="text/javascript"></script>
    <script src="<?=base_url()?>asset/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>asset/js/jquery.scrollUp.min.js"></script>
    <script src="<?=base_url()?>asset/js/price-range.js"></script>
    <script src="<?=base_url()?>asset/js/jquery.prettyPhoto.js"></script>
    <script src="<?=base_url()?>asset/js/main.js"></script>
    <script src="<?=base_url('adminlte/js/bootbox.min.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('adminlte/js/jquery.form.min.js');?>" type="text/javascript"></script>
    <script type="text/javascript">
    <?php
        if($param == 'history' or $param == 'message'){
    ?>
    $(document).ready(function(){
        $("#tb").dataTable({
            "bSort":false
        });
    });
    <?php } ?>
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
            url:"<?=site_url('home/my_account');?>",
            type:'POST',
            beforeSend:function(r){
              berforeSendLoading.modal('show');
            },
            success:function(r){
              berforeSendLoading.modal('hide');
              successDialog.modal('show');
              window.open("<?=site_url('home/my_account')?>","_self");
            },
            error:function(r){
              berforeSendLoading.modal('hide');
              errorDialog.modal('show');
            },
        }).data('jqxhr').done(function(r){
            
        });
    }
    </script>
</body>
</html>
<?php  
    $this->load->view('front/header');
    $top = $this->auth->bannerLoad("and posisi = 1");
    $left = $this->auth->bannerLoad("and posisi = 0");
?>
<body>
    <?php $this->load->view('front/nav');?>
    <section id="advertisement">
        <div class="container">
            <img src="<?=base_url('images/banner/'.$top[0]['foto'])?>" alt="" />
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian">
                        <?php foreach($kategori as $r){ ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="<?=base_url('product/index/'.$r['id'])?>"><?=$r['nama'];?></a></h4>
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
                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <h2 class="title text-center">Features Items</h2>
                        <?php foreach($produk as $r) { ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?=base_url('images/kategori_feature/'.$r['foto'])?>" alt="" />
                                        <h2>Rp <?=$r['harga_jual']?></h2>
                                        <p><?=$r['nama']?></p>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="<?=site_url('product/add/'.$r['id'])?>"><i class="fa fa-shopping-cart"></i>Add to cart</a></li>
                                        <li><a href="<?=site_url('product/detail/'.$r['id'])?>"><i class="fa fa-plus-square"></i>Click to detail </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
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
</body>
</html>
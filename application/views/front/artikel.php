<?php  
    $this->load->view('front/header');
    $left = $this->auth->bannerLoad("and posisi = 0");
?>
<body>
<!-- SDK Facebook-->
	<div id="fb-root"></div>
	<script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : 396274670575098,
          xfbml      : true,
          version    : 'v2.3'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
<!-- End Sdk Facebook -->
    <?php $this->load->view('front/nav');?>
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
                                <h4 class="panel-title"><a href="<?=base_url('blog/index/'.$r['id'])?>"><?=$r['nama'];?></a></h4>
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
                        <h2 class="title text-center">Latest From Our Blog</h2>
                        <?php foreach($artikel as $r){ ?>
                        <div class="single-blog-post">
                            <h3><?=$r['judul']?></h3>
                            <div class="post-meta">
                                <ul>
                                    <!-- <li><i class="fa fa-user"></i> Mac Doe</li> -->
                                    <!-- <li><i class="fa fa-clock-o"></i> 1:33 pm</li> -->
                                    <li><i class="fa fa-calendar"></i> <?=dateToIndo($r['tanggal'])?></li>
                                </ul>
                                <span>
                                        <!-- <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i> -->
                                </span>
                            </div>
                            <a href="">
                            <?php if(file_exists('images/blog/'.$r['foto']) and !empty($r['foto'])){ ?>
                                <img src="<?=base_url('images/blog/'.$r['foto']);?>" alt="">
                            <?php }else{ ?>
                                <!-- <img src="<?=base_url('images/blog/Noimage.png');?>" alt=""> -->
                            <?php } ?>
                            </a>
                            <p>
                            <?php
                                if($detail){
                                    echo nl2br($r['isi']);
                                }else{
                                    echo substr(nl2br($r['isi']), 0,240);
                                }
                                if(!$detail){
                            ?> &nbsp; <a href="<?=site_url('blog/detail/'.$r['id']);?>" class="btn btn-xs btn-info"><i class="fa fa-file-o">&nbsp;Read More</i></a>
                            <?php }else{ ?>
                            	<div class="fb-share-button" data-href="<?=site_url('blog/detail/'.$r['id']);?>" data-layout="button"></div>
                            <?php } ?>
                            </p>
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
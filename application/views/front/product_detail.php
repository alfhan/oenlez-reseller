<?php  
    $this->load->view('front/header');
    $left = $this->auth->bannerLoad("and posisi = 0");
?>
<body>
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
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="<?=base_url('images/kategori_feature/'.$data['foto'])?>" alt="" />
                            </div>
                            <div id="similar-product" class="carousel slide" data-ride="carousel">
                                
                            </div>

                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="<?=base_url('asset/images/product-details/new.jpg');?>" class="newarrival" alt="" />
                                <h2><?=$data['nama']?></h2>
                                <p>Code: <?=$data['kode_barang']?></p>
                                <!-- <img src="images/product-details/rating.png" alt="" /> -->
                                <span>
                                <?php if($this->session->userdata('tipe') == sha1(md5(MEMBER))){ ?>
									<?php 
										if($data['is_grosir'] == 0){ 
									?>
                                    <span>Rp <?=$data['harga_jual']?></span>
									<?php }else{ ?>
									<?php 
										for($i=1;$i<=5;$i++){
											$min = 'min'.$i;
											$max = 'max'.$i;
											$harga = 'harga'.$i;
											if($data[$min])
												echo "<span style='font-size:20px'>$data[$min] - $data[$max] Dus  Rp ".number_format($data[$harga],0,',','.')."</span>";
										}
									?>
									<?php } ?>
                                    <!--<label>Quantity:</label>
                                    <input type="text" value="1" name="qty" />-->
                                    
                                    <a href="<?=site_url('product/add/'.$data['id'])?>" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                   </a>
                                   <?php } ?>
                                </span>
                                <p><b>Availability:</b> <?=$data['ready_stock'] == 1 ? "In Stock":"Out of Stock"?></p>
                                <p><b>Weight:</b> <?=$data['berat']?> <small>gr</small></p>
                                <p><b>Min Pembelian:</b> <?=$data['min_pembelian']?></p>
                                <!-- <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a> -->
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->
                    
                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                                <!-- <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li> -->
                                <!-- <li><a href="#tag" data-toggle="tab">Tag</a></li> -->
                                <li><a href="#reviews" data-toggle="tab">Reviews</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="details" >
                                <div class="col-sm-12" style="padding:5px;">
                                    <?=nl2br($data['keterangan'])?>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="reviews" >
                                <div class="col-sm-12">
                                <?php foreach ($this->auth->getReviews($data['id']) as $r) { ?>
                                    <ul>
                                        <li><a href=""><i class="fa fa-user"></i><?=$r['nama']?></a></li>
                                        <li><i class="fa fa-inbox"></i>&nbsp;<?=strtolower($r['email'])?></li>
                                        <li><a href=""><i class="fa fa-calendar-o"></i><?=dateToIndo($r['updated_at'])?></a></li>
                                    </ul>
                                    <p><?=nl2br($r['isi'])?></p>
                                <?php } ?>
                                    <hr />
                                    <p><b>Write Your Review</b></p>
                                    <form action="<?=site_url('product/review/'.$data['id']);?>" method="post" >
                                        <span>
                                            <input type="text" placeholder="Your Name" name="nama" />
                                            <input type="email" placeholder="Email Address" name="email" />
                                        </span>
                                        <textarea name="isi" ></textarea>
                                        <button type="submit" class="btn btn-default pull-right">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div><!--/category-tab-->
                    
                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>
                        
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <?php foreach($this->auth->recomendedItem("0,2") as $r){ ?>
                                    <div class="col-sm-6">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="<?=base_url('images/recomended/'.$r['foto'])?>" alt="" />
                                                    <?php if($this->session->userdata('tipe') == sha1(md5(MEMBER))){ ?>
                                                    <h2><?=$r['harga_jual']?></h2>
                                                    <?php } ?>
                                                    <p><?=$r['nama']?></p>
                                                    <?php if($this->session->userdata('tipe') == sha1(md5(MEMBER))){ ?>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="item">  
                                    <?php foreach($this->auth->recomendedItem("2,4") as $r){ ?>
                                    <div class="col-sm-6">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="<?=base_url('images/recomended/'.$r['foto'])?>" alt="" />
                                                    <?php if($this->session->userdata('tipe') == sha1(md5(MEMBER))){ ?>
                                                    <h2><?=$r['harga_jual']?></h2>
                                                    <?php } ?>
                                                    <p><?=$r['nama']?></p>
                                                    <?php if($this->session->userdata('tipe') == sha1(md5(MEMBER))){ ?>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    <?php } ?>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                             <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                              </a>          
                        </div>
                    </div><!--/recommended_items-->
                    
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
<?php  
    $this->load->view('front/header');
    $top = $this->auth->bannerLoad("and posisi = 1");
    $left = $this->auth->bannerLoad("and posisi = 0");
?>
<body>
    <?php $this->load->view('front/nav');?>
    <section id="advertisement">
        <div class="container">
        <?php if(isset($top[0]['is_aktif'])){ ?>
            <img src="<?=base_url('images/banner/'.$top[0]['foto'])?>" alt="" />
        <?php } ?>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
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
                        <h2 class="title text-center">Daftar Reseller</h2>
                        <div class="col-md-12">
							<div class="panel panel-warning">
								<div class="panel-heading">
									<h3 class="panel-title">Daftar Reseller</h3>
								</div>
								<div class="panel-body">
									<table class="table table-condensed">
										<thead>
											<tr>
												<th>No</th>
												<th>Profile</th>
												<th>Alamat</th>
												<th>Kontak</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$no=1;
												foreach ($data->result_array() as $r) {
													echo "<tr>
													<td>$no</td>
													<td valign='top'>
														<img src='".base_url('images/pelanggan/'.$r['foto'])."' class='img-thumbnail' />
														<br />
														$r[nama]
													</td>
													<td>
														Alamat : $r[alamat], $r[kab_kota]
													</td>
													<td>
														HP : $r[hp]
														<br />
														<a href='$r[fb]' target='_blank'>Facebook</a>
													</td>
													</tr>";
													$no++;
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
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
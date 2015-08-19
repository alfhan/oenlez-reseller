<?php
	$prof = $this->auth->profil();
?>
<footer id="footer"><!--Footer-->
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<div class="companyinfo">
						<h2><span></span>Oenlez</h2>
					</div>
				</div>
				<div class="col-sm-7">
					<div class="col-sm-4">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="<?=site_url('blog/detail/7')?>">Company Information</a></li>
								<li><a href="<?=site_url('blog/detail/4')?>">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="single-widget">
							<h2>Info Pembelian</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="<?=site_url('blog/detail/5')?>">Terms of Use</a></li>
								<li><a href="<?=site_url('blog/detail/6')?>">Aturan & Cara Pembelian</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="single-widget">
							<h2>Info Company</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="<?=site_url('blog/contact_us')?>">Contact Us</a></li>
								<li><a href="<?=site_url('blog/detail/2')?>">About Us</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="address">
						<img src="<?=base_url()?>asset/images/home/map.png" alt="" />
						<p><?=$prof->kabkota?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- <div class="footer-widget">
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<div class="single-widget">
						<h2>About Shopper</h2>
						<ul class="nav nav-pills nav-stacked">
							<li><a href="<?=site_url('blog/detail/7')?>">Company Information</a></li>
							<li><a href="<?=site_url('blog/detail/4')?>">FAQ’s</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="single-widget">
						<h2>Info Pembelian</h2>
						<ul class="nav nav-pills nav-stacked">
							<li><a href="<?=site_url('blog/detail/5')?>">Terms of Use</a></li>
							<li><a href="<?=site_url('blog/detail/6')?>">Aturan & Cara Pembelian</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="single-widget">
						<h2>Info Company</h2>
						<ul class="nav nav-pills nav-stacked">
							<li><a href="<?=site_url('blog/contact_us')?>">Contact Us</a></li>
							<li><a href="<?=site_url('blog/detail/2')?>">About Us</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<p class="pull-left">Copyright © 2015 O-ENLEZ Inc. All rights reserved.</p>
				<!-- <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p> -->
			</div>
		</div>
	</div>
	
</footer><!--/Footer-->
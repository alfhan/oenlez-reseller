<?php $this->load->view('front/header');?>

<body>
	<?php $this->load->view('front/nav');?>
	<?php $this->load->view('front/carousel_home');?>
	<section>
		<div 	class="container">
			<div class="row">
				<?php $this->load->view('front/landing_page');?>
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
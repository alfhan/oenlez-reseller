<?php $this->load->view('header');?>

<body>
    <?php $this->load->view('nav');?>
    <?php $this->load->view('carousel_home');?>
    <section>
        <div    class="container">
            <div class="row">
                <?php $this->load->view('landing_page');?>
            </div>
        </div>
    </section>
    <?php $this->load->view('footer');?>
    <script src="<?=base_url()?>asset/js/jquery.js"></script>
    <script src="<?=base_url()?>asset/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>asset/js/jquery.scrollUp.min.js"></script>
    <script src="<?=base_url()?>asset/js/price-range.js"></script>
    <script src="<?=base_url()?>asset/js/jquery.prettyPhoto.js"></script>
    <script src="<?=base_url()?>asset/js/main.js"></script>
</body>
</html>
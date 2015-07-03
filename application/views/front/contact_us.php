<?php  
    $this->load->view('front/header');
    $left = $this->auth->bannerLoad("and posisi = 0");
?>
<body>
    <?php $this->load->view('front/nav');?>
    <section>
        <div class="container">
            <?php if(isset($email)){ ?>
            <div class="row">
                <div class="col-sm-12 btn btn-info">
                    Terimakasih, Pesan anda akan kami proses
                </div>
            </div> 
            <br />
            <?php } ?>
            <div class="row"> 
                <div class="col-sm-8">
                    <div class="contact-form">
                        <h2 class="title text-center">Get In Touch</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                            </div>                        
                            <div class="form-group col-md-12">
                                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-info">
                        <h2 class="title text-center">Contact Info</h2>
                        <address>
                            <?=nl2br($data['isi'])?>
                        </address>
                        <div class="social-networks">
                            <h2 class="title text-center">Social Networking</h2>
                            <?php
                                $profil = $this->auth->profil();
                            ?>
                            <ul>
                                <li>
                                    <a href="<?=$profil->fb?>"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="<?=$profil->twitter?>"><i class="fa fa-twitter"></i></a>
                                </li>
                            </ul>
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
    <script type="text/javascript">
    $(document).ready(function(){

    });
    </script>
</body>
</html>
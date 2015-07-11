<?php  
    $this->load->view('front/header');
?>
<body>
    <?php $this->load->view('front/nav');?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form action="<?=site_url('home/login_member')?>" method="POST">
                            <input type="email" placeholder="Email Address" name="email" autocomplete="off" required="required" value="" />
                            <input type="password" placeholder="Password" name="password" autocomplete="off" required="required" value="" />
                            <span>
                                <!-- <input type="checkbox" class="checkbox"> 
                                Keep me signed in -->
                            </span>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form action="<?=site_url('home/register_member')?>" method="POST">
                            <input type="text" placeholder="Name" name="nama" autocomplete="off" required="required" />
                            <input type="email" placeholder="Email Address" name="email" autocomplete="off" required="required" />
                            <input type="password" placeholder="Password" name="password" autocomplete="off" required="required" />
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">&nbsp;</div>
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
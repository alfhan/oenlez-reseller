<!--Header-->
<header class="header">
    <a href="<?php echo base_url('admin');?>" class="logo">
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        <?php 
            $profil = $this->auth->profil();
            echo $profil->nama;
        ?>
    </a>
    <?php $pengguna = $this->auth->pengguna();?>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <a href="<?=base_url()?>" target="_blank" class="btn btn-xs btn-danger" style="top:14px;position:relative;">
            <i class="fa fa-external-link"></i>
            View Site
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span><?php echo $pengguna->nama;?> <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <img src="<?php echo base_url(UPLOADS.$pengguna->foto);?>" class="img-circle" alt="User Image" />
                            <p><?php echo $pengguna->nama;?></p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo base_url('usermanagement/profile');?>" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo base_url('home/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
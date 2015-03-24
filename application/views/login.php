<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>T-Code :: <?php echo TITLE_APP; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <!-- Stylesheets -->
  <link href="<?php echo base_url('template/themes/login');?>/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('template/themes/login');?>/css/font-awesome.min.css">
  <link href="<?php echo base_url('template/themes/login');?>/css/style.css" rel="stylesheet">
  
  <script src="js/respond.min.js"></script>
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Favicon -->
  <link href="<?php echo base_url("images/"). LOGO_APP;?>" rel="shortcut icon" type="image/ico" />
</head>

<body>

<!-- Form area -->
<div class="admin-form">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <!-- Widget starts -->
            <div class="widget worange">
              <!-- Widget head -->
              <div class="widget-head">
                <i class="fa fa-lock"></i> Login 
              </div>

              <div class="widget-content">
                <div class="padd">
                  <!-- Login form -->
                  <form class="form-horizontal" id="xform">
                    <!-- Email -->
                    <div class="form-group">
                      <label class="control-label col-lg-3" for="username">Username</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" autofocus>
                      </div>
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                      <label class="control-label col-lg-3" for="password">Password</label>
                      <div class="col-lg-9">
                        <input type="password" class="form-control" name="password" id="password"  placeholder="Password">
                      </div>
                    </div>
                    <!-- Remember me checkbox and sign in button -->
                    <div class="form-group">
					<div class="col-lg-9 col-lg-offset-3">
                      <div class="checkbox">
                        <label>
                          
                        </label>
						</div>
					</div>
					</div>
                        <div class="col-lg-9 col-lg-offset-3">
							<a href="#" onclick="xLogin()" class="btn btn-info btn-sm">Sign in</a>
							
						</div>
                    <br />
                  </form>
				  
				</div>
                </div>
              
                <div class="widget-foot">
                  
                </div>
            </div>  
      </div>
    </div>
  </div> 
</div>
	
		

<!-- JS -->
<script src="<?php echo base_url('template/themes/login');?>/js/jquery.js"></script>
<script src="<?php echo base_url('template/themes/login');?>/js/bootstrap.min.js"></script>
<script>
	$(document).keyup(function(t){
		var a = $('#username').val();
		var b = $('#password').val();
		if(t.which == 13){
			if(a == ''){
				$('#username').focus();
			}else if(b == ''){
				$('#password').focus();
			}else{
				xLogin();
			}
		}
	});
	function xLogin(){
		$.ajax({
			type:'POST',
			url:'<?php echo base_url('home/login');?>',
			data:$('#xform').serialize(),
			success:function(a){
				var b = eval('('+a+')');
				if(b.success){
					location='<?php echo base_url("/admin");?>';
				}else{
					alert(b.msg);
				}
			}
		});
	}
</script>
</body>
</html>
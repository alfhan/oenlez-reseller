<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>.:: <?php echo ucwords(strtolower(TITLE_APP));?> ::.</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url('adminlte/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('adminlte/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('adminlte/css/AdminLTE.css');?>" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url('adminlte/js/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('adminlte/js/bootstrap.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('adminlte/js/AdminLTE/app.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('adminlte/js/bootbox.min.js');?>" type="text/javascript"></script>
</head>
<body class="skin-blue">
<div class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
        <a class="navbar-brand" href="#" style="color:white"><?php echo ucwords(strtolower(TITLE_APP));?></a>
    </div>
    <div class="navbar-collapse collapse">
        <form id="frm" name="frm" method="post">
        <div class="col-md-8" style="top:10px">
            <input class="form-control" id="q" name="q" autofocus placeholder="Cari Data Disini . . ." />
        </div>
        <div class="col-md-1" style="top:10px">
            <button class="btn btn-success" id="search">
                <i class="fa fa-search"></i> Search
            </button>
        </div>
        </form>
    </div>
  </div>
</div>
<div id="result">
    
</div>
<script type="text/javascript">
var berforeSendLoading = bootbox.dialog({
  title: "Loading",
  message: "<div class='progress sm progress-striped active'>"+
                "<div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='100'"+
                    "aria-valuemin='0' aria-valuemax='100' style='width: 100%'>"+
                    "<span class='sr-only'>Loading</span>"+
                "</div>"+
            "</div>",
  closeButton: false,
  show: false,
});
getdata();
$("#frm").submit(function(){
    getdata();
    return false;
});
$("#search").click(function(){
    getdata();
});
function getdata(){
    $.ajax({
        beforeSend:function(r){
          berforeSendLoading.modal('show');
        },
        type:'get',
        data: {q:$("#q").val()},
        url:'<?=$urlCari?>',
        success:function(r){
            $("#result").html(r);
            berforeSendLoading.modal('hide');
            $("#q").focus();
        }
    })
}
</script>
<!--End Content-->
</body>
</html>
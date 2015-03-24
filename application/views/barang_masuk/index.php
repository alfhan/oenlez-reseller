<link href="<?php echo base_url('adminlte/css/datepicker/datepicker3.css');?>" rel="stylesheet" type="text/css" />
<section class="content-header">
    <h1>
        {title}
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Transaksi</a></li>
        <li><a href="<?php echo base_url($link);?>"><i class="fa fa-angle-double-right"></i> {title}</a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-7">
			<div class="box box-success">
				<div class="box-header">
                    <h3 class="box-title">Form {title}</h3>
                </div>
                <?php $this->load->view($link.'/form');?>
			</div>
		</div>
	</div>
</section>
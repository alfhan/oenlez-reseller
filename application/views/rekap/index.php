<section class="content-header">
    <h1><?=$title?></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Sales Management</a></li>
        <li><a href="<?php echo base_url($link);?>"><i class="fa fa-angle-double-right"></i> <?=$title?></a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-5">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title">Rekap</h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal tasi-form">
						<div class="form-group">
							<label class="control-label col-md-3">Start Date</label>
							<div class="col-md-9">
								<input class="datepicker" name="tgl1" id="tgl1" class="form-control input-sm" value="<?=date("Y-m-d")?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">End Date</label>
							<div class="col-md-9">
								<input class="datepicker" name="tgl2" id="tgl2" class="form-control input-sm" value="<?=date("Y-m-d")?>">
							</div>
						</div>
					</form>
				</div>
				<div class="panel-body">
					<a href="javascript:void(0)" class="btn btn-sm btn-info" onclick="cetak()"><i class="fa fa-print"></i> Cetak</a>
				</div>
			</div>
		</div>
	</div>
</section>
<link href="<?php echo base_url('adminlte/css/datepicker/datepicker3.css');?>" rel="stylesheet" type="text/css" />
<section class="content-header">
    <h1>
        <?php echo $title;?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Laporan</a></li>
        <li><a href="<?php echo base_url($link);?>"><i class="fa fa-angle-double-right"></i> <?php echo $title;?></a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-success">
                <form id="myForm" enctype="multipart/form-data" method="POST" class="form-horizontal">
                	<input type="hidden" id="id" name="id" />
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username" class="col-sm-3">Tanggal Awal s/d Akhir</label>
                            <div class="col-sm-2">
                                <input class="form-control input-sm" id="tgl_awal" name="tgl_awal" value="<?=date("Y-m-d")?>">
                            </div>
                            <div class="col-sm-2">
                                <input class="form-control input-sm" id="tgl_akhir" name="tgl_akhir" value="<?=date("Y-m-d")?>">
                            </div>
                            <div class="col-sm-1">
                                <button type="button" onclick="cariClick()" class="btn btn-danger btn-sm">
                                <i class="fa fa-search"></i> Cari
                                </button>
                            </div>
                        </div>

                    </div>

                </form>
			</div>
		</div>
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <div class="col-md-12">
                        <h3 class="box-title">Data <?php echo $title;?></h3>
                    </div>
                </div>
                <div class="box-body result">
                    
                </div>
            </div>
        </div>
	</div>
</section>
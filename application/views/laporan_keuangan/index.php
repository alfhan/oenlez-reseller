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
		<div class="col-md-6">
			<div class="box box-success">
                <form id="frm_hari" enctype="multipart/form-data" method="POST" class="form-horizontal" action="{urlCetak}/hari" target="_blank">
                <input type="hidden" name="mode" value="harian" />
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username" class="col-sm-4">Laporan Harian</label>
                            <div class="col-sm-3">
                                <input class="form-control input-sm" id="tanggal" name="tanggal" value="<?=date("Y-m-d")?>">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" onclick="lapClick('hari')" class="btn btn-danger btn-sm">
                                <i class="fa fa-search"></i>
                                </button>
                                <button type="button" onclick="cetakClick('hari')" class="btn btn-danger btn-sm">
                                <i class="fa fa-print"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
			</div>
		</div>
        <div class="col-md-6">
            <div class="box box-success">
                <form id="frm_bulan" enctype="multipart/form-data" method="POST" class="form-horizontal" target="_blank" action="{urlCetak}/bulan">
                <input type="hidden" name="mode" value="bulanan" />
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username" class="col-sm-4">Laporan Bulanan</label>
                            <div class="col-sm-3">
                                <?php $bulan = get_bulan_all();?>
                                <select id="bulan" name="bulan" class="form-control input-sm">
                                    <?php foreach($bulan as $key=>$value){ ?>
                                    <option value="<?=$key;?>"><?=$value;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <input name="tahun" id="tahun" placeholder="Tahun" class="form-control input-sm" />
                            </div>
                            <div class="col-sm-3">
                                <button type="button" onclick="lapClick('bulan')" class="btn btn-danger btn-sm">
                                <i class="fa fa-search"></i> 
                                </button>
                                <button type="button" onclick="cetakClick('bulan')" class="btn btn-danger btn-sm">
                                <i class="fa fa-print"></i> 
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box box-info">
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
<section class="content-header">
    <h1>
        {title}
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Laporan</a></li>
        <li><a href="<?php echo base_url($link);?>"><i class="fa fa-angle-double-right"></i> {title}</a></li>
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
                            <label for="jenis_barang_id" class="col-md-2 col-sm-2">Jenis Barang</label>
                            <div class="col-sm-3">
                            <select name="jenis_barang_id" id="jenis_barang_id" class="form-control input-sm">
                            	<?php foreach($jenis as $r){ ?>
                            	<option value="<?=$r['id'];?>"><?=$r['nama']?></option>
                            	<?php } ?>
                            </select>
                            </div>
                            <div class="col-sm-1">
                                <button type="button" onclick="cariClick()" class="btn btn-danger btn-sm">
                                <i class="fa fa-print"></i> Preview
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
                        <center><h3 class="box-title">{title}</h3></center>
                    </div>
                </div>
                <div class="box-body result">
                    
                </div>
            </div>
        </div>
	</div>
</section>
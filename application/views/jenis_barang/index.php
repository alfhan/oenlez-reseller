<section class="content-header">
    <h1>
        <?php echo $title;?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Master</a></li>
        <li><a href="<?php echo base_url($link);?>"><i class="fa fa-angle-double-right"></i> <?php echo $title;?></a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-5">
			<div class="box box-success">
				<div class="box-header">
                    <h3 class="box-title">Form <?php echo $title;?></h3>
                </div>
                <!-- form start -->
                <form id="myForm" enctype="multipart/form-data" method="POST">
                	<input type="hidden" id="id" name="id" />
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username">Nama Jenis Barang</label>
                            <input type="text" class="form-control input-sm" required="true" id="nama" name="nama" autofocus>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="button" onclick="saveClick()" class="btn btn-primary btn-sm">
                        <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
			</div>
		</div>
        <div class="col-md-7">
            <div class="box box-success">
                <div class="box-header">
                    <div class="col-md-12">
                        <h3 class="box-title">Data <?php echo $title;?></h3>
                        <button class="btn btn-sm btn-primary pull-right" style="top:10px;position:relative" onclick="addClick()">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Nama</th>
                            <th style="width:20px"></th>
                        </tr>
                        <?php 
                            $no = 1;
                            foreach ($data as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td>
                                <a title="click to edit" href="javascript:void(0)" onclick="editClick('<?php echo $row['id'];?>','<?php echo $row['nama'];?>')">
                                <?php echo $row['nama'];?>
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-danger" onclick="deleteClick('<?php echo $row['id'];?>')">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
	</div>
</section>
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
                	<input type="hidden" id="old_file" name="old_file" />
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control input-sm" name="username" id="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control input-sm" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label  for="nama">Nama</label>
                            <input type="text" class="form-control input-sm" id="nama" name="nama" placeholder="Nama Pengguna" />
                        </div>
                        <div class="form-group">
                            <label  for="group_id">Access Level</label>
                            <select class="form-control input-sm" id="group_id" name="group_id">
                            	<?php foreach ($group as $row) {
                            		echo "<option value='$row[id]'>$row[nama]</option>";	
                            	}?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control input-sm" id="email" name="email"  placeholder="Email" />
                        </div>
                        <div class="form-group">
                            <label  for="telp">Telp/HP</label>
                            <input type="text" class="form-control input-sm" id="telp" name="telp" placeholder="No Telp"/>
                            <input type="text" class="form-control input-sm" id="hp" name="hp" placeholder="No HP"/>
                        </div>
                        <div class="form-group">
                            <label  for="foto">Foto</label>
                        	<input type="file" id="foto" name="foto">
                        	<p class="help-block">Image Only</p>
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
                            <th>Akses</th>
                            <th style="width:20px"></th>
                        </tr>
                        <?php 
                            $no = 1;
                            foreach ($data as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td>
                                <a title="click to edit" href="javascript:void(0)" 
                                onclick="editClick('<?php echo $row['id'];?>','<?php echo $row['nama'];?>',
                                '<?php echo $row['username'];?>','<?php echo $row['group_id'];?>',
                                '<?php echo $row['telp'];?>','<?php echo $row['hp'];?>','<?php echo $row['email'];?>',
                                '<?php echo $row['foto'];?>')">
                                <?php echo $row['nama'];?>
                                </a>
                            </td>
                            <td>
                            	<?php
                            		foreach ($group as $g) {
                            			if($g['id'] == $row['group_id'])
                            				echo $g['nama'];
                            		}
                            	?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-danger" onclick="deleteClick('<?php echo $row['id'];?>','<?php echo $row['foto'];?>')">
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
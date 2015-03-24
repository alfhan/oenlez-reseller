<section class="content-header">
    <h1>
        Profil Pengguna
        <small>Edit</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('home/profile');?>"><i class="fa fa-users"></i> Pengguna</a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-success">
				<div class="box-header">
                    <h3 class="box-title">Form Profil Pengguna</h3>
                </div>
                <!-- form start -->
                <form class="form-horizontal" id="myForm" enctype="multipart/form-data" method="POST">
                	<input type="hidden" value="<?php echo $user->foto;?>" name="old_file" />
                	<input type="hidden" value="<?php echo $user->id;?>" name="id" />
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-md-3" for="username">Username</label>
                            <div class="col-md-3">
                            	<input type="text" class="form-control input-sm" value="<?php echo $user->username;?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3" for="password">Password</label>
                            <div class="col-md-3">
                            	<input type="password" class="form-control input-sm" id="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3" for="nama">Nama</label>
                            <div class="col-md-4">
                            	<input type="text" class="form-control input-sm" id="nama" name="nama" value="<?php echo $user->nama;?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3" for="group_id">Access Level</label>
                            <div class="col-md-2">
                            	<select class="form-control input-sm" id="group_id" name="group_id">
                            	<?php foreach ($group_id as $row) {
                            		$select = $row['id'] == $user->group_id ? "selected":"";
                            		echo "<option $select value='$row[id]'>$row[nama]</option>";	
                            	}?>
                            	</select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3" for="email">Email</label>
                            <div class="col-md-4">
                            	<input type="email" class="form-control input-sm" id="email" name="email" value="<?php echo $user->email;?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3" for="telp">Telp/HP</label>
                            <div class="col-md-3">
                            	<input type="text" class="form-control input-sm" id="telp" name="telp" value="<?php echo $user->telp;?>" />
                            </div>
                            <div class="col-md-3">
                            	<input type="text" class="form-control input-sm" id="hp" name="hp" value="<?php echo $user->hp;?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3" for="foto">Foto</label>
                            <div class="col-md-4">
                            	<input type="file" id="foto" name="foto">
                            	<p class="help-block">Image Only</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="button" onclick="saveClick()" class="btn btn-primary">
                        <i class="fa fa-save"></i>&nbsp;Save
                        </button>
                    </div>
                </form>
			</div>
		</div>
	</div>
</section>
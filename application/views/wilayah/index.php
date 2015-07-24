<section class="content-header">
    <h1><?=$title?></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Master</a></li>
        <li><a href="<?php echo base_url($link);?>"><i class="fa fa-angle-double-right"></i> <?=$title?></a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
        <div class="col-md-12">
           <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#provinsi" aria-controls="provinsi" role="tab" data-toggle="tab">Provinsi</a></li>
		    <li role="presentation"><a href="#kabkota" aria-controls="kabkota" role="tab" data-toggle="tab">Kab / Kota</a></li>
		    <li role="presentation"><a href="#kecamatan" aria-controls="kecamatan" role="tab" data-toggle="tab">Kecamatan</a></li>
		    <li role="presentation"><a href="#kurir" aria-controls="kurir" role="tab" data-toggle="tab">Kurir</a></li>
		    <li role="presentation"><a href="#tarif" aria-controls="tarif" role="tab" data-toggle="tab">Tarif</a></li>
		  </ul>
		  <div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="provinsi">
		    	<br />
		    	<form id="frm-provinsi">
		    		<div class="form-gorup">
		    			<label class="control-label col-md-2">Nama Provinsi</label>
		    			<div class="col-md-3">
		    				<input class="form-control input-sm" name="nama" id="nama" />
		    				<input type="hidden" name="id" id="id" />
		    			</div>
		    			<div class="col-md-7">
		    				<a href="#" class="btn btn-sm btn-success save-provinsi"><i class="fa fa-save"></i> Simpan </a>
		    				<div class="btn-group pull-right" role="group" aria-label="...">
								<a href="#" class="btn btn-sm btn-default add-provinsi" title="Add"><i class="fa fa-plus"></i> Add</a>
								<a href="#" class="btn btn-sm btn-default edit-provinsi" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
								<a href="#" class="btn btn-sm btn-default delete-provinsi" title="Delete"><i class="fa fa-minus"></i> Delete</a>
							</div>
		    			</div>
		    		</div>
		    	</form>
		    	<hr />
			    <table id="dt-provinsi" class="table table-condensed table-hover">
			    	<thead>
						<tr>
							<th width="25">No</th>
							<th>Nama</th>
						</tr>
					</thead>
			    </table>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="kabkota">
		    	<br />
		    	<form id="frm-kabkota">
		    		<div class="form-gorup">
		    			<label class="control-label col-md-1">Provinsi</label>
		    			<div class="col-md-3">
		    				<select class="form-control input-sm" name="provinsi_id" id="provinsi_id">
		    				<?php
		    					foreach ($provinsi as $r) {
		    						echo "<option value='$r[id]'>$r[nama]</option>";
		    					}
		    				?>
		    				</select>
		    				<input type="hidden" name="id" id="id" />
		    			</div>
		    			<label class="control-label col-md-2">Nama Kab/Kota</label>
		    			<div class="col-md-2">
		    				<input class="form-control input-sm" name="nama" id="nama" />
		    			</div>
		    			<div class="col-md-4">
		    				<a href="#" class="btn btn-sm btn-success save-kabkota"><i class="fa fa-save"></i> Simpan </a>
		    				<div class="btn-group pull-right" role="group" aria-label="...">
								<a href="#" class="btn btn-sm btn-default add-kabkota" title="Add"><i class="fa fa-plus"></i> Add</a>
								<a href="#" class="btn btn-sm btn-default edit-kabkota" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
								<a href="#" class="btn btn-sm btn-default delete-kabkota" title="Delete"><i class="fa fa-minus"></i> Delete</a>
							</div>
		    			</div>
		    		</div>
		    	</form>
		    	<hr />
		    	<table id="dt-kabkota" class="table table-condensed table-hover">
		    		<thead>
						<tr>
							<th width="25">No</th>
							<th>Nama</th>
						</tr>
					</thead>
		    	</table>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="kurir">
		    	<br />
		    	<form id="frm-kurir">
		    		<div class="form-gorup">
		    			<label class="control-label col-md-2">Nama Kurir</label>
		    			<div class="col-md-2">
		    				<input class="form-control input-sm" name="nama" id="nama" />
		    				<input type="hidden" name="id" id="id" />
		    			</div>
		    			<div class="col-md-4">
		    				<a href="#" class="btn btn-sm btn-success save-kurir"><i class="fa fa-save"></i> Simpan </a>
		    				<div class="btn-group pull-right" role="group" aria-label="...">
								<a href="#" class="btn btn-sm btn-default add-kurir" title="Add"><i class="fa fa-plus"></i> Add</a>
								<a href="#" class="btn btn-sm btn-default edit-kurir" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
								<a href="#" class="btn btn-sm btn-default delete-kurir" title="Delete"><i class="fa fa-minus"></i> Delete</a>
							</div>
		    			</div>
		    		</div>
		    	</form>
		    	<hr />
		    	<table id="dt-kurir" class="table table-condensed table-hover">
		    		<thead>
						<tr>
							<th width="25">No</th>
							<th>Nama</th>
						</tr>
					</thead>
		    	</table>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="kecamatan">
		    	<br />
		    	<form id="frm-kecamatan">
		    		<div class="form-gorup">
		    			<label class="control-label col-md-1">Provinsi</label>
		    			<div class="col-md-3">
		    				<select class="form-control input-sm" name="provinsi_id" id="provinsi_id">
		    				<?php
		    					foreach ($provinsi as $r) {
		    						echo "<option value='$r[id]'>$r[nama]</option>";
		    					}
		    				?>
		    				</select>
		    				<input type="hidden" name="id" id="id" />
		    			</div>
		    			<label class="control-label col-md-1">Kab/Kota</label>
		    			<div class="col-md-3">
		    				<select class="form-control input-sm" name="kabkota_id" id="kabkota_id">
		    				</select>
		    			</div>
		    			<div class="col-md-4">
		    				<a href="#" class="btn btn-sm btn-success save-kecamatan"><i class="fa fa-save"></i> Simpan </a>
		    				<div class="btn-group pull-right" role="group" aria-label="...">
								<a href="#" class="btn btn-sm btn-default add-kecamatan" title="Add"><i class="fa fa-plus"></i> Add</a>
								<a href="#" class="btn btn-sm btn-default edit-kecamatan" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
								<a href="#" class="btn btn-sm btn-default delete-kecamatan" title="Delete"><i class="fa fa-minus"></i> Delete</a>
							</div>
		    			</div>
		    		</div>
		    		<div class="form-gorup">
		    			<div class="col-md-12"></div>
		    		</div>
		    		<div class="form-gorup">
		    			<label class="control-label col-md-1">Kecamatan</label>
		    			<div class="col-md-3">
		    				<input class="form-control input-sm" name="nama" id="nama" />
		    			</div>
		    		</div>
		    	</form>
		    	<hr />
		    	<table id="dt-kecamatan" class="table table-condensed table-hover">
		    		<thead>
						<tr>
							<th width="25">No</th>
							<th>Nama</th>
						</tr>
					</thead>
		    	</table>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="tarif">
		    	<br />
		    	<form id="frm-tarif">
		    		<div class="form-gorup">
		    			<label class="control-label col-md-1">Provinsi</label>
		    			<div class="col-md-3">
		    				<select class="form-control input-sm" name="provinsi_id" id="provinsi_id">
		    				<?php
		    					foreach ($provinsi as $r) {
		    						echo "<option value='$r[id]'>$r[nama]</option>";
		    					}
		    				?>
		    				</select>
		    				<input type="hidden" name="id" id="id" />
		    			</div>
		    			<label class="control-label col-md-1">Kab/Kota</label>
		    			<div class="col-md-3">
		    				<select class="form-control input-sm" name="kabkota_id" id="kabkota_id">
		    				</select>
		    			</div>
		    			<label class="control-label col-md-1">Kecamatan</label>
		    			<div class="col-md-3">
		    				<select class="form-control input-sm" name="kecamatan_id" id="kecamatan_id">
		    				</select>
		    			</div>
		    		</div>
		    		<div class="form-gorup">
		    			<div class="col-md-12"></div>
		    		</div>
		    		<div class="form-gorup">
		    			<label class="control-label col-md-1">Berat (Kg)</label>
		    			<div class="col-md-1">
		    				<input class="form-control input-sm" name="berat" id="berat" />
		    			</div>
		    			<label class="control-label col-md-1">Harga (Rp)</label>
		    			<div class="col-md-1">
		    				<input class="form-control input-sm" name="harga" id="harga" />
		    			</div>
		    			<label class="control-label col-md-1">EST (Hari)</label>
		    			<div class="col-md-2">
		    				<input class="form-control input-sm" name="est" id="est" />
		    			</div>
		    			<label class="control-label col-md-2" style="text-align:right"> Kurir</label>
		    			<div class="col-md-3">
		    				<select name="kurir_id" id="kurir_id" class="form-control input-sm">
		    				<?php
		    					foreach ($kurir as $r) {
		    						echo "<option value='$r[id]'>$r[nama]</option>";
		    					}
		    				?>
		    				</select>
		    			</div>
		    		</div>
		    		<div class="form-gorup">
		    			<div class="col-md-12"></div>
		    		</div>
		    		<div class="form-gorup">
		    			<div class="col-md-12">
		    				<a href="#" class="btn btn-sm btn-success save-tarif"><i class="fa fa-save"></i> Simpan </a>
		    				<div class="btn-group pull-right" role="group" aria-label="...">
								<a href="#" class="btn btn-sm btn-default add-tarif" title="Add"><i class="fa fa-plus"></i> Add</a>
								<a href="#" class="btn btn-sm btn-default edit-tarif" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
								<a href="#" class="btn btn-sm btn-default delete-tarif" title="Delete"><i class="fa fa-minus"></i> Delete</a>
							</div>
		    			</div>
		    		</div>
		    	</form>
		    	<hr />
		    	<table id="dt-tarif" class="table table-condensed table-hover">
		    		<thead>
						<tr>
							<th width="25">No</th>
							<th>Berat</th>
							<th>Harga</th>
							<th>EST</th>
						</tr>
					</thead>
		    	</table>
		    </div>
		  </div>
        </div>
	</div>
</section>
<section class="content-header">
    <h1>{title}</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Other</a></li>
        <li><a href="<?php echo base_url($link);?>"><i class="fa fa-angle-double-right"></i> {title}</a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<label class="col-md-2">Master Data</label>
			<div class="col-md-3">
				<select class="form-control input-sm" id="master_id">
					<?php
					foreach ($list as $key => $value) {
						echo "<option value='$key'>$value</option>";
					}
					?>
				</select>
			</div>
			<div class="col-md-1 col-sm-1">
				<a href="#" class="btn btn-sm btn-info " onclick="cariClick()"><i class="fa fa-search"></i></a>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 result">
			
		</div>
	</div>
</section>
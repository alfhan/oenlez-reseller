<section class="content-header">
	<h1><?=$title?></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Sales Management</a></li>
        <li><a href="<?php echo base_url($link);?>"><i class="fa fa-angle-double-right"></i> <?=$title?></a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title"><?=$title?></h3>
				</div>
				<div class="box-body">
					<form class="cmxform form-horizontal tasi-form" role="form">
						<div class="form-group">
							<div class="col-md-12">
								<b><?=dateToIndo($data['parent']['waktu'],true,true)?></b> : 
								<br />
								<?=nl2br($data['parent']['isi'])?>
							</div>
						</div>
						<table class="table" id="tb">
							<thead>
								<tr>
									<th>User & Time</th>
									<th>Isi</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$n=1;
							foreach ($data['child'] as $r) {
								if($r['user_id']){
									$user = "<b>Administrator</b>";
								}else{
									$user = 'Pelanggan';
								}
								echo "<tr>
								<td>$user<br />".dateToIndo($r['waktu'],true,true)."</td>
								<td>".nl2br($r['isi'])."</td>
								</tr>";
								$n++;
							}
							?>
							</tbody>
						</table>
					</form>
				</div>
				<div class="box-footer">
					<form class="cmxform form-horizontal tasi-form" role="form" id="myForm">
		                <input type="hidden" name="id" id="id" value="<?=$data['parent']['id']?>" />
		                <div class="form-group">
		                	<div class="col-md-12">
		                		<textarea class="form-control input-sm" row="4" name="isi" id="isi"></textarea>
		                		<div class="col-md-12">
		                			&nbsp;
		                		</div>
		                		<a href="<?=site_url('notifikasi')?>" class="btn btn-sm btn-info"><i class="fa fa-angle-double-left"></i> Kembali</a>
		                		<a href="javascript:void(0)" class="btn btn-sm btn-primary save-click pull-right"><i class="fa fa-save"></i> Reply</a>
		                	</div>
		                </div>
		            </form>
				</div>
			</div>
		</div>
	</div>
</section>
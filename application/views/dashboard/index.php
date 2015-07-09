<section class="content-header">
    <h1>
        <?=$title?>
        <small><?=$title?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=site_url('home/admin')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-lg-3 col-xs-6">
		  <!-- small box -->
		  <div class="small-box bg-aqua">
		    <div class="inner">
		      <h3><?=$data['new_order']?></h3>
		      <p>New Orders</p>
		    </div>
		    <div class="icon">
		      <i class="ion ion-bag"></i>
		    </div>
		    <a href="<?=site_url('daftar_penjualan')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		  </div>
		</div><!-- ./col -->
		<div class="col-lg-3 col-xs-6">
		  <!-- small box -->
		  <div class="small-box bg-green">
		    <div class="inner">
		      <h3><?=$data['member']?></h3>
		      <p>Total Member</p>
		    </div>
		    <div class="icon">
		      <i class="ion ion-man"></i>
		    </div>
		    <a href="<?=site_url('daftar_pelanggan')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		  </div>
		</div><!-- ./col -->
		<div class="col-lg-3 col-xs-6">
		  <!-- small box -->
		  <div class="small-box bg-blue">
		    <div class="inner">
		      <h3><?=$data['sales_item']['qty']?></h3>
		      <p>Sales Items</p>
		    </div>
		    <div class="icon">
		      <i class="ion ion-ios7-cart"></i>
		    </div>
		    <a href="<?=site_url('barang')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		  </div>
		</div><!-- ./col -->
		<div class="col-lg-3 col-xs-6">
		  <!-- small box -->
		  <div class="small-box bg-yellow">
		    <div class="inner">
		      <h3><?=$data['notifikasi']?></h3>
		      <p>Notifikasi</p>
		    </div>
		    <div class="icon">
		      <i class="ion ion-android-mail"></i>
		    </div>
		    <a href="<?=site_url('notifikasi')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		  </div>
		</div><!-- ./col -->
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-success">
		        <div class="panel-heading with-border">
		          <h3 class="panel-title">Latest Orders</h3>
		          <!-- <div class="box-tools pull-right">
		            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
		          </div> -->
		        </div><!-- /.box-header -->
		        <div class="panel-body">
		          <div class="table-responsive">
		            <table class="table no-margin">
		              <thead>
		                <tr>
		                  <th>No Invoice</th>
		                  <th>Penerima</th>
		                  <th>Tanggal Order</th>
		                  <th>Total</th>
		                  <th>Open</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php
		              	foreach ($data['last_order'] as $r) {
		              ?>
		                <tr>
		                  <td><a href="<?=site_url('daftar_penjualan/form/'.$r['id'])?>"><?=$r['no_invoice']?></a></td>
		                  <td><?=$r['nama']?></td>
		                  <td><?=dateToIndo($r['tanggal'])?></td>
		                  <td><?=$r['total']+$r['harga_kirim']?></td>
		                  <td>
		                  	<a href="<?=site_url('daftar_penjualan/form/'.$r['id'])?>" class="btn btn-xs btn-warning"><i class="fa fa-list"></i> Detail</a>
		                  </td>
		                </tr>
		               <?php } ?>
		              </tbody>
		            </table>
		          </div><!-- /.table-responsive -->
		        </div><!-- /.box-body -->
		        <div class="panel-footer clearfix">
		          <!-- <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a> -->
		          <a href="<?=site_url('daftar_penjualan')?>" class="btn btn-sm btn-info btn-flat pull-right">View All Orders</a>
		        </div><!-- /.box-footer -->
		      </div>
		</div>
		<div class="col-md-4">
	      <div class="box box-danger bg-red">
	      	<div class="box-header">
	      		<h3 class="box-title" style="color:white" ><b><?=$data['barang']?></b></h3>
	      	</div>
	        <div class="box-body">
	        	<a href="<?=site_url('barang')?>" target="_blank" class="btn btn-default btn-xs">More info <i class="fa fa-arrow-circle-right"></i></a>
	        	<label class="box-title pull-right" style="color:white">Total Produk</label>
	        </div>
	      </div>
	      <div class="box box-success bg-green">
	      	<div class="box-header">
	      		<h3 class="box-title" style="color:white"><b><?=$data['total_pendapatan']['total']?></b></h3>
	      	</div>
	        <div class="box-body">
	        	<a href="<?=site_url('rekap/total_pendapatan')?>" target="_blank" class="btn btn-default btn-xs">More info <i class="fa fa-arrow-circle-right"></i></a>
	        	<label class="box-title pull-right" style="color:white">Total Pendapatan</label>
	        </div>
	      </div>
	      <div class="box box-primary bg-blue">
	      	<div class="box-header">
	      		<h3 class="box-title" style="color:white"><b><?=$data['total_pendapatan_bulan_ini']['total']?></b></h3>
	      	</div>
	        <div class="box-body">
	        	<a href="<?=site_url('rekap/bulan_ini')?>" target="_blank" class="btn btn-default btn-xs">More info <i class="fa fa-arrow-circle-right"></i></a>
	        	<label class="box-title pull-right" style="color:white">Pendapatan Bulan Ini</label>
	        </div>
	      </div>
		</div>
	</div>
</section>
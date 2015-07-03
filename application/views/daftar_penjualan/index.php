<section class="content-header">
    <h1>{title}</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-shopping-cart"></i> Sales Management</a></li>
        <li><a href="<?php echo base_url($link);?>"><i class="fa fa-angle-double-right"></i> {title}</a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
        <div class="col-md-12">
        <table width="100%" class="table table-responsive table-condensed" id="tb">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Pelanggan</th>
                    <th>Kepada</th>
                    <th>Kabupaten/Kota</th>
                    <th>Jumlah (Rp)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $o = 1;
                    foreach ($data as $r) { 
                ?>
                <tr>
                    <td><?=$o++?></td>
                    <td><?=$r['no_pelanggan']?></td>
                    <td><?=$r['kepada'];?></td>
                    <td><?=$r['kab_kota'];?></td>
                    <td><?=$r['jumlah'];?></td>
                    <td>
                        <a href="<?=base_url('daftar_penjualan/form/'.$r['id'])?>" class="btn btn-xs btn-warning"><i class="fa fa-th"></i> Detail</a>
                        <a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="deleteClick(<?=$r['id']?>)"><i class="fa fa-minus"></i> Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>  
	</div>
</section>
<section class="content-header">
    <h1><?=$title?></h1>
    <!--<div class="col-sm-1 col-md-1 pull-right" style="bottom:30px">
        <a href="<?=base_url($link)?>/form" class="btn btn-sm bg-blue">
            <i class="fa fa-plus"></i>
            Tambah
        </a>
    </div>-->
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Sales Management</a></li>
        <li><a href="<?php echo base_url($link);?>"><i class="fa fa-angle-double-right"></i> <?=$title?></a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
        <div class="col-md-12">
           <table class="table" id="tbls">
               <thead>
                   <tr>
                       <th width="35">No</th>
                       <th>Tanggal</th>
                       <th>Tipe / Status</th>
                       <th>Pesan</th>
                       <th width="125">Aksi</th>
                   </tr>
               </thead>
               <tbody>
                <?php 
                    $no = 1;
                    foreach ($data as $r) { 
                      $act = $r['status'] == 0 ? "class='active'":"";
                ?>
                <tr <?=$act?>>
                    <td><?=$no++?></td>
                    <td><?=dateToIndo($r['waktu'],true,true)?></td>
                    <td><?=ucwords($r['tipe'])?></td>
                    <td><?=nl2br($r['isi'])?></td>
                    <td>
                        <a href="<?="$link/form/$r[id]"?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Balas</a>
                        <a href="#" class="btn btn-xs btn-danger" onclick="deleteClick('<?=$r['id']?>')"><i class="fa fa-remove"></i> Hapus</a>
                    </td>
                </tr>
                <?php } ?>
               </tbody>
           </table>
        </div>
	</div>
</section>
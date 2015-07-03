<section class="content-header">
    <h1><?=$title?></h1>
    <br />
    <br />
    <div class="col-sm-1 col-md-1 pull-right" style="bottom:30px">
        <a href="<?=base_url($link)?>/form" class="btn btn-sm bg-blue">
            <i class="fa fa-plus"></i>
            Tambah
        </a>
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Article Management</a></li>
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
                       <th>Judul</th>
                       <th width="125">Aksi</th>
                   </tr>
               </thead>
               <tbody>
                <?php 
                    $no = 1;
                    foreach ($data as $r) {
                ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$r['judul']?></td>
                    <td>
                        <a href="<?="$link/form/$r[id]"?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
                        <a href="#" class="btn btn-xs btn-danger" onclick="deleteClick('<?=$r['id']?>','<?=$r['foto']?>')"><i class="fa fa-remove"></i> Hapus</a>
                    </td>
                </tr>
                <?php } ?>
               </tbody>
           </table>
        </div>
	</div>
</section>
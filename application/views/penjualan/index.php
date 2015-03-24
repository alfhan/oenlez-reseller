<section class="content-header">
    <h1>
        <?php echo $title;?>
        <small>
            <?=dateToIndo(date("Y-m-d"))?>
            <b>(Saldo Awal Anda)</b>
            <input class="form-control input-sm" name="saldo_awal" id="saldo_awal" value="{so}" style="font-size:16px" />
        </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Transaksi</a></li>
        <li><a href="<?php echo base_url($link);?>"><i class="fa fa-angle-double-right"></i> <?php echo $title;?></a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<?php $this->load->view($link.'/pencarian');?>
	</div>
	<div class="row">
		<?php $this->load->view($link.'/result');?>
	</div>
</section>
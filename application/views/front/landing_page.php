<?php $landing_page = $this->auth->landing_page(4); ?>
<div class="col-sm-12 padding-right">
	<!--features_items-->
	<div class="features_items">
		<h2 class="title text-center">Features Items</h2>
		<?php 
			$i = 0;
			foreach ($landing_page as $r) {

		?>
		<div class="col-sm-3">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						<img src="<?=base_url('images/kategori_feature/'.$r['foto'])?>" alt="" />
						<?php if($r['is_grosir'] == 0){ ?><h2>Rp <?=$r['harga_jual']?></h2> <?php } ?>
						<p><?=$r['nama']?></p>
					</div>
					<div class="product-overlay">
						<div class="overlay-content">
							<h3 style="color:#fff">Min Pembelian <br /> <?=$r['min_pembelian']?> <?=$r['is_grosir']?'Kardus':'Item'?></h3>
							<?php if($r['is_grosir'] == 0){ ?>
							<h2>Rp <?=$r['harga_jual']?></h2>
							<?php 
								}else{
									echo "<table width='100%'>";
									for($i=1;$i<=5;$i++){
										$min = 'min'.$i;
										$max = 'max'.$i;
										$harga = 'harga'.$i;
									if($r[$min])
										echo "<tr><td>$r[$min] - $r[$max] Dus</td><td> Rp ".number_format($r[$harga],0,',','.')."</td></tr>";
									}
									echo "</table>";
								} 
							?>
							<p><?=$r['nama']?></p>
							<a href="<?=site_url('product/add/'.$r['id'])?>" class="btn btn-default btn-sm pull-left"><i class="fa fa-shopping-cart"></i> Add</a>
							<a href="<?=site_url('product/detail/'.$r['id'])?>" class="btn btn-default btn-sm pull-right"><i class="fa fa-plus-square"></i> Detail</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		
	</div>
	<!--features_items-->
	<!--category-tab-->
	<!--
	<?php $kategoriProduk = $this->auth->kategoriProduk();?>	
	<div class="category-tab">
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				<?php 
					$i=0;
					foreach($kategoriProduk as $r){ 
						$active = $i == 0 ? "class='active'":"";
						$i++;
				?>
				<li <?=$active?>><a href="#_<?=$r['id']?>" data-toggle="tab"><?=$r['nama']?></a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="tab-content">
		<?php 
			$i=0;
			foreach ($kategoriProduk as $r) {
				$active = $i == 0 ? "active":"";
				$i++;
		?>
			<div class="tab-pane fade <?=$active?> in" id="_<?=$r['id']?>" >
				<?php foreach($this->auth->getBarang($r['id']) as $row){ ?>
				<div class="col-sm-3">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="<?=base_url('images/kategori_feature/'.$row['foto'])?>" alt="" />
								<h2><?=$row['harga_jual']?></h2>
								<p><?=$row['nama']?></p>
								<a href="<?=site_url('product/add/'.$row['id'])?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
							</div>
							
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		<?php } ?>
		</div>
	</div>
	-->
	<!--/category-tab-->
	<!--recommended_items-->
	<!-- <div class="recommended_items">
		<h2 class="title text-center">recommended items</h2>
		
		<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					<?php foreach($this->auth->recomendedItem("0,3") as $r){ ?>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="<?=base_url('images/recomended/'.$r['foto'])?>" alt="" />
									<h2><?=$r['harga_jual']?></h2>
									<p><?=$r['nama']?></p>
									<a href="<?=site_url('product/add/'.$r['id'])?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="item">	
					<?php foreach($this->auth->recomendedItem("3,3") as $r){ ?>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="<?=base_url('images/recomended/'.$r['foto'])?>" alt="" />
									<h2><?=$r['harga_jual']?></h2>
									<p><?=$r['nama']?></p>
									<a href="<?=site_url('product/add/'.$r['id'])?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			  </a>
			  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
				<i class="fa fa-angle-right"></i>
			  </a>			
		</div>
	</div> -->
	<!--/recommended_items-->
</div>
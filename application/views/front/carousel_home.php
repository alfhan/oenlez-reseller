<?php
	$car = $this->auth->carousel_home();
	$prof = $this->auth->profil();
?>
<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
					<?php
						$i = 0;
						foreach($car as $r){
							$active = $r == 0 ? "class='active'" : "";
							$i++;
					?>
						<li data-target="#slider-carousel" data-slide-to="<?=$i?>" <?=$active?>></li>
					<?php } ?>
					</ol>
					
					<div class="carousel-inner">
					<?php 
						$i = 0;
						foreach ($car as $r) {
							$active = $i == 0 ? "active" : "";
							$i++;
					?>
						<div class="item <?=$active?>">
							<div class="col-sm-4">
								<h1><span>O</span>-enlez</h1>
								<h2><?=$r['judul'];?></h2>
								<p><?=nl2br($r['keterangan'])?></p>
							</div>
							<div class="col-sm-8">
								<img src="<?=base_url('images/slide_show/'.$r['foto'])?>" class="girl img-responsive pull-right" alt="" />
							</div>
						</div>
					<?php } ?>
					</div>
					
					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>
				
			</div>
		</div>
	</div>
</section><!--/slider-->
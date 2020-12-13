<?php include_once 'header.php'; ?>

			<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css">
			<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" type="text/css" href="assets/css/hobrt.css">
			<!-- Main -->
			<div class="lx-main">
				<!-- Main Content -->
				<div class="lx-main-content">
					<?php if(isset($msg)){ ?>
					<div class="t11">
						<?php echo $msg; ?>
					</div>
					<?php } ?>


					<?php foreach($info as $p) : ?>

					<div class="lx-g2" style="float:left;">
						<div class="lx-product-images">
							<div class="lx-product-main-img">
								<img src="<?php echo base_url("uploads")."/".add_thumb($p->images , "") ?>" data-nb="0" />
							</div>
							<ul>
								<?php

								$images = explode(",", $p->images);

								foreach($images as $img) {
								?>
								<li><img src="<?php echo base_url("uploads")."/".add_thumb($img , "_m") ?>" /></li>
								<?php } ?>
								<div class="lx-clear-fix"></div>
							</ul>
						</div>
					</div>
					<div class="lx-g2">
						<div class="lx-product-details">
							<h1> <?php echo $p->title; ?></h1>
							<?php if($p->discount > 0) { ?> <p class="lx-product-disaccount"><span>تخفيض:</span> <?php echo $p->discount; ?>% </p> <?php } ?>
							<?php if($p->discount > 0) { ?>
								<p class="lx-product-price"><span>
                                        <?php echo $p->price; ?> د.ج </span> <?php echo floor($p->price - ($p->price * $p->discount / 100)); ?>
                                    د.ج</p>
							<?php }else{ ?>
								<p class="lx-product-price"><?php echo $p->price; ?> د.ج </p>
							<?php } ?>
							<div class="lx-product-qty">
								<ins>الكمية: </ins>
								<span class="lx-minus">-</span>
								<input type="text" id="qty" name="qty" data-max="1000" value="1" />
								<span class="lx-plus">+</span>
							</div>
							<div class="lx-purchase-btns">
								<a href="javascript:;" class="lx-add-to-cart" data-id="<?php echo $p->id; ?>">أطلب الآن</a>
							</div>

							<div class="lx-purchase-btns-floating">
								<a href="javascript:;" class="lx-add-to-cart" data-id="<?php echo $p->id; ?>">أطلب الآن</a>
							</div>

							<p class="lx-watching"><abbr><?php echo rand(100, 200); ?></abbr> شخص يشاهد هذا المنتوج حاليا</p>
							<ul>
								<?php echo nl2br($p->info); ?>

							</ul>
								<br>
							<ul>

								<style type="text/css">
									
									iframe {
										width: 100%;
										height: 300px;
									}

								</style>

								<?php echo nl2br($p->descr); ?>

							</ul>
						</div>
					</div>

					<?php endforeach; ?>

					<div class="lx-clear-fix"></div>

					<div class="lx-bloc-title">

				

						</div>

					</div>

					

<?php include_once 'footer.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>

<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>


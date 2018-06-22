<?php global $theme_options; ?>
			<div class="" id="home-clients">
				<div class="container">
					<div class="text">
					   <div class="home-clients-logos">
						  <div class="row">
							<?php 
									if(!empty($theme_options['customer_brands'])); 
									foreach($theme_options['customer_brands'] as $value){
							?>
							 <div class="col-md-6 col-sm-12 col-xs-12 clients-start-ups">
								<h5><?php echo $value['title']; ?></h5>
								<img src="<?php echo $value['image']; ?>" class="img-responsive" alt="">
							 </div>
							<?php } ?>
						  </div>
					   </div>
					</div>
				</div>
			</div>

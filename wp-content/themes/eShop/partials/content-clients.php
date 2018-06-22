<?php global $theme_options; ?>
	<div class="homepage-featured" id="home-clients">
		<div class="container">
			<div class="text">
			   <h2 class="secondary"><?php echo $theme_options['clients_block_heading']; ?></h2>
			   <div class="sub-title">
				  <p><?php echo $theme_options['clients_block_text']; ?></p>
			   </div>
			   <div id="industries-tab" style="margin-bottom: 60px;">
				  <div class="homepage-services">
					<?php 
							if(!empty($theme_options['clients_block_boxes'])); 
							foreach($theme_options['clients_block_boxes'] as $value){
					?>
					 <div class="service-img-container">
						<img class="service-img" src="<?php echo $value['image']; ?>"/>
						<h2><?php echo $value['title']; ?></h2>
					 </div>
					<?php } ?>
				  </div>
				  <?php /*<div class="row industry-columns">
					 <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						<div class="industry-column">
						   <h2>Beauty & Fashion</h2>
						   <h2>Consulting Services</h2>
						   <h2>Education</h2>
						   <h2>Entertainment & Media</h2>
						   <h2>Financial</h2>
						   <h2>Food & Beverage</h2>
						</div>
					 </div>
					 <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						<div class="industry-column">
						   <h2>Government</h2>
						   <h2>Insurance</h2>
						   <h2>Luxury</h2>
						   <h2>Medical & Healthcare</h2>
						   <h2>Publication</h2>
						   <h2>Real Estate</h2>
						</div>
					 </div>
					 <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						<div class="industry-column">
						   <h2>Schools & Institutions</h2>
						   <h2>Small Business</h2>
						   <h2>Sports</h2>
						   <h2>Technology Services</h2>
						   <h2>Transportation</h2>
						   <h2>Travel</h2>
						</div>
					 </div>
				  </div> */ ?>
			   </div>
			</div>
		</div>
	</div>

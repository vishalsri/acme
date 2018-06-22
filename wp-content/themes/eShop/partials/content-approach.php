<?php global $theme_options; ?>
	<div class="homepage-featured container-fluid" id="home-approach">
		 <div class="text">
			<h2 class="secondary"><?php echo $theme_options['approach_block_heading']; ?></h2>
			<div class="container sub-title">
			   <p><?php echo $theme_options['approach_block_text']; ?></p>
			</div>
		 </div>
		 <div class="approach-items row" style="position: static !important; height: auto !important;">
			<!-- row -->
			<?php 
					if(!empty($theme_options['approach_block_boxes'])); 
					foreach($theme_options['approach_block_boxes'] as $value){
			?>
			<div class="homepage-featured-box col-xs-12 col-md-4">
			   <div class="image">
				  <img src="<?php echo $value['image']; ?>" alt="" class="img-responsive col-xs-12">
			   </div>
			   <div class="approach-item-text-inner">
				  <div class="approach-item-text">
					 <h3><?php echo $value['title']; ?></h3>
				  </div>
				  <div class="approach-hover" onclick="void(0)">
					 <div class="approach-item-text">
						<h3><?php echo $value['title']; ?></h3>
						<p><span class=""><?php echo $value['description']; ?></span></p>
					 </div>
				  </div>
			   </div>
			</div>
			<?php } ?>
			
		 </div>
		 <div class="row cell-buffer-top">
			<div class="text col-xs-12">
			   <p><?php echo $theme_options['approach_block_end_text']; ?></p>
			</div>
		 </div>
		 <a href="#home-clients" class="go-down-arrow grey bounce"></a>
	</div>
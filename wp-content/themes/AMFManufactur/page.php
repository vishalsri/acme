<?php get_header('pages'); 
 global $theme_options;
?>
	<div class="container">
		<div class="row wow slideInDown">
			<div class="col-lg-12 col-md-12">
				<div class="col-lg-2 col-md-2"></div>
					<div class="contact_content col-lg-8 col-md-8">
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="contact_heading col-lg-12 col-md-12" >
								<h1><?php the_title(); ?></h1>
									<?php the_content(); ?>
							
						<?php if(is_page( 'contact' )){ ?>
						<?php if(!empty($theme_options['contact_info'])){ ?>
						<?php $counter=0; ?>
						<?php foreach($theme_options['contact_info'] as $slide){ ?>
							<div class="contact_details">
								<h3><?php echo $slide['title']; ?></h3>
								<p><?php echo $slide['description']; ?></p>
							</div>
						<?php $counter++; } } }?>
							</div>
						<?php endwhile; ?>
					</div>
				<div class="col-lg-2 col-md-2"></div>
			</div>
		</div>
<?php
	get_template_part( 'template-parts/subscription' );
	get_template_part( 'template-parts/sponsers' );
	get_footer(); 
?>
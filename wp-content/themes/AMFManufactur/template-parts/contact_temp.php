<?php /* Template Name: Contact Page Template */ ?>
<?php get_header('pages'); 
 global $theme_options;
?>
	<div class="container">
	<?php if(is_page( 'contact' )){ ?>
		<div class="row wow fadeIn min-height700">
	<?php }else{ ?>
		<div class="row wow fadeIn min-height400">
	<?php } ?>
					<div class="contact_content content col-lg-8 col-md-8 col-lg-offset-2">
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="contact_heading col-lg-12 col-md-12" >
								<h2 class="black"><?php the_title(); ?></h2>
									<?php the_content(); ?>
							
						<?php if(is_page( 'contact' )){ ?>
						<?php if(!empty($theme_options['contact_info'])){ ?>
						<?php $counter=0; ?>
						<?php foreach($theme_options['contact_info'] as $slide){ ?>
							<div class="contact_details">
								<p><?php echo $slide['title']; ?></br><?php echo $slide['description']; ?></p>
							</div>
						<?php $counter++; } } }?>
							</div>
						<?php endwhile; ?>
					</div>
		</div>
<?php
	get_template_part( 'template-parts/subscription' );
	get_template_part( 'template-parts/sponsers' );
	get_footer(); 
?>
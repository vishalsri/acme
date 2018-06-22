<?php
/**
 * The template for displaying all single posts and attachments
 *
 */
 
get_header(); 
global $theme_options;
global $post;
$current_post_id = get_the_ID();
?>
<?php $categories = get_the_terms( $next_post, 'info_category' ); ?>
<?php //create string of categories ?>
<?php $category_names = ''; ?>
<?php foreach ( $categories as $category ) : ?>
<?php $category_names .= $category->name . ', ' ?>
<?php endforeach; ?>
<?php $category_names = rtrim( $category_names, ', ' ); //trim traling ' ,'; ?>

<div class="main-content-inner">
	<?php while ( have_posts() ) : the_post(); ?>
   <div class="work-detail-image bg-img" id="work-image" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>')">
      <!-- @FIXME -->
      <style>
         /* Tiny Desktops */
         @media only screen and (max-width : 768px) {
         #work-image{
			 background-size: contain;
         background-repeat: no-repeat;
         }
         }
         /* Tablets */
         @media only screen and (min-width : 768px) and (max-width : 1224px) {
         #work-image{
			 background-size: contain;
         background-repeat: no-repeat;
         }
         }
         /* Macbook Pro */
         @media only screen and (min-width : 1224px) {
         #work-image{
         height: 810px;
         background-size: contain;
         background-repeat: no-repeat;                
         }
         }
         /* Desktops and laptops */
         @media only screen and (min-width : 1500px) {
         #work-image{   
         height: 900px;
         background-size: contain;
         background-repeat: no-repeat;
         }
         }
         @media only screen and (min-width : 1601px) {
         #work-image{   
         height: 1080px;
         background-size: contain;
         background-repeat: no-repeat;
         }
         }
      </style>
      <!-- END @FIXME-->
      <div class="work-detail-title">
         <h1><?php the_title(); ?></h1>
         <p><?php echo $category_names ?> &bull; QA</p>
      </div>
   </div>
 <?php   if( have_rows('blocks') ):
			while ( have_rows('blocks') ) : the_row(); ?>
   <?php if( get_row_layout() == 'right_image_block' ): ?>
		<div class="image-text-section">
			<div class="table-row">
				<div class="text clearfix work-side-content">
					<div>
						<h3 class="p1"><?php echo get_sub_field( 'title' ); ?></h3>
						<p class="p1"><span class="s1"><?php echo get_sub_field( 'text' ); ?></span></p>
						<a target="_blank" href="<?php echo get_sub_field( 'link' ); ?>" class="btn btn-view">View Portfolio</a>
					</div>
				</div>
					<?php $image = get_sub_field( 'image' ); ?>
					<div class="image" style="background:url('<?php echo $image['sizes']['large'] ?>');background-size:cover">
					</div>
			</div>
		</div>
   <?php elseif( get_row_layout() == 'center_image_block' ): ?>
		<div class="black-section">
			<?php $image = get_sub_field( 'image' ); ?>
			<div class="client-logo">
				<img src="<?php echo $image['sizes']['large'] ?>" alt="" class="img-responsive">
			</div>
			<div class="text">
				<p><?php echo get_sub_field( 'text' ); ?></p>
			</div>
			<?php $image_2 = get_sub_field( 'image_2' ); ?>
			<div class="devices-image">
				<img src="<?php echo $image_2['sizes']['large'] ?>" alt="" class="img-responsive">
			</div>
		</div>
   <?php elseif( get_row_layout() == 'left_image_block' ): ?>
		<div class="image-text-section reversed">
			<?php $image = get_sub_field( 'image' ); ?>
			<div class="table-row">
				<div class="image" style="background:url('<?php echo $image['sizes']['large'] ?>');background-size:cover">
				</div>
				<div class="text clearfix work-side-content">
					<h3 class="p1"><?php echo get_sub_field( 'title' ); ?></h3>
						<p class="p1"><span class="s1"><?php echo get_sub_field( 'text' ); ?></span></p>
						<a target="_blank" href="<?php echo get_sub_field( 'link' ); ?>" class="btn btn-view">View Portfolio</a>
				</div>
			</div>
		</div>
		<?php endif;	
		 endwhile;
		 endif;?>
<?php endwhile; ?>
	<?php get_template_part( 'template-parts/latest_post','' ); ?>
</div>
<?php 
	get_footer(); 
?>

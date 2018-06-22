<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
get_header(); 
?>
<!-- Top Header
================================================== --> 
<?php get_template_part( 'partials/content','hero' ); ?>
<!-- Homepage Services
================================================== --> 
<?php get_template_part( 'partials/content','services' ); ?>
<!-- Homepage Portfolio
================================================== --> 
<?php get_template_part( 'partials/content','portfolio' ); ?>
<!-- Homepage Approach
================================================== --> 
<?php get_template_part( 'partials/content','approach' ); ?>	
<!-- Homepage Clients
================================================== --> 
<?php get_template_part( 'partials/content','clients' ); ?>	
<!-- Homepage Clients Brands
================================================== --> 
<?php get_template_part( 'partials/content','brands' ); ?>	
<!-- Homepage Red Block
================================================== --> 
<?php get_template_part( 'partials/content','red_block' ); ?>	
			 
<?php get_footer(); ?>
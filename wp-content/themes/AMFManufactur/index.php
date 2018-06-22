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
get_template_part( 'template-parts/block' );
get_template_part( 'template-parts/music_block' );
get_template_part( 'template-parts/gallery_block' );
get_template_part( 'template-parts/festival_info' );
get_template_part( 'template-parts/newsBlock' );
get_template_part( 'template-parts/instagram_block' );
get_template_part( 'template-parts/subscription' );
get_template_part( 'template-parts/sponsers' );
?>
<?php get_footer(); ?>

<?php
/**

 */  global $theme_options;
?>

		</div><!-- .site-content -->
</div>
	<?php if(is_active_sidebar('footer')) : ?>
		<section class="wow fadeIn hidden-sm hidden-xs">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer">
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2">
					<?php dynamic_sidebar('footer'); ?>
				</div>
			</div>
		</section>
	<?php endif; ?>
<a href="#" class="scrollToTop"><i class="fa fa-chevron-circle-up fa-4x" aria-hidden="true"></i></a>
		<footer id="colophon" class="site-footer row" role="contentinfo">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 site-info text-sm-center text-xs-center text-lg-left text-md-left">
					<span class="site-title">
						<?php echo $theme_options['footer_text']; ?>
					</span>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 site-img text-sm-center text-xs-center">
					<a href="<?php if(!empty($theme_options['footer_links'])){ echo $theme_options['footer_links']; }else{ echo esc_url( home_url( '/' ) ); } ?>" rel="home">
						<span class="footer_right_text text-sm-center text-xs-center text-md-right">
							<?php echo $theme_options['footer_right_text']; ?>
							<?php if(!empty($theme_options['footerimg']['url'])){ ?>
							<img src="<?php echo $theme_options['footerimg']['url']; ?>" class="" />
							<?php } ?>
						</span>
					</a>
				</div>
			</div><!-- .site-info -->
		</footer><!-- .site-footer -->
<?php wp_footer(); ?>
</body>
</html>

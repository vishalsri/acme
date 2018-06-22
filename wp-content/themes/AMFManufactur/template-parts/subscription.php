<?php  global $theme_options; ?>
<?php if($theme_options['newsletter_section'] == 'show') { ?>
<?php if(is_front_page()) { ?>
	<div class="row subscribe wow fadeIn">
<?php }else {?>
	<div class="row subscribe_exrta wow fadeIn">
<?php } ?>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " >
			<?php if($theme_options['background_subscription'] == 'color') { ?>
				<div class="subscription" style="background-color:<?php echo $theme_options['subscribe_block_bg_color']; ?>">
			<?php } else { ?>
				<div class="subscription"  style="background-image:url('<?php echo $theme_options['subscribe_block_bg_image']['background-image'];?>');background-position: <?php echo $theme_options['subscribe_block_bg_image']['background-position'];?>;background-repeat: <?php echo $theme_options['subscribe_block_bg_image']['background-repeat'];?>;background-size: <?php echo $theme_options['subscribe_block_bg_image']['background-size'];?>;">
			<?php } ?>
				<h2><?php echo $theme_options['subscribe_block_heading']; ?></h2>
				<p><?php echo $theme_options['subscribe_block_subheading']; ?></p>
			</div>
		</div>
	</div>
	<?php } ?>
<?php global $theme_options; 
?>
<div id="home-image" class="cover " style="visibility: visible;">
	<?php if($theme_options['header_bg'] == 'sliders' ){
				echo do_shortcode($theme_options['header_slides']);
			}elseif($theme_options['header_bg'] == 'video'){
	 // echo '<pre>';print_r($theme_options['header_video']);echo '</pre>';//die(__FILE__ . ": line " . __LINE__);
	?>
	
	<style>
		#myVideo iframe {
			position: relative;
			right: 0;
			bottom: 0;
			min-width: 100%; 
			min-height: 100%;
		}
	</style>

	<div id="myVideo">
		<?php echo $theme_options['header_video']; ?>
	</div>
	<script>
		var height = "innerHeight" in window ? window.innerHeight : document.documentElement.offsetHeight;
		document.getElementById("myVideo").style.height = height+'px';
	</script>
			<?php }else{ ?>
	<div id="cover-item" class="bg-img coarse" >
		<div class="bg-img fine"></div>
	</div>
	<a href="#home-featured" class="go-down-arrow bounce"></a>
	<script>
		var height = "innerHeight" in window ? window.innerHeight : document.documentElement.offsetHeight;
		document.getElementById("home-image").style.height = height+'px';
	</script>
	<?php } ?>
</div>
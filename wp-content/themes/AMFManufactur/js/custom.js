
jQuery( document ).ready(function() {
			//Radio Player
			jQuery(".post-radio").click(function(e) {
				 e.preventDefault();
				var track_url = (jQuery(this).attr('id'));
				jQuery("#track_iframe").attr('src',track_url);
				jQuery(".music-player").show();
				jQuery("body").addClass("player-active");
				jQuery(".music-player").addClass("player-active");
			});
			jQuery(".music-player .close").click(function() {
				jQuery("body").removeClass("player-active");
				jQuery(".music-player").removeClass("player-active");
				jQuery(".music-player").hide();
			});
			//Loadmore for Gallery
			 jQuery(".load_more_gallery").slice(0,3).show();
				setTimeout(function(){
					if(jQuery('.load_more_gallery').length > 3){
						jQuery('.load_more_gallery:gt(2)').hide();
					}
				},1000);
				
				jQuery("#loadMore_gallery").on('click', function (e) {
					e.preventDefault();
					jQuery(".load_more_gallery:hidden").slice(0, 3).slideDown();
					if (jQuery(".load_more_gallery:hidden").length == 0) {
						jQuery("#load").fadeOut('slow');
					}
					jQuery('html,body').animate({
						scrollTop: jQuery(this).offset().top
					}, 1500);
				});
				//Loadmore for Other Pages
			jQuery(".load_more").slice(0, 4).show();
				jQuery("#loadMore").on('click', function (e) {
					e.preventDefault();
					jQuery(".load_more:hidden").slice(0, 4).slideDown();
						if (jQuery(".load_more:hidden").length == 0) {
							jQuery("#load").fadeOut('slow');
						}
					jQuery('html,body').animate({
						scrollTop: jQuery(this).offset().top
					}, 1500);
				});
				
		function image_Resize(){
			//console.log('funt created');
			var height = jQuery('.music_img').height();
			//console.log(height);
			var div_height = jQuery('.radio_heading').height();
			//console.log(div_height);
			var div_final_height = div_height+10;
			//console.log(div_final_height);
			jQuery(".spotify_playlist iframe").css('height',height - div_final_height);
		}


		//Target form spinner
		gform.addFilter( 'gform_spinner_target_elem', function( $targetElem, formId ) {
		    return $( '#form-ajax-gif' );
		} );


	     wow = new WOW(
                      {
                      boxClass:     'wow',      // default
                      animateClass: 'animated', // default
                      offset:       0,          // default
                      mobile:       false,       // default
                      live:         true        // default
                    }
                    )
                    wow.init();
			//new WOW().init();

			//console.log('initiate at doucument ready');
			jQuery('.js-flickity').flickity({
				cellAlign: 'left',
				contain: true,
				prevNextButtons: false,
				imagesLoaded: true
			});


				/* jQuery('#box').hide();
				jQuery('#container').mouseover(function(){
					jQuery('#box').show();
					jQuery("#container").hide();
				});
				jQuery('#box').mouseout(function(){
					jQuery('#box').hide();
					jQuery("#container").show();
				}); */
		jQuery(window).scroll(function() {
			if (jQuery(this).scrollTop() > 50) {
				jQuery('.scrollToTop').fadeIn(200);
			} else {
				jQuery('.scrollToTop').fadeOut(200);
			}
		});
		//Click event to scroll to top
		jQuery('.scrollToTop').click(function() {
			jQuery('html, body').animate({
				scrollTop: 0
			}, 500);
			return false;
		});
		// jQuery('.video').hide();
		//jQuery('.animation').hide();
			var playersrc= jQuery('#ytplayer').attr('src');
				jQuery('.gallery_video').mouseover(function(){
			//		jQuery('.animation').show();
				});


			jQuery('#gallery_video').on('click', function(ev) {
				jQuery('.video_bg').fadeOut(1000);
				jQuery('.video-overlay-banner').fadeOut(1000);
				jQuery('.video').show(1000);
				jQuery("#ytplayer")[0].src += "?rel=0&autoplay=1";
				ev.preventDefault();
			});

			jQuery('.gallery_video').mouseout(function(){
				//jQuery('.animation').hide();
			});


			jQuery('.nav span').click(function (e) {

				jQuery(this).tab('show');

				var tabContent = '.tabContent-' + this.id;
				//console.log(tabContent);
				jQuery('.tabContent-info').hide();
				jQuery('.tabContent-wtb').hide();
				jQuery('.tabContent-safety').hide();
				jQuery('.tabContent-tickets').hide();
				jQuery(tabContent).show();
			});
				jQuery('.tabContent-info').show();
				jQuery('.tabContent-wtb').hide();
				jQuery('.tabContent-safety').hide();
				jQuery('.tabContent-tickets').hide();


/***********Menu******************/
			jQuery('.menu_content').hide();
			jQuery('ul.top_header_menu li a').each(function(){
			 jQuery(this).attr('onclick','openNav()');
				var anchor_text  = jQuery(this).text();
				var converted_text = anchor_text.replace(/\s+/g, '-').toLowerCase();
				jQuery(this).attr('class',converted_text);
			});
			jQuery('.tab_menu>div>ul>li>a').hide();
			jQuery('ul.top_header_menu li a, .hamburger-menu a').click(function(){
					setTimeout(function(){
							jQuery('.tab_menu>div>ul>li>a').fadeIn(1000);
					}, 700);
					jQuery('#overlay-half').addClass('overlay-half');
					var anchor_class = jQuery(this).attr('class');
					//console.log(anchor_class);
					/* jQuery(this).parent().siblings().find('a').removeClass('current_tab');
					jQuery(this).addClass('current_tab'); */
					jQuery('ul.top-menu li a').each(function(){
						 var anchor_class11 = jQuery(this).attr('class');
						 if(anchor_class == anchor_class11){
						 jQuery(this).parent().siblings().find('a').removeClass('current_tab');
							jQuery(this).addClass('current_tab');
							}
						 });
					//alert(anchor_class);
				setTimeout(function(){
					jQuery('.menu_content').each(function(){
					 var container_id =jQuery(this).children().attr('id');
					 if(container_id == anchor_class){
					  jQuery(this).show();
					 } else{
					  jQuery(this).hide();
					 }
					});
				}, 500);
			});

			jQuery('.menu_content').hide();
			jQuery('ul.top-menu li a').each(function(){
				 var anchor_text  = jQuery(this).text();
				 var converted_text = anchor_text.replace(/\s+/g, '-').toLowerCase();
				 jQuery(this).addClass(converted_text);
			});

			jQuery('ul.top-menu li a').click(function(){

				var anchor_class = jQuery(this).attr('class');
				//console.log(anchor_class);
				jQuery(this).parent().siblings().find('a').removeClass('current_tab');
				jQuery(this).addClass('current_tab');
				jQuery('.menu_content').each(function(){
				 var container_id =jQuery(this).children().attr('id');
				//alert(container_id);
				 if(container_id == anchor_class){
				  jQuery(this).show();
				 } else{
				  jQuery(this).hide();
				 }
				});
				jQuery('ul.top-menu li a').removeClass('active');
				jQuery(this).addClass('active');
			});


			jQuery('.closebtn').click(function(){
				jQuery('#overlay-half').removeClass('overlay-half');
				jQuery('.menu_content').hide();
				jQuery('.tab_menu>div>ul>li>a').hide();
			});


			jQuery('button.navbar-toggle').click(function(){
				jQuery(this).attr('onclick','openNav2()');
				jQuery('.menu_content').show();

				var isMobile = window.matchMedia("only screen and (max-width: 760px)");

				if (isMobile.matches) {
					jQuery("#mySidenav2").css('width', '100%');
				}
			});


			/* jQuery(function(){
				jQuery('img.play_svg').each(function(){
					var $img = jQuery(this);
					var imgClass = $img.attr('class');
					var imgURL = $img.attr('src');
					jQuery.get(imgURL, function(data) {
						// Get the SVG tag, ignore the rest
						var $svg = jQuery(data).find('svg');
						// Add replaced image's classes to the new SVG
						if(typeof imgClass !== 'undefined') {
							$svg = $svg.attr('class', imgClass+' replaced-svg');
						}
						// Remove any invalid XML tags as per http://validator.w3.org
						$svg = $svg.removeAttr('xmlns:a');
						// Replace image with new SVG
						$img.replaceWith($svg);
					}, 'xml');

				});
			}); */
			jQuery('img.music_svg_hvr').hide();
				jQuery('a.music_svg').mouseover(function(){
					jQuery('img.music_svg_hvr').show();
					jQuery("img.music_svg_org").hide();
				});
				jQuery('a.music_svg').mouseout(function(){
					jQuery('img.music_svg_org').show();
					jQuery("img.music_svg_hvr").hide();
				});


				jQuery('img.play_svg_hover').hide();
				jQuery('.video-overlay-banner').mouseover(function(){
					jQuery('img.play_svg_hover').show();
					jQuery("img.play_svg_org").hide();
				});
				jQuery('.video-overlay-banner').mouseout(function(){
					jQuery('img.play_svg_org').show();
					jQuery("img.play_svg_hover").hide();
				});
				image_Resize();

});
jQuery( window ).resize(function() {
	//image_Resize();
});
jQuery(window).load(function() {


			jQuery('.js-flickity').flickity({
				cellAlign: 'left',
				contain: true,
				prevNextButtons: false,
				imagesLoaded: false
			});
			//console.log('initiate at load');
});

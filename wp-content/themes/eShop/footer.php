<?php
/**

 */  global $theme_options;
?>
			<script>
                  jQuery(function($){
                  // fixes 1-2px rounding issue dealing with 3 columns
                  $(window).resize(function() {
                  var windowWidth = $(window).width();
                  var remainder = windowWidth % 3;
                  $('#work-container').css('width', windowWidth - remainder);
                  });
                  // Homepage Masonry elements
                  // var masonrySelectorArray = [$('.approach-items'), $('.home-featured')];
                  // masonrySelectorArray.map(function(selector){
                  // selector.imagesLoaded( function(){
                  // selector.masonry({
                  // itemSelector: '.box',
                  // gutter: 0,
                  // columnWidth: '.grid-sizer'
                  // });
                  // });
                  // });
                  var $ll_home_img = $('#cover-item.bg-img');
                  //$ll_home_img.css('background-image', 'url("http://ddgsb4yncp1w5.cloudfront.net/wp-content/themes/eShop/images/homepage/desktop.jpg")');
                  //$ll_home_img.addClass('fine');
                  setTimeout(function() {
                  //$ll_home_img.removeClass('coarse');
                  $ll_home_img.find('.bg-img.fine').css('left', 0);
                  $ll_home_img.find('.bg-img.fine').css('position', 'relative');
                  $ll_home_img.css('background-image', 'none');
                  }, 1000);
                  });
               </script>
               <div class="footer">
                  <div class="footer-menu"></div>
                  <div class="row newsletter-subscribe container">
                     <div class="col-xs-12 subscribe-title">
                        <h5>Newsletter Sign Up</h5>
                     </div>
                     <div class="col-xs-12">
                         <?php echo do_shortcode('[contact-form-7 id="93" title="Newsletter"]'); ?>
                     </div>
                  </div>
                  <div class="row footer-data hidden-sm visible-md-block visible-lg-block">
                     <div class="col-md-1">
                        <div class="row footer-social">
                           <div class="col-md-12">
                              <ul>
                                 <li><a href="<?php echo $theme_options['facebook']; ?> " target="_blank" class="fb-link"></a></li>
                              </ul>
                           </div>
                           <div class="col-md-12">
                              <ul>
                                 <li><a href="<?php echo $theme_options['twitter']; ?>" target="_blank" class="tw-link"></a></li>
                              </ul>
                           </div>
                           <div class="col-md-12">
                              <ul>
                                 <li><a href="<?php echo $theme_options['googlePlus']; ?>" target="_blank" class="gp-link"></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-11">
                        <div class="footer-offices row">
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
								<p><?php echo $theme_options['office_address']; ?></p>
							</div>
							<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
								<?php echo $theme_options['office_address_map']; ?> 
							</div>
                           <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                              <a href="javascript:void(0)" class="red-section-bell"><span>Request a proposal</span></a>
                           </div>
                           <div class="col-lg-1 col-md-2 col-sm-6 col-xs-6 rooftop-lounge">
                              <div class="lounge-button">
                                 <div class="text">Genius Toppers</div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="footer-copyright row container">
                        <div class="col-xs-12">
                          <?php echo $theme_options['footer_text']; ?>            
                        </div>
                     </div>
                  </div>
                  
				  
				  
				  
				  <!-- Footer data -->
				<div class="row footer-data-mobile hidden-md visible-sm-block visible-xs-block">
				 <div class="row footer-bell">
					<div class="col-md-12">
					   <div class="col-sm-6 col-xs-6">
						  <a href="javascript:void(0)" class="red-section-bell"><span>Request a proposal</span></a>
					   </div>
					   <div class="col-sm-6 col-xs-6 rooftop-lounge">
						  <div class="lounge-button">
							 <div class="text">Rooftop Lounge</div>
						  </div>
					   </div>
					</div>
				 </div>
				 <div class="row footer-social">
					<div class="col-xs-12">
					   <ul>
						  <li class="fb"><a href="https://www.facebook.com/pages/Lounge-Lizard-Worldwide-Inc/43528043595" target="_blank" class="fb-link"></a></li>
						  <li class="tw"><a href="https://twitter.com/eShopWW" target="_blank" class="tw-link"></a></li>
						  <li class="gp"><a href="https://plus.google.com/+eShopWorldwide" target="_blank" class="gp-link"></a></li>
					   </ul>
					</div>
				 </div>
				 <div class="container">
					<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
					   <div class="footer-offices row">
						  <div class=" col-sm-6 col-xs-6 new-york">
							 <p><span itemprop="addressRegion" class="region">NEW YORK</span></p>
							 <p class="address"><span itemprop="streetAddress">41 East 11th Street<br>
								11th Floor<br></span>
								<span itemprop="addressLocality">New York</span>, <span itemprop="addressRegion">NY</span> <span itemprop="postalCode">10003</span><br>
							 </p>
							 <p class="directions"><a target="_blank" href="https://www.google.com/maps/place/Lounge+Lizard+Worldwide,+Inc./@40.7332744,-73.9949955,17z/data=!3m1!4b1!4m5!3m4!1s0x89c25999bd9bce4f:0x4faf333f7db27150!8m2!3d40.7332744!4d-73.9928068?hl=en">Get Directions</a></p>
						  </div>
						  <div class="col-sm-6 col-xs-6 new-york">
							 <p><span class="region underline"><a href="tel:16466617828">PHONE</a></span></p>
							 <p class="address"><a href="tel:16466617828"><span itemprop="telephone">1-646-661-7828</span></a><br>
						  </div>
					   </div>
					   <div class="footer-offices row">
						  <div class="col-sm-6 col-xs-6 new-york">
							 <p><span itemprop="addressRegion" class="region">LONG ISLAND</span></p>
							 <p class="address"><span itemprop="streetAddress">31 West Main Street<br>
								Suite 212<br></span>
								<span itemprop="addressLocality">Patchogue</span>, <span itemprop="addressRegion">NY</span> <span itemprop="postalCode">11772</span><br>
							 </p>
							 <p class="directions"><a target="_blank" href="https://www.google.com/maps/search/Lounge+Lizard+Worldwide,+Inc.,long+island/@40.7492208,-73.7845217,10z/data=!3m1!4b1?hl=en">Get Directions</a></p>
						  </div>
						  <div class="col-sm-6 col-xs-6 new-york">
							 <p><span class="region underline"><a href="tel:18884440110">PHONE</a></span></p>
							 <p class="address"><a href="tel:16315811000"><span itemprop="telephone">1-631-581-1000</span></a><br>
						  </div>
					   </div>
					   <div class="footer-offices row">
						  <div class="col-sm-6 col-xs-6 new-york">
							 <p><span itemprop="addressRegion" class="region">LOS ANGELES</span></p>
							 <p class="address"><span itemprop="streetAddress">100 Glendon Avenue<br>
								17th Floor<br></span>
								<span itemprop="addressLocality">Los Angeles</span>, <span itemprop="addressRegion">CA</span> <span itemprop="postalCode">90024</span><br>
							 </p>
							 <p class="directions"><a target="_blank" href="https://www.google.com/maps/place/Lounge+Lizard+Worldwide,+Inc./@34.0605955,-118.4460207,17z/data=!3m1!4b1!4m5!3m4!1s0x80c2bc81bcfa6439:0xd7d161971d68d0d!8m2!3d34.0605955!4d-118.443832?hl=en">Get Directions</a></p>
						  </div>
						  <div class="col-sm-6 col-xs-6 new-york">
							 <p><span class="region underline"><a href="tel:15303345677">PHONE</a></span></p>
							 <p class="address"><a href="tel:15303345677"><span itemprop="telephone">1-530-334-5677</span></a><br>
						  </div>
					   </div>
					</div>
					<div class="footer-copyright row container">
					   <div class="col-xs-12">
						  All Rights Reserved © 2016-17 eShop Genius is a <a href="<?php ?>">Web Design Company</a> since 2010. <a href="privacy-policy/index.html">Privacy Policy</a> | <a href="careers/index.html">Careers</a>                
					   </div>
					</div>
				 </div>
				 <!-- container -->
			  </div>
      <!-- footer data Mobile -->
               </div>
               <!-- footer -->
            </div>
            <!-- Main Content -->
         </div>
         <!-- #site-canvas -->
         <div class="side-menu">
            <div class="side-menu-inner">
               <div class="side-overflow">
                  <a href="javascript:void(0)" class="close-side-menu-btn"><span></span><span></span></a>
                  <div class="side-contact">
                     <div class="contact-form">
                        <div class="text">
                           <h3>Request a Proposal</h3>
                           <h4>Fill Out Our Form &amp; We&#8217;ll be in Touch Shortly</h4>
                        </div>
						<?php echo do_shortcode('[contact-form-7 id="95" title="Proposal"]'); ?>
                     </div>
                  </div>
                  <div class="side-locations">
                     <h3>Our Locations</h3>
                     <p>PH: 1-888-444-0110<br />
                        Sales: Ext. 102
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript" >
         jQuery(function($){
         $('body').fadeTo(1, 1.0);
         $('#menu-desktop-menu>li.menu-item-has-children').hover(function(e) {
         $(this).toggleClass('open');
         // var par = $(this);
         // $('#menu-desktop-menu .open').not(par).removeClass('open');
         // e.preventDefault();
         });
         });
      </script>
<?php wp_footer(); ?>
   </body>
</html>

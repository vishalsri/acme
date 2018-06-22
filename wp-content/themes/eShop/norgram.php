<?php /*Template Name: Norgram Blog Post*/ ?>
<?php  
global $theme_options; 
get_header('blog');
?>
		<div style='display: none;' id='content'>
			<div data-name="general-data">
				<div data-name="menu">
					<div data-name="contact">
						<div data-name="headline">Contact</div>
						<div data-name="columns">
							<div data-name="column">
								<?php echo $theme_options['office_address'];?>
							</div>
							<div data-name="column">
								<?php echo $theme_options['footer_phoneno']; ?><br>
								<a href="mailto:<?php echo $theme_options['footer_email']; ?>?Subject=Hi%20eShopGenius" target="_top"><?php echo $theme_options['footer_email']; ?></a>
							</div>
							<!--div data-name="column">
								For job and Intern<br>
								inquiries please write<br>
								<a href="mailto:<?php echo $theme_options['footer_email']; ?>?Subject=Hi%20eShopGenius" target="_top"><?php echo $theme_options['footer_email']; ?></a><br><br>
							</div-->
						</div>
					</div>
					<div data-name="footer">
						<div data-name="copyright" ><?php echo $theme_options['footer_text']; ?></div>
						<div data-name="cvr" ></div>
					</div>
					<div data-name="social">
						<div data-name="facebook" data-link="<?php echo $theme_options['facebook']; ?>">Facebook</div>
						<div data-name="twitter" data-link="<?php echo $theme_options['twitter']; ?>">Twitter</div>
						<div data-name="googleplus" data-link="<?php echo $theme_options['googlePlus']; ?>">GooglePlus</div>
					</div>
				</div>
				<div data-name="pagefooter">
					<div data-name="email"><a href="mailto:<?php echo $theme_options['footer_email']; ?>?Subject=Hi%20eShopGenius" target="_top"><?php echo $theme_options['footer_email']; ?></a></div>
					<div data-name="phone"><?php echo $theme_options['footer_phoneno']; ?></div>
				</div>
			</div>
			<div data-name="pages">
				<div data-path='home' data-template="home">
					<!--<div data-name="menu">Home</div>-->
					<div data-name="frontpage">
						<div data-name="founded"><?php echo $theme_options['top_left_text']; ?></div>
						<div data-name="link" data-link="projects">Selected Projects</div>
						<div data-name="body">
							Forming design<br>
							languages<br>
							for the<br>
							digital era.
						</div>
					</div>
					<div data-name="stories">
					<?php /*******Stories Starts*********/ ?>
						<?php 
							$args = array('post_type'=>'work','posts_per_page'=>-1);
							$loop = new WP_Query($args);
							if ( $loop->have_posts() ) : 
								while ( $loop->have_posts() ) : $loop->the_post();
									$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
									$post_date = get_the_date( 'F j — Y' ); 
									$categories = get_the_terms( $next_post, 'work_category' ); 

									$category_names = '';
									foreach ( $categories as $category ) : 
									$category_names .= $category->name . ', ' ;
									endforeach; 
									$category_names = rtrim( $category_names, ', ' ); //trim traling ' ,'; 
									$images = get_field( "work_images" );
						?>
						<div data-name="story">
							<div data-name="date"><?php echo $post_date;?></div>
							<div data-name="headline">
								<?php the_title(); ?>
							</div>
							<div data-name="body"><?php the_excerpt(); ?></div>
							<div data-name="image-tag-name"><?php echo $category_names; ?></div>
							<div data-name="images">
							<?php 
								if(!empty($images)){
									foreach( $images as $gallery_images ): 
							?>
								<div data-name="image"><?php echo $gallery_images['url']; ?></div>
							<?php endforeach;}else{ ?>
								<div data-name="image"><?php echo $image[0]; ?></div>
							<?php } ?>
							</div>
						</div>	
						<?php  endwhile; ?>
						<?php endif; ?>						
						
					<?php /*******Stories End*********/ ?>
					
					</div>
				</div>
				<div data-path='studio' data-template="profile">
					<div data-name="menu">Studio</div>
					<div data-name="frontpage">
						<div data-name="founded"><?php echo $theme_options['top_left_text']; ?></div>
						<div data-name="story">
							<?php echo $theme_options['top_right_text']; ?>
						</div>
						<div data-name="body">
							<?php echo $theme_options['main_text']; ?>
						</div>
					</div>
					<div data-name="employees">
						<div data-name="employee">
							<div data-name="info">
								<div data-name="name">Sebastian Gram</div>
								<div data-name="title">Co—founder &<br>Design Director</div>
								<div data-name="mail"><a href="mailto:sg@eShopGenius.co?Subject=Hi%20Sebastian" target="_top">sg@eShopGenius.co</a></div>
								<div data-name="phone">+45 60228703</div>
								<div data-name="linkedin">https://www.linkedin.com/in/sebastiangram</div>
								<div data-name="twitter">https://twitter.com/sebastiangram</div>
							</div>
							<div data-name="image">assets/images/profile/profile_seb.png</div>
						</div>
						<div data-name="employee">
							<div data-name="info">
								<div data-name="name">Mathias Høst Normark</div>
								<div data-name="title">Co—founder &<br>Design Director</div>
								<div data-name="mail"><a href="mailto:mhn@eShopGenius.co?Subject=Hi%20Mathias" target="_top">mhn@eShopGenius.co</a></div>
								<div data-name="phone">+45 53377537</div>
								<div data-name="linkedin">https://www.linkedin.com/in/mathiashnormark</div>
								<div data-name="twitter">https://twitter.com/MathiasHN</div>
							</div>
							<div data-name="image">assets/images/profile/profile_mat.png</div>
						</div>
					</div>
					<div data-name="service">
						<div data-name="headline">Our services</div>
						<div data-name="body">We help brands shape their businesses and create unique design languages. We use a combination of our offerings to craft an approach that works best for each project. Independent of the output, we strive to offer new perspectives on established methods and solutions.</div>
						<div data-name="circles" data-type="round">
							<div data-name="circle">Our services</div>
							<div data-name="circle">Digital Experiences & Products</div>
							<div data-name="circle">Workshops & Talks</div>
							<div data-name="circle">Brand Identity</div>
							<div data-name="circle">Art & Creative Direction</div>
						</div>
					</div>
					<div data-name="process">
						<div data-name="headline">Process</div>
						<div data-name="body">Our approach to projects follow these 4 basic phases, each phase is carefully tailored to match the given project. At the heart of each phase lies a transparent, iterative and collaborative approach that sets the stage for a successful final output.</div>
						<div data-name="circles" data-type="straight">
							<div data-name="circle">Concept</div>
							<div data-name="circle">Implementation</div>
							<div data-name="circle">Foundation</div>
							<div data-name="circle">Design</div>
						</div>
					</div>
				</div>
				
			<?php get_template_part( 'template-parts/blog', 'principles' );?>
			<?php get_template_part( 'template-parts/work', 'blog' );?>
			</div>
		</div>

		<!-- Initialize site -->
		<script>
			window.onload = function() {
				document.body.style.margin = 0;
				document.body.style.padding = 0;
				document.body.style.color = "#1c1c1c";
				document.body.style.fontSize = "17px";
				document.body.style.fontStyle = "normal";
				document.body.style.overflowX = "hidden";
				document.body.style.width = "100%";
				document.body.style.height = "100%";
				var main = new Main();
				document.body.appendChild(main);
				main.init();
			};
		</script>
	</body>
</html>

<?php /* Template Name: FAQ Template */ ?>
<?php get_header('pages'); 
 global $theme_options;
?>
	<div class="container">
		<div class="row">
					<div class="faq_content content col-lg-8 col-md-8 col-md-11 col-sm-offset-1  col-lg-offset-2 col-md-offset-2 wow fadeInDown">
						<div class="faq_heading col-lg-12 col-md-12" >
							<h2><?php echo $theme_options['faq_page_heading']; ?></h2>
							<h3><?php echo $theme_options['faq_page_sub_heading']; ?> </h3>
						</div>
						<div class="col-lg-5 col-md-5 col-sm-5 events-tabs" >
							<ul class="nav nav-pills nav-stacked side_tabs">
								<?php $counter=0; ?>
								<?php foreach($theme_options['accordian_tabs'] as $slide){ ?>
								  <li class="<?php if($counter==0) { echo 'active'; } else{
									echo '';} ?>">
									<span id="<?php echo $slide['url']; ?>" ><?php echo $slide['title']; ?></span>
								  </li>
								<?php $counter++; } ?>
							</ul>
						</div>
						<div class="Accordions col-lg-7 col-md-7 col-sm-7" >
						<!-- Accordions -->
							<div >
								<div class="panel-group" id="accordion">
								<?php $count=0; ?>
								<?php foreach($theme_options['accordian_text'] as $slides){ ?>
									<div class="tabContent-<?php echo $slides['url']; ?> panel panel-default" id="tabContent">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $count; ?>"><?php echo $slides['title']; ?></a>
											</h4>
											<span class="pull-right icons">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $count; ?>"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>
											</span>
										</div>
										<div id="collapse<?php echo $count; ?>" class="panel-collapse collapse <?php if($count==0) { echo 'in'; } else{
									echo '';} ?>">
											<div class="panel-body tk-eurostile-extended">
												<p><?php echo $slides['description']; ?></p>
											</div>
										</div>
									</div>
								<?php $count++; } ?>	
								</div>
							</div>
						</div>
					</div>
		</div>
		<div class="row top-buffer">
				<a href="<?php echo $theme_options['get_ticket_text_link']; ?>">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 get_tickets_block no-padding wow bounceInUp" style="background-color:<?php echo $theme_options['get_ticket_background_color'];?>">
						<div class="col-lg-2 col-md-2 no-padding" style="background-image:url('<?php echo $theme_options['get_ticket_images']['url'];?>');background-position: 100% 29%;background-repeat: no-repeat;background-size: cover;">							
						</div>
						<div class="col-lg-9 col-md-9 padding40">
							<h2><?php echo $theme_options['get_ticket_next_text']; ?></h2>
							<h3><?php echo $theme_options['get_ticket_text']; ?></h3>
						</div>
						<div class="col-lg-1 col-md-1 top_padding40">
							<span><i class="fa fa-chevron-right fa-5x" aria-hidden="true"></i></span>
						</div>
					</div>
				</a>
		</div> 
<?php
	get_template_part( 'template-parts/subscription' );
	get_template_part( 'template-parts/sponsers' );
get_footer(); ?>
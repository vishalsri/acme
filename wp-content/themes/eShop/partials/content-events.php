<?php $args = array( 'post_type' => 'event', 'meta_key' => 'date', 'orderby' => 'meta_value_num', 'order' => 'ASC', 'posts_per_page' => -1  ); ?>

<?php $events = new WP_Query( $args ); ?>

<?php if ( $events->have_posts() ): ?>

    <section id="events-section" class="text-center">

        <h1 class="white content-margin-large">Upcoming Events</h1>

        <div class="grid-container content-margin-large">

            <?php while ( $events->have_posts() ) : $events->the_post(); ?>

                <div class="grid-x post-event-wide content-margin-small">
                    <div class="cell medium-3 small-text-center medium-text-left">
                        <div class="image" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/eventpreview.jpg);"></div>
                    </div>
                    <div class="cell medium-2 small-text-center medium-text-center">
                        <div class="">
                            <?php //date is in format (j F or 23 Jun); split by ' ' then output ?>
                             <?php $raw_date    = split( ' ', get_field( 'date' ) ); ?>
                             <?php $day         = $raw_date[0]; ?>
                             <?php $month       = $raw_date[1]; ?>

                            <h1><?php echo $day; ?></h1>
                            <div><strong><?php echo $month; ?></strong></div>
                        </div>
                    </div>
                    <div class="cell medium-4 small-text-center medium-text-left">
                        <h3>Venue</h3>
                        <h4 class="no-margin-medium"><?php echo get_field( 'venue'); ?></h4>
                    </div>
                    <div class="cell medium-2 small-text-center medium-text-right cta-button grid-x">
                        <?php if ( get_field( 'ticket_link') ) : ?>
                            <?php $target = get_field( 'open_ticket_link_in_new_window' ) == true ? '_blank' : ''; ?>
                            <a href="<?php echo get_field( 'ticket_link' ); ?>" target="<?php echo $target; ?>" class="cell small-4 medium-12 button secondary small grey">Tickets</a>
                        <?php endif; ?>
                        <?php if ( get_field( 'rsvp_link') ) : ?>
                            <?php $target = get_field( 'open_rsvp_link_in_new_window' ) == true ? '_blank' : ''; ?>                            
                            <a href="<?php echo get_field( 'rsvp_link' ); ?>" target="<?php echo $target; ?>" class="cell small-4 medium-12 button secondary small grey">RSVP</a>
                        <?php endif; ?>
                            <?php //always output the share link ?>
                            <a class="cell small-4 medium-12 button secondary small grey">Share</a>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>

        <a href="<?php echo get_post_type_archive_link('event' ); ?>" class="button large white">View All</a>

    </section>
<?php endif; ?>
<?php wp_reset_query(); ?>

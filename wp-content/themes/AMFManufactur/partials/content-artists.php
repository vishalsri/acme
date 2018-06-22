<?php $args = array( 'post_type' => 'artist', 'posts_per_page' => -1 ); ?>

<?php $artists = new WP_Query( $args ); ?>

<?php if ( $artists->have_posts() ): ?>

    <section id="artists-section" class="text-center">

        <h1 class="white content-margin-large">Artists</h1>

        <div class="content-margin-large">
            <div class="text-center" id="artist-carousel">
            
            <?php $i = 1; ?>

            <?php while ( $artists->have_posts() ) : $artists->the_post(); ?>

                <?php //on the odds, open the .carousel-cell div ?>
                <?php if ( $i % 2 != 0 ) : ?>
                    <div class="cell medium-3 small-6 large-2 carousel-cell"> 
                        <?php get_template_part( 'partials/artist','card' ); ?>

                <?php //evens--next if statement accounts for closing the cell ?>
                <?php else : ?>
                        <?php get_template_part( 'partials/artist','card' ); ?>

                <?php endif; ?>

                <?php //evens or final element, close the .carousel-cell ?>
                <?php if ( $i % 2 == 0 || $i == count( $artsits) ) : ?>
                    </div><!--.cell .carousel-cell-->
                <?php endif; ?>

                <?php ++$i; ?>
            <?php endwhile; ?>

            </div>
        </div>
        <a href="<?php echo get_post_type_archive_link('artist' ); ?>"class="button large white">View All</a>

    </section>

<?php endif; ?>

<?php wp_reset_query(); ?>
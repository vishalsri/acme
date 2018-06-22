<?php $tracks = get_sub_field( 'tracks' ); ?>
<?php if ( $tracks ) : ?>

    <section id="releases-section" class="text-center">

        <h1 class="white content-margin-large">Latest Releases</h1>
        
            <div class="grid-container content-margin-large">
                <div class="grid-x grid-margin-x text-center">
                    <?php foreach( $tracks as $post): // variable must be called $post (IMPORTANT) ?>
                        <?php setup_postdata($post); ?>
                        <div class="cell medium-3 small-6 post-preview post-radio text-center content-margin">
                            <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large'); ?>

                            <div class="image" style="background-image:url( <?php echo $featured_img_url; ?> );">
                                <i class="play-icon animate circle fa fa-play"></i>
                            </div>
                            <div class="preview-text text-center">
                                <div class="inner">
                                    <h3 class="padding-bottom"><?php the_title(); ?></h3>
                                    <?php $artist_post_ID = get_field( 'artist' ); ?>
                                    <?php $artist_name = get_the_title( $artist_post_ID[0] ); ?>
                                    <h5><?php echo $artist_name; ?></h5>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        <a href="<?php echo get_post_type_archive_link( 'release' ); ?>" class="button large white">View All</a>

    </section>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

<?php endif; ?>
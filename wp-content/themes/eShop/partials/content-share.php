<section id="share-section">

    <div class="grid-container">
        <div class="grid-x grid-margin-x">


            <div class="cell medium-4 medium-offset-4">
                <div class="social-share-circle text-center position-relative">
                    <div class="valign-container full-height full-width position-absolute">
                        <div class="valign full-height padding-large">
                            <h3 class="content-margin">Share the hype with your friends</h3>
                            <?php if ( get_field('facebook_link', 'option') ) : ?>
                                <div>
                                    <a href="//facebook.com/<?php echo get_field('facebook_link', 'option'); ?>" target="_blank" class="button secondary small black">facebook</a>
                                </div>
                            <?php endif; ?>
                           
                            <?php if ( get_field('twitter_handle', 'option') ) : ?>
                                <div>
                                    <a href="//twitter.com/<?php echo get_field('twitter_handle', 'option'); ?>" target="_blank" class="button secondary small black">twitter</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</section>
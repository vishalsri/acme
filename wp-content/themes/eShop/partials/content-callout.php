<section id="shop-section">

    <div class="grid-container">
        <div class="grid-x grid-padding-x content-box black medium">


            <div class="cell medium-6">
                <div class="breakout-of-box repetition-image">
                    <div class="image"><img src="<?php echo get_template_directory_uri(); ?>/images/merch-preview.jpg"></div>
                    <div class="image repeat show-for-medium"><img src="<?php echo get_template_directory_uri(); ?>/images/merch-preview.jpg"></div>
                    <div class="image repeat show-for-medium"><img src="<?php echo get_template_directory_uri(); ?>/images/merch-preview.jpg"></div>
                </div>
            </div>
            <div class="cell medium-6 text-center">
                <div class="valign-container full-height full-width">
                    <div class="valign full-height full-width">
                        <h1 class="content-margin-large margin-top-small"><?php echo get_sub_field( 'title' ); ?></h1>
                        <div class="content-margin-large marker"><p><?php echo get_sub_field( 'copy' ); ?></p></div>
                        <?php $target = get_sub_field( 'open_link_in_new_window' ) == true ? '_blank' : ''; ?>

                        <a href="<?php echo get_sub_field( 'link' ); ?>" target="<?php echo $target; ?>" class="button white large"><?php echo get_sub_field( 'link_cta' ); ?></a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>

<?php //used by content-artist.php ?>
<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large'); ?>
<?php $target = get_field( 'open_in_new_window' ) == true ? '_blank' : ''; ?>
<?php $artists_link = get_field( 'artists_link' ) ; ?>

<a href="<?php echo (!empty($artists_link)?$artists_link:"#"); ?>" target="<?php echo $target; ?>" class="post-preview post-artist text-center content-margin">
    <div class="image" style="background-image:url( <?php echo $featured_img_url; ?> );"></div>
    <div class="preview-text text-center">
        <div class="inner">
            <h3><?php the_title(); ?></h3>
        </div>
    </div>
</a>
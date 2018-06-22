<?php //used by content-artist.php ?>
<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large'); ?>

<a href="<?php the_permalink(); ?>" class="post-preview post-artist text-center content-margin">
    <div class="image" style="background-image:url( <?php echo $featured_img_url; ?> );"></div>
    <div class="preview-text text-center">
        <div class="inner">
            <h5><?php the_title(); ?></h5>
        </div>
    </div>
</a>
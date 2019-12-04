<?php
/*

@package sunlighttheme

	========================
		Gallery post format
	========================
*/
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(' '); ?>>
    <header class="entry-header text-center">

        <?php the_title('<h1 class="entry-title">','</h1>'); ?>
        <div class="entry-meta">
            <?php echo sunlight_posted_meta(); ?>
        </div>
        <?php

        if(sunlight_get_attachment()):
             $attachments = sunlight_get_attachment(7);
         endif; ?>

        <div class="row">
        <?php foreach ($attachments as $attachment): ?>

        <div class="col-4 pr-0 mb-3">
            <img src="<?php echo wp_get_attachment_url( $attachment->ID ) ?>" class="img-fluid" alt="">
        </div>

        <?php endforeach; ?>
        </div>

    </header>


    <div class="button-container">
        <a class="btn btn-info" href="<?php the_permalink() ?>"><?php _e('Read More') ?></a>
    </div>

    <div class="entery-footer">
        <?php echo sunlight_posted_footer(); ?>
    </div>

</article>


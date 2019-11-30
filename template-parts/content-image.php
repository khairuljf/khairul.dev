<?php
/*

@package sunlighttheme

	========================
		image post format
	========================
*/
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('sunlight-format-image'); ?>>


    <?php if(has_post_thumbnail()): ?>
    <header class="entry-header text-center" style="background-image: url("<?php the_post_thumbnail_url() ?>")">
        <?php the_title('<h1 class="entry-title">','</h1>'); ?>
        <div class="entry-meta">
            <?php echo sunlight_posted_meta(); ?>
        </div>
    </header>
    <?php endif; ?>




    <div class="entery-footer">
        <?php echo sunlight_posted_footer(); ?>
    </div>

</article>


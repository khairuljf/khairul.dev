<?php
/*

@package sunlighttheme

	========================
		standard post format
	========================
*/
?>


<article  id="post-<?php the_ID(); ?>" <?php post_class('aside-post-format'); ?> style="background: #ded">


    <div class="row">
        <div class="col-12 col-md-3">
            <img src="<?php echo sunlight_get_attachment() ?>" class="img-fluid" alt="">
        </div>
        <div class="col-12 col-md-9">
            <?php the_content() ?>
        </div>
    </div>

    <header class="entry-header text-center">
        <div class="entry-meta">
            <?php echo sunlight_posted_meta(); ?>
        </div>
    </header>

    <div class="entery-footer">
        <?php echo sunlight_posted_footer(); ?>
    </div>

</article>


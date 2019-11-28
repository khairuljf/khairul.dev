<?php
/*

@package sunlighttheme

	========================
		standard post format
	========================
*/
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header text-center">
        <?php the_title('<h1 class="entry-title">','</h1>'); ?>
        <div class="entry-meta">
            <?php echo sunlight_posted_meta(); ?>
        </div>
    </header>
    <div class="entry-content">

        <?php if(has_post_thumbnail()): ?>
            <div class="standard-featured">
                <img src="<?php the_post_thumbnail_url() ?>" alt="" class="img-fluid">
            </div><!-- .standard-featured -->
        <?php endif; ?>

        <div class="entry-excerpt">
            <?php the_excerpt(); ?>
        </div>

    </div> <!-- .entry-content -->

    <div class="button-container">
        <a class="btn btn-info" href="<?php the_permalink() ?>"><?php _e('Read More') ?></a>
    </div>

    <div class="entery-footer">
        <?php echo sunlight_posted_footer(); ?>
    </div>

</article>


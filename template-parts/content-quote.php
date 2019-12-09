<?php
/*

@package sunlighttheme

	========================
		standard post format
	========================
*/
?>


<article style="background: #ddd" id="post-<?php the_ID(); ?>" <?php post_class('sunlight-format-quote'); ?>>

    <header class="entry-header text-center">

        <h4 class="quote-content"><?php echo get_the_content() ?></h4>
        <?php the_title('<h5 class="quote-author">','</h5>'); ?>

    </header>

    <div class="entery-footer">
        <?php echo sunlight_posted_footer(); ?>
    </div>

</article>


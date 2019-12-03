<?php
/*

@package sunlighttheme

	========================
		Audio post format
	========================
*/
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('sunset-format-audio'); ?>>
    <header class="entry-header text-center">
        <?php the_title('<h1 class="entry-title">','</h1>'); ?>
        <div class="entry-meta">
            <?php echo sunlight_posted_meta(); ?>
        </div>
    </header>

    <div class="entry-content">
        <?php


        echo sunlight_get_embeded_media( array('audio','iframe') );


        ?>

        <?php //the_content() ?>

    </div> <!-- .entry-content -->


    <div class="entery-footer">
        <?php echo sunlight_posted_footer(); ?>
    </div>

</article>


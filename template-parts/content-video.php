<?php
/*

@package sunlighttheme

	========================
		standard post format
	========================
*/
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('sunlight-format-video'); ?>>
    <header class="entry-header text-center">

         <div class="embed-responsive embed-responsive-16by9">
             <?php

             echo sunlight_get_embeded_media( array('video','iframe') );

             ?>

         </div>


        <?php the_title('<h1 class="entry-title">','</h1>'); ?>
        <div class="entry-meta">
            <?php echo sunlight_posted_meta(); ?>
        </div>
    </header>

    <div class="entry-content">

        <?php if(sunlight_get_attachment()): ?>
            <div class="standard-featured">
                <img src="<?php echo sunlight_get_attachment() ?>" alt="" class="img-fluid">
            </div><!-- .standard-featured -->
        <?php endif; ?>

    </div> <!-- .entry-content -->



    <div class="entery-footer">
        <?php echo sunlight_posted_footer(); ?>
    </div>

</article>


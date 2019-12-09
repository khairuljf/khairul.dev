<?php
/*

@package sunlighttheme

	========================
		standard link format
	========================
*/
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('sunlight-format-link'); ?>>
    <header class="entry-header text-center">
        <?php

        $link = sunlight_grab_url();

        echo $link;

        the_title('<h1 class="entry-title">','</h1>');

        ?>
        <div class="icon-coin-yen">

        </div>
    </header>




</article>


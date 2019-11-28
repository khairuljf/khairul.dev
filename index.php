<?php get_header(); ?>


<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php

                    if( have_posts() ):

                        while (have_posts()) : the_post();

                            get_template_part('template-parts/content', get_post_format());

                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div><!-- .container -->

    </main>
</div> <!-- #primary -->

<?php get_footer(); ?>
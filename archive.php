<?php get_header(); ?>


<div id="primary" class="content-area">
    <main id="main" class="site-main p-3">

        <div class="container">
            <div class="row">
                <div class="col-12 sunlight-post-container">
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

        <div class="container">
            <div class="col-12 text-center">
                <a href="#" onclick="" class="btn btn-lg  load-more-post" data-page="1" data-url="<?php echo admin_url('admin-ajax.php') ?>">
                    <span class="icon-spinner6 load-icon"></span>
                    <span class="text">Load More</span>
                </a>
            </div>
        </div>

    </main>
</div> <!-- #primary -->

<?php get_footer(); ?>
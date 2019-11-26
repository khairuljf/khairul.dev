

<!Doctype html>

<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset') ?>" >
        <meta name="viewport" content="width+device+width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11" >
        <?php if(is_singular() && pings_open( get_queried_object() ) ): ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url') ?>">
        <?php endif; ?>

        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?> >

<div class="container-fluid p-0">

    <div class="row">

        <div class="col-12">
            <div class="header-container text-center background-image d-flex align-items-center justify-content-center" style="background-image: url('<?php header_image(); ?>')">
                 <div class="header-content">
                     <h1 class="site-title">
                       <span class="d-none"><?php bloginfo('name'); ?>  </span>
                         <spna class="icon-books"></spna>
                     </h1>

                     <h2 class="blog-descripion"><?php bloginfo('description'); ?></h2>
                 </div> <!-- .header-content -->
                 <div class="nav-container"></div> <!-- .nav-container -->
            </div>
        </div> <!--.col-12 -->
    </div> <!-- .row -->

</div><!-- .container-fluid -->





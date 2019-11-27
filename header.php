

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


<header class="header-container text-center background-image " style="background-image: url('<?php header_image(); ?>')">
    <div class="container p-0">
        <div class="col-12">
            <div class="header-content d-flex flex-column">
                <h1 class="site-title d-block">
                    <span class="d-none"><?php bloginfo('name'); ?>  </span>
                    <spna class="icon-books"></spna>
                </h1>

                <h2 class="blog-descripion"><?php bloginfo('description'); ?></h2>
            </div> <!-- .header-content -->
        </div>
    </div>
</header>

<div class="nav-container container">
    <nav class="navbar navbar-default navbar-sunset d-flex justify-content-center">
        <?php
        wp_nav_menu( array(
            'theme_location'    => 'main_menu',
            'container'         =>false,
            'menu_class'        =>'nav navbar-nav d-flex flex-row'
        ) )
        ?>
    </nav>
</div> <!-- .nav-container -->






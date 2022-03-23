<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title><?php bloginfo('name'); ?></title>
        <?php wp_head(); ?>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">
                    <?php if ( function_exists( 'the_custom_logo' ) ) {
                            the_custom_logo();
                    } 
                    ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <?php 
                        wp_nav_menu(array(
                            'theme-location' => 'nav_menu',
                        ));
                    ?>
                    <!-- <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul> -->
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <?php 
                    $query = new WP_Query(array(
                        'post_type' => 'hero',
                        'posts_per_page' => 1
                    ));    

                    while($query->have_posts()):
                        $query->the_post(); ?>
                        <div class="masthead-subheading"><?php the_title(); ?></div>
                        <div class="masthead-heading text-uppercase"><?php the_content(); ?></div>
                        <a class="btn btn-primary btn-xl text-uppercase" href="#services"><?php echo get_field('hero_section_text'); ?></a>
                    <?php endwhile;    
                ?>
                
            </div>
        </header>
        
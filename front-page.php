<?php get_header(); ?>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row text-center">
                   <?php 
                     $query = new WP_Query(array(
                        'post_type' => 'services',
                     ));

                     while($query->have_posts()):
                        $query->the_post(); ?>
                        <div class="col-md-4">
                           <span class="fa-stack fa-4x">
                              <i class="fas fa-circle fa-stack-2x text-primary"></i>
                              <i class="<?php echo get_field('service_icon'); ?> fa-stack-1x fa-inverse"></i>
                           </span>
                           <h4 class="my-3"><?php the_title(); ?></h4>
                           <?php echo get_field('service_content'); ?>
                        </div>

                     <?php endwhile;  
                     wp_reset_postdata(); 
                   ?>
                </div>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Portfolio</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row">
                   <?php 
                     $query = new WP_Query(array(
                        'post_type' => 'products'
                     ));

                     while($query->have_posts()):
                        $query->the_post(); ?>
                        
                        <!-- Portfolio item 1-->
                        <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal<?php echo get_the_ID(); ?>">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <?php the_post_thumbnail(); ?>
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?php echo get_field('product_client'); ?></div>
                                <div class="portfolio-caption-subheading text-muted"><?php echo get_the_category_list(''); ?></div>
                            </div>
                        </div>
                    </div>
                         
                     <?php endwhile;   
                     wp_reset_postdata();
                   ?>
                    
                </div>
            </div>
        </section>
        <?php 
            $query = new WP_Query(array(
                'post_type' => 'products'
            ));

            while($query->have_posts()):
                $query->the_post(); ?>
                <!-- Portfolio item 6 modal popup-->
                <div class="portfolio-modal modal fade" id="portfolioModal<?php echo get_the_ID(); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="close-modal" data-bs-dismiss="modal"><img src="<?php echo get_theme_file_uri('/assets/img/close-icon.svg'); ?>" alt="Close modal" /></div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="modal-body">
                                            <!-- Project details-->
                                            <h2 class="text-uppercase"><?php echo get_field('product_client'); ?></h2>
                                            <p class="item-intro text-muted"><?php echo get_field('product_short_description'); ?></p>
                                            <?php the_post_thumbnail(); ?>
                                            <p><?php echo get_field('product_description'); ?></p>
                                            <ul class="list-inline">
                                                <li>
                                                    <strong>Client:</strong>
                                                    <?php echo get_field('product_client'); ?>
                                                </li>
                                                <li>
                                                    <strong>Category:</strong>
                                                    <?php echo get_the_category_list(''); ?>
                                                </li>
                                            </ul>
                                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                <i class="fas fa-times me-1"></i>
                                                Close Project
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile;    
        ?>
        
        <!-- End of Portfolio item 6 modal popup -->

        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">About</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <ul class="timeline">
                    <?php 
                        $query = new WP_Query(array(
                            'post_type' => 'about',
                            'posts_per_page' => 4
                        ));

                        while($query-> have_posts()):
                            $query-> the_post(); ?>
                            <li>
                                <div class="timeline-image"><?php the_post_thumbnail(); ?></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4><?php echo get_field('post_time'); ?></h4>
                                        <h4 class="subheading"><?php the_title(); ?></h4>
                                    </div>
                                    <div class="timeline-body"><p class="text-muted"><?php echo get_field('post_description'); ?></p></div>
                                </div>
                            </li>       
                        <?php endwhile;       
                        wp_reset_postdata();
                    ?>
                    
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Be Part
                                <br />
                                Of Our
                                <br />
                                Story!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row">
                    <?php 
                        $query = new WP_Query(array(
                            'post_type' => 'team',
                            'posts_per_page' => 3
                        ));

                        while($query->have_posts()):
                            $query->the_post(); ?>
                            <div class="col-lg-4">
                                <div class="team-member">
                                    <?php the_post_thumbnail(); ?>
                                    <h4><?php echo get_field('team_member_name'); ?></h4>
                                    <p class="text-muted"><?php echo get_field('team_member_profession'); ?></p>
                                    <a class="btn btn-dark btn-social mx-2" href="<?php echo get_field('twitterurl'); ?>"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-dark btn-social mx-2" href="<?php echo get_field('facebookurl'); ?>"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-dark btn-social mx-2" href="<?php echo get_field('linkedinurl'); ?>"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        <?php endwhile;    
                        wp_reset_postdata();
                    ?>
                    
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
                </div>
            </div>
        </section>
        <!-- Clients-->
        <div class="py-5 clients">
            <div class="container">
                <div class="row align-items-center">
                    <?php 
                        $query = new WP_Query(array(
                            'post_type' => 'clients'
                        ));

                        while($query->have_posts()):
                            $query->the_post(); ?>
                            <div class="col-md-3 col-sm-6 my-3">
                                <a href="#!"><?php the_post_thumbnail(); ?></a>
                            </div>
                        <?php endwhile;    
                        wp_reset_postdata();
                    ?>
                    
                </div>
            </div>
        </div>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <?php echo do_shortcode('[wpforms id="371" title="false"]');?>
            </div>
        </section>
        <!-- Portfolio Modals-->
        
        
        
        
        
        <?php get_footer(); ?>

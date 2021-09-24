<?php

get_header();

$posts = get_posts(array(
    'post_type' => 'programs',
    'order' => 'ASC',
    'posts_per_page' => -1
));


?>

    <!--single-programs.php-->

    <main id="content">


        <section class="bg-soft-btm-logo">

            <div class="container px-0">
                <div class="row">

                    <div class="col-lg-8 order-lg-1 pt-2">

                        <?php the_post_thumbnail('full', array('class' => 'd-block img-fluid mx-auto')); ?>

                        <div class="p-150">
                            <h1 class="h2"><?php the_title(); ?></h1>
                            <?php echo the_content(); ?>
                            <iframe src="<?php the_field('google_map_iframe'); ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>


                    </div><!-- col -->

                    <div class="col-lg-4 order-lg-0">

                        <div class="pr-lg-25">

                            <div class="bg-program-nav-logo mb-2">
                                <p class="h3 pt-150 pb-1 mb-0">Our Programs</p>
                                <div class="nav flex-column nav-pills border border-bottom-0"
                                     id="v-pills-tab"
                                     role="tablist"
                                     aria-orientation="vertical">

                                    <?php

                                    global $wp_query;

                                    $currentID = $wp_query->post->ID;
                                    //echo $currentID;


                                    foreach ($posts as $i => $post) :

                                        setup_postdata($post);

                                        // Get post ID, if nothing found set to NULL
                                        $custom_post_id = $post->ID;
                                        //echo $custom_post_id;

                                        ?>

                                        <a class="nav-link rounded-0 font-weight-normal text-body text-uppercase border-bottom <?php if ($custom_post_id === $currentID): ?> text-white active bg-white<?php endif; ?>"
                                           href="<?php echo the_permalink(); ?>"
                                        >
                                            <?php echo the_title(); ?>
                                        </a>

                                        <?php
                                        wp_reset_postdata();
                                    endforeach;
                                    setup_postdata($post);
                                    ?>
                                </div><!-- nav-pills -->

                            </div><!-- bg-dark -->

                        </div><!-- pr -->
                    </div><!-- col -->

                </div><!-- row -->
            </div><!-- container -->

        </section>

    </main>

<?php get_footer(); ?>
<?php
/**
 *
 * Template Name: Contact Page
 *
 **/
get_header(); ?>

    <main>

        <div class="container pt-2 pb-4">
            <div class="row justify-content-between">
                <div class="col-lg-8">
                    <div class="pr-lg-2">

                        <?php if (have_posts()) : ?>

                            <?php /* Start the Loop */ ?>

                            <?php while (have_posts()) : the_post(); ?>

                                <h1><?php the_title(); ?></h1>

                                <?php the_content(); ?>

                            <?php endwhile; ?>

                        <?php endif; ?>

                    </div><!-- pr -->
                </div><!-- col -->
                <div class="col-lg-4">

                    <?php get_template_part('partials/sidebar/contact-block'); ?>

                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->

    </main>

<?php get_footer();
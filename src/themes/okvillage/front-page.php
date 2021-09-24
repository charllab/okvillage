<?php
get_header();
?>

<main class="front-page" id="content">

    <?php if (have_posts()) : ?>

        <?php /* Start the Loop */ ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php the_content(); ?>

        <?php endwhile; ?>

    <?php endif; ?>


    <div class="container">

        <?php if (get_sub_field('collapsable_content_list')): ?>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
                <?php if (have_rows('collapsable_content_list')): ?>
                    <?php $counter = 0;
                    while (have_rows('collapsable_content_list')) : the_row(); ?>
                        <?php
                        $tabName = strtolower(get_sub_field('title_tab'));
                        $tabName = preg_replace('/[^A-Za-z0-9]/', "", $tabName);
                        ?>
                        <li class="nav-item">
                            <a class="nav-link<?php if ($counter = 0) : ?> active <?php endif; ?>" id="home-tab" data-toggle="tab" href="#<?php echo $tabName ?>" role="tab" aria-controls="<?php echo $tabName ?>" aria-selected="true">Home</a>
                        </li>
                        <?php $counter++; endwhile; ?>
                <?php endif; ?>
            </ul><!-- tab-content -->
        <?php endif; ?>



        <?php if (get_sub_field('collapsable_content_list')): ?>
        <div class="tab-content" id="myTabContent">
            <?php if (have_rows('collapsable_content_list')): ?>
                    <?php $counter = 0;
                    while (have_rows('collapsable_content_list')) : the_row(); ?>
                        <?php
                        $tabName = strtolower(get_sub_field('title_tab'));
                        $tabName = preg_replace('/[^A-Za-z0-9]/', "", $tabName);
                        ?>
                        <div class="tab-pane fade<?php if ($counter = 0) : ?> show active<?php endif; ?>" id="<?php echo $tabName ?>" role="tabpanel" aria-labelledby="home-tab">
                            <?php the_sub_field('tab_content_area'); ?>
                        </div>
                        <?php $counter++; endwhile; ?>
            <?php endif; ?>
        </div><!-- tab-content -->
        <?php endif; ?>


    </div><!-- container -->



    <?php

    $posts = get_posts(array(
        'post_type' => 'programs',
        'order' => 'ASC',
        'posts_per_page' => -1
    ));

    ?>

    <!--page-programs.php-->


    <h1 class="mb-2"><?php the_title(); ?></h1>

    <?php
    foreach ($posts as $i => $post) :
        setup_postdata($post);
        ?>


        <a href="<?php echo the_permalink(); ?>">
            <!--<img class="card-img-top" src="--><?php //the_post_thumbnail_url();
            ?><!--" alt="Card image cap">-->
            <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded-top')); ?>
        </a>

        <h5 class="h3 text-center text-primary">
            <a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
        </h5>
        <?php $nopexcerpt = get_the_excerpt(); ?>
        <p class="card-text mb-50">
            <a href="<?php echo the_permalink(); ?>"
               class="text-body font-weight-normal"><?php echo $nopexcerpt; ?></a>
        </p>


        <iframe src="<?php the_field('google_map_iframe'); ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

        <a href="<?php echo the_permalink(); ?>" class="btn btn-primary">
            Read more
        </a>

        <?php
        wp_reset_postdata();
    endforeach;
    setup_postdata($post);
    ?>


</main>

<?php get_footer(); ?>

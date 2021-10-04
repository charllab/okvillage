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

    <?php
    $posts = get_posts(array(
        'post_type' => 'programs',
        'order' => 'ASC',
        'posts_per_page' => -1
    )); ?>

    <div class="container px-0 mb-4 program-top-bar">
        <nav>
            <div class="nav nav-tabs program-nav-tabs" id="nav-tab" role="tablist">
                <?php $counter = 0;?>
                <?php foreach ($posts as $i => $post) : setup_postdata($post); ?>
                <a class="py-75 px-1 text-uppercase border-top-0 rounded-0 nav-item nav-link <?php if ($counter == 0) : ?>border-left-0 active<?php endif; ?>"
                   id="nav-tab-<?php echo $counter; ?>"
                   data-toggle="tab" href="#nav-<?php echo $counter; ?>"
                   role="tab"
                   aria-controls="nav-<?php echo $counter; ?>"
                   aria-selected="<?php
                   if($counter == 0){
                       echo "true";
                   } else{
                       echo "false";
                   }?>">
                    <?php the_title(); ?>
                </a>
                <?php $counter++; wp_reset_postdata(); endforeach; setup_postdata($post);?>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <?php $counter = 0;?>
            <?php foreach ($posts as $i => $post) : setup_postdata($post); ?>
            <div class="bg-white tab-pane fade <?php if ($counter == 0) : ?>show active<?php endif; ?> pt-150 px-1 pb-25"
                 id="nav-<?php echo $counter; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $counter; ?>">
                <a href="<?php echo the_permalink(); ?>">
                <?php the_post_thumbnail('large', array('class' => 'img-fluid d-block mx-auto')); ?>
                </a>
                <p class="mx-auto mt-1">
                    <?php $nopexcerpt = get_the_excerpt(); ?>
                    <?php echo $nopexcerpt; ?>
                </p>
                <p class="text-center mb-0 mx-auto">
                    <a href="<?php echo the_permalink(); ?>" class="btn btn-primary">Learn More</a>
                </p>
            </div>
            <?php $counter++; wp_reset_postdata(); endforeach; setup_postdata($post);?>
        </div>

    </div><!-- container -->
</main>

<?php get_footer(); ?>

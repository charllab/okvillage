<?php

$posts = get_posts(array(
    'post_type' => 'programs',
    'order' => 'ASC',
    'posts_per_page' => -1
));

?>

    <!--page-programs.php-->


                        <h1 class="mb-2"><?php the_title(); ?></h1>
                    <

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

                        <?php
                        wp_reset_postdata();
                    endforeach;
                    setup_postdata($post);
                    ?>

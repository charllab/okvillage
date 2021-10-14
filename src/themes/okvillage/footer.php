<footer
    class="bg-dark position-relative"
    style="background: url(<?php the_field('footer_image', 'option'); ?>?>); background-repeat: no-repeat; background-size: cover; background-position: center bottom;">

    <div class="block__tint-overlay position-absolute h-100"></div>

    <section class="footer-cta bg-white pl-1 d-none">

        <div class="d-flex align-items-center w-100 justify-content-between">
            <div>DO YOU HAVE ANY QUESTIONS?</div>
            <div>
                <a href="<?php echo esc_url(home_url('/contact')); ?>"
                   class="btn btn-primary ml-auto my-0">Email Us</a>
            </div>
        </div><!-- flex -->

    </section><!-- footer-cta -->

    <section class="text-white pt-6 pb-4">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-4">
                    <img src="<?php bloginfo('template_url'); ?>/images/logo-white.svg"
                         alt="<?php bloginfo('name'); ?> - Logo"
                         class="img-fluid footer-logo mx-auto">
                </div><!-- col -->
                <div class="col-md-8">
                    <div class="pl-md-3">
                        <p><?php the_field('footer_text', 'option'); ?></p>
                        <p>Call Us: <a href="tel:+1<?php echo strip_tel(get_field('phone_number', 'option')); ?>"
                                       class="text-white h3 pl-1"><?php echo get_field('phone_number', 'option'); ?></a>
                        </p>
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">Contact Us</a>
                    </div><!-- pl -->
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </section>


    <section class="footer-bar text-white bg-dark position-relative pt-150 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left">
                    <p class="mb-1">&copy; <?php echo Date('Y') . ' ' . get_bloginfo('name'); ?></p>
                </div><!-- col -->
                <div class="col-lg-6 text-center text-lg-right">
                    <p class="mb-1">Designed, Developed and Hosted by <a href="https://sproing.ca" target="_blank"
                                                            class="text-white">Sproing&nbsp;Creative</a>
                    </p>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->

    </section>
</footer>

<?php wp_footer(); ?>

</div><!-- push -->

</body>

</html>
<header id="header" class="hero-nav-overlay fixed-top bg-white" <?php if( get_field('hero_image') ): ?> style="background-image: url(<?php the_field('hero_image'); ?>);"<?php endif; ?> >

    <nav class="navbar navbar-expand-lg" style="z-index: 1001;">
        <div class="container">
            <div class="nav-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php bloginfo('template_url'); ?>/images/logo.svg"
                         alt="<?php bloginfo('name'); ?> - Logo"
                         class="img-fluid">
                    <span class="sr-only"><?php bloginfo('name'); ?></span>
                </a>
            </div>

            <button class="hamburger hamburger--elastic ml-auto my-0 menu-link d-xl-none" type="button">
                      <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                      </span>
            </button>

            <div class="d-xl-flex flex-xl-column d-none d-xl-block">

                <?php wp_nav_menu([
                    'theme_location' => 'primary',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id' => 'mainnav',
                    'menu_class' => 'navbar-nav ml-auto',
                    'fallback_cb' => '',
                    'menu_id' => 'main-menu',
                    'walker' => new understrap_WP_Bootstrap_Navwalker(),
                ]); ?>
            </div>
        </div>
    </nav>

    <nav id="menu" class="panel bg-primary d-xl-none" role="navigation">
        <?php wp_nav_menu([
            'theme_location' => 'primary',
            'container_class' => 'container main-navigation--padding',
            'container_id' => 'mainnav',
            'menu_class' => 'navbar-nav ml-auto pt-5 pr-1 text-right',
            'fallback_cb' => '',
            'menu_id' => 'mobile-menu',
            'walker' => new understrap_WP_Bootstrap_Navwalker(),
        ]); ?>
    </nav>

</header>
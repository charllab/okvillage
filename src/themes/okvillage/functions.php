<?php
/* Require Includes */
include_once get_template_directory().'/includes/gutenburg.php';
include_once get_template_directory().'/includes/helper-functions.php';
include_once get_template_directory().'/includes/bootstrap-wp-navwalker.php';
//include_once get_template_directory().'/includes/acf-custom-widget.php';

/* Hooks */
if (!function_exists('enqueue_scripts')) {

    add_action('wp_enqueue_scripts', 'enqueue_scripts');

    // Cache bust constants
    define('THEMESTYLE_VERSION', filemtime(get_stylesheet_directory().'/style/style.css'));
    define('HEADERBUNDLE_VERSION', filemtime(get_stylesheet_directory().'/js/header-bundle.js'));
    define('FOOTERBUNDLE_VERSION', filemtime(get_stylesheet_directory().'/js/footer-bundle.js'));

    function enqueue_scripts()
    {
        // Register our own jquery
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');

        wp_enqueue_style('style_file', get_stylesheet_directory_uri().'/style/style.css', [], THEMESTYLE_VERSION);
        wp_enqueue_script('header_js', get_stylesheet_directory_uri().'/js/header-bundle.js', null, HEADERBUNDLE_VERSION, false);
        wp_enqueue_script('footer_js', get_stylesheet_directory_uri().'/js/footer-bundle.js', null, FOOTERBUNDLE_VERSION, true);
    }
}

if (!function_exists('custom_after_setup_theme')) {

    add_action('after_setup_theme', 'custom_after_setup_theme', 11);

    function custom_after_setup_theme()
    {
        remove_theme_support('custom-background');
        add_theme_support( 'post-thumbnails' );

        register_nav_menus([
            'primary' => 'Primary Menu',
            'secondary' => 'Footer Menu',
            'tertiary' => 'Legal Menu'
        ]);

        // Style Gutenberg
        add_theme_support('editor-styles');
        add_editor_style('style-editor.css');
    }
}

/* Misc */
remove_action('wp_head', 'wp_generator');
add_filter('allow_dev_auto_core_updates', '__return_false');
add_filter('auto_update_plugin', '__return_true');

/* Gravity Forms */
add_filter('gform_init_scripts_footer', '__return_true');
add_filter('gform_confirmation_anchor', '__return_false');
//add_filter('gform_enable_field_label_visibility_settings', '__return_true');

/* ACF - Theme Options */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug' => 'theme-options',
        'capability' => 'edit_posts',
        'position' => 80,
        'redirect' => false
    ]);
}

/*
How To Define Custom Color Palettes?
https://wpdevelopment.courses/articles/gutenberg-colour-settings/
*/

function wpdc_add_custom_gutenberg_color_palette() {
    add_theme_support(
        'editor-color-palette',
        [
            [
                'name'  => esc_html__( 'Yellow', 'wpdc' ),
                'slug'  => 'yellow',
                'color' => '#FFE600',
            ],
            [
                'name'  => esc_html__( 'Green', 'wpdc' ),
                'slug'  => 'green',
                'color' => '#18D16C',
            ],
            [
                'name'  => esc_html__( 'Blue', 'wpdc' ),
                'slug'  => 'blue',
                'color' => '#0074FF',
            ],
            [
                'name'  => esc_html__( 'Grey', 'wpdc' ),
                'slug'  => 'grey',
                'color' => '#606060',
            ],
            [
                'name'  => esc_html__( 'White', 'wpdc' ),
                'slug'  => 'white',
                'color' => '#ffffff',
            ],
            [
                'name'  => esc_html__( 'Black', 'wpdc' ),
                'slug'  => 'black',
                'color' => '#000000',
            ],
        ]
    );
}
add_action( 'after_setup_theme', 'wpdc_add_custom_gutenberg_color_palette' );
function wpdc_define_font_sizes() {
    add_theme_support(
        'editor-font-sizes',
        [
            [
                'name' => __( 'Small', 'wpdc' ),
                'size' => 18,
                'slug' => 'wpdc-small',
            ],
            [
                'name' => __( 'Medium', 'wpdc' ),
                'size' => 20,
                'slug' => 'wpdc-medium',
            ],
            [
                'name' => __( 'Large', 'wpdc' ),
                'size' => 30,
                'slug' => 'wpdc-large',
            ],
            [
                'name' => __( 'Extra-large', 'wpdc' ),
                'size' => 80,
                'slug' => 'wpdc-extra-large',
            ],
        ]
    );
}
add_action( 'after_setup_theme', 'wpdc_define_font_sizes' );

// register custom blocks

function register_acf_block_types()
{
    acf_register_block_type([
        'name' => 'simple-accordion',
        'title' => __('Simple Accordion'),
        'description' => __('A simple accordian witj collapse behavior.'),
        'render_template' => 'includes/gutenburg/simple-accordion.php',
        'category' => 'formatting',
        'icon' => 'welcome-widgets-menus',
        'keywords' => ['accordion'],
        'enqueue_style' => get_template_directory_uri().'/includes/gutenburg/custom-gutenberg-block.css',
    ]);
}

if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_acf_block_types');
}
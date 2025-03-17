<?php

function theme_styles_and_scripts() {
    wp_enqueue_style(
        'idm-normalize',
        'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css',
        [],
        '8.0.1'
    );

    wp_enqueue_style(
        'idm-main',
        get_template_directory_uri().'/dist/styles/main.css',
        [],
        filemtime(get_template_directory().'/dist/styles/main.css')
    );
}

add_action('wp_enqueue_scripts', 'theme_styles_and_scripts');

function theme_setup(){
    //enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'primary-menu'=>'Primary Menu',
        'footer-menu'=>'Footer Menu',
    ]);
}

add_action('after_setup_theme','theme_setup');

function register_custom_sidebars() {
    register_sidebar([
        'name'          => 'Footer Contact Section',
        'id'            => 'footer-contact',
        'description'   => 'Widgets in this area will display contact information in the footer.',
        'before_widget' => '<div class="footer-widget contact-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);

    register_sidebar([
        'name'          => 'Footer Menu Section',
        'id'            => 'footer-menu',
        'description'   => 'Widgets in this area will display a navigation menu in the footer.',
        'before_widget' => '<div class="footer-widget menu-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);

    register_sidebar([
        'name'          => 'Footer Copyright Section',
        'id'            => 'footer-copyright',
        'description'   => 'Widgets in this area will display copyright information in the footer.',
        'before_widget' => '<div class="footer-widget copyright-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'register_custom_sidebars');


//CUSTOM MENU BUTTON YAHHHH thank you chat
 function add_custom_menu_field($item_id, $item, $depth, $args) {
    $feature_button = get_post_meta($item_id, '_feature_button', true);
    ?>
    <p class="description description-wide">
        <label for="edit-menu-item-feature-<?php echo $item_id; ?>">
            <input type="checkbox" id="edit-menu-item-feature-<?php echo $item_id; ?>" name="menu-item-feature[<?php echo $item_id; ?>]" value="1" <?php checked($feature_button, 1); ?> />
            Mark as Feature Button
        </label>
    </p>
    <?php
}
add_action('wp_nav_menu_item_custom_fields', 'add_custom_menu_field', 10, 4);

function save_custom_menu_field($menu_id, $menu_item_db_id) {
    if (isset($_POST['menu-item-feature'][$menu_item_db_id])) {
        update_post_meta($menu_item_db_id, '_feature_button', 1);
    } else {
        delete_post_meta($menu_item_db_id, '_feature_button');
    }
}
add_action('wp_update_nav_menu_item', 'save_custom_menu_field', 10, 2);

function add_feature_class_to_menu($classes, $item) {
    if (get_post_meta($item->ID, '_feature_button', true)) {
        $classes[] = 'feature-button';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_feature_class_to_menu', 10, 2);

//Header stuff
function mytheme_customize_register($wp_customize) {
    // Add a section for the hero header
    $wp_customize->add_section('hero_section', [
        'title'    => __('Hero Section', 'mytheme'),
        'priority' => 30,
    ]);

    // Add setting for the hero title
    $wp_customize->add_setting('hero_title', [
        'default'   => 'Outdoors',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    // Add control for the hero title
    $wp_customize->add_control('hero_title_control', [
        'label'   => __('Hero Title', 'mytheme'),
        'section' => 'hero_section',
        'settings' => 'hero_title',
        'type'    => 'text',
    ]);

    // Add setting for the hero subtitle
    $wp_customize->add_setting('hero_subtitle', [
        'default'   => 'The Best Site for all your Outdoor Adventures',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    // Add control for the hero subtitle
    $wp_customize->add_control('hero_subtitle_control', [
        'label'   => __('Hero Subtitle', 'mytheme'),
        'section' => 'hero_section',
        'settings' => 'hero_subtitle',
        'type'    => 'text',
    ]);

    // Add Hero Image Setting
    $wp_customize->add_setting('hero_image', [
        'default'   => get_template_directory_uri() . '/dist/images/mainhero_img.jpeg', // Default image
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image_control', [
        'label'    => __('Hero Image', 'mytheme'),
        'section'  => 'hero_section',
        'settings' => 'hero_image',
    ]));
}
add_action('customize_register', 'mytheme_customize_register');


//quote image customizer
function custom_quote_customizer($wp_customize) {
    // Add a section for the Quote Background Image
    $wp_customize->add_section('quote_section', array(
        'title'    => __('Quote Section', 'your-theme'),
        'priority' => 35,
    ));

    // Add setting for the Quote Background Image
    $wp_customize->add_setting('quote_background_image', array(
        'default'   => get_template_directory_uri() . '/dist/images/quote-image.png', // Default fallback image
        'transport' => 'refresh',
    ));

    // Add control for the Quote Background Image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'quote_background_image_control', array(
        'label'    => __('Quote Background Image', 'your-theme'),
        'section'  => 'quote_section',
        'settings' => 'quote_background_image',
    )));
}
add_action('customize_register', 'custom_quote_customizer');


function custom_quote_styles() {
    $quote_bg = get_theme_mod('quote_background_image', get_template_directory_uri() . '/dist/images/quote-image.png');

    if ($quote_bg) {
        echo '<style>
            blockquote.wp-block-quote {
                background-image: url("' . esc_url($quote_bg) . '") !important;
            }
        </style>';
    }
}
add_action('wp_head', 'custom_quote_styles'); 

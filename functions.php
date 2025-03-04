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

function register_custom_sidebar()
{
    register_sidebar([
        'name' => 'Footer Widget',
        'id' => 'footer-widget',
        'description' => 'Widgets in this area will be shown in the Primary.',
    ]);
}
add_action('widgets_init', 'register_custom_sidebar');
?>



<?php //CUSTOM MENU BUTTON YAHHHH thank you chat
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
function custom_hero_customizer($wp_customize) {
    // Add a section for the Hero Image
    $wp_customize->add_section('hero_section', array(
        'title'       => __('Hero Settings', 'your-theme'),
        'priority'    => 30,
    ));

    // Add Hero Image Setting
    $wp_customize->add_setting('hero_image', array(
        'default'   => get_template_directory_uri() . '/assets/default-hero.jpg', // Default image
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image_control', array(
        'label'    => __('Hero Image', 'your-theme'),
        'section'  => 'hero_section',
        'settings' => 'hero_image',
    )));

    // Add Hero Background Color Setting
    $wp_customize->add_setting('hero_bg_color', array(
        'default'   => '#333333', // Default color
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_bg_color_control', array(
        'label'    => __('Hero Background Color', 'your-theme'),
        'section'  => 'hero_section',
        'settings' => 'hero_bg_color',
    )));
}
add_action('customize_register', 'custom_hero_customizer');
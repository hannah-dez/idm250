<header>
    <div class="featured-image">
    <?php 
    $hero_image = get_theme_mod('hero_image', get_template_directory_uri() . '/dist/images/mainhero_img.jpeg'); 
    if (!empty($hero_image)) {
        echo '<img src="' . esc_url($hero_image) . '" alt="Hero Image">';
    }
    ?>
    </div>

    <div class="hero-header">
        <h1><?php echo get_theme_mod('hero_title', 'Outdoors'); ?></h1>
        <p><?php echo get_theme_mod('hero_subtitle', 'The Best Site for all your Outdoor Adventures'); ?></p>
    </div>

    <?php
    wp_nav_menu([
        'theme_location' => 'primary-menu', // Output primary menu
    ]);
    ?>
    
</header>


    
<header>
    <img width="100%" src="<?php echo get_stylesheet_directory_uri()?>/dist/images/mainhero_img.jpeg" alt="super cool image">
    <button class="abt-button">
            <a>About</a>
</button>
        <div class="hero-header">
        <h1>Outdoors</h1>
        <p>The Best Site for all your Outdoor Adventures</p>
        
    </div>
    <?php
    wp_nav_menu([
        'theme_location'=>'primary-menu', //for the theme location i want to output primary menu
    ]);
?>
    </header>
<header>
    <div class="featured-image">
        <?php 
        if (has_post_thumbnail()) {
            echo get_the_post_thumbnail();
        } else {
            ?>
            <img src="<?php echo get_template_directory_uri(); ?>/dist/images/mainhero_img.jpeg" alt="Default Featured Image">
            <?php
        }
        ?>
    </div>

    <div class="hero-header">
        <h1>Outdoors</h1>
        <p>The Best Site for all your Outdoor Adventures</p>
    </div>

    <?php
    wp_nav_menu([
        'theme_location' => 'primary-menu', // Output primary menu
    ]);
    ?>
</header>


    
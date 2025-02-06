<header>
    <?php if(has_post_thumbnail()):?>
    <div class="featured-image">
    <?php echo the_post_thumbnail();?>
    </div>
    <?php endif; ?>
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
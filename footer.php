    <footer>
    <?php
    wp_nav_menu([
        'theme_location'=>'footer-menu', //for the theme location i want to output primary menu
    ]);
?>
    <div>
    <?php dynamic_sidebar('footer-widget');?>
    </div>    
</footer>
    <?php wp_footer(); ?>
</body>
</html>
    <footer>
    <footer class="site-footer">
    <div class="footer-widgets">
        <div class="footer-column">
            <?php if (is_active_sidebar('footer-menu')) : ?>
                <?php dynamic_sidebar('footer-menu'); ?>
            <?php endif; ?>
        </div>
    
        <div class="footer-column">
            <?php if (is_active_sidebar('footer-contact')) : ?>
                <?php dynamic_sidebar('footer-contact'); ?>
            <?php endif; ?>
        </div>
        
        <div class="footer-column">
            <?php if (is_active_sidebar('footer-copyright')) : ?>
                <?php dynamic_sidebar('footer-copyright'); ?>
            <?php endif; ?>
        </div>
    </div>
</footer>


</footer>
    <?php wp_footer(); ?>
</body>
</html>
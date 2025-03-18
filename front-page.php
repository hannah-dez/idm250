<?php get_header();?>

<main>
    <h1>
        <?php echo get_the_title();?>
    </h1>

    <div class="main-content">
        <?php echo get_the_content();?>
    </div>
</main>
<?php get_footer();?>
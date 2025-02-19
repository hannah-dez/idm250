<?php get_header();?>
<?php if(have_posts()) :?>
    <h1><?php the_archive_title();?></h1>

<?php else : ?>
    <p>No Posts Found</p>

    <?php endif;?>
    <?php get_footer();
    //there is a short hand version that may show up in his code
    ?>

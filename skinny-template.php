<?php
/*
* Template Name: Skinny Template
*/
?>
<?php get_header();?>

<main class="small-stuff">
<h1>
    <?php echo get_the_title();?>
</h1>

    <?php echo get_the_content();?>
</main>
<?php get_footer();?>
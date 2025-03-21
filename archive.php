<?php get_header('simple');?>
<?php if(have_posts()) : ?>
    <h1><?php the_archive_title();?></h1>
    <div class="archive-main">
<ul>
    <?php while (have_posts()) : the_post(); ?>
    <li>
    <a 
    href="<?php the_permalink(); ?>">
    <div class="post-main-img">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>
        <?php the_title();?></a>
    </li>
    <?php endwhile;?>
</ul>

<?php the_posts_pagnation(); ?>
<?php else: ?>
    <p>No Posts Found</p>
<?php endif; ?>
</div>

<?php get_footer(); ?>
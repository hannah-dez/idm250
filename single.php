<?php get_header(); ?>

<main class="post-container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="post">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <div class="post-main-img">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>
                <p class="post-meta">Published on <?php the_date(); ?> in <?php the_category(', '); ?></p>
            </div>
            <div class="post-content">
                <?php the_content(); ?>
            </div>
            
            <div class="post-tags">
                <?php the_tags('Tags: ', ', '); ?>
            </div>
        </article>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
<?php
$query = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 3,
]);
?>
<?php if ($query->have_posts()) : ?>
<section class="projects-list">
  <div class="wrapper">
    <?php while ($query->have_posts()) : $query->the_post(); ?>
    <article class="project-item">
      <a href="<?php the_permalink(); ?>" class="project-link">
        <?php if (has_post_thumbnail()) : ?>
        <div class="project-image">
          <?php the_post_thumbnail(); ?>
        </div>
        <?php endif; ?>
        <h2 class="project-title"><?php the_title(); ?></h2>
        <p class="project-excerpt"><?php echo get_the_excerpt(); ?>
        </p>
      </a>
    </article>
    <?php endwhile; ?>
  </div>
</section>

<?php else : ?>
<p>No projects found.</p>
<?php endif; ?>
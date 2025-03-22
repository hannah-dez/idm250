<?php
/**
 * Template Name: Blog Listing
 */

get_header(); ?>

<div class="blog-listing">
  <h1>Blog Posts</h1>

  <div class="blog-list-flex">
  <?php
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $args = [
      'post_type'      => 'post', // Fetch only blog posts
      'posts_per_page' => 10,
      'paged'          => $paged,
  ];
  $query = new WP_Query($args);

  if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post(); ?>
        <div class="blog-post">
          
          <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('medium'); ?>
            </a>
          <?php endif; ?>
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>


          <p class="post-tags">
            <strong>Tags:</strong> 
            <?php 
              $post_tags = get_the_tags();
              if ($post_tags) {
                  foreach ($post_tags as $tag) {
                      echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>, ';
                  }
              } else {
                  echo 'None';
              }
            ?>
          </p>
        </div>
      <?php endwhile; ?>

      <div class="pagination">
        <?php
          echo paginate_links([
              'total' => $query->max_num_pages,
          ]);
        ?>
      </div>

      <?php wp_reset_postdata(); ?>
  <?php else : ?>
      <p><?php esc_html_e('No posts found.', 'idm250-2025'); ?></p>
  <?php endif; ?>
</div>
</div>
<?php get_footer(); ?>


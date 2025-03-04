<?php 

$categories = wp_get_post_categories(get_the_ID());

if ($categories) :
    $related_posts_query = new WP_Query([
        'category__in' = 
    ])

    //Follow his code on the repo to better understand
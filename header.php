<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/dist/images/fav_icon.svg" type="image/x-icon">
    <title>
        <?php wp_title('|', true, 'right');
        bloginfo('name');
        ?>
    </title>
   
    <?php wp_head(); ?>
</head>

<body <?php body_class();?>> 
<?php wp_body_open();?>
<?php get_template_part('components/main-header'); ?>



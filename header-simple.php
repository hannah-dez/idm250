<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php wp_title('|', true, 'right');
        bloginfo('name');
        ?>
    </title>
   
    <?php wp_head(); ?>
</head>

<body <?php body_class();?>> 
<?php wp_body_open();?>

<header>
    <?php
    wp_nav_menu([
        'theme_location'=>'primary-menu', //for the theme location i want to output primary menu
    ]);
?>
</header>

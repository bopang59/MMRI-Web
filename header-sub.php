<?php wp_head(); ?>
<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">

    <link rel="stylesheet" href="<?php echo esc_url('https://use.fontawesome.com/releases/v5.1.0/css/all.css'); ?>">
    <link href="<?php echo esc_url('https://fonts.googleapis.com/css?family=Merriweather&#8217'); ?>" rel="stylesheet">

</head>


<?php

global $post;
//Get the type of page 
$terms = wp_get_post_terms($post->ID, 'pagetype');
$pagetype = "";

if (!$terms) {
    if (get_post_type($post->ID) == 'mc2-service' || get_post_type($post->ID) == 'mc2-equipment') {
        $pagetype = 'mc2';
    } elseif (get_post_type($post->ID) == 'battery-service' || get_post_type($post->ID) == 'battery-equipment') {
        $pagetype = 'battery';
    }
} else {

    //Pages only have one taxonomy need to change [0] if more are added 

    $slug = $terms[0]->slug;
    if ($slug) {
        if ($slug == 'mc2-page') {
            $pagetype = 'mc2';
        } elseif ($slug == 'battery-page') {
            $pagetype = 'battery';
        }
    }
}
?>


<!--Navbar for Nested Homepages-->


<div id="sub-nav" ,>


    <?php
    if ($pagetype == 'mc2') : ?>

        <a href="<?php echo esc_url('/mc2-home') ?>"> <img class="logo-img" id="mc2-logo-img" src="<?php echo get_template_directory_uri() ?>/includes/theme_imgs/mc2-logo-long.png" alt=""></a>

        <?php
        $menu_args = [
            'menu_id' => 'nav-items',
            'container_class' => 'menu-container',
            'theme_location' => 'mc2'
        ];
        ?>

    <?php elseif ($pagetype == 'battery') : ?>

        <a href="<?php echo esc_url('/battery-home') ?>"> <img class="logo-img" id="battery-logo-img" src="<?php echo get_template_directory_uri() ?>/includes/theme_imgs/battery-logo-informal-white.png" alt=""></a>

        <?php
        $menu_args = [
            'menu_id' => 'nav-items',

            'container_class' => 'menu-container',
            'theme_location' => 'battery'
        ];

        ?>



    <?php endif;


    wp_nav_menu($menu_args);
    ?>


    <div id="mmri-home-link-logo">

        <a href="<?php echo home_url() ?>"> <img src="<?php echo get_template_directory_uri() ?>/includes/theme_imgs/logo-background-dark.png" alt=""></a>

    </div>

    <!--probly get rid of
    <div id="menu-icon">
        <i class="fas fa-bars"></i>
    </div>
    -->
</div>


<!---Mobile navigation menu-->

<div id="mobile-nav-menu" class="mobile-nav">

    <div id="mmri-home-link-logo-mobile">

        <a href="<?php echo home_url() ?>"> <img src="<?php echo get_template_directory_uri() ?>/includes/theme_imgs/logo-background-dark.png" alt=""></a>

    </div>
    <?php
    wp_nav_menu($menu_args);
    ?>
</div>
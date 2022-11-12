<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php

/**Template Name: Single Post */


if (get_the_terms($post, 'mmri-page')) {
    get_header();
} else {

    get_header('sub');
}
?>

<body id="single-body">


    <?php get_template_part('/includes/section', 'banner-post'); ?>

    
    <div id="content-container">

        <div id="content-title"><?php the_title(); ?></div>
        <div id="content-date"> <?php the_time(get_option('date_format')); ?></div>
        <div id="content"><?php the_content(); ?></div>
    </div>

    <?php get_template_part('/includes/section', 'contact-mmri'); ?>

</body>
<?php get_footer(); ?>
<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php

    /**Template Name: Sub Default */


    get_header('sub');

    global $post;
    //Get the type of page 
    $terms = wp_get_post_terms($post->ID, 'pagetype');

    //Pages only have one taxonomy need to change [0] if more are added 
    $slug = $terms[0]->slug;
    $pagetype = '';
    if ($slug == 'mc2-page') {
        $pagetype = 'mc2';
    } elseif ($slug == 'battery-page') {

        $pagetype = 'battery';
    }

?>

<?php get_template_part('/includes/section', 'banner-page'); ?>
    
    
<body id="sub-default-body">

        <div id="default-content-container">

            <div id="default-content-title"><?php the_title(); ?></div>
            <div id="default-content"><?php the_content(); ?></div>
        </div>

        <?php get_template_part('/includes/section', 'contact-'.$pagetype); ?>

</body>
<?php get_footer(); ?>
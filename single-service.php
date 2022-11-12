<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php

/**Template Name: Single Service */
/*Template Post Type: mc2-service, battery-service*/



get_header('sub');

$contactForm = null;
if (determine_post_type() == 'battery-service') {
    $contactForm = 'contact-battery';
} elseif (determine_post_type() == 'mc2-service') {
    $contactForm = 'contact-mc2';
}


?>

<body id="single-service-body">


    <?php get_template_part('/includes/section', 'banner-service'); ?>



    <div id="service-content-container">

        <div id="service-content-title"><?php the_title(); ?></div>
        <div id="service-content"><?php the_content(); ?></div>
    </div>



    <?php get_template_part('/includes/section', $contactForm); ?>

</body>
<?php get_footer(); ?>
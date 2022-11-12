<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php

/**Template Name: Single Affiliate */
/*Template Post Type: post*/



get_header();

$contactForm = 'contact-mmri';


?>

<body id="single-affiliate-body">


    <?php get_template_part('/includes/section', 'banner-affiliate'); ?>



    <div id="affiliate-content-container">

        <div id="affiliate-content-title">Meet: </div>
        <div id="affiliate-content"><?php the_content(); ?></div>
    </div>



    <?php get_template_part('/includes/section', $contactForm); ?>

</body>
<?php get_footer(); ?>
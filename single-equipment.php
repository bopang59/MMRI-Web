<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php

    /**Template Name: Single Equipment */
    /*Template Post Type: mc2-equipment, battery-equipment*/
    get_header('sub');
    $contactForm = null;
    if (determine_post_type() == 'battery-equipment') {
        $contactForm = 'contact-battery';
    } elseif (determine_post_type() == 'mc2-equipment') {
        $contactForm = 'contact-mc2';
    }
    
?>

<body id="single-equipment-body">


    <?php get_template_part('/includes/section', 'banner-equipment'); 
    
    

    ?>



        <div id="equipment-content-container">

            <div id="equipment-content-title"><?php the_title(); ?></div>
            <div id="equipment-content"><?php the_content(); ?></div>
        </div>

        <?php get_template_part('/includes/section',$contactForm); ?>

</body>
<?php get_footer(); ?>
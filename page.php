<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php

    /**Template Name: MMRI Default Page */


    get_header('MMRI');

?>

<?php get_template_part('/includes/section', 'banner-page'); ?>
    
    
<body id="sub-default-body">

        <div id="default-content-container">

            <div id="default-content-title"><?php the_title(); ?></div>
            <div id="default-content"><?php the_content(); ?></div>
        </div>

        <?php get_template_part('/includes/section', 'contact-mmri'); ?>

</body>
<?php get_footer(); ?>
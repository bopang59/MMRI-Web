<?php

    /**Template Name: 404 Page */

?>
<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<?php get_header();?>

<body id ="error404-body">
    
    <img id="error-img" src="<?php echo get_template_directory_uri()?>/includes/theme_imgs/logo-background-light.png" alt="">

    <div id="error-message">
    <h1>404</h1>
    <h2>We are sorry, this page is currently undergoing maintenance.  We should be back shortly. Thank you for your patience!</h2>
    </div>

</body>
<?php get_footer();?>

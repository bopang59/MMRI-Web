<!---Regular Nav menu-->
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
    <script src="<?php echo esc_url('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'); ?>"></script>
</head>

<div id="regular-nav">

    <div id="mmri-logo-container">
        <a href="<?php echo home_url() ?>"> <img src="<?php echo get_template_directory_uri() ?>/includes/theme_imgs/logo-long.png" alt=""></a>
    </div>
    <!--probly get rid of
    <div id="menu-icon">
        <i class="fas fa-bars"></i>
    </div>
  -->
    <!--here is the search bar plug-in-->
    <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>

    <!--I added this new class to diplay the two buttons in the header to display in row-->
    <div class="ctn-btn">
        <div class="button-header1">
            <h2><a href="/my-account/" class="hover-header">My Account</a></h2>
        </div>

        <div class="button-header2">
            <h2><a href="/become-an-affiliate/" class="hover-header">Become an Affiliate</a></h2>
        </div>
    </div>

</div>

<!---Mobile navigation menu-->
<?php
//link main navbar menu from WP admin panel
?>
<div id="mobile-nav-menu" class="mobile-nav">
    <?php wp_nav_menu($menu_args); ?>
</div>
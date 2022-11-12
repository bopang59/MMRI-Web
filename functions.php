<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<?php

//adjust navbar if adminbar exists
add_action('wp_head', 'prefix_move_theme_down');
function prefix_move_theme_down()
{
    if (is_admin_bar_showing()) {
?>
        <style type="text/css">
            #mobile-nav-menu {
                top: 132px;
            }

            @media only screen and (max-width: 782px) {

                #mobile-nav-menu {
                    top: 96px;
                }

            }
        </style>
<?php
    }
}


//grab first image embeded in content of a post
function catch_that_image()
{
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
    $first_img = $matches[1][0];


    return $first_img;
}

function getImageCaption($position){
    global $post;
    $post_id = $post->ID;
    // get the post object
    $post = get_post( $post_id );
    // we need just the content
    $content = $post->post_content;
    // we need a expression to match things
    $regex = '/<figcaption>(.*)<\/figcaption>/';
    // we want all matches
    preg_match_all( $regex, $content, $matches );
    // reversing the matches array
    $matches = array_reverse($matches);
    // we've reversed the array, so index 0 returns the result
    foreach ($matches as $key => $value) {
        return $value[$position];
    }
}
function log_data($data)
{
    echo "<!-- DEBUG\n" . print_r($data, true) . "\n-->";
}
function determine_post_type($post = null)
{
    $post = get_post($post);
    if ($post) {
        return $post->post_type;
    }

    return false;
}

//Allow title of page to be managed by wordpress 
function add_title()
{
    add_theme_support('title-tag');
}
//hook for title tag 
add_action('after_setup_theme', 'add_title');


//enqueue scripts
function load_scripts()

{
    //Mobile nav script 
    wp_register_script('mobile-nav', get_template_directory_uri() . '/js/mobile-nav.js', '', '1.0', true);
    wp_enqueue_script('mobile-nav');
}
add_action('wp_enqueue_scripts', 'load_scripts');
//function to load stylesheets (.css)
function load_stylesheets()
{



    //the default load for WP 
    wp_enqueue_style('stylesheet', get_stylesheet_uri());

    //load stylesheet for main MMRI navbar 
    wp_register_style('main-header-style', get_template_directory_uri() . '/css/navbar.css', array(), false, 'all');
    wp_enqueue_style('main-header-style');

    //load stylesheet for main MMRI navbar 
    wp_register_style('mobile-header-style', get_template_directory_uri() . '/css/mobile-nav.css', array(), false, 'all');
    wp_enqueue_style('mobile-header-style');


    //load stylesheet for site footer 
    wp_register_style('footer-style', get_template_directory_uri() . '/css/footer.css', array(), false, 'all');
    wp_enqueue_style('footer-style');


    //load stylesheet for homepage 
    wp_register_style('home-style', get_template_directory_uri() . '/css/homepage.css', array(), false, 'all');
    wp_enqueue_style('home-style');

    //load stylesheet for slideout container 
    wp_register_style('slideout-style', get_template_directory_uri() . '/css/slideout.css', array(), false, 'all');
    wp_enqueue_style('slideout-style');


    //load stylesheet for news-section container 
    wp_register_style('news-section-style', get_template_directory_uri() . '/css/news-section.css', array(), false, 'all');
    wp_enqueue_style('news-section-style');

    //404 stylesheet
    wp_register_style('404-style', get_template_directory_uri() . '/css/error404.css', array(), false, 'all');
    wp_enqueue_style('404-style');


    //subnavbar stylesheet
    wp_register_style('subnav-style', get_template_directory_uri() . '/css/subnav.css', array(), false, 'all');
    wp_enqueue_style('subnav-style');

    //subhome stylesheet
    wp_register_style('subhome-style', get_template_directory_uri() . '/css/subhome.css', array(), false, 'all');
    wp_enqueue_style('subhome-style');

    //Contact stylesheet
    wp_register_style('contact-style', get_template_directory_uri() . '/css/contact-form.css', array(), false, 'all');
    wp_enqueue_style('contact-style');

    //banner stylesheet
    wp_register_style('banner-style', get_template_directory_uri() . '/css/section-banner.css', array(), false, 'all');
    wp_enqueue_style('banner-style');

    //single service stylesheet

    wp_register_style('single-service-style', get_template_directory_uri() . '/css/single-service.css', array(), false, 'all');
    wp_enqueue_style('single-service-style');

    //staff stylesheet
    wp_register_style('staff-style', get_template_directory_uri() . '/css/staff.css', array(), false, 'all');
    wp_enqueue_style('staff-style');

    //equipment list stylesheet
    wp_register_style('equipment-style', get_template_directory_uri() . '/css/equipment-list.css', array(), false, 'all');
    wp_enqueue_style('equipment-style');

    //Single Equipment stylesheet
    wp_register_style('single-equipment-style', get_template_directory_uri() . '/css/single-equipment.css', array(), false, 'all');
    wp_enqueue_style('single-equipment-style');

    //Default Sub Page  stylesheet
    wp_register_style('default-sub-style', get_template_directory_uri() . '/css/default-sub.css', array(), false, 'all');
    wp_enqueue_style('default-sub-style');
    //Single News  stylesheet
    wp_register_style('single-style', get_template_directory_uri() . '/css/single.css', array(), false, 'all');
    wp_enqueue_style('single-style');
    //Single affiliate  stylesheet
    wp_register_style('single-affiliate', get_template_directory_uri() . '/css/single-affiliate.css', array(), false, 'all');
    wp_enqueue_style('single-affiliate');
    // affiliate list  stylesheet
    wp_register_style('affiliate-list', get_template_directory_uri() . '/css/affiliate-list.css', array(), false, 'all');
    wp_enqueue_style('affiliate-list');
     // event list  stylesheet
     wp_register_style('event-list', get_template_directory_uri() . '/css/event-list.css', array(), false, 'all');
     wp_enqueue_style('event-list');
      // single seminar stylesheet
      wp_register_style('single-seminar-style', get_template_directory_uri() . '/css/single-seminar.css', array(), false, 'all');
      wp_enqueue_style('single-seminar-style');
     // Seminar list  stylesheet
    wp_register_style('seminar-list-style', get_template_directory_uri() . '/css/seminar-list.css', array(), false, 'all');
    wp_enqueue_style('seminar-list-style');
}

//hook for load_stylesheets function
add_action('wp_enqueue_scripts', 'load_stylesheets');



/*Register the WP menus used for navbar - Register future CORE menus here*/
function register_menus()
{
    register_nav_menus(
        array(
            'primary' => ('Main Navbar Menu Items'),
            'footer' => ('Footer Menu Items'),
            'mobile' => ('Mobile Navbar Menu Items'),
            'battery' => ('Battery Navbar Menu Items'),
            'mc2' => ('MC2 Navbar Menu Items'),
            'mc2' => ('MC2 Navbar Menu Items')
        )
    );
}

//hook for register_menus function 
add_action('init', 'register_menus');


/*Register custom post types for theme*/

function news_post_type()
{

    //The default MMRI News post section 
    register_post_type('mmri', array(
        'label' => 'MMRI Communications',
        'public' => true,
        'show_in_menu' => true,
        'has_archive' => 'Communications Archive',
        'hierarchical' => true
    ));


    //Battery Lab News 
    register_post_type('battery', array(
        'label' => 'Battery Lab Communication',
        'public' => true,
        'show_in_menu' => true,
        'has_archive' => 'Communications Archive',
        'hierarchical' => true
    ));



    //MC2 lab News 
    register_post_type('mc2', array(
        'label' => '(MC)2 Lab Communication',
        'public' => true,
        'show_in_menu' => true,
        'has_archive' => 'Communcations Archive',
        'hierarchical' => true
    ));
}

//hook for register post type
add_action('init', 'news_post_type');


/*Register Services Post type */

function service_post_type()
{


    //Battery Lab SErvice 
    register_post_type('battery-service', array(
        'label' => 'Battery Lab Service',
        'public' => true,
        'show_in_menu' => true,
        'taxonomies' => array('category'),
        'has_archive' => 'Service Archive',
        'hierarchical' => true
    ));



    //MC2 lab Service 
    register_post_type('mc2-service', array(
        'label' => '(MC)2 Lab Service',
        'public' => true,
        'show_in_menu' => true,
        'taxonomies' => array('category'),
        'has_archive' => 'Service Archive',
        'hierarchical' => true
    ));
}
//hook for register post type
add_action('init', 'service_post_type');

/*Register Equipment Post type */

function equipment_post_type()
{


    //Battery Lab SErvice 
    register_post_type('battery-equipment', array(
        'label' => 'Battery Lab Equipment',
        'public' => true,
        'show_in_menu' => true,
        'has_archive' => 'Equipment Archive',
        'hierarchical' => true
    ));



    //MC2 lab Service 
    register_post_type('mc2-equipment', array(
        'label' => '(MC)2 Lab Equipment',
        'public' => true,
        'show_in_menu' => true,
        'has_archive' => 'Equipment Archive',
        'hierarchical' => true
    ));
}
//hook for register post type
add_action('init', 'equipment_post_type');


//Register custom page types, Used to categorize pages as MMRI, Battery Lab, MC2, etc
function register_taxonomy_page_type()
{
    $labels = array(
        'name'              => _x('Page Types', 'taxonomy general name'),
        'singular_name'     => _x('Page Type', 'taxonomy singular name'),
        'search_items'      => __('Search Page Types'),
        'all_items'         => __('All Page Types'),
        'edit_item'         => __('Edit Page Type'),
        'update_item'       => __('Update Page Type'),
        'add_new_item'      => __('Add New Page Type'),
        'new_item_name'     => __('New Page Type Name'),
        'menu_name'         => __('Page Type'),
    );
    $args   = array(
        'hierarchical'      => true, // make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'public'            => true,
        'rewrite'           => ['slug' => 'pagetype'],
    );
    register_taxonomy('pagetype', ['page'], $args);
}
add_action('init', 'register_taxonomy_page_type');

//Allow thumbnails
add_theme_support('post-thumbnails');


//Allow tags in the title
add_theme_support('title-tag');


//Equipment Category Taxonomy 
function register_taxonomy_equipment_type()
{
    $labels = array(
        'name'              => _x('Equipment Types', 'taxonomy general name'),
        'singular_name'     => _x('Equipment Type', 'taxonomy singular name'),
        'search_items'      => __('Search Equipment Types'),
        'all_items'         => __('All Equipment Types'),
        'edit_item'         => __('Edit Equipment Type'),
        'update_item'       => __('Update Equipment Type'),
        'add_new_item'      => __('Add New Equipment Type'),
        'new_item_name'     => __('New Equipment Type Name'),
        'menu_name'         => __('Equipment Type'),
    );
    $args   = array(
        'hierarchical'      => true, // make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'public'            => true,
        'rewrite'           => ['slug' => 'equipment-type'],
    );
    register_taxonomy('equipment-type', ['mc2-equipment', 'battery-equipment'], $args);
}
add_action('init', 'register_taxonomy_equipment_type');





//Communcations Taxonomy (News or Announcement)
function register_taxonomy_communication_type()
{
    $labels = array(
        'name'              => _x('Communication Types', 'taxonomy general name'),
        'singular_name'     => _x('Communication Type', 'taxonomy singular name'),
        'search_items'      => __('Search Communication Types'),
        'all_items'         => __('All Communication Types'),
        'edit_item'         => __('Edit Communication Type'),
        'update_item'       => __('Update Communication Type'),
        'add_new_item'      => __('Add New Communication Type'),
        'new_item_name'     => __('New Communication Type Name'),
        'menu_name'         => __('Communication Type'),
    );
    $args   = array(
        'hierarchical'      => true, // make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'public'            => true,
        'rewrite'           => ['slug' => 'communication-type'],
    );
    register_taxonomy('communication-type', ['mc2', 'battery', 'mmri'], $args);
}
add_action('init', 'register_taxonomy_communication_type');

//Seminar Post Type (For Seminar List)
function register_seminar_post_type()
{
    $labels = array(
        'name'              => _x('Seminar Types', 'taxonomy general name'),
        'singular_name'     => _x('Communication Type', 'taxonomy singular name'),
        'search_items'      => __('Search Communication Types'),
        'all_items'         => __('All Communication Types'),
        'edit_item'         => __('Edit Communication Type'),
        'update_item'       => __('Update Communication Type'),
        'add_new_item'      => __('Add New Communication Type'),
        'new_item_name'     => __('New Communication Type Name'),
        'menu_name'         => __('Communication Type'),
    );
    $args   = array(
        'hierarchical'      => true, // make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'public'            => true,
        'rewrite'           => ['slug' => 'communication-type'],
    );
    register_taxonomy('communication-type', ['mc2', 'battery', 'mmri'], $args);
}
add_action('init', 'register_taxonomy_communication_type');



//Create Seminar Listing Posts From CSV File 

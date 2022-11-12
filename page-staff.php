<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php
/*


    Template Name: Staff Template


*/
global $post;
//Get the type of page 
$terms = wp_get_post_terms($post->ID, 'pagetype');

//Pages only have one taxonomy need to change [0] if more are added 
$slug = $terms[0]->slug;
$pagetype = '';
if ($slug == 'mmri-page') {
    get_header();
    $pagetype = 'mmri';
} elseif ($slug == 'mc2-page') {
    get_header('sub');
    $pagetype = 'mc2';
} elseif ($slug == 'battery-page') {
    get_header('sub');
    $pagetype = 'battery';
}

get_template_part('/includes/section', 'banner-page');

?>

<body id="staff-body">
    <main id="staff-main">
        <div id="staff-container">



            <?php
            $content = apply_filters('the_content', $post->post_content);
            //Get the proper staff listing
            $content = wp_strip_all_tags($content);
            $posts_array = null;
            if ($content == 'mmri-staff') {

                $posts_array = get_posts(
                    array(
                        'posts_per_page' => -1,
                        'post_type' => 'team',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'staffrole',
                                'field' => 'slug',
                                'terms' => 'mmri-staff',
                            )
                        )
                    )
                );
            } elseif ($content == 'mc2-staff') {

                $posts_array = get_posts(
                    array(
                        'posts_per_page' => -1,
                        'post_type' => 'team',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'staffrole',
                                'field' => 'slug',
                                'terms' => 'mc2-staff',
                            )
                        )
                    )
                );
            }elseif ($content == 'battery-staff') {

                $posts_array = get_posts(
                    array(
                        'posts_per_page' => -1,
                        'post_type' => 'team',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'staffrole',
                                'field' => 'slug',
                                'terms' => 'battery-staff',
                            )
                        )
                    )
                );
            }
            elseif ($content == 'mmri-exec') {

                $posts_array = get_posts(
                    array(
                        'posts_per_page' => -1,
                        'post_type' => 'team',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'staffrole',
                                'field' => 'slug',
                                'terms' => 'mmri-exec',
                            )
                        )
                    )
                );
            } elseif ($content == 'mmri-ia') {

                $posts_array = get_posts(
                    array(
                        'posts_per_page' => -1,
                        'post_type' => 'team',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'staffrole',
                                'field' => 'slug',
                                'terms' => 'mmri-ia',
                            )
                        )
                    )
                );
            }

            if ($posts_array) :
                foreach ($posts_array as $post) :
                    setup_postdata($post);
                    $thumbnail_src = null;


                    if (has_post_thumbnail($post->ID)) {
                        $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'team-thumb');
                        $thumbnail_src = $src[0];
                    }

            ?>


                    <div id="staff-card">
                        <?php if ($thumbnail_src) : ?>


                            <img src="<?php echo $thumbnail_src; ?>" alt="">

                        <?php endif; ?>
                        <h1 class="staff-name"><? the_title(); ?></h1>
                        <h2 class="staff-title"><?php echo get_post_custom_values('Role')[0]; ?></h2>
                        <h3 class="staff-number"><?php echo get_post_custom_values('Number')[0]; ?></h3>
                        <h4 class="staff-email"><?php echo get_post_custom_values('Email')[0]; ?></h4>

                    </div>

            <?php endforeach;
            endif;
            ?>


        </div>
        <?php
        global $post;
        wp_reset_query();
        //Get the type of page 
        $terms = wp_get_post_terms($post->ID, 'pagetype');

        //Pages only have one taxonomy need to change [0] if more are added 
        $slug = $terms[0]->slug;
        $pagetype = '';
        if ($slug == 'mmri-page') {
            get_template_part('includes/section', 'contact-mmri');
            $pagetype = 'mmri';
        } elseif ($slug == 'mc2-page') {
            get_header('sub');
            $pagetype = 'mc2';
        } elseif ($slug == 'battery-page') {
            get_header('sub');
            $pagetype = 'battery';
        }

        get_footer();
        ?>
    </main>

</body>
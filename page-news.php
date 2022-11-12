<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php
/*


    Template Name: News Template


*/
global $post;
//Get the type of page 
$terms = wp_get_post_terms($post->ID, 'pagetype');

//Pages only have one taxonomy need to change [0] if more are added 
$slug = $terms[0]->slug;
$pagetype = '';
$commType = null;
if ($slug == 'mmri-page') {
    get_header();
    $pagetype = 'mmri';
    $commType = array('mmri', 'battery', 'mc2');
} elseif ($slug == 'mc2-page') {
    get_header('sub');
    $pagetype = 'mc2';

    $commType = array('mc2');
} elseif ($slug == 'battery-page') {
    get_header('sub');
    $pagetype = 'battery';

    $commType = array('battery');
}

get_template_part('/includes/section', 'banner-page');





?>

<body id="news-body">
    <main id="news-main">
        <section id="recentNews">
            <div class="container">
                <h2 class="news-title">
                    All News
                </h2>
                <div class="row">

                    <? $loop = new WP_Query(

                        array(

                            'post_type' => $commType,
                            'posts_per_page' => -1, //unlimited
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'communication-type',
                                    'field' => 'slug',
                                    'terms' => 'news'
                                )
                            )
                        )

                    );
                    while ($loop->have_posts()) : $loop->the_post();
                        // The content you want to loop goes in here:
                        
                    ?>

                        <div class="news-card">



                            <div class="header">
                                <a href="<?php echo the_permalink() ?>">
                                    <h1><?php the_title(); ?></h1>
                                </a>
                                <h4>Posted: <?php the_weekday();
                                            echo ", ";
                                            the_date(); ?></h4>
                            </div>
                            <div class="content">
                                <p><?php

                                    $content = get_the_content();
                                    $content = strip_tags($content);
                                    echo (substr($content, 0, 300) . "...")

                                    ?></p>
                            </div>

                        </div>

                    <?php endwhile;
                    wp_reset_postdata();
                    ?>


        </section>
    </main>
</body>

<?php

if ($pagetype == 'mmri') {
    get_template_part('/includes/section', 'contact-mmri');
} elseif ($pagetype == 'battery') {

    get_template_part('/includes/section', 'contact-battery');
} elseif ($pagetype == 'mc2') {

    get_template_part('/includes/section', 'contact-mc2');
}


get_footer(); ?>
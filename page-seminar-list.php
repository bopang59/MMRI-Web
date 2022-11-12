<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php
/*


    Template Name: Seminar List Template


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
                    Upcoming Seminars
                </h2>
                <div class="row">

                    <? $args = 

                            array(
                                    'post_type' => 'post',
                                    'posts_per_page' => -1, //unlimited
                                    'category_name' => 'Seminar Listing',
                                    'orderby' => 'title',
                                    'order' => 'ASC',
                                    'post_status' => 'publish'
                                
                            );
                    $posts = get_posts($args);
                    foreach ($posts as $post) : setup_postdata($post);
                    // The content you want to loop goes in here:
                        
                    ?>

                        <div class="news-card">



                            <div class="header">

                            
                            <?
                            //Get the external link from the content and set it as header link 
                            if ( preg_match('/<a id="seminar-info" (.+?)>/', get_the_content(), $matches) ) {
    
                                $anchorTag = $matches[0];
                                preg_match('/href=(["\'])([^\1]*)\1/i', $anchorTag, $m);
                                $link = $m[2];
                                
                            }
                           ?>
                            
                                <a href="<?php echo $link ?>">
                                    <h1><?php the_title(); ?></h1>
                                </a>
                            </div>
                            
                            
                            <div id='seminar-details'>
                            <?
                            $content = get_the_content();
                             $matches = '';
                            ?>

                            <?  
                            if (preg_match('/<div id="seminar-speaker">([^<]*)<\/div>/', $content, $matches)) :
                            ?>
                            <div id="seminar-speaker">
                                <h2>
                                    <?php
                                    echo $matches[0]; 
                                    ?>
                                </h2>
                            </div>

                            <?endif; ?>

                        
                            <?
                            if (preg_match('/<div id="seminar-date">([^<]*)<\/div>/', $content, $matches)) :
                            ?>
                            <div id="seminar-date">
                                <h2>
                                    <?php
                                    echo $matches[0]; 
                                    ?>
                                </h2>
                            </div>

                            <?endif; ?> 
                          
                               <?  
                            if (preg_match('/<a id="seminar-zoom" href="([^*]*)">([^<]*)<\/a>/', $content, $matches)) :
                            ?>
                            <div id="seminar-zoom">
                                <h2>
                                    <?php
                                    echo $matches[0]; 
                                    ?>
                                </h2>
                            </div>

                            <?endif; ?>
                            </div>
                        </div>

                    <?php endforeach;
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
<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<?php

/**Template Name: Affiliates List */
/**Template Description: Automatically pulls all posts tagged as Affiliate */

get_header('MMRI');

?>

<?php get_template_part('/includes/section', 'banner-page'); ?>



<body id="affiliate-list-body">

    <div id="affiliate-list">

        <?php

        //Query affiliates
        $args =
            array(

                'post_type' => 'post',
                'posts_per_page' => -1, //unlimited
                'category_name' => 'Affiliate',
                'orderby' => 'title',
                'order' => 'ASC',
                'post_status' => 'publish'
            );

        $posts = get_posts($args);

        foreach ($posts as $post) : setup_postdata($post);

        ?>
            <a id="affiliate-link" href="<?php echo the_permalink(); ?>">
                <div id="affiliate-card">
                    <div id="affiliate-image">
                        <?php
                        //check for post image 
                        if (strpos(get_the_content(), '<img ')) :
                            echo '<img src="';
                            echo catch_that_image();
                            echo '" alt="" />';
                        else :
                            //if no image in the content
                        ?>
                            <img src="<?php echo get_template_directory_uri() ?>./includes/theme_imgs/unknown_user.jpeg" alt="">
                        <?php endif; ?>
                    </div>

                    <div id="affiliate-info">
                        <div id="affiliate-name">
                            <h1><?php echo the_title(); ?></h1>
                        </div>

                        <?php

                        $content = get_the_content();
                        $matches = '';
                        if (preg_match('/<h3 class="profile-primary">([^<]*)<\/h3>/', $content, $matches)) :
                        ?>
                            <div id="affiliate-title">
                                <h2>
                                    <?php
                                    echo $matches[1];
                                    ?>
                                </h2>
                            </div>
                        <?php endif; ?>
                        <?php
                        if (preg_match('/<p class="profile-research">(.*)<\/p>/', $content, $matches)) :
                        ?>
                            <div id="affiliate-research">
                                <h2>
                                    <?php
                                    echo $matches[0];
                                    ?>
                                </h2>
                            </div>
                        <?php endif; ?>



                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</body>
<?php get_footer(); ?>

<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<?php

/**Template Name: Event List */
/**Template Description: Automatically pulls all seminar and symposium listings */

get_header('MMRI');

?>

<?php get_template_part('/includes/section', 'banner-page'); ?>



<body id="event-list-body">

    <div id="event-list">

        <?php

        //Query seminars
        $args =
            array(

                'post_type' => 'post',
                'posts_per_page' => -1, //unlimited
                'category_name' => 'Seminar Series',
                'orderby' => 'title',
                'order' => 'ASC',
                'post_status' => 'publish'
            );

        $posts = get_posts($args);

        ?>

        <br><div id="default-content-title"><h1>MMRI Seminar Series:</h1></div><br>
        <ul id="seminar-list">
            <?php

            foreach ($posts as $post) : setup_postdata($post);

            ?>

                <li><a id="seminar-link" href="<?php echo the_permalink(); ?>"><?php echo the_title()?></a></li>

                </a>
            <?php endforeach; ?>
        <ul>
    </div>
</body>
<?php get_footer(); ?>
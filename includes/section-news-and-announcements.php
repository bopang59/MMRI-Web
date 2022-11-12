<?php

global $post;
//Get the type of page 
$terms = wp_get_post_terms($post->ID, 'pagetype');

//Pages only have one taxonomy need to change [0] if more are added 
$slug = $terms[0]->slug;
$pagetype = '';
$commType = null;
if ($slug == 'mmri-page') {
    $commType = array('mmri', 'battery', 'mc2');
    $pagetype = 'mmri';
} elseif ($slug == 'mc2-page') {
    $pagetype = 'mc2';
    $commType = array('mc2');
} elseif ($slug == 'battery-page') {
    $pagetype = 'battery';
    $commType = array('battery');
}


?>


<div id="Communications-Grid">
    <section id="recentNews">
        <div class="container">
            <button class="news-button">
                <h1>Recent Announcements</h1>
            </button>
            <div class="row">
                <? $loop = new WP_Query(
                    array(

                        'post_type' => $commType,
                        'posts_per_page' => 1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'communication-type', //taxonomy name
                                'field' => 'slug',                  //taxonomy field
                                'terms' => 'announcement'           //taxonomy value 
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
                                echo (substr($content, 0, 120) . "...")

                                ?></p>
                        </div>

                    </div>

                <?php endwhile;
                wp_reset_postdata();
                ?>
                <div class="btn-news btn-contests">
                    <div class="h3-link">
                        <a href="<?php echo esc_url('/' . $pagetype . '-announcements'); ?>">Browse All Announcements</a>
                    </div>

                </div>

    </section>

    <section id="recentNews">
        <div class="container">
            <button class="news-button">
                <h1> Recent News</h1>
            </button>
            <div class="row">

                <? $loop = new WP_Query(

                    array(

                        'post_type' => $commType,
                        'posts_per_page' => 1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'communication-type', //taxonomy name
                                'field' => 'slug',                  //taxonomy field
                                'terms' => 'news'           //taxonomy value 
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
                                echo (substr($content, 0, 120) . "...")

                                ?></p>
                        </div>

                    </div>

                <?php endwhile;
                wp_reset_postdata();
                ?>
                <div class="btn-news btn-contests">
                    <div class="h3-link">
                        <a href="<?php echo esc_url('/' . $pagetype . '-news'); ?>">Browse All News</a>
                    </div>
                </div>

    </section>
</div>
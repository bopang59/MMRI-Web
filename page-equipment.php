<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php

/**Template Name: Equipment Listing Page */
get_header('sub');

?>

<body id="equipment-list-body">


    <?php get_template_part('/includes/section', 'banner-page');
    global $post;
    //Get the type of page 
    $terms = wp_get_post_terms($post->ID, 'pagetype');

    //Pages only have one taxonomy need to change [0] if more are added 
    $slug = $terms[0]->slug;
    $pagetype = '';
    if ($slug == 'mc2-page') {
        $pagetype = 'mc2';
    } elseif ($slug == 'battery-page') {

        $pagetype = 'battery';
    }


    $possible_categories = get_terms(['taxonomy' => 'equipment-type']);
   
    ?>


    <div id="equipment-list-content">

        <p id="equipment-page-title">Techniques and Instruments</p>
        <ul id='equipment-category-list'>
            <?php
            //Loop over equipment categories, list category and equipment 
            foreach ($possible_categories as $cat) :
            ?>

                <?php
                //Dont list the default category since we wont use it 
                if ($cat->name != 'Other') :
                ?>
                    <li>



                        <?php $category_items = new WP_QUERY(array(

                            'post_type' => $pagetype . '-equipment',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'equipment-type',
                                    'field' => 'slug',
                                    'terms' => $cat->name,
                                )
                            )

                        )); ?>

                        <?php if ($category_items->have_posts()) : ?>
                            <h1 id="equipment-category-title"><?php echo $cat->name ?></h1>
                        <?php endif; ?>
                        <ul id='equipment-item-list'>
                            <?php if ($category_items->have_posts()) : ?>
                                <?php while ($category_items->have_posts()) : ?>

                                    <li>
                                        <?php $category_items->the_post();  ?>
                                        <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                    </li>

                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>

                    </li>
                <?php endif; ?>
            <?php endforeach; ?>

        </ul>


    </div>

    <?php if ($pagetype == 'mc2') {
        get_template_part('/includes/section', 'contact-mc2');
    } elseif ($pagetype == 'battery') {
        get_template_part('/includes/section', 'contact-battery');
    } ?>

</body>
<?php get_footer(); ?>
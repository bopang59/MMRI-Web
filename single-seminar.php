<!DOCTYPE html>
<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<?php

/**Template Name: Single Seminar */
/*Template Post Type: post*/
/*Template Description: Used for seminar listings. Copy paste existing, update links, theme handles layout.*/


get_header();

$contactForm = 'contact-mmri';


?>

<body id="seminar-body">


    <?php get_template_part('/includes/section', 'banner-seminar'); ?>



    <div id="seminar-content-container">

        <div id="seminar-content-title"><?php echo the_title() ?></div>

        <div id="seminar-content-table" class="row">
            <?php

            // $images = &get_children(array(
            //     'post_parent' => $post->ID,
            //     'post_type' => 'attachment',
            //     'post_mime_type' => 'image'
            // ));


            // if (empty($images)) {
            //     // no attachments here
            // } else {
            //     foreach ($images as $attachment_id => $attachment) {
            //         echo "<div id=seminar-speaker-column class=\"column\">";
            //         echo wp_get_attachment_image($attachment_id)."<br><br>";
            //         echo "<div id=speaker-caption>";
            //         echo wp_get_attachment_caption($attachment_id);
            //         echo "</div>";
            //         echo "</div>";
            //         break;
            //     }
            // }

            $thumbnail = get_the_post_thumbnail();
            if ($thumbnail) {
                echo "<div id=seminar-speaker-column class=\"column\">";
                echo $thumbnail."<br><br>";
                echo "<div id=speaker-caption>";
                echo get_post(get_post_thumbnail_id())->post_excerpt;
                echo "</div>";
                echo "</div>";
            }


            //Get the embedded video and slidedeck (if present (should be present for seminar template))
            //Get the content, apply filters and execute shortcodes
            $content = apply_filters('the_content', $post->post_content);
            $embeds = get_media_embedded_in_content($content);
            //$embeds is an array and each item is the HTML of an embedded media.
            //The first item of the array is the first embedded media in the content

            ?>
            <div id="seminar-media-column" class="column">
                <?php
                //Get the embeded video 
                $fist_embedded = $embeds[0];
                if ($fist_embedded) :
                ?>

                    <?php echo $fist_embedded ?>
                <?php endif; ?>

                <?php
                //get the embeded slidedeck
                $fist_embedded = $embeds[1];
                if ($fist_embedded) :
                ?>
                    <?php echo $fist_embedded ?>
                <?php endif; ?>

            </div>

        </div>

    </div>



    <?php get_template_part('/includes/section', $contactForm); ?>

</body>

<?php get_footer(); ?>
<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php
/*


    Template Name: Sub-Homepage

*/

get_header('sub');

global $post;
//Get the type of page 
$terms = wp_get_post_terms($post->ID, 'pagetype');

//Pages only have one taxonomy need to change [0] if more are added 
$slug = $terms[0]->slug;
$pagetype = '';
if ($slug == 'mc2-page') {
    get_header('sub');
    $pagetype = 'mc2';
} elseif ($slug == 'battery-page') {
    get_header('sub');
    $pagetype = 'battery';
}
?>




<body id="subhome-body">

    <div id="subBanner">

        <?php /** Get the video and other content from */

        if ($pagetype == 'mc2') : ?>
            <div id="vid-container" style="background-image: linear-gradient(rgba(0,0,0,.7),rgba(0,0,0,.7)), url(<?php echo get_template_directory_uri() ?>/includes/theme_imgs/mc2.jpg)">
                <!--Remove when video updated -->
                <img id="lab-thumbnail" src="<?php echo get_template_directory_uri() ?>/includes/theme_imgs/mc2-square-logo.jpg" alt="">

                <!--add back in once video is up to date
       
                <iframe id="embeded-vid" width="560" height="315" src="https://www.youtube.com/embed/ww9GLp69Jrs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        
        
            -->
            </div>




            <div id="services">
                <div class="service" onclick="window.location.href='<?php echo esc_url('/mc2-equipment-listing/');?>'">
                    <i class="fas fa-toolbox"></i>
                    <h1>(MC)<sup>2</sup> Equipment</h1>
                </div>
                <div class="service" onclick="window.location.href='<?php echo esc_url('/mc2-service/become-a-user/');?>'">
                    <i class="fas fa-user"></i>
                    <h1>Become A User</h1>
                </div>
                <div class="service" onclick="window.location.href='<?php echo esc_url('/mc2-service/facility-description/');?>'">
                    <i class="fas fa-building"></i>
                    <h1>Facility Description</h1>
                </div>
            </div>
        <?php
        elseif ($pagetype == 'battery') :
        ?>
            <div id="vid-container" style="background-image: linear-gradient(rgba(0,0,0,.7),rgba(0,0,0,.7)), url(<?php echo get_template_directory_uri() ?>/includes/theme_imgs/battery-lab.jpg)">

                <iframe id="embeded-vid" width="560" height="315" src="<?php echo esc_url('https://www.youtube.com/embed/MTqa-PfcmfU');?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div id="services">

                 <div class="service" onclick="window.location.href='<?php echo esc_url('/battery-service/arriving-at-the-battery-lab/');?>'">
                    <i class="fas fa-map"></i>
                    <h1>Arriving at the Lab</h1>
                </div>
                <div class="service" onclick="window.location.href='<?php echo esc_url('/battery-service/become-a-user/');?>'">
                    <i class="fas fa-user"></i>
                    <h1>Become A User</h1>
                </div>
                <div class="service" onclick="window.location.href='<?php echo esc_url('/battery-service/facility-description/');?>'">
                    <i class="fas fa-building"></i>
                    <h1>Facility Description</h1>
                </div>
            </div>
        <?php endif; ?>




    </div>

    <?php if ($pagetype == 'mc2') : ?>

        <div id="mission-statement">

            <h1>The UM Center for Materials Characterization</h1>
            <h2>The Michigan Center for Materials Characterization, also known as (MC)2, is the University of Michigan’s
                facility dedicated to the micron and nanoscale imaging and analysis of materials. The center, housed in
                Building 22 of the North Campus Research Complex, provides state-of-the-art instruments, professional
                training, and in-depth education for students and other internal researchers, fellow academic
                institutions, and local industry. (MC)2 supports a diverse multi-disciplinary user base of more than 450
                users from various colleges and departments, 100+ internal research groups, and over 20 non-academic
                companies. </h2>
        </div>

    <?php elseif ($pagetype == 'battery') : ?>


        <div id="mission-statement">

            <h1>The UM Battery Lab</h1>
            <h2>The UM Battery Lab is a campus research core offering academic and industrial users from
                around the globe the expertise and resources required to prototype, test and analyze batteries
                and the materials that go into them. The lab’s aim: work with the industrial and academic energy
                storage community to bring together scientists and engineers, as well as suppliers and
                manufacturers, to ease a bottleneck in battery development near the nation’s automotive
                capital. The lab is available for any firm or researcher to use, and is a safe zone for IP-protected
                discovery, scale-up, and testing of next-generation batteries and battery materials.
                <br><br>The Battery Lab, part of the Michigan Materials Research Institute, was developed by U-M in
                cooperation with the Michigan Economic Development Corporation and Ford Motor Company.
            </h2>
        </div>

    <?php endif; ?>



    <?php get_template_part('includes/section', 'news'); ?>



    <!--General Contact Info-->
    <div id="additional-quicklinks">

        <div class="info">

            <i class="fas fa-user"></i>
            <a href="<?php echo esc_url('/'. $pagetype . "-staff"); ?>">
                <h1>View Our Staff</h1>
            </a>
        </div>
        <div class="info">

            <i class="fas fa-file-alt"></i>
            <a href="<?php echo esc_url('/'.$pagetype . "-service/policies"); ?>">
                <h1>Read our Guidelines</h1>
            </a>

        </div>
        <div class="info">
            <i class="fas fa-users"></i>
            <a href="<?php echo esc_url('/'. $pagetype . "-service/become-a-user"); ?>">
                <h1>Become a User</h1>
            </a>

        </div>
    </div>


    <!--Banner Bottom-->


    <?php


    if ($pagetype == 'mc2') {
        get_template_part('includes/section', 'contact-mc2');
    } elseif ($pagetype == 'battery') {
        get_template_part('includes/section', 'contact-battery');
    }

    ?>
</body>
<?php get_footer(); ?>
<?php wp_footer(); ?>
<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<footer>

    <div id="footer-northcamp" style="background-image: url('<?php echo get_template_directory_uri() ?>/includes/theme_imgs/new_footer_bg.png')">

        <div class="background-color-footer">

            <div id="left-footer">
                <!--the original quick link 
        <h3>Quick Links</h3> 
        <p>

            //<?php
                //$menu_args = [
                //'theme_location' => 'footer'
                // ];
                // wp_nav_menu($menu_args);
                // 
                ?>

        </p>
        -->

                <a href="https://materialsresearch.umich.edu/" target="_blank">
                    <div class="h3-footer">Home</div>
                </a>
                <a href="https://materialsresearch.umich.edu/my-account/" target="_blank">
                    <div class="h3-footer">My Account</div>
                </a>
            </div>

            <!--here I added another middle section for the logo-->
            <div id="right-footer">
 
                <img id="dark" src="<?php echo get_template_directory_uri() ?>/includes/theme_imgs/logo-background-dark.png" alt="">
            </div>

            <div id="contact-info">
                <div class="h3-footer">Michigan Materials Research Institute (MMRI)</div>
                <div class="h3-footer">2300 Hayward St. Ann Arbor, MI 48109</div>
                <div class="h3-footer">+1 (734) 615-2504</div>
                <div class="h3-footer">materialsresearch@umich.edu</div>
            </div>

        </div>


    </div>

</footer>



</html>
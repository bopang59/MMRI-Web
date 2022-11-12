<?php

/**Template Name: Home Page */
?>
<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<?php get_header(); ?>

<script>
    $(document).ready(function() {
        $(window).scroll(function() {

            if ($(window).scrollTop() > 1500) {
                $('#menu-mmri-nav-menu').css('position', 'fixed');
                $('#menu-mmri-nav-menu').css('top', '100');
            } else if ($(window).scrollTop() <= 1500) {
                $('#menu-mmri-nav-menu').css('position', '');
                $('#menu-mmri-nav-menu').css('top', '');
            }
            if ($('#menu-mmri-nav-menu').offset().top + $("#menu-mmri-nav-menu").height() > $("footer").offset().top) {
                $('#menu-mmri-nav-menu').css('top', -($("#menu-mmri-nav-menu").offset().top + $("#menu-mmri-nav-menu").height() - $("footer").offset().top));
            }
        });
    });
</script>
<!--menu-mmri-nav-menu-container-->
<script>
    $(document).ready(function() {
        $(window).scroll(function() {

            if ($(window).scrollTop() > 1500) {
                $('.menu-mmri-nav-menu-container').css('position', 'fixed');
                $('.menu-mmri-nav-menu-container').css('top', '0');
            } else if ($(window).scrollTop() <= 1500) {
                $('.menu-mmri-nav-menu-container').css('position', '');
                $('.menu-mmri-nav-menu-container').css('top', '');
            }
            if ($('.menu-mmri-nav-menu-container').offset().top + $(".menu-mmri-nav-menu-container").height() > $("footer").offset().top) {
                $('.menu-mmri-nav-menu-container').css('top', -($(".menu-mmri-nav-menu-container").offset().top + $(".menu-mmri-nav-menu-container").height() - $("footer").offset().top));
            }
        });
    });
</script>


<body id="homepage-body">
    <?php //get_template_part('/includes/section', 'slideout'); 
    ?>

    <main id="homepage-main">
        <div id="homepage-banner">
            <div id="oval-container">
                <!--TODO:here I added the nav menu, so it would be the side bar-->
                <!--TODO:here I added the row as the whole page, and I divide it into two column-->
                <div class="row">

                    <div class="column left" style=" background-color: var(--UMblue);">
                        <div class="bg-canvas" style="background-color: white;">

                            <?php
                            $menu_args = [ //link main navbar menu from WP admin panel
                                'menu_class' => 'main',
                                'theme_location' => 'primary'
                            ];
                            wp_nav_menu($menu_args);
                            ?>
                        </div>

                    </div>

                </div>


                <div class="column right" style="background-color:lightgrey;">
                    <!--column right starts from here-->


                    <div id="homepage-oval" style="background-image: url('<?php echo get_template_directory_uri() ?>/includes/theme_imgs/Phoenix_Large_V2.png')">

                        <!--<div id="oval-outer">-->

                        <div id="inner-top">
                            <img src="<?php echo get_template_directory_uri() ?>/includes/theme_imgs/logo-background-dark.png" alt="">
                        </div>

                        <!-- this is the donut chart-->
                        <?php echo do_shortcode('[TP_PIEBUILDER_DOUGHNUT title="" values="11, 3, 84, 2" labels=" LS&A, Dentistry, CoE, Med" colors="#FFCB05, #2F65A7, #00274C, #000000"]'); ?>


                        <div class="target">

                            <div id="tierPointsValue" data-percent="-5">
                                <div class="border-outer">
                                    <div class="target-chart">
                                        <div class="border-inner">
                                            <div class="center">
                                                <div id="totalPoints" class="totalTierPoints" value="50">160</div>
                                                <div class="points-random">TOTAL AFFILIATE REGISTRATION</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <!--I added the js code below-->
                        <script>
                            var totalPoints = document.getElementById('totalPoints').innerHTML;
                            var differenceValue = '1000';
                            var tierLevelPoints = '17999';
                            var calculatePointsPercentage = (totalPoints - differenceValue) / (tierLevelPoints - differenceValue) * ('100');
                            var dataPercentage = calculatePointsPercentage.toFixed(0);

                            $(function(value) {
                                $("#tierPointsValue").attr("data-percent", dataPercentage);
                                $('.target-chart').easyPieChart({
                                    animate: 2000,
                                    lineWidth: 18,
                                    scaleColor: false,
                                    lineCap: 'square',
                                    size: 200,
                                    trackColor: "#999999",
                                    barColor: "#b97346" // ADVANTAGE TIER COLOR
                                    // #8a090d - CHOICE TIER COLOR
                                    // #b88c3b - PREFERRED TIER COLOR
                                    // #636466 - ELITE TIER COLOR
                                    // #000000 - OWNERS CLUB COLOR
                                });
                            });
                            $('.totalTierPoints').each(function() {
                                $(this).prop('Counter', 0).animate({
                                    Counter: $(this).text()
                                }, {
                                    duration: 2000,
                                    easing: 'swing',
                                    step: function(now) {
                                        $(this).text(Math.ceil(now));
                                    }
                                });
                            });
                        </script>
                        <!--end of js code-->
                        <!--here I added the footnote for the donut-->
                        <!--future edit
                            <div class='footnote'>
                                <div class='color1'></div>
                                <div class='representation'>CoE</div>

                                <div class='color2'></div>
                                <div class='representation'>LS&A</div>

                                <div class='color3'></div>
                                <div class='representation'>DENTISTRY</div>

                                <div class='color4'></div>
                                <div class='representation'>MEDICINE</div>
                            </div>
                            -->

                        <!-- here I added the horizontal bar, with css in homepage.css-->

                        <!--<div class="skills">
                                <div id="apps">
                                    <p>MEDICINE</p>
                                    <p>DENTISTRY</p>
                                    <p>LS&A</p>
                                    <p>CoE</p>
                                </div>

                                <div class="grid">
                                    <div class="bar pct-1">
                                        <div class="inner"></div>
                                    </div>
                                    <div class="bar pct-2">
                                        <div class="inner"></div>
                                    </div>
                                    <div class="bar pct-15">
                                        <div class="inner"></div>
                                    </div>
                                    <div class="bar pct-85">
                                        <div class="inner"></div>
                                    </div>

                                    <div class="v-divider one"></div>
                                    <div class="v-divider two"></div>
                                    <div class="v-divider three"></div>
                                    <div class="v-divider four"></div>

                                    <div id="scale">
                                        <p class="zero">0%</p>
                                        <p class="one">25%</p>
                                        <p class="two">50%</p>
                                        <p class="three">75%</p>
                                        <p class="four">100%</p>
                                    </div>
                                </div>
                            </div>-->


                    </div>


                    <!--here i added the background for vision and pilliar and grid-->
                    <div class='canvas-white'>
                        <!--here I added another container for the first rectagular vision container display-->
                        <!--I also need to edit the css file for the vision container, this is the rectagular box-->
                        <div class='rectangle-box'>
                            <div class='rectangle-content'>
                                <p></p>


                                <div class="btn-vision" style="
    font-size: 1.5em;
    font-weight: bold;
    margin: -8;">
                                    Our Vision

                                </div>



                                <div class="heading-4" style="
   line-height: 1.3;
    font-size: calc(6px + 1.0vw);
    display: block;
    font-weight: bold;
    margin-top: 13;
    margin-bottom: 3;
    font-weight: 500;
">To serve as the foundation that will, over the next decade, catalyze the
                                    formation of multiple multi-million dollar research centers, major
                                    instrumentation and infrastructure sponsored by federal agencies and
                                    industry, leading to Michigan’s reputation as the best university in the US for
                                    engineered materials research
                                </div>
                                <p></p>
                            </div>
                        </div>

                        <!--here is the container that for the four colums-->
                        <div class="four-pillars">
                            <!--this is the first pillar for portal, I need to hover the registration-->
                            <div class="ctner">
                                <div class="initial">
                                    <button class="button">
                                        <h1> Portal </h1>
                                    </button>
                                    <div class="heading-4" style="padding: 10; font-size: calc(6px + 1.0vw);">To create a portal for government and companies to identify key capabilities</div>
                                    <div class="h3-link">
                                        <a href="/become-an-affiliate/">Affiliate Registration</a>
                                    </div>
                                </div>
                            </div>

                            <!--this is the second pillar for capability. I need to hover over Equipment request, battery lab and MC-->
                            <div class="ctner">
                                <div class="initial">
                                    <button class="button">
                                        <h1> Capabilities</h1>
                                    </button>
                                    <div class="heading-4" style="padding: 10; font-size: calc(6px + 1.0vw);/* font-weight: bold; */">To support the sharing of research equipment and to prioritize critical gaps</div>
                                    <div class="h3-link"> <a href="/mc2-home/"> Center for Materials Characterization</a></div>

                                    <div class="h3-link">
                                        <a href="/battery-home/"> Battery Lab</a>
                                    </div>
                                    <div class="h3-link">
                                        <a href="/equipment-request/"> Equipment Request</a>
                                    </div>
                                </div>
                            </div>

                            <!--this is the fourth pilliar for community, where have teh MMRI Affilifates anf Event Atchive as the lin-->
                            <div class="ctner">
                                <div class="initial">
                                    <button class="button">
                                        <h1> Community </h1>
                                    </button>
                                    <div class="heading-4" style="padding: 10; font-size: calc(6px + 1.0vw);/* font-weight: bold; */">To build a community amongst the materials researchers across the University</div>
                                    <!--<ul>-->
                                    <div class="h3-link"> <a href="<?php echo esc_url('/Affiliates/'); ?>">MMRI Affiliates</a></div>
                                    <div class="h3-link"> <a href="<?php echo esc_url('/event-archive/'); ?>">MMRI Event Archive</a></div>
                                    <!--</ul>-->
                                </div>
                            </div>

                            <!-- this is the third pilliar for Grants, where have the External Grant Information as the link. -->
                            <div class="ctner">
                                <div class="initial">
                                    <button class="button">
                                        <h1> External Grants </h1>
                                    </button>
                                    <div class="heading-4" style="padding: 10; font-size: calc(6px + 1.0vw);/* font-weight: bold; */">To enable the awarding of large materials research grants</div>
                                    <div class="h3-link"> <a href="<?php echo esc_url('/mmri-announcements/'); ?>"> Announcements</a> </div>
                                </div>
                            </div>

                        </div>
                        <!--this is the end of the pillar container-->

                        <!--here I got the communication grid, this is also in the right column-->
                        <?php get_template_part('/includes/section', 'news-and-announcements'); ?>
                        <!--<a href="https://www.google.com/" target="_blank">read more</a>-->
                    </div>
                    <!--canvas-->
                </div>
            </div>
        </div>
        </div>
    </main>
</body>

<?php get_footer(); ?>
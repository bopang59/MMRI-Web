<div id="section-banner">
   <h1>
            <?php
       
            //check the post type (registered in functions.php)
            if (determine_post_type() == 'mmri') {

                echo "MMRI";
            } elseif (determine_post_type() == 'battery') {

                echo "Battery Lab";
            } elseif (determine_post_type() == 'mc2') {

                echo "(MC)<sup>2</sup>";
            } else {

                echo "Type";
            }


            ?>


        </h1>
        <h2>News</h2>
    
</div>
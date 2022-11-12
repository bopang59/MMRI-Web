<div id="section-banner">
   <h1>
            <?php
          
            //check the post type (registered in functions.php)
            if (determine_post_type() == 'battery-equipment') {

                echo "Battery Lab";
            } elseif (determine_post_type() == 'mc2-equipment') {

                echo "(MC)<sup>2</sup>";
            } else {

                echo "Type";
            }


            ?>


        </h1>
        <h2><?php the_title();?></h2>
    
</div>
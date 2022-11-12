<div id="section-banner">
   <h1>
            <?php
          global $post;
          //Get the type of page 
          $terms = wp_get_post_terms($post->ID, 'pagetype');
          
          //Pages only have one taxonomy need to change [0] if more are added 
          $slug = $terms[0]->slug;
          $pagetype = '';
          if ($slug == 'mmri-page') {
              echo "MMRI";
          } elseif ($slug == 'mc2-page') {
              echo "(MC)<sup>2</sup>";
          } elseif ($slug == 'battery-page') {
             echo 'Battery Lab';
          }


            ?>


        </h1>
        <h2><?php the_title(); ?></h2>
    
</div>
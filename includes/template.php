<div class="rescue_portfolio">

<div class="filter_wrap">

        <ul class="clearfix">

          <li>Filter:</li>
          
          <li class="filter" data-filter="all">All</li>
          
          <?php
          
            // Get the taxonomy
            $terms = get_terms('filter', array(
              'orderby'       => 'name', 
              'order'         => 'ASC',
            ));
            
            // set a count to the amount of categories in our taxonomy
            $count = count($terms); 
            
            // set a count value to 0
            $i=0;
            
            // test if the count has any categories
            if ($count > 0) {
            
            // If we don't define this variable here, WP_DEBUG will give an 'Undefined variable' notice
            $term_list = '';
              
              // break each of the categories into individual elements
              foreach ($terms as $term) {
                
                // increase the count by 1
                $i++;
                
                // rewrite the output for each category
                $term_list .= '<li class="filter" data-filter="'. $term->slug .'">' . $term->name . '</li>';
                
                // if count is equal to i then output blank
                if ($count != $i)
                {
                  $term_list .= '';
                }
                else 
                {
                  $term_list .= '';
                }
              }
              
              // print out each of the categories in our new format
              echo $term_list;
            }
          ?>
        </ul><!-- .filter -->
    </div><!-- .filter_wrap -->

        <ul id="Grid" class="small-block-grid-3">
      
          <?php
            
            // Query Our Database
            $wpbp = new WP_Query(array( 'post_type' => 'portfolio', 'posts_per_page' =>'-1' ) ); 
          ?>
          
          <?php
            // Begin The Loop
            if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post(); 
          ?>
          
          <?php 
            // Get The Taxonomy 'Filter' Categories
            $terms = get_the_terms( get_the_ID(), 'filter' ); 
          ?>
          
          <?php 
          // $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' ); 
          // $large_image = $large_image[0]; 
            $thumb = get_post_thumbnail_id();
            $img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
          ?>
          
              <li data-id="id-<?php echo $count; ?>" class="mix <?php foreach ($terms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->slug)). ' '; } ?>">
                
                  <?php 
                    // Check if wordpress supports featured images, and if so output the thumbnail
                    if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : 
                  ?>
                    
                    <?php // Output the featured image ?>
                    <a href="<?php echo $img_url ?>" class="fancybox image_hover" rel="gallery_group" title="<?php echo get_the_title(); ?>"><?php the_post_thumbnail('rescue_portfolio_img', array('class'=>'rescue_port_image')); ?></a>                 
                                      
                  <?php endif; ?> 
                  
                  <?php // Output the title of each portfolio item ?>
                  <p><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></p>
                  
              </li>
  
          
          <?php $count++; // Increase the count by 1 ?>   
          <?php endwhile; endif; // END the Wordpress Loop ?>
          <?php wp_reset_query(); // Reset the Query Loop?>
      
        </ul><!-- #Grid -->

</div><!-- .rescue_portfolio -->
<div class="rescue_portfolio">
<?php if (empty($filter_term_slug)) : // filter widget is needed ?>
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
<?php endif; ?>

        <ul id="Grid" class="">
      
          <?php
            $theme_name = wp_get_theme(); // - v1.2

            // Query Our Database
            $image_query_args = array( 'post_type' => 'portfolio', 'posts_per_page' =>'-1' );
            if (!empty($filter_term_slug)) {
                $image_query_args["tax_query"] = array(
                                                     array(
                                                            'taxonomy' => 'filter',
                                                            'field'    => 'slug',
                                                            'terms'    => $filter_term_slug, // make this an array for multiple terms
                                                     )
                                                 );
            }
            $wpbp = new WP_Query($image_query_args);

            // Begin The Loop
            if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post(); 

            // Get The Taxonomy 'Filter' Categories
            $terms = get_the_terms( get_the_ID(), 'filter' ); 

            $thumb = get_post_thumbnail_id();
            $img_url = wp_get_attachment_url( $thumb ); //get img URL

             ?>

            <li data-id="id-<?php echo $count; ?>" class="mix <?php foreach ($terms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->slug)). ' '; } ?>">

            <?php if ($theme_name == 'Advocator') { // - v1.2 ?>
                
                  <?php 
                    // Check if wordpress supports featured images, and if so output the thumbnail
                    if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : 

                    $params = array( 'width' => 280, 'height' => 210 ); 
                    $image = bfi_thumb( "$img_url", $params );

                  ?>
                    
                    <?php // Output the featured image ?>
                    <a href="<?php echo $img_url ?>" class="fancybox image_hover" rel="gallery_group" title="<?php the_title(); ?>"><img alt="" src="<?php echo $image ?>" /></a>             
                                      
                  <?php endif; ?> 
                  
                  <?php // Output the title of each portfolio item ?>
                  <p><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></p>
  
          <?php } elseif ($theme_name == 'Legislator') { // - v1.2 ?>
                
                  <div class="view view-first">
                  
                    <?php // Check for featured image
                      if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : 

                      $params = array( 'width' => 245, 'height' => 245 ); 
                      $image = bfi_thumb( "$img_url", $params ); 

                      ?>

                      <img alt="<?php echo get_the_title(); ?>" src="<?php echo $image ?>" />
                                       
                    <?php  endif; //end image check  ?> 

                    <div class="mask view-first">
                        <h2><?php echo get_the_title(); ?></h2>

                        <!-- Fancybox Image -->
                        <a href="<?php echo $img_url ?>" class="fancybox info" rel="gallery_group" title="<?php echo get_the_title(); ?>"><?php _e('View Larger','rescue');?></a>
                        <!-- Permalink -->
                        <a href="<?php the_permalink(); ?>" class="info" rel="gallery_group" title="<?php echo get_the_title(); ?> Details"><?php _e('Details','rescue');?></a>
                    </div>

                    </div><!-- .view .view-first -->     

          <?php } else { // - v1.2 ?>
                
                    <?php // Check for featured image
                      if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : 

                      $params = array( 'width' => 250, 'height' => 250 ); 
                      $image = bfi_thumb( "$img_url", $params ); 

                      ?>
                    
                    <?php // Output the featured image ?>
                    <a href="<?php the_permalink(); ?>" class="featured_image" title="<?php the_title(); ?>"><img alt="" src="<?php echo $image ?>" /></a>             
                                      
                  <?php endif; ?> 
                  
                  <?php // Output the title of each portfolio item ?>
                  <p><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></p>

          <?php } ?>

              </li>   
          
          <?php $count++; // Increase the count by 1 ?>   
          <?php endwhile; endif; // End WP Loop ?>
          <?php wp_reset_query(); // Reset the Query Loop?>
      
        </ul><!-- #Grid -->

</div><!-- .rescue_portfolio -->
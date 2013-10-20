<li><h2><?php _e('Hot Pic Posts', 'zuluoCMS'); ?></h2>
 <ul>
 <?php
 query_posts( array( 'post__not_in' => get_option( 'sticky_posts' ), 'orderby' => 'comment_count' , 'order' =>'DESC' , 'showposts' =>'6' ) );
 while (have_posts()) : the_post();
 ?>
 <li class="li_pic">
 <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
 <img src="<?php echo get_the_thumb($post->ID); ?>">
 <p><?php the_title(); ?></p></a>
 </li>
 <?php
 endwhile;
 // Reset Query
 wp_reset_query();
 ?>
 </ul>
 </li>
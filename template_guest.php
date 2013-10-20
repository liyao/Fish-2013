<?php
/**
 * Template Name: guest book
 * Description: For guest messages
 */

get_header(); ?>
<section id="content" class="wrapper border-box hfeed clearfix resume">
	<section id="main" class="border-box">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						<div class="wall">
								<ul>
									<?php 
										$query="SELECT COUNT(comment_ID) AS cnt, comment_author, comment_author_url, comment_author_email FROM (SELECT * FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->posts.ID=$wpdb->comments.comment_post_ID) WHERE comment_date > date_sub( NOW(), INTERVAL 6 MONTH ) AND user_id='0' AND comment_author_email != 'lonelyxue@gmail.com' AND post_password='' AND comment_approved='1' AND comment_type='') AS tempcmt GROUP BY comment_author_email ORDER BY cnt DESC LIMIT 28";//那个28就是你要显示的头像数量了，这个要根据你的页面宽度和头像大小来调整
										$wall = $wpdb->get_results($query); 
										foreach ($wall as $comment) 
										{ 
											if( $comment->comment_author_url ) 
											$url = $comment->comment_author_url; 
											else $url="#"; 
											$tmp = "<li><a href='".$url."' target='_blank' title='".$comment->comment_author." (".$comment->cnt." Comments)'>".get_avatar($comment->comment_author_email, 80)."</a></li>"; 
											$output .= $tmp; 
										 } 
										echo $output ;
									?>
								</ul>
							</div>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themename' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID(); ?> -->
			<!--</div> #content -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>
</section>
<?php comments_template( '', true ); ?>
<?php get_footer(); ?>
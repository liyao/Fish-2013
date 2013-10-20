<?php
/**
 * @package WordPress
 * @subpackage themename
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>

<?php /* Start the Loop */ ?>
<section class="post_list clearfix">
<?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		</header><!-- .entry-header -->

		<?php //if ( is_archive() || is_search() ) : // Only display Excerpts for archives & search ?>
		<div class="entry-summary">
			<?php //the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php //else : ?>
		<div class="entry-content clearfix">
			<a class="date border-box" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
				<time datetime="<?php echo get_the_date( 'Y-m-d' );?>" pubdate>
					<span class="month"><?php echo date('M',get_the_time('U'));?></span>
					<span class="day"><?php echo date('d',get_the_time('U'));?></span>
				</time>
			</a>
			<!-- 文章缩略图 -->
			<?php
			    if ( has_post_thumbnail() ) {
				// the current post has a thumbnail
				dm_the_thumbnail();
			    } else {
				//the current post lacks a thumbnail
					$thumb = getFirstImage($post->ID);
					if(strlen($thumb) > 0) {
						echo '<a class="p_thumbnail" href="'.get_permalink().'">';
						echo $thumb;
						echo '</a>';
					}else {
						echo '<a class="p_thumbnail" href="'.get_permalink().'"><img width="135" height="135" src="'.get_bloginfo('template_url').'/images/tb1.jpg" /></a>';
					}
			    }
			?>
			<div class="p_content">
				<div class="entry-meta">
					<span class="sep mr10">时间: <time class="entry-date" datetime="<?php echo get_the_date( 'c' );?>" pubdate><?php echo get_the_date();?> | <?php echo the_time('H:i');?></time></span>
					<?php
						printf( __( ' <span class="sep mr10"> 作者:  <span class="author vcard"><a class="url fn n" href="%4$s" title="%5$s">%6$s</a></span></span>', 'themename' ),
							get_permalink(),
							get_the_date( 'c' ),
							get_the_date(),
							get_author_posts_url( get_the_author_meta( 'ID' ) ),
							sprintf( esc_attr__( '查看 %s 的其他文章', 'themename' ), get_the_author() ),
							get_the_author()
						);
					?>
					
					<a class="comments border-box" title="<?php no_admin_number('0','1','%' );?>次评论" href="<?php echo get_permalink();?>"><?php no_admin_number('0','1','%' );?></a>
					<span class="cat-links mr10"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( '分类: ', 'themename' ); ?></span><?php the_category( ', ' ); ?></span>
					<span class="view-num mr10"><?php the_views( '次浏览' , true); ?></span>
					<span class="update-time mr10"><?php if ((get_the_modified_time('Y')*365+get_the_modified_time('z')) > (get_the_time('Y')*365+get_the_time('z'))) : ?>更新: <?php the_modified_time('Y-n-j'); ?><?php endif; ?></span>
					<?php edit_post_link( __( '编辑', 'themename' ), '<span class="meta-sep"></span> <span class="edit-link">', '</span>' ); ?>
					<div class="tag-link mr10"><?php the_tags( __( 'TAGS: ', 'themename' ), ', '); ?></div>
					
				</div><!-- .entry-meta -->
				<?php 
				if(has_excerpt()) {
					echo the_excerpt(). '<a href="'.get_permalink().'">[阅读全文]</a>';
				}
				else echo mb_strimwidth(strip_tags($post->post_content),0,300,'......<br /><a href="'.get_permalink().'">[阅读全文]</a>');
				?> 
			</div>
			
			<?php //wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themename' ), 'after' => '</div>' ) ); ?>
		
		</div><!-- .entry-content -->
		<?php //endif; ?>
		<div class="ring-left"></div><div class="ring-right"></div>
	</article><!-- #post-<?php the_ID(); ?> -->

	<?php comments_template( '', true ); ?>

<?php endwhile; ?>
</section>


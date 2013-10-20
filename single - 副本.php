<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>

<!-- 		<div id="primary">
			<div id="content"> -->
<section id="content" class="wrapper border-box hfeed clearfix">
	<section id="main" class="border-box">
		<section class="post_single clearfix">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
					<header class="entry-header clearfix">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="entry-meta clearfix">
							<div class="entry-banner clearfix">
								<div class="date">
									<?php echo date('d',get_the_time('U'));?><br>
									<?php echo date('M',get_the_time('U'));?>
									<div class="ring-left"></div><div class="ring-right"></div>
								</div>
								<div class="comment-num">
									<em><?php no_admin_number('0 ','1 ','% ' );?></em>条评论
								</div>
							</div>
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
							<span class="cat-links mr10"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( '分类: ', 'themename' ); ?></span><?php the_category( ', ' ); ?></span>
							<span class="view-num mr10"><?php the_views( '次浏览' , true); ?></span>
							<span class="update-time mr10"><?php if ((get_the_modified_time('Y')*365+get_the_modified_time('z')) > (get_the_time('Y')*365+get_the_time('z'))) : ?>更新: <?php the_modified_time('Y-n-j'); ?><?php endif; ?></span>
							<?php edit_post_link( __( '编辑', 'themename' ), '<span class="meta-sep"></span> <span class="edit-link">', '</span>' ); ?>
							<div class="tag-link mr10"><?php the_tags( __( 'TAGS: ', 'themename' ), ', '); ?></div>
							
						</div><!-- .entry-meta -->
					</header><!-- .entry-header -->
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themename' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID(); ?> -->

				<nav id="nav-below" role="article">
					<p class="section-heading"><?php _e( '上一篇', 'themename' ); ?></p>
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'themename' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'themename' ) . '</span>' ); ?></div>
				</nav><!-- #nav-below -->
			<?php endwhile; // end of the loop. ?>
		</section>
	</section>
	<?php get_sidebar(); ?>
</section><!-- #content -->
<?php comments_template( '', true ); ?>
<?php get_footer(); ?>
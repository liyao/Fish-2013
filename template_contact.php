<?php
/**
 * Template Name: Contact
 * Description: For guest contact
 */

get_header(); ?>
<section id="content" class="wrapper border-box hfeed clearfix contact post">
	<section id="main" class="border-box">
			<?php the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
					<header class="entry-header clearfix">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="entry-meta clearfix">
							<span class="sep mr10">时间: <time class="entry-date" datetime="<?php echo get_the_date( 'c' );?>" pubdate><?php echo get_the_date();?> | <?php echo the_time('H:i');?></time></span>
							
							<span class="view-num mr10"><?php the_views( '次浏览' , true); ?></span>
							<span class="update-time mr10"><?php if ((get_the_modified_time('Y')*365+get_the_modified_time('z')) > (get_the_time('Y')*365+get_the_time('z'))) : ?>更新: <?php the_modified_time('Y-n-j'); ?><?php endif; ?></span>
							<?php edit_post_link( __( '编辑', 'themename' ), '<span class="meta-sep"></span> <span class="edit-link">', '</span>' ); ?>
							<div class="tag-link mr10"><?php the_tags( __( 'TAGS: ', 'themename' ), ', '); ?></div>
							
						</div><!-- .entry-meta -->
					</header><!-- .entry-header -->
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
					<div class="ring-left"></div><div class="ring-right"></div>
				</article><!-- #post-<?php the_ID(); ?> -->
			<!--</div> #content -->

			<?php comments_template( '', true ); ?>
	</section><!-- #primary -->

	<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>
<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>

<section id="content" class="wrapper border-box hfeed clearfix">
	<section id="main" class="border-box">
		<?php the_post(); ?>

		<header class="page-header">
			<h1 class="page-title">
				<?php if ( is_day() ) : ?>
					<?php printf( __( 'Daily Archives: <span>%s</span>', 'themename' ), get_the_date() ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( 'Monthly Archives: <span>%s</span>', 'themename' ), get_the_date( 'F Y' ) ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( 'Yearly Archives: <span>%s</span>', 'themename' ), get_the_date( 'Y' ) ); ?>
				<?php else : ?>
					<?php _e( 'Blog Archives', 'themename' ); ?>
				<?php endif; ?>
			</h1>
		</header>

		<?php rewind_posts(); ?>

		<?php get_template_part( 'loop', 'archive' ); ?>
		<div class="page_navi"><?php par_pagenavi(9); ?></div>

			
		</section><!-- #main -->

<?php get_sidebar(); ?>
</section><!-- #content -->
<?php get_footer(); ?>
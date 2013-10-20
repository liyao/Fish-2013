<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>
<section id="content" class="wrapper border-box hfeed clearfix ">
	<section id="main" class="border-box">
				<?php the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themename' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID(); ?> -->
			<!--</div> #content -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>
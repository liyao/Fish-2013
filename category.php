<?php
/**
 * @package WordPress
 * @subpackage themename
 */
get_header(); ?>
<section id="content" class="wrapper border-box hfeed clearfix">
	<section id="main" class="border-box">
		<header class="page-header">
			<h1 class="page-title"><?php
				printf( __( '分类目录: %s', 'themename' ), '<span>' . single_cat_title( '', false ) . '</span>' );
			?></h1>

			<?php $categorydesc = category_description(); if ( ! empty( $categorydesc ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
		</header>

		<?php get_template_part( 'loop', 'category' ); ?>
		<div class="page_navi"><?php par_pagenavi(9); ?></div>
			<!--</div> #content -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>
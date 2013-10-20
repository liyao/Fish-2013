<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>

		<!-- <div id="primary"> -->
<section id="content" class="wrapper border-box hfeed clearfix">
	<section id="main" class="border-box">
		<?php get_template_part( 'loop', 'index' ); ?>
		<div class="page_navi"><?php par_pagenavi(9); ?></div>
	</section>
	<?php get_sidebar(); ?>
</section><!--#content-->
<!-- </div>#primary -->


<?php get_footer(); ?>
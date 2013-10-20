<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="chrome=1">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'themename' ), max( $paged, $page ) );

	?></title>
	<meta name="description" content="前端开发 玉面小飞鱼 分享 创造">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
 	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" media="screen, projection" />
	
	<!-- Google plus连接添加，谷歌搜索显示博主头像 -->
	<link rel="author" href="https://plus.google.com/116005344705930741552/">

	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
	<?php wp_head(); ?>
	
	</head>
	
	<body <?php body_class(); ?>>
	<div id="page" class="hfeed">
		<header role="banner" class="clearfix">
			<nav id="access" role="article">
				<a id="logo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<!-- Xiao Fei Yu -->
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Current Page" height='40px' />
				</a>
				<div id="menu" class="potion_r alignright clearfix">
					<button>Menu</button>
					<div id="arrow">
						<img class="menu-hover" src="<?php echo get_template_directory_uri(); ?>/images/backgrounds/menu-hover.gif" alt="Current Page" />
					</div>
					<?php wp_nav_menu( array( 
						'theme_location' => 'primary',
						'container' => false,
						'menu_class' => 'nav'
					) ); ?>
				</div>
			</nav><!-- #access -->
		</header>
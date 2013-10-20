<?php
/**
 * @package WordPress
 * @subpackage themename
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

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
	<meta name="description" content="">
	<meta name="author" content="">
	<!--  Mobile Viewport Fix -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<!-- Place favicon.ico and apple-touch-icons in the images folder -->
 	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
	<!-- <link rel="apple-touch-icon" href="<?php //echo get_template_directory_uri(); ?>/images/apple-touch-icon.png"> --><!--60X60 -->
	<!-- <link rel="apple-touch-icon" sizes="72x72" href="<?php //echo get_template_directory_uri(); ?>/images/apple-touch-icon-ipad.png"> --><!--72X72-->
	<!-- <link rel="apple-touch-icon" sizes="114x114" href="<?php //echo get_template_directory_uri(); ?>/images/apple-touch-icon-iphone4.png"> --><!--114X114-->
	<!-- <link rel="apple-touch-icon" sizes="144x144" href="<?php //echo get_template_directory_uri(); ?>/images/apple-touch-icon-ipad3.png"> -->	<!--144X144-->	
	
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
					<!-- <img src="<?php //echo get_template_directory_uri(); ?>/images/logo.png" height="45" /> -->
					<?php //bloginfo( 'name' ); ?>
					Xiao Fei Yu
				</a>
				<div id="menu" class="potion_r alignright clearfix">
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
	
	
		<!-- <section class="wrapper clearfix"> -->
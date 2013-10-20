<?php
/**
 * @package WordPress
 * @subpackage themename
 */

/**
 * Make theme available for translation
 * Translations can be filed in the /languages/ directory
 */
load_theme_textdomain( 'themename', get_template_directory() . '/languages' );

$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
if ( is_readable( $locale_file ) )
	require_once( $locale_file );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/**
 * Add jQuery
 */
function add_jquery_script() {
    wp_deregister_script( 'jquery' );
    // wp_register_script( 'jquery', 'jquery-1.7.2-min.js');
    wp_enqueue_script( 'jquery' );
}    
add_action('wp_enqueue_scripts', 'add_jquery_script');
/*
 * Remove code from the <head>
 */
//remove_action('wp_head', 'rsd_link'); // Might be necessary if you or other people on this site use remote editors.
//remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
//remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
//remove_action('wp_head', 'index_rel_link'); // Displays relations link for site index
//remove_action('wp_head', 'wlwmanifest_link'); // Might be necessary if you or other people on this site use Windows Live Writer.
//remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
//remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
//remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_filter( 'the_content', 'capital_P_dangit' ); // Get outta my Wordpress codez dangit!
remove_filter( 'the_title', 'capital_P_dangit' );
remove_filter( 'comment_text', 'capital_P_dangit' );
// Hide the version of WordPress you're running from source and RSS feed // Want to JUST remove it from the source? Try: remove_action('wp_head', 'wp_generator');
/*function hcwp_remove_version() {return '';}
add_filter('the_generator', 'hcwp_remove_version');*/
// This function removes the comment inline css
/*function twentyten_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );*/

/**
 * Remove meta boxes from Post and Page Screens
 */
function customize_meta_boxes() {
   /* These remove meta boxes from POSTS */
  //remove_post_type_support("post","excerpt"); //Remove Excerpt Support
  //remove_post_type_support("post","author"); //Remove Author Support
  //remove_post_type_support("post","revisions"); //Remove Revision Support
  //remove_post_type_support("post","comments"); //Remove Comments Support
  //remove_post_type_support("post","trackbacks"); //Remove trackbacks Support
  //remove_post_type_support("post","editor"); //Remove Editor Support
  //remove_post_type_support("post","custom-fields"); //Remove custom-fields Support
  //remove_post_type_support("post","title"); //Remove Title Support

  
  /* These remove meta boxes from PAGES */
  //remove_post_type_support("page","revisions"); //Remove Revision Support
  //remove_post_type_support("page","comments"); //Remove Comments Support
  //remove_post_type_support("page","author"); //Remove Author Support
  //remove_post_type_support("page","trackbacks"); //Remove trackbacks Support
  //remove_post_type_support("page","custom-fields"); //Remove custom-fields Support
  
}
add_action('admin_init','customize_meta_boxes');

/**
 * This theme uses wp_nav_menus() for the header menu, utility menu and footer menu.
 */
register_nav_menus( array(
	'primary' => __( 'Primary', 'themename' ),
	'footer' => __( 'Footer', 'themename' ),
	'utility' => __( 'Utility', 'themename' )
) );
/** 
 * Add default posts and comments RSS feed links to head
 */
add_theme_support( 'automatic-feed-links' );

/**
 * This theme uses post thumbnails
 */
add_theme_support( 'post-thumbnails' );

/**
 *	This theme supports editor styles
 */

add_editor_style("/css/layout-style.css");

/**
 * Remove superfluous elements from the admin bar (uncomment as necessary)
 */
function remove_admin_bar_links() {
	global $wp_admin_bar;

	//$wp_admin_bar->remove_menu('wp-logo');
	//$wp_admin_bar->remove_menu('updates');	
	//$wp_admin_bar->remove_menu('my-account');
	//$wp_admin_bar->remove_menu('site-name');
	//$wp_admin_bar->remove_menu('my-sites');
	//$wp_admin_bar->remove_menu('get-shortlink');
	//$wp_admin_bar->remove_menu('edit');
	//$wp_admin_bar->remove_menu('new-content');
	//$wp_admin_bar->remove_menu('comments');
	//$wp_admin_bar->remove_menu('search');
}
//add_action('wp_before_admin_bar_render', 'remove_admin_bar_links');

/**
 *	Replace the default welcome 'Howdy' in the admin bar with something more professional.
 */
function admin_bar_replace_howdy($wp_admin_bar) {
    $account = $wp_admin_bar->get_node('my-account');
    $replace = str_replace('Howdy,', 'Welcome,', $account->title);            
    $wp_admin_bar->add_node(array('id' => 'my-account', 'title' => $replace));
}
add_filter('admin_bar_menu', 'admin_bar_replace_howdy', 25);

/**
 * This enables post formats. If you use this, make sure to delete any that you aren't going to use.
 */
//add_theme_support( 'post-formats', array( 'aside', 'audio', 'image', 'video', 'gallery', 'chat', 'link', 'quote', 'status' ) );

/**
 * Register widgetized area and update sidebar with default widgets
 */

function handcraftedwp_widgets_init() {
	register_sidebar( array (
		'name' => __( 'Sidebar', 'themename' ),
		'id' => 'sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s" role="complementary">',
		'after_widget' => "</aside>",
		'before_title' => '<header class="widget-title"><h4>',
		'after_title' => '</h4></header><div class="content">',
	) );
}
add_action( 'init', 'handcraftedwp_widgets_init' );

class My_Widget extends WP_Widget {
     
    function My_Widget()
    {
        $widget_ops = array('description' => '显示最近评论');
        // $control_ops = array('width' => 400, 'height' => 300);
        parent::WP_Widget(false,$name='最近评论',$widget_ops,$control_ops); 
 
                //parent::直接使用父类中的方法
                //$name 这个小工具的名称,
                //$widget_ops 可以给小工具进行描述等等。
                //$control_ops 可以对小工具进行简单的样式定义等等。
    }
 
    function form($instance) { // 给小工具(widget) 添加表单内容
        $title = esc_attr($instance['title']);
    ?>
 
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('Title:'); ?>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" type="text"></label>
	 
    <?php
    }
    function update($new_instance, $old_instance) { // 更新保存
        return $new_instance;
    }
    function widget($args, $instance) { // 输出显示在页面上
    	global $comments, $comment;

		$cache = wp_cache_get('widget_recent_comments', 'widget');

		if ( ! is_array( $cache ) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

 		extract($args, EXTR_SKIP);
 		$output = '';
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Recent Comments' ) : $instance['title'], $instance, $this->id_base );

		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
 			$number = 20;

		// $comments = get_comments( apply_filters( 'widget_comments_args', array( 'number' => $number, 'status' => 'approve', 'post_status' => 'publish' ) ) );
		$comments = get_comments( array( 'number' => $number, 'status' => 'approve', 'post_status' => 'publish', 'user_id'=>0) );//显示非作者的评论by liyao
		$output .= $before_widget;
		if ( $title )
			$output .= $before_title . $title . $after_title;

		$output .= '<ul id="recentcomments">';
		if ( $comments ) {
			// Prime cache for associated posts. (Prime post term cache if we need it for permalinks.)
			$post_ids = array_unique( wp_list_pluck( $comments, 'comment_post_ID' ) );
			_prime_post_caches( $post_ids, strpos( get_option( 'permalink_structure' ), '%category%' ), false );

			foreach ( (array) $comments as $comment) {
				$output .=  '<li class="recentcomments clearfix">' .get_avatar($comment,$size='36'). /* translators: comments widget: 1: comment author, 2: post link */ sprintf(_x('%1$s %2$s', 'widgets'), '<a href="' . esc_url( get_comment_link($comment->comment_ID) ) . '">' .get_comment_author().'<br>', /*'<a href="' . esc_url( get_comment_link($comment->comment_ID) ) . '">' . */mb_strimwidth(strip_tags( $comment->comment_content),0,30,'...') /*. '</a>'*/.'</a>') . '</li>';
			}
 		}
		$output .= '</ul>';
		$output .= $after_widget;

		echo $output;
		$cache[$args['widget_id']] = $output;
		wp_cache_set('widget_recent_comments', $cache, 'widget');
		?>
 
        <?php
    }
}
register_widget('My_Widget');

//real number of comments
function no_admin_number($no='', $one='', $twomore='') {
	global $wpdb, $tablecomments, $post;
	$comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_post_ID = $post->ID AND comment_type = '' AND comment_approved = '1' AND comment_author != 'Miya'");
	$cnt = count($comments);
	if (!$cnt)
	echo $no;
	elseif ($cnt == 1)
	echo $one;
	else
	echo str_replace("%", $cnt, $twomore);
}
//获得页面第一张图片作为缩略图
// if ( function_exists('add_theme_support') ) add_theme_support('post-thumbnails');  
// function thumb_img($soContent){
// 	$soImages = '~<img [^\>]*\ />~';
// 	preg_match_all( $soImages, $soContent, $thePics );
// 	$allPics = count($thePics[0]);
// 	if( $allPics > 0 ){
// 		echo $thePics[0][0];
// 	}
// 	else {
// 		echo "<img width=120 height=120 src='";
// 		echo bloginfo('template_url');
// 		echo "/images/random/tb1.jpg'>";
// 	}
// }
function getFirstImage($postId) {
	$args = array(
		'numberposts' => 1,
		'order'=> 'ASC',
		'post_mime_type' => 'image',
		'post_parent' => $postId,
		'post_status' => null,
		'post_type' => 'attachment'
	);
	$attachments = get_children($args);
 
	// 如果没有上传图片, 返回空字符串
	if(!$attachments) {
		return '';
	}
 
	// 获取缩略图中的第一个图片, 并组装成 HTML 节点返回
	$image = array_pop($attachments);
	$imageSrc = wp_get_attachment_image_src($image->ID, 'thumbnail');
	$imageUrl = $imageSrc[0];
	$html = '<img src="' . $imageUrl . '" alt="' . the_title('', '', false) . '" />';
	return $html;
}
//缩略图获取
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 135, 135 ,true );//设置缩略图的尺寸
function dm_the_thumbnail() {
    global $post;
    // 判断该文章是否设置的缩略图，如果有则直接显示
    if ( has_post_thumbnail() ) {
        echo '<a class="p_thumbnail" href="'.get_permalink().'">';
        the_post_thumbnail();
        echo '</a>';
    } 
}
/*
 * Remove senseless dashboard widgets for non-admins. (Un)Comment or delete as you wish.
 */
function remove_dashboard_widgets() {
	global $wp_meta_boxes;

	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // Plugins widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPress Blog widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // Other WordPress News widget
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // Right Now widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // Quick Press widget
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // Incoming Links widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // Recent Drafts widget
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Recent Comments widget
}
// 翻页效果
function par_pagenavi($range = 9){
	global $paged, $wp_query;
	if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
	if($max_page > 1){if(!$paged){$paged = 1;}
	if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'> First </a>";}
	previous_posts_link(' &lt;&lt; ');
    if($max_page > $range){
		if($paged < $range){for($i = 1; $i <= ($range + 1); $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
    elseif($paged >= ($max_page - ceil(($range/2)))){
		for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
		for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}
    else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
    if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	next_posts_link(' &gt;&gt; ');
    if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'> Last </a>";}}
}
/**
 *	Hide Menu Items in Admin
 */
function themename_configure_dashboard_menu() {
	global $menu,$submenu;

	global $current_user;
	get_currentuserinfo();

		// $menu and $submenu will return all menu and submenu list in admin panel
		
		// $menu[2] = ""; // Dashboard
		// $menu[5] = ""; // Posts
		// $menu[15] = ""; // Links
		// $menu[25] = ""; // Comments
		// $menu[65] = ""; // Plugins

		// unset($submenu['themes.php'][5]); // Themes
		// unset($submenu['themes.php'][12]); // Editor
}


// For non-admins, add action to Hide Dashboard Widgets and Admin Menu Items you just set above
// Don't forget to comment out the admin check to see that changes :)
if (!current_user_can('manage_options')) {
	add_action('wp_dashboard_setup', 'remove_dashboard_widgets'); // Add action to hide dashboard widgets
	add_action('admin_head', 'themename_configure_dashboard_menu'); // Add action to hide admin menu items
}


?>

<?php // asynchronous google analytics: mathiasbynens.be/notes/async-analytics-snippet
//	 change the UA-XXXXX-X to be your site's ID
/*add_action('wp_footer', 'async_google_analytics');
function async_google_analytics() { ?>
	<script>
	var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
		(function(d, t) {
			var g = d.createElement(t),
				s = d.getElementsByTagName(t)[0];
			g.async = true;
			g.src = ('https:' == location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g, s);
		})(document, 'script');
	</script>
<?php }*/ ?>
<?php /*
 * A default custom post type. DELETE from here to the end if you don't want any custom post types
 */
/*add_action('init', 'create_boilertemplate_cpt');
function create_boilertemplate_cpt() 
{
  $labels = array(
    'name' => _x('HandcraftedWPTemplate CPT', 'post type general name'),
    'singular_name' => _x('HandcraftedWPTemplate CPT Item', 'post type singular name'),
    'add_new' => _x('Add New', 'handcraftedwptemplate_robot'),
    'add_new_item' => __('Add New Item'),
    'edit_item' => __('Edit Item'),
    'new_item' => __('New Item'),
    'view_item' => __('View Item'),
    'search_items' => __('Search Items'),
    'not_found' =>  __('No items found'),
    'not_found_in_trash' => __('No items found in Trash'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'page',
    'hierarchical' => false,
    'menu_position' => 20,
    'supports' => array('title','editor')
  ); 
  register_post_type('handcraftedwptemplate_robot',$args);
}*/
/*
 * This is for a custom icon with a colored hover state for your custom post types. You can download the custom icons here 
 http://randyjensenonline.com/thoughts/wordpress-custom-post-type-fugue-icons/
 */
/*add_action( 'admin_head', 'cpt_icons' );
function cpt_icons() {
    ?>
    <style type="text/css" media="screen">
        #menu-posts-handcraftedwptemplaterobot .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/images/robot.png) no-repeat 6px -17px !important;
        }
		#menu-posts-handcraftedwptemplaterobot:hover .wp-menu-image, #menu-posts-handcraftedwptemplaterobot.wp-has-current-submenu .wp-menu-image {
            background-position:6px 7px!important;
        }
    </style>
<?php }*/

 ?>

<?php
// 添加评论计数
function mytheme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;

	 //主评论计数器 by zwwooooo
	global $commentcount, $page, $wpdb;

	// if ( (int) get_option('page_comments') === 1 && (int) get_option('thread_comments') === 1 ) { //开启嵌套评论和分页才启用

		if(!$commentcount) { //初始化楼层计数器
			$page = ( !empty($in_comment_loop) ) ? get_query_var('cpage') : get_page_of_comment( $comment->comment_ID, $args ); //获取当前评论列表页码
			$cpp = get_option('comments_per_page'); //获取每页评论显示数量
			if ( get_option('comment_order') === 'desc' ) { //倒序
				$comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_post_ID = $post->ID AND comment_type = 'all' AND comment_approved = '1' AND !comment_parent");
				$cnt = count($comments); //获取主评论总数量
				
				if (ceil($cnt / $cpp) == 1 || ($page > 1 && $page  == ceil($cnt / $cpp))) { //如果评论只有1页或者是最后一页，初始值为主评论总数
					$commentcount = $cnt + 1;
				} else {
					$commentcount = $cpp * $page + 1;
				}
			} else {
				$commentcount = $cpp * ($page - 1);
			}
		}
		if ( !$parent_id = $comment->comment_parent ) {
			$commentcountText = '<div class="floor">';
			if ( get_option('comment_order') === 'desc' ) { //倒序
				$commentcountText .= '#'.--$commentcount;
			} else {
				switch ($commentcount) {
					case 0:
						$commentcountText .= '#1'; ++$commentcount;
						break;
					case 1:
						$commentcountText .= '#2'; ++$commentcount;
						break;
					case 2:
						$commentcountText .= '#3'; ++$commentcount;
						break;
					default:
						$commentcountText .= '#'.++$commentcount ;
						break;
				}
			}
			$commentcountText .= '</div">';
		}
	// }

	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-content>">
		<div class="author-avatar vcard">
			<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			<div class="ring-top"></div>
			<div class="ring-bottom"></div>
		</div>
		<div class="content">
		<?php if ($comment->comment_approved == '0') : ?>
			<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
			<br />
		<?php endif; ?>
			<h2>
				<?php printf(__('<cite class="fn">%s</cite> <span class="says">发表于:</span>'), get_comment_author_link()) ?>
				<span class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time("H:m:s")) ?></a><?php edit_comment_link(__('(编辑)'),'  ','' );
					?>
				</span>
			</h2>
			<?php comment_text() ?>

			<div class="reply">
			<?php //comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			<?php if ($depth == get_option('thread_comments_depth')) : ?>    <!-- 评论深度等于设置的最大深度 -->
			 <!-- 将第二个参数改为父一级评论的id -->
			     <a onclick="return addComment.moveForm( 'comment-<?php comment_ID() ?>','<?php echo $comment->comment_parent; ?>', 'respond','<?php echo $comment->comment_post_ID; ?>' )" href="?replytocom=<?php comment_ID() ?>#respond" class="comment-reply-link" rel="nofollow">回复</a>
			 <?php else: ?>
			 <!-- 正常情况 -->
			     <a onclick="return addComment.moveForm( 'comment-<?php comment_ID() ?>','<?php comment_ID() ?>', 'respond','<?php echo $comment->comment_post_ID; ?>' ) " href="?replytocom=<?php comment_ID() ?>#respond" class="comment-reply-link" rel="nofollow">回复</a>
			 <?php endif; ?>
			</div>
			<a class="" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
			<?php echo $commentcountText; //主评论楼层号 - by zwwooooo ?>
			</a>
		</div>
		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
	</div>
	<?php endif; ?>
<?php
	}

?>
<?php
class description_walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth, $args) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
        $class_names = $value = '';
 
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
 
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';
 
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
 
        $output .= $indent . '<li' . $id . $value . $class_names .'>';
 
        $prepend = '<strong>';
        $append = '</strong>';
        $description  = ! empty( $item->attr_title ) ? '<span>' . esc_attr( $item->attr_title ) . '</span>' : '';
 
        if($depth != 0) {
            $description = $append = $prepend = "";
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        }
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
 
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . $prepend . apply_filters( 'the_title', $item->title, $item->ID ) . $append;
        $item_output .= $description . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
 
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}
?>
<?
function feed_copyright($content) {
// http://www.ludou.org/how-to-generate-related-posts-in-wordpress.html
	global $post;
	global $wpdb;
	$related = '<ul id="tags_related">';
	// Laycher : Edit
	//如果有 more标签即span标签，那么就截断more以前的。如果没有，则通过字数截断
	if(strpos($content,'</span>') ){
		$content =  mb_strstr($content,'</span>',ture).'<p><a rel="bookmark" href="'.get_permalink().'" target="_blank" rel="nofollow">更多Read More...</a></p><hr />';
		//<span id="more-'^[1-9]\d*$'"></span>
	} else {
		$content =  mb_strimwidth($content , 0, 500, '.....').'<p><a rel="bookmark" href="'.get_permalink().'" target="_blank" rel="nofollow">更多Read More...</a></p><hr />';
	}
	$post_tags = wp_get_post_tags($post->ID);
	 // 通过修改数字 5，可修改你想要的文章数量
	$i = 5;
	if ($post_tags) {
		$tag_list = '';
		$tag_out = '';
		foreach ($post_tags as $tag)
		{
			  // 获取标签列表
			$tag_list .= $tag->term_id.',';
		}
	     $tag_list = substr($tag_list, 0, strlen($tag_list)-1);
 
		$related_posts = $wpdb->get_results("SELECT post_title, ID	FROM posts, term_relationships, term_taxonomy WHERE term_taxonomy.term_taxonomy_id = term_relationships.term_taxonomy_id	AND ID = object_id	AND taxonomy = 'post_tag' AND post_status = 'publish' AND post_type = 'post' AND term_id IN (" . $tag_list . ") AND ID != '" . $post->ID . "' ORDER BY RAND()	LIMIT'".$i."'");
 
		if ( $related_posts  ) {
			 foreach ($related_posts as $related_post) {
				 $related = $related.'<li><a href="'.get_permalink($related_post->ID).'" rel="bookmark" title="'.$related_post->post_title.'">'.$related_post->post_title.' </a></li>';
			}
		} else { 
				// Laycher:edit 如果没有这个标签的其他文章用同类别的文章代替，如果同类别的也没有，那么有多少显示多少，这里还要再优化的，有兴趣的可以继续写。
				$cats = ''; foreach ( get_the_category() as $cat ) $cats .= $cat->cat_ID . ',';
				$args = array(
				'category__in' => explode(',', $cats), 
				'post__not_in' => explode(',', $exclude_id),
				'caller_get_posts' => 1,
				'orderby' => 'comment_date',
				'posts_per_page' => $post_num - $i);
				query_posts($args);
				while( have_posts() ) { 
					the_post(); 
					$related=$related.'<li><a rel="bookmark" href="'.get_permalink().'" title="'.get_the_title(). '">'.get_the_title().'</a></li>';
				} wp_reset_query();
				//$related = $related.'<li>暂无相关文章</li>';
		 } 
	} else {
			$related = $related.'<li>暂无相关文章</li>';	
	}
	$related = '<br />Laycher 猜你还喜欢这些文章:'.$related.'</ul>';
	$about = '<hr />Copyright ©2010-2012 ¦ <a href="http://feed.feedsky.com/laycher" title="RSS订阅" target="_blank">RSS订阅</a> ¦ <a href="http://weibo.com/laycher" title="新浪微博" target="_blank">新浪微博</a> ¦<a  href="'.get_permalink().'" title="'.get_the_title().'" target="_blank">本文链接</a> ¦ <a  href="'.get_permalink().'#comments" title="'.get_the_title().'的评论" target="_blank">添加评论</a> ';
		$share = '<div class="jiathis_style">	<a href="http://www.jiathis.com/share?uid=1546294" class="jiathis jiathis_txt" target="_blank"><img src="http://v3.jiathis.com/code/images/btn/v1/jiathis1.gif" border="0" /></a>	<a class="jiathis_counter_style_margin:3px 0 0 2px"></a></div><script type="text/javascript">var jiathis_config = {data_track_clickback:true};</script><script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1546294" charset="utf-8"></script>';
	return $content.$related.$about.$share;
}
add_filter ('the_excerpt_rss', 'feed_copyright');
add_filter('the_content_feed', 'feed_copyright');
?>
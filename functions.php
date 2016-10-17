<?php

!defined('TEMP_DIR') ?  define('TEMP_DIR', get_template_directory()) : '' ;
define('DS', DIRECTORY_SEPARATOR);
/**
* AAT Reavel functions and definitions.
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package AAT_Reavel
*/
if ( ! function_exists( 'aat_reavel_setup' ) ) :
/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which
* runs before the init hook. The init hook is too late for some features, such
* as indicating support for post thumbnails.
*/
function aat_reavel_setup() {

	require_once( TEMP_DIR . DS . 'inc/hooks/sidebars.php');
	/**
	* Make theme available for translation.
	* Translations can be filed in the /languages/ directory.
	* If you're building a theme based on AAT Reavel, use a find and replace
	* to change 'aat-reavel' to the name of your theme in all the template files.
	*/
	load_theme_textdomain( 'aat-reavel', get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	/*Adding image sizes */
	add_image_size('aat_pop_thumb','370','208');
	// add_image_size('aat_spcl_thumb','627','960');
	// add_image_size('aat_recomend_thumb','550','358');
	// image size for package slider  add below
	//add_image_size('aat_package_thumb','550','358');
	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	/*
	* Enable support for Post Thumbnails on posts and pages.
	*
	* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	*/
	add_theme_support( 'post-thumbnails' );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'aat-reavel' ),
	) );
	/*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	/*
	* Enable support for Post Formats.
	* See https://developer.wordpress.org/themes/functionality/post-formats/
	*/
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'aat_reavel_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'aat_reavel_setup' );
/**
* Set the content width in pixels, based on the theme's design and stylesheet.
*
* Priority 0 to make it available to lower priority callbacks.
*
* @global int $content_width
*/
function aat_reavel_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aat_reavel_content_width', 640 );
}
add_action( 'after_setup_theme', 'aat_reavel_content_width', 0 );

	/**
	* Enqueue scripts and styles.
	*/
	function aat_reavel_scripts() {

		//variables
		$template_dir 	= get_template_directory_uri();
		$vendors_dir 	= $template_dir . '/vendors';
		$styles_dir 	= $template_dir . '/css';
		$scripts_dir 	= $template_dir . '/js';

		//CDNs 
		wp_enqueue_style('fonts-montserrat' , 'https://fonts.googleapis.com/css?family=Montserrat:400,700' );
		wp_enqueue_style('fonts-quicksand' , 'https://fonts.googleapis.com/css?family=Quicksand:400,300' );
		wp_enqueue_style('font-awesome-css' , 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css','');
		wp_enqueue_style('linear-icons', 'https://cdn.linearicons.com/free/1.0.0/icon-font.min.css');

		//stylesheets
		wp_enqueue_style('bootstrap_css' , $styles_dir . '/bootstrap.css' );
		wp_enqueue_style('main_css' , $styles_dir . '/main.css', array('bootstrap_css') );
		//wp_enqueue_style('customised-css' , $styles_dir . '/customised.css' );
		wp_enqueue_style('aat-reavel-style', get_stylesheet_uri() );
		wp_enqueue_style('icomoon_fonts' , $styles_dir . '/fonts/icomoon/icomoon.css');

		//stylesheets by vendors
		wp_enqueue_style('animate_css', $vendors_dir . '/animate/animate.css');
		wp_enqueue_style('owl_carousel_css', $vendors_dir . '/owl-carousel/owl.carousel.css');
		wp_enqueue_style('owl_theme_css', $vendors_dir . '/owl-carousel/owl.theme.css');
		wp_enqueue_style('rev_slide_css', $vendors_dir . '/revolution/css/settings.css');

		//scripts by vendors
		wp_enqueue_script( 'jquery_script', $vendors_dir . '/jquery/jquery-2.1.4.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'bootstrap_js', $vendors_dir . '/bootstrap/javascripts/bootstrap.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'jquery_placeholder_script', $vendors_dir . '/jquery-placeholder/jquery.placeholder.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'jquery_matchheight_js', $vendors_dir . '/match-height/jquery.matchHeight.js', array('jquery'), '', true );
		wp_enqueue_script( 'wow_min_js', $vendors_dir . '/wow/wow.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'steller_min_js', $vendors_dir . '/stellar/jquery.stellar.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'jquery_validate_js', $vendors_dir . '/validate/jquery.validate.js', array('jquery'), '', true );
		wp_enqueue_script( 'waypoint_min_js', $vendors_dir . '/waypoint/waypoints.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'jqueryui_min_js', $vendors_dir . '/jquery-ui/jquery-ui.min.js',array('jquery'), '', true );
		wp_enqueue_script( 'jquery_touch_min_js', $vendors_dir . '/jQuery-touch-punch/jquery.ui.touch-punch.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'jquery_fancy_box_js', $vendors_dir . '/fancybox/jquery.fancybox.js', array('jquery'), '', true );
		//revolution slider 
		wp_enqueue_script( 'jquery-themepunch-tools', $vendors_dir . '/revolution/js/jquery.themepunch.tools.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'jquery-themepunch-revolution', $vendors_dir . '/revolution/js/jquery.themepunch.revolution.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'jquery-theme-punch-tools-min', $vendors_dir . '/revolution/js/jquery.themepunch.tools.min838f.js?rev=5.0', array('jquery'), '', true );
		wp_enqueue_script( 'jquery-themepunch-revolutio-min', $vendors_dir . '/revolution/js/jquery.themepunch.revolution.min838f.js?rev=5.0', array('jquery'), '', true );
		wp_enqueue_script( 'jquery-themepunch-revolution-slide-anim', $vendors_dir . '/revolution/js/extensions/revolution.extension.slideanims.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'jquery-themepunch-revolution-actions', $vendors_dir . '/revolution/js/extensions/revolution.extension.actions.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'jquery-themepunch-revolution-layer-anim', $vendors_dir . '/revolution/js/extensions/revolution.extension.layeranimation.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'jquery-themepunch-revolution-parallax', $vendors_dir . '/revolution/js/extensions/revolution.extension.parallax.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'jquery-themepunch-revolution-navigation', $vendors_dir . '/revolution/js/extensions/revolution.extension.navigation.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'jquery-themepunch-revolution-kenburn', $vendors_dir . '/revolution/js/extensions/revolution.extension.kenburn.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'jquery-owl-carousel-js', $vendors_dir . '/owl-carousel/owl.carousel.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'jcf_js', $vendors_dir . '/jcf/js/jcf.js', array('jquery'), '', true );
		wp_enqueue_script( 'jcf_select_js', $vendors_dir . '/jcf/js/jcf.select.js', array('jquery'), '', true );

		//scripts
		wp_enqueue_script( 'aat-reavel-navigation', $scripts_dir . '/navigation.js', array(), '20151215', true );
		wp_enqueue_script( 'aat-reavel-skip-link-focus-fix', $scripts_dir . '/skip-link-focus-fix.js', array(), '20151215', true );
		wp_enqueue_script( 'jquery-main-js', $scripts_dir . '/jquery.main.js', array('jquery'), '', true );
		wp_enqueue_script( 'custom_js', $scripts_dir . '/custom.js', array('jquery','jquery-owl-carousel-js'), '', true );
		wp_enqueue_script( 'revolution-js', $scripts_dir . '/revolution.js', array('jquery'), '', true );
		wp_enqueue_script('aat-ajax-request-js', $scripts_dir . '/aat-ajax-request.js', array('jquery'),'',true);
		
		//localization
		wp_localize_script('aat-ajax-request-js','ajaxUrl',array(
			'url' => admin_url('admin-ajax.php')
		));

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'aat_reavel_scripts' , 5 );

		register_nav_menus(array(
			'footer_social_menu' => 'Footer Social Menu'
		));

	function aat_reavel_ajax_scipts(){
		wp_enqueue_script( 'aat-reavel-ajax-request-js' , $scripts_dir . '/aat-ajax-request.js' , '', '' , true );
	}
	add_action('wp_enqueue_script' , 'aat_reavel_ajax_scipts' , 10 );

	require TEMP_DIR . '/inc/init.php';

	require TEMP_DIR . '/plugins-recom.php';

<?php
/**
 * progression functions and definitions
 *
 * @package progression
 * @since progression 1.0
 */


if ( ! function_exists( 'progression_studios_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since progression 1.0
 */
	
function progression_studios_setup() {
	
	/* Set Revslider and Visual Composer as embeded in theme */
	if(function_exists( 'set_revslider_as_theme' )){
		add_action( 'init', 'progression_studios_custom_slider_rev' );
		function progression_studios_custom_slider_rev() { set_revslider_as_theme(); }
	}
	add_action( 'vc_before_init', 'progression_studios_SetAsTheme' );
	function progression_studios_SetAsTheme() { vc_set_as_theme( $disable_updater = true ); }

	
	// Post Thumbnails
	add_theme_support( 'post-thumbnails' );
	
	add_image_size('progression-studios-image', 900, 560, true);
	add_image_size('progression-studios-image-tall', 900, 880, true);
	add_image_size('progression-studios-image-uncropped', 900, 1800, false);
	add_image_size('progression-studios-image-single', 1200, 745, true);
	add_image_size('progression-studios-image-portfolio-single', 1200, 880, true);

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on pro, use a find and replace
	 * to change 'zaser-progression' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'zaser-progression', get_template_directory() . '/languages' );
	
	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'quote', 'link', 'image' ) );

	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	/**
	 * Custom Widgets
	 */
	require( get_template_directory() . '/inc/widgets/widgets.php' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'progression-studios-header-top-left' => esc_html__( 'Top Left Menu', 'zaser-progression' ),
		'progression-studios-header-top-right' => esc_html__( 'Top Right Menu', 'zaser-progression' ),
		'progression-studios-primary' => esc_html__( 'Primary Menu', 'zaser-progression' ),
		'progression-studios-mobile-menu' => esc_html__( 'Mobile Primary Menu', 'zaser-progression' ),
		'progression-studios-footer-menu' => esc_html__( 'Footer Menu', 'zaser-progression' ),
	) );
	
	
}
endif; // progression_studios_setup
add_action( 'after_setup_theme', 'progression_studios_setup' );


/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since pro 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 1200; /* pixels */


/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since pro 1.0
 */
function progression_studios_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Sidebar', 'zaser-progression' ),
		'description'   => esc_html__('Default sidebar', 'zaser-progression'),
		'id' => 'progression-studios-sidebar',
		'before_widget' => '<div id="%1$s" class="sidebar-item widget %2$s">',
		'after_widget' => '<div class="sidebar-divider-pro"></div></div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Mobile/Tablet Sidebar', 'zaser-progression' ),
		'description'   => esc_html__('Mobile/Tablet sidebar', 'zaser-progression'),
		'id' => 'progression-studios-mobile-sidebar',
		'before_widget' => '<div id="%1$s" class="sidebar-item widget %2$s">',
		'after_widget' => '<div class="sidebar-divider-pro"></div></div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Header Top Left', 'zaser-progression' ),
		'description'   => esc_html__('Left widget area above the navigation', 'zaser-progression'),
		'id' => 'progression-studios-header-top-left',
		'before_widget' => '<div id="%1$s" class="header-top-item widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<span class="widget-title">',
		'after_title' => '</span>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Header Top Right', 'zaser-progression' ),
		'description'   => esc_html__('Right widget area above the navigation', 'zaser-progression'),
		'id' => 'progression-studios-header-top-right',
		'before_widget' => '<div id="%1$s" class="header-top-item widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<span class="widget-title">',
		'after_title' => '</span>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Shop Sidebar', 'zaser-progression' ),
		'description'   => esc_html__('Sidebar on shop pages', 'zaser-progression'),
		'id' => 'progression-studios-sidebar-shop',
		'before_widget' => '<div id="%1$s" class="sidebar-item widget %2$s">',
		'after_widget' => '<div class="sidebar-divider-pro"></div></div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'BBPress Sidebar', 'zaser-progression' ),
		'description'   => esc_html__('Optional BBPress sidebar', 'zaser-progression'),
		'id' => 'progression-studios-bbpress-sidebar',
		'before_widget' => '<div id="%1$s" class="sidebar-item widget %2$s">',
		'after_widget' => '<div class="sidebar-divider-pro"></div></div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Footer Widgets Row 1', 'zaser-progression' ),
		'description' => esc_html__( 'First row of foooter widgets', 'zaser-progression' ),
		'id' => 'progression-studios-footer-widgets',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Widgets Row 2', 'zaser-progression' ),
		'description' => esc_html__( 'Second row of footer widgets', 'zaser-progression' ),
		'id' => 'progression-studios-footer-widgets-second-row',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	
}
add_action( 'widgets_init', 'progression_studios_widgets_init' );




/**
 * Enqueue scripts and styles
 */
function progression_studios_scripts() {
	wp_enqueue_style( 'progression-style', get_stylesheet_uri());
	wp_enqueue_style( 'progression-google-fonts', progression_studios_fonts_url(), array( 'progression-style' ), '1.0.0' );
	wp_enqueue_script( 'progression-plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'progression-scripts', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '20120206', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_action( 'wp_enqueue_scripts', 'progression_studios_scripts' );



/**
 * Enqueue google fonts
 */
function progression_studios_fonts_url() {
    $progression_studios_font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'zaser-progression' ) ) {
        $progression_studios_font_url = add_query_arg( 'family', urlencode( 'Open Sans:400,600|Poppins:300,500,600,700|&subset=latin' ), "//fonts.googleapis.com/css" );
    }
	 
    return $progression_studios_font_url;
}



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom Metabox Fields
 */
require get_template_directory() . '/inc/custom-meta.php';

/**
 * Theme Customizer
 */
require get_template_directory() . '/inc/default-customizer.php';

/**
 * JS Customizer Out
 */
require get_template_directory() . '/inc/js-customizer.php';

/**
 * Theme Customizer
 */
require get_template_directory() . '/inc/mega-menu/mega-menu-framework.php';

/**
 * WooCommerce Functions
 */
if ( ! function_exists( 'woocommerce' ) ) require get_template_directory() . '/inc/woocommerce-functions.php';

/**
 * Load Plugin prohibitionation
 */
require get_template_directory() . '/inc/tgm-plugin-activation/plugin-activation.php';

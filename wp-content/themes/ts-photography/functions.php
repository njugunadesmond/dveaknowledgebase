<?php
/**
 * ts photography functions and definitions
 *
 * @package ts-photography
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'ts_photography_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
 
/* Theme Setup */
function ts_photography_setup() {
	
	$GLOBALS['content_width'] = apply_filters( 'ts_photography_content_width', 640 );

	load_theme_textdomain( 'ts-photography', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	add_image_size('ts-photography-homepage-thumb',250,145,true);
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ts-photography' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', ts_photography_font_url() ) );
}

endif;
add_action( 'after_setup_theme', 'ts_photography_setup' );

/* Theme Widgets Setup */
function ts_photography_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'ts-photography' ),
		'description'   => __( 'Appears on blog page sidebar', 'ts-photography' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'ts-photography' ),
		'description'   => __( 'Appears on page sidebar', 'ts-photography' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'ts-photography' ),
		'description'   => __( 'Appears on page sidebar', 'ts-photography' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 1', 'ts-photography' ),
		'description'   => __( 'Appears on footer', 'ts-photography' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 2', 'ts-photography' ),
		'description'   => __( 'Appears on footer', 'ts-photography' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 3', 'ts-photography' ),
		'description'   => __( 'Appears on footer', 'ts-photography' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 4', 'ts-photography' ),
		'description'   => __( 'Appears on footer', 'ts-photography' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', 'ts_photography_widgets_init' );


/* Theme Font URL */
function ts_photography_font_url() {
	$font_url = '';
	$ptsans = _x('on','PT Sans font:on or off','ts-photography');
	$roboto = _x('on','Roboto font:on or off','ts-photography');
	$roboto_cond = _x('on','Roboto Condensed font:on or off','ts-photography');
	
	if('off' !== $ptsans || 'off' !==  $roboto || 'off' !== $roboto_cond){
		$font_family = array();
		
		if('off' !== $ptsans){
			$font_family[] = 'PT Sans:300,400,600,700,800,900';
		}
		if('off' !== $roboto){
			$font_family[] = 'Roboto:400,700';
		}		
		if('off' !== $roboto_cond){
			$font_family[] = 'Roboto Condensed:400,700';
		}		
		$font_family[] = 'Montserrat:300,400,600,700,800,900';
		
		$query_args = array(
			'family'	=> urlencode(implode('|',$font_family)),
		);
		
		$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	}		
	return $font_url;
}
	

/* Theme enqueue scripts */

function ts_photography_scripts() {
	wp_enqueue_style( 'ts-photography-font', ts_photography_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'ts-photography-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'ts-photography-effect', get_template_directory_uri().'/css/effect.css' );
	wp_enqueue_style( 'ts-photography-customcss', get_template_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/fontawesome-all.css' );
	wp_enqueue_style( 'jquery-nivo-slider', get_template_directory_uri().'/css/nivo-slider.css' );

	wp_enqueue_script( 'jquery-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'ts-photography-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') );

	wp_enqueue_style('ts-photography-ie', get_template_directory_uri().'/css/ie.css', array('ts-photography-basic-style'));
	wp_style_add_data( 'ts-photography-ie', 'conditional', 'IE' );
}
add_action( 'wp_enqueue_scripts', 'ts_photography_scripts' );

/*radio button sanitization*/
 function ts_photography_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

define('TS_PHOTOGRAPHY_BUY_NOW','https://www.themeshopy.com/themes/premium-photography-wordpress-theme/','bb-ecommerce-store');
define('TS_PHOTOGRAPHY_LIVE_DEMO','https://themeshopy.com/ts-photography/','bb-ecommerce-store');
define('TS_PHOTOGRAPHY_PRO_DOC','https://www.themeshopy.com/docs/photography-pro/','bb-ecommerce-store');
define('TS_PHOTOGRAPHY_FREE_DOC','https://themeshopy.com/docs/free-ts-photography/','bb-ecommerce-store');
define('TS_PHOTOGRAPHY_CONTACT','https://www.themeshopy.com/free-theme-support//','bb-ecommerce-store');
define('TS_PHOTOGRAPHY_CREDIT','https://www.themeshopy.com/','ts-photography');

if ( ! function_exists( 'ts_photography_credit' ) ) {
	function ts_photography_credit(){
		echo "<a href=".esc_url(TS_PHOTOGRAPHY_CREDIT)." target='_blank'>".esc_html__('ThemeShopy','ts-photography')."</a>";
	}
}

/* Custom header additions. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* admin file. */
require get_template_directory() . '/inc/admin/admin.php';
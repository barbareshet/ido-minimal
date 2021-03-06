<?php
/**
 * minimal functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package minimal
 */

if ( ! function_exists( 'ido_minimal_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ido_minimal_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on minimal, use a find and replace
	 * to change 'ido-minimal' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ido-minimal', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'ido-minimal' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ido_minimal_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'ido_minimal_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ido_minimal_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ido_minimal_content_width', 640 );
}
add_action( 'after_setup_theme', 'ido_minimal_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ido_minimal_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ido-minimal' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ido-minimal' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ido_minimal_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ido_minimal_scripts() {
	wp_enqueue_style( 'ido-minimal-style', get_stylesheet_uri() );
	wp_enqueue_style('test-scss-style', get_stylesheet_directory_uri() . '/assets/bootstrap-scss-gulp/assets/scss/main.css');
	wp_enqueue_script( 'ido-minimal-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'ido-minimal-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ido_minimal_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


function iwsInit()
{
	/**
	 * hide the admin bar
	 */
	add_filter('show_admin_bar', '__return_false');

	/**
	 * ACF setup
	 */

	// 1. customize ACF path
	add_filter('acf/settings/path', 'my_acf_settings_path');
	function my_acf_settings_path($path)
	{
		$path = get_template_directory() . '/inc/plugins/acf/';

		return $path;
	}

	// 2. customize ACF dir
	add_filter('acf/settings/dir', 'my_acf_settings_dir');
	function my_acf_settings_dir($dir)
	{
		$dir = get_stylesheet_directory_uri() . '/inc/plugins/acf/';

		return $dir;
	}

	// 3. Hide ACF field group menu item
	//add_filter('acf/settings/show_admin', '__return_false');

	// 4. Include ACF
	include_once(get_template_directory() . '/inc/plugins/acf/acf.php');

	if (function_exists('acf_add_options_page')) {
		acf_add_options_page(array(
			'page_title' => __('Theme Options', 'click'),
			'menu_title' => __('Theme Options', 'click'),
			'menu_slug'  => __('theme-options', 'click'),
		));
	}
	add_filter('acf/settings/save_json', 'my_acf_json_save_point');

	function my_acf_json_save_point($path)
	{
		$path = get_template_directory() . '/inc/plugins/acf_json/';

		return $path;
	}

	//acf fields and options
	include_once(get_template_directory() . '/inc/plugins/acf-repeater-editor-accordion/acf-repeater-accordion.php');
	include_once(get_template_directory() . '/inc/plugins/sliders-fields/acf-sliders.php');

	function yna_login_logo()
	{
		$logo = get_field('site_logo', 'options');
		if (!$logo) {
			return;
		}
		?>
		<style type="text/css">
			.login h1 a {
				background-image: url(<?php echo $logo; ?>);
				padding-bottom: 30px;
				background-size: 150px;
				height: 144px;
				width: 140px;
			}
		</style>
		<?php
	}

	add_action('login_enqueue_scripts', 'yna_login_logo');

}

iwsInit();

include_once(get_template_directory() . '/inc/post_type/provider_post_type_and_tax.php');
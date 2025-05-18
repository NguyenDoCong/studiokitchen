<?php
add_action('after_setup_theme', 'theme_slug_setup');

/*register*/ 

function theme_slug_setup()
{
	add_theme_support('wp-block-styles');
}

function studio_kitchen_enqueue_styles()
{
	wp_enqueue_style('bootstrap', get_theme_file_uri('/assets/css/bootstrap.min.css'), array(), 1.0,);
	wp_enqueue_style('slick-theme', get_theme_file_uri('/assets/css/slick-theme.css'), array(), 1.0,);
	wp_enqueue_style('slick', get_theme_file_uri('/assets/css/slick.css'), array(), 1.0,);
	wp_enqueue_style('main-style', get_stylesheet_uri());
	wp_enqueue_style('style', get_theme_file_uri('/assets/css/styles.css'), array(), 1.0,);
}
add_action('wp_enqueue_scripts', 'studio_kitchen_enqueue_styles');

function add_google_fonts()
{
	wp_enqueue_style(' play_fair ', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap', false);
	wp_enqueue_style(' poppins ', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', false);
	wp_enqueue_style(' open_sans ', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap', false);
}
add_action('wp_enqueue_scripts', 'add_google_fonts');

function add_custom_script()
{
	wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), true);
	wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), true);
}
add_action('wp_enqueue_scripts', 'add_custom_script');



function custom_theme_menus()
{
	register_nav_menus(
		array(
			'primary-menu' => __('Primary Menu'),
			'second-menu' => __('Secondary Menu'),
		)
	);
}
add_action('after_setup_theme', 'custom_theme_menus');

add_theme_support('custom-logo');

function themename_custom_logo_setup()
{
	add_theme_support('post-thumbnails');

	$defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array('site-title', 'site-description'),
		'unlink-homepage-logo' => true,
	);
	add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'themename_custom_logo_setup');

function widget_registration($name, $id, $class, $description, $beforeWidget, $afterWidget, $before_title, $after_title)
{
	register_sidebar(array(
		'name' => $name,
		'id' => $id,
		'class' => $class,
		'description' => $description,
		'before_widget' => $beforeWidget,
		'after_widget' => $afterWidget,
		'before_title' => $before_title,
		'after_title' => $after_title,
	));
}

function multiple_widget_init()
{
	widget_registration('Main menu', 'main-menu', '', '', '', '', '', '', '');
	widget_registration('Second menu', 'second-menu', '', '', '', '', '', '', '');
	widget_registration('Subscribe', 'subscribe', '', '', '', '', '<h2 class="playfair-display-d2">', '</h2>');
	widget_registration('Follow', 'follow', '', '', '', '', '<h4 class="poppins-semibold">', '</h4>');
	widget_registration('Copyright', 'copyright', '', '', '', '', '', '', '');
}
add_action('widgets_init', 'multiple_widget_init');

function studio_kitchen_recipes() {
	register_post_type('recipes',
		array(
			'labels'      => array(
				'name'          => __('Recipes', 'textdomain'),
				'singular_name' => __('Recipe', 'textdomain'),
			),
				'public'      => true,
				'has_archive' => true,
				'supports' => ['title', 'post_tag', 'editor', 'thumbnail', 'author', 'revisions', 'comments', 'trackbacks', 'page-attributes', 'excerpt', 'post-formats', 'custom-fields']
		)
	);
}
add_action('init', 'studio_kitchen_recipes');

function studio_kitchen_courses() {
	register_post_type('courses',
		array(
			'labels'      => array(
				'name'          => __('Courses', 'textdomain'),
				'singular_name' => __('course', 'textdomain'),
			),
				'public'      => true,
				'has_archive' => true,
				'supports' => ['title', 'post_tag', 'editor', 'thumbnail', 'author', 'revisions', 'comments', 'trackbacks', 'page-attributes', 'excerpt', 'post-formats', 'custom-fields']
		)
	);
}
add_action('init', 'studio_kitchen_courses');

function studio_kitchen_stories() {
	register_post_type('stories',
		array(
			'labels'      => array(
				'name'          => __('Stories', 'textdomain'),
				'singular_name' => __('story', 'textdomain'),
			),
				'public'      => true,
				'has_archive' => true,
				'supports' => ['title', 'post_tag', 'editor', 'thumbnail', 'author', 'revisions', 'comments', 'trackbacks', 'page-attributes', 'excerpt', 'post-formats', 'custom-fields']
		)
	);
}
add_action('init', 'studio_kitchen_stories');

function studio_kitchen_events() {
	register_post_type('events',
		array(
			'labels'      => array(
				'name'          => __('Events', 'textdomain'),
				'singular_name' => __('event', 'textdomain'),
			),
				'public'      => true,
				'has_archive' => true,
				'supports' => ['title', 'post_tag', 'editor', 'thumbnail', 'author', 'revisions', 'comments', 'trackbacks', 'page-attributes', 'excerpt', 'post-formats', 'custom-fields']
		)
	);
}
add_action('init', 'studio_kitchen_events');

function studio_kitchen_blogs() {
	register_post_type('blogs',
		array(
			'labels'      => array(
				'name'          => __('Blogs', 'textdomain'),
				'singular_name' => __('blog', 'textdomain'),
			),
				'public'      => true,
				'has_archive' => true,
				'supports' => ['title', 'post_tag', 'editor', 'thumbnail', 'author', 'revisions', 'comments', 'trackbacks', 'page-attributes', 'excerpt', 'post-formats', 'custom-fields']
		)
	);
}
add_action('init', 'studio_kitchen_blogs');

function studio_kitchen_podcasts() {
	register_post_type('podcasts',
		array(
			'labels'      => array(
				'name'          => __('Podcasts', 'textdomain'),
				'singular_name' => __('podcast', 'textdomain'),
			),
				'public'      => true,
				'has_archive' => true,
				'supports' => ['title', 'post_tag', 'editor', 'thumbnail', 'author', 'revisions', 'comments', 'trackbacks', 'page-attributes', 'excerpt', 'post-formats', 'custom-fields']
		)
	);
}
add_action('init', 'studio_kitchen_podcasts');

function include_elementor_widgets() {
    if ( class_exists( '\Elementor\Plugin' ) ) {
        require get_stylesheet_directory() . '/inc/elementor-widgets.php';
    }
}
add_action( 'wp_loaded', 'include_elementor_widgets' );

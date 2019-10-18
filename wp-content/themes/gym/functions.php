<?php 
// Link to the queries file
require_once('inc/queries.php');

//  create menu
function gym_menu()
{
	// wordpress function
	register_nav_menus(array(
		'main-menu' => 'Main Menu'
	));
}
add_action('init','gym_menu');

// enqueue style
function gym_enq_fun()
{
	wp_enqueue_style( 'normalize', get_stylesheet_directory_uri().'/css/normalize.css', array(), '8.0.1');
	wp_enqueue_style( 'google font', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,800,800i|Raleway:200i,300,300i,400,500,600,700,800,900,900i|Staatliches&display=swap', array(), '1.0.0');

	// slicnav css
	wp_enqueue_style( 'slicknawcss', get_stylesheet_directory_uri().'/css/slicknav.min.css', array(), '1.0.10');

	wp_enqueue_script('jquery');

	// Load javascript files
	wp_enqueue_script( 'slicknavjs', get_stylesheet_directory_uri().'/js/jquery.slicknav.min.js', array(), '1.0.10', true);
	wp_enqueue_script( 'customjs', get_stylesheet_directory_uri().'/js/script.js', array('jquery'), '1.0.0', true);

	// bx slider
	if(is_front_page()):
		wp_enqueue_script( 'bxslierjs', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery'), '4.2.12', true);
		wp_enqueue_style( 'bxslidercss', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css');
	endif;

	// Enqueue Lightbox css
	if (basename(get_page_template()) === "gallery.php"):
		wp_enqueue_style( 'lightboxcss', get_stylesheet_directory_uri().'/css/lightbox.min.css', array(), '2.1.11');
		wp_enqueue_script( 'lightboxjs', get_stylesheet_directory_uri().'/js/lightbox.min.js', array('jquery'), '1.0.10', true);	
	endif;
}
add_action('wp_enqueue_scripts', 'gym_enq_fun');

// Enable feature images and other stuff
function gymfitness_setup()
{
	// Register new image size
	add_image_size( 'square', 350, 350, true );
	add_image_size( 'glryimg', 270, 270, true );
	add_image_size( 'blgimg', 580, 450, true );
	add_image_size( 'mediumsize', 395.7, 350, true );
	add_image_size( 'portrait', 350, 750, true );
	add_image_size( 'single-img', 850, 850, true );
	add_image_size( 'blog', 966, 644, true );

	// Add features image
	add_theme_support('post-thumbnails');
	// add_theme_support( 'title-tag' ); 
}
add_action( 'after_setup_theme', 'gymfitness_setup' );

// Create a widget zone
function gymfitness_widgets()
{
	/**
	 * Creates a sidebar
	 * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
	 */
	$args = array(
		'name'          => 'Sidebar name',
		'id'            => 'sidebar',
		'before_widget' => '<div class="widget custom-sidebar">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="text-primary">',
		'after_title'   => '</h3>',
	);
	
	register_sidebar( $args );
	
}
add_action( 'widgets_init', 'gymfitness_widgets' );

/** Display the hero image on backgroung of the front-page **/
function gymfitness_hero_image(){
	$front_page_id = get_option('page_on_front');  // get front page id[open /options.php] (page_on_front have setted front page id)
	$image_id = get_field('hero_image', $front_page_id);

	$image = $image_id['url'];

	// Create a "FALSE" stylesheet[ register custom style like as below ]
	wp_register_style( 'custom', false );
	wp_enqueue_style( 'custom' );

	// assign css to variable
	$featured_image_css = "
		body.home .site-header{
			background-image: linear-gradient( rgba(0,0,0,0.75), rgba(0,0,0,0.75) ), url( $image );
			background-position: center;
		    background-repeat: no-repeat;
		    background-size: cover;
		}
	";

	// define custom css using assigned variable
	wp_add_inline_style( 'custom', $featured_image_css );
}
add_action( 'init' , 'gymfitness_hero_image' );


?>
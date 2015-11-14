<?php
/**
 * true functions and definitions
 *
 * @package true
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'true_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function true_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on true, use a find and replace
	 * to change 'true' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'true', get_template_directory() . '/languages' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'true' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'true_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // true_setup
add_action( 'after_setup_theme', 'true_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function true_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'true' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'true_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function true_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	
	wp_enqueue_style( 'font-awesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'lora-font', 'http://fonts.googleapis.com/css?family=Lora:400,400italic' );

	

	wp_enqueue_script( 'jquery' );
	// wp_enqueue_script( 'jquery-ui-core' );
	
	// wp_enqueue_script( 'jquery-true', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', array(), '20120206', true );
	wp_enqueue_script( 'jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js', array('jquery'), '20120206', true );


	wp_enqueue_script( 'true-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'true-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js', array("jquery"), '20130115', true );
	
	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/libraries/masonry.pkgd.min.js', array("jquery"), '20120206', true );

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/libraries/modernizr.js', array("jquery"), '20120206', true );

	wp_enqueue_script( 'cycle2', get_template_directory_uri() . '/js/jquery.cycle2.min.js', array("jquery","jquery-ui"), '20120206', true );
	wp_enqueue_script( 'cycle2', get_template_directory_uri() . '/js/libraries/jquery-loader.js', array("jquery","jquery-ui"), '20120206', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array("jquery","jquery-ui"), '20120206', true );
	
}
add_action( 'wp_enqueue_scripts', 'true_scripts' );

function true_fonts() { ?>
	<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lora:400,400italic" rel="stylesheet" type="text/css">
<?php }

add_action('wp_head','true_fonts');

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Content functions
 */
require get_template_directory() . '/inc/content.php';

/**
 * Shortcodes functions
 */
require get_template_directory() . '/inc/shortcodes.php';

// Get menus to play nicely with the submenu script
// blissfully borrowed from Post Type Archive Links plugin, thanks @stephenharris, @F J Kaiser, @ryancurban
function mrw_tax_archive_current( $items ) {
    foreach ( $items as $item ) {
        if ( 'taxonomy' !== $item->type )
            continue;

        global $post;

        if( !$post )
            continue;

        $taxonomy = $item->object;
        $taxonomy_term = $item->object_id;
        if (
            ! is_tax( $taxonomy, $taxonomy_term )
            AND ! has_term( $taxonomy_term, $taxonomy, $post->ID )
        )
            continue;

        // Make item current
        $item->current = true;
        $item->classes[] = 'current-menu-item';

        // Loop through ancestors and give them 'parent' or 'ancestor' class
        $active_anc_item_ids = mrw_get_item_ancestors( $item );
        foreach ( $items as $key => $parent_item ) {
            $classes = (array) $parent_item->classes;

            // If menu item is the parent
            if ( $parent_item->db_id == $item->menu_item_parent ) {
                $classes[] = 'current-menu-parent';
                $items[ $key ]->current_item_parent = true;
            }

            // If menu item is an ancestor
            if ( in_array( intval( $parent_item->db_id ), $active_anc_item_ids ) ) {
                $classes[] = 'current-menu-ancestor';
                $items[ $key ]->current_item_ancestor = true;
            }

            $items[ $key ]->classes = array_unique( $classes );
        }
    }

    return $items;
}
add_filter('wp_nav_menu_objects','mrw_tax_archive_current');

function mrw_get_item_ancestors( $item ) {
    $anc_id = absint( $item->db_id );

    $active_anc_item_ids = array();
    while (
        $anc_id = get_post_meta( $anc_id, '_menu_item_menu_item_parent', true )
        AND ! in_array( $anc_id, $active_anc_item_ids )
    )
        $active_anc_item_ids[] = $anc_id;

    return $active_anc_item_ids;
}

function true_get_author( $post_id = 0 ){
     $post = get_post( $post_id );
     $firstname =  get_the_author_meta('first_name',$post->post_author);
     $lastname =  get_the_author_meta('last_name',$post->post_author);
     $name = $firstname . " " . $lastname;
     return strtoupper($name);
}


function get_by_credits($id) {
	?>
		BY: <span><?php echo true_get_author($id) ?></span>
	<?php
}


if( function_exists('acf_add_options_page')) {

	acf_add_options_page();

}


function check_user_agent ( $type = NULL ) {
    $user_agent = strtolower ( $_SERVER['HTTP_USER_AGENT'] );
    if ( $type == 'bot' ) {
            // matches popular bots
            if ( preg_match ( "/googlebot|adsbot|yahooseeker|yahoobot|msnbot|watchmouse|pingdom\.com|feedfetcher-google/", $user_agent ) ) {
                    return true;
                    // watchmouse|pingdom\.com are "uptime services"
            }
    } else if ( $type == 'browser' ) {
            // matches core browser types
            if ( preg_match ( "/mozilla\/|opera\//", $user_agent ) ) {
                    return true;
            }
    } else if ( $type == 'mobile' ) {
            // matches popular mobile devices that have small screens and/or touch inputs
            // mobile devices have regional trends; some of these will have varying popularity in Europe, Asia, and America
            // detailed demographics are unknown, and South America, the Pacific Islands, and Africa trends might not be represented, here
            if ( preg_match ( "/phone|iphone|itouch|ipod|symbian|android|htc_|htc-|palmos|blackberry|opera mini|iemobile|windows ce|nokia|fennec|hiptop|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|nintendo/", $user_agent ) ) {
                    // these are the most common
                    return true;
            } else if ( preg_match ( "/mobile|pda;|avantgo|eudoraweb|minimo|netfront|brew|teleca|lg;|lge |wap;| wap /", $user_agent ) ) {
                    // these are less common, and might not be worth checking
                    return true;
            }
    }
    return false;
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="primary">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
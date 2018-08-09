<?php
/**
 * Module Marcomm functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Module Marcomm
 */

if ( ! function_exists( 'module_marcomm_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function module_marcomm_setup() {

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    //
    //Let WordPress manage the document title.
    //By adding theme support, we declare that this theme does not use a
    //hard-coded <title> tag in the document head, and expect WordPress to
    //provide it for us.
    // ---------------------------------------
    add_theme_support( 'title-tag' );

    //
    // Enable support for Post Thumbnails on posts and pages.
    // ---------------------------------------
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 800, 550, true ); // default Featured Image dimensions (cropped)

    // Register additional image sizes
    add_image_size( 'home-page', 600, 400, true );
    add_image_size( 'blog-page', 800, 400, true );

    //
    // This theme uses wp_nav_menu() in two locations
    // ---------------------------------------
    register_nav_menus(array('primary' => 'Primary Navigation'));
    register_nav_menus(array('footer' => 'Footer Navigation'));


    //
    // Switch default core markup for search form, comment form, and comments to output valid HTML5
    // ---------------------------------------
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    //
    // Enable support for Post Formats.
    // See https://developer.wordpress.org/themes/functionality/post-formats/
    // ---------------------------------------
    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'module_marcomm_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );

    // Include custom post types
    include('inc/custom-post-types.php');
}
endif; // module_marcomm_setup
add_action( 'after_setup_theme', 'module_marcomm_setup' );

//
// Enable support for Post Formats.
// @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
// ---------------------------------------
function module_marcomm_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'module-marcomm' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'module_marcomm_widgets_init' );

//
// Enqueue theme assets
// ---------------------------------------
function module_marcomm_scripts() {
    // Style is linked directly in the head of the document
    wp_enqueue_script( 'module-scripts', get_template_directory_uri() . '/site.min.js', array('jquery'), '20120206', true );
}
add_action( 'wp_enqueue_scripts', 'module_marcomm_scripts' );

//
// Dequeue WP Embed
// ---------------------------------------
function inq_dequeue_embed(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'inq_dequeue_embed' );

//
// Dequeue emoji stylesheet
// ---------------------------------------
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

//
// Dequeue jQuery Migrate
// ---------------------------------------
function isa_remove_jquery_migrate( &$scripts) {
    if(!is_admin()) {
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.12.4' );
    }
}
add_filter( 'wp_default_scripts', 'isa_remove_jquery_migrate' );


//
// Register ACF Options
// ---------------------------------------
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Site Settings',
        'menu_title'    => 'Site Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'position'      => 1
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Mailing List Call-To-Action',
        'menu_title'    => 'Mailing List Call-To-Action',
        'parent_slug'   => 'theme-general-settings'
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Footer Menus',
        'menu_title'    => 'Footer Menus',
        'parent_slug'   => 'theme-general-settings'
    ));

}

//
// Display Custom Login Logo
// ---------------------------------------
function inq_login_logo() { ?>
    <style type="text/css">
        body.login #login{
            padding: 40px 0 0;
        }
        body.login #login h1{
            margin: 0px;
        }
        body.login #login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri();?>/assets/img-dist/logo-black.svg);
            background-size: 140px 122px;
            width: auto;
            height: 150px;
            margin: 0px;
        }
    </style>
<?php }

add_action( 'login_enqueue_scripts', 'inq_login_logo' );

function inq_login_logo_url() {
        return get_bloginfo( 'url' );
    }
add_filter( 'login_headerurl', 'inq_login_logo_url' );

//
// Custom Excerpt Formatting
// ---------------------------------------
function mod_new_excerpt_more($more) {
        global $post;
        return '... <a class="read-more" href="'. get_permalink($post->ID) . '">Read more »</a>';
}
add_filter('excerpt_more', 'mod_new_excerpt_more');

function mod_custom_excerpt_length( $length ) {
    if ( is_archive() ){
        return 45;
    }
    return 20;
}
add_filter( 'excerpt_length', 'mod_custom_excerpt_length', 999 );

//
// Keep Users Logged In For One Year
// ---------------------------------------
add_filter( 'auth_cookie_expiration', 'keep_me_logged_in_for_1_year' );
    function keep_me_logged_in_for_1_year( $expirein ) {
    return 31556926; // 1 year in seconds
}

//
// Allow SVG Uploads
// ---------------------------------------
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

//
// Check to Determine Whether Pagination is Used
// ---------------------------------------
function if_pagination() {
    global $wp_query;
    return ( $wp_query->max_num_pages > 1 );
}

//
// Create Excerpts using ACF Fields
// ---------------------------------------
function create_excerpt($string, $wordsreturned)
{
    $retval = $string;
    $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $string);
    $string = str_replace("\n", " ", $string);
    $array = explode(" ", $string);
    if (count($array)<=$wordsreturned) {
        $retval = $string;
    } else {
        array_splice($array, $wordsreturned);
        $retval = implode(" ", $array)." ...";
    }
    return $retval;
}
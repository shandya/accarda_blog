<?php
/**
 * accarda functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package accarda
 */

if ( ! function_exists( 'accarda_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function accarda_setup() {
  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on accarda, use a find and replace
   * to change 'accarda' to the name of your theme in all the template files.
   */
  load_theme_textdomain( 'accarda', get_template_directory() . '/languages' );

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
   add_image_size( 'entry-spotlight-image', 1200, 800, false );
  add_image_size( 'entry-thumbnail', 460, 345, true );
   add_image_size( 'record-featured-image-small', 200, 200, true );
  add_image_size( 'record-featured-image', 400, 400, true );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'primary' => esc_html__( 'Primary Menu', 'accarda' ),
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
  add_theme_support( 'custom-background', apply_filters( 'accarda_custom_background_args', array(
    'default-color' => 'ffffff',
    'default-image' => '',
  ) ) );
}
endif; // accarda_setup
add_action( 'after_setup_theme', 'accarda_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function accarda_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'accarda_content_width', 640 );
}
add_action( 'after_setup_theme', 'accarda_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function accarda_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar Widget Area', 'accarda' ),
    'id'            => 'sidebar-1',
    'description'   => __( 'Widget Area to be displayed on Index Page and Single Page', 'accarda' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'accarda_widgets_init' );

/**
 * Register footer widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function footer_widgets_init() {
 
    // First footer widget area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Footer Widget Area', 'accarda' ),
        'id' => 'sidebar-footer',
        'description' => __( 'Widget Area to be displayed on Mitmachen page', 'accarda' ),
        'before_widget' => '<aside class="widget widget-footer %2$s record" id="%1$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title record-title">',
        'after_title'   => '</h2>',
    ) );    
}
add_action( 'widgets_init', 'footer_widgets_init' );

// Dynamically add Bootstrap column classes to footer widgets, depending on how many widgets are present
add_filter('dynamic_sidebar_params','tibs_footer_sidebar_params'); 
function tibs_footer_sidebar_params($params) {
    $sidebar_id = $params[0]['id'];
    if ( $sidebar_id == 'sidebar-footer' ) {
        $total_widgets = wp_get_sidebars_widgets();
        $sidebar_widgets = count($total_widgets[$sidebar_id]);
        $params[0]['before_widget'] = str_replace('<aside class="widget ', '<aside class="widget hello col-sm-' . floor(12 / $sidebar_widgets) . ' ', $params[0]['before_widget']);
    }
    return $params;
}


/**
 * Enqueue scripts and styles.
 */
function accarda_scripts() {
  wp_enqueue_style( 'accarda-style', get_stylesheet_uri() );

  wp_enqueue_script( 'accarda-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

  wp_enqueue_script( 'accarda-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'accarda_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
//require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
//require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
//require get_template_directory() . '/inc/jetpack.php';


//Prevent Page Scroll When Clicking the More Link
function remove_more_link_scroll( $link ) {
  $link = preg_replace( '|#more-[0-9]+|', '', $link );
  return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );

//Modify The Read More Link Text
add_filter( 'the_content_more_link', 'modify_read_more_link' );
function modify_read_more_link() {
return '<a href="' . get_permalink() . '" class="read-more-link">Jetzt Lesen <span class="icon-ico-chevron"></span></a>';
}


// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

register_nav_menus( array(
    'primary' => __( 'Header Menu', 'accarda' ),
) );

register_nav_menus( array(
    'footer' => __( 'Footer Menu', 'accarda' ),
) );


// Exclude page format from search result
function filter_only_post($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','filter_only_post');

function users_own_attachments( $wp_query_obj ) {

    global $current_user, $pagenow;

    if( !is_a( $current_user, 'WP_User') )
        return;

    if( in_array( $pagenow, array( 'upload.php', 'admin-ajax.php' ) ) ) {

        if( is_admin() ) {
        } else {
            $args = [
                'role' => 'administrator',
                'fields' => 'id',
            ];
            $authors = get_users($args);
            array_push($authors, $current_user->ID);
            $wp_query_obj->set('author__in', $authors );
        }
    }

    return;
}
add_action('pre_get_posts','users_own_attachments');

function accarda_process_form() {

    global $current_user;

    if ( isset($_POST) && isset($_POST['_wpnonce']) ) {
        $attachment = sanitize_text_field($_POST["post_thumbnail"]);
        $file = sanitize_text_field($_POST["post_file"]);
        $meta = $_POST["meta"];
        $nonce = $_POST['_wpnonce'];
        if (wp_verify_nonce($nonce, '-accarda-nonce') ) {
            $post_id = wp_insert_post([
                'comment_status'=> 'open',
                'ping_status'   => 'open',
                'post_author'   => $current_user->ID,
                'post_title'    => sanitize_text_field($_POST["post_title"]),
                'post_status'   => 'publish',
                'post_content'  => $_POST["post_content"],
                'post_type'     => 'post'
            ]);

            if( $post_id ) {
                if($attachment) {
                    add_post_meta($post_id, '_thumbnail_id', $attachment, true);
                }

                if($file) {
                    add_post_meta($post_id, 'befestigung', $file, true);
                }

                if( isset($meta["subtitle"]) && $meta["subtitle"] != "" ) {
                    add_post_meta($post_id, 'subtitle', $meta["subtitle"], true);
                }

                if( isset($meta["video_embed"]) && $meta["video_embed"] != "" ) {
                    add_post_meta($post_id, 'video_embed', $meta["video_embed"], true);
                }
            }
        }
    }
}
add_action('init','accarda_process_form');

function accarda_get_attachment( $attachment_id ) {
    $attachment = get_post( $attachment_id );

    if($attachment) {
        return array(
            'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
            'caption' => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'href' => get_permalink( $attachment->ID ),
            'url' => $attachment->guid,
            'mime_type' => $attachment->post_mime_type,
            'title' => $attachment->post_title
        );
    } else {
        return null;
    }
}

function redirect_to_front_page() {
    global $current_user;
    if( $current_user->ID != 0 && !current_user_can('administrator') ){
        wp_redirect( home_url() );
        exit;
    }
}
add_action('login_form', 'redirect_to_front_page');

function my_wp_admin_ban(){
    global $current_user;
    if( $current_user->ID != 0 && !current_user_can('administrator') ){
        wp_redirect( home_url() );
        exit;
    }
}
add_action('admin_init','my_wp_admin_ban');

function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}
add_action('after_setup_theme', 'remove_admin_bar');
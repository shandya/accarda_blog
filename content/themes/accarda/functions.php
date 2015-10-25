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
  add_image_size( 'entry-thumbnail', 460, 345, true );
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
    'name'          => esc_html__( 'Sidebar', 'accarda' ),
    'id'            => 'sidebar-1',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'accarda_widgets_init' );

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

//Creating Custom Post Types

function redaktion_custom_post_type() {
  $labels = array(
    'name'               => _x( 'Redaktions', 'post type general name' ),
    'singular_name'      => _x( 'Redaktion', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'redaktion' ),
    'add_new_item'       => __( 'Add New Redaktion' ),
    'edit_item'          => __( 'Edit Redaktion' ),
    'new_item'           => __( 'New Redaktion' ),
    'all_items'          => __( 'All Redaktions' ),
    'view_item'          => __( 'View Redaktion' ),
    'search_items'       => __( 'Search Redaktions' ),
    'not_found'          => __( 'No redaktions found' ),
    'not_found_in_trash' => __( 'No redaktions found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Redaktions'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our redaktions and product specific data',
    'public'        => true,
    'menu_position' => 5,
    'menu_icon'     => 'dashicons-admin-users',
    'supports'      => array( 'title', 'editor', 'thumbnail' ),
    'has_archive'   => true,
  );
  register_post_type( 'redaktion', $args ); 
}
add_action( 'init', 'redaktion_custom_post_type' );


// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'accarda' ),
) );

register_nav_menus( array(
    'footer' => __( 'Footer Menu', 'accarda' ),
) );

/*
 * Register Like Function
 */
/*
/*
Name:  WordPress Post Like System
Description:  A simple and efficient post like system for WordPress.
Version:      0.4
Author:       Jon Masterson
Author URI:   http://jonmasterson.com/

License:
Copyright (C) 2014 Jon Masterson

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
 
/**
 * (1) Enqueue scripts for like system
 */

function like_scripts() {
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'jm_like_post', get_template_directory_uri().'/js/post-like.min.js', array('jquery'), '1.0', 1 );
  wp_localize_script( 'jm_like_post', 'ajax_var', array(
    'url' => admin_url( 'admin-ajax.php' ),
    'nonce' => wp_create_nonce( 'ajax-nonce' )
    )
  );
}
add_action( 'init', 'like_scripts' );

/**
 * (2) Save like data
 */
add_action( 'wp_ajax_nopriv_jm-post-like', 'jm_post_like' );
add_action( 'wp_ajax_jm-post-like', 'jm_post_like' );
function jm_post_like() {
  $nonce = $_POST['nonce'];
    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( 'Nope!' );
  
  if ( isset( $_POST['jm_post_like'] ) ) {
  
    $post_id = $_POST['post_id']; // post id
    $post_like_count = get_post_meta( $post_id, "_post_like_count", true ); // post like count
    
    if ( function_exists ( 'wp_cache_post_change' ) ) { // invalidate WP Super Cache if exists
      $GLOBALS["super_cache_enabled"]=1;
      wp_cache_post_change( $post_id );
    }
    
    if ( is_user_logged_in() ) { // user is logged in
      $user_id = get_current_user_id(); // current user
      $meta_POSTS = get_user_option( "_liked_posts", $user_id  ); // post ids from user meta
      $meta_USERS = get_post_meta( $post_id, "_user_liked" ); // user ids from post meta
      $liked_POSTS = NULL; // setup array variable
      $liked_USERS = NULL; // setup array variable
      
      if ( count( $meta_POSTS ) != 0 ) { // meta exists, set up values
        $liked_POSTS = $meta_POSTS;
      }
      
      if ( !is_array( $liked_POSTS ) ) // make array just in case
        $liked_POSTS = array();
        
      if ( count( $meta_USERS ) != 0 ) { // meta exists, set up values
        $liked_USERS = $meta_USERS[0];
      }   

      if ( !is_array( $liked_USERS ) ) // make array just in case
        $liked_USERS = array();
        
      $liked_POSTS['post-'.$post_id] = $post_id; // Add post id to user meta array
      $liked_USERS['user-'.$user_id] = $user_id; // add user id to post meta array
      $user_likes = count( $liked_POSTS ); // count user likes
  
      if ( !AlreadyLiked( $post_id ) ) { // like the post
        update_post_meta( $post_id, "_user_liked", $liked_USERS ); // Add user ID to post meta
        update_post_meta( $post_id, "_post_like_count", ++$post_like_count ); // +1 count post meta
        update_user_option( $user_id, "_liked_posts", $liked_POSTS ); // Add post ID to user meta
        update_user_option( $user_id, "_user_like_count", $user_likes ); // +1 count user meta
        echo $post_like_count; // update count on front end

      } else { // unlike the post
        $pid_key = array_search( $post_id, $liked_POSTS ); // find the key
        $uid_key = array_search( $user_id, $liked_USERS ); // find the key
        unset( $liked_POSTS[$pid_key] ); // remove from array
        unset( $liked_USERS[$uid_key] ); // remove from array
        $user_likes = count( $liked_POSTS ); // recount user likes
        update_post_meta( $post_id, "_user_liked", $liked_USERS ); // Remove user ID from post meta
        update_post_meta($post_id, "_post_like_count", --$post_like_count ); // -1 count post meta
        update_user_option( $user_id, "_liked_posts", $liked_POSTS ); // Remove post ID from user meta      
        update_user_option( $user_id, "_user_like_count", $user_likes ); // -1 count user meta
        echo "already".$post_like_count; // update count on front end
        
      }
      
    } else { // user is not logged in (anonymous)
      $ip = $_SERVER['REMOTE_ADDR']; // user IP address
      $meta_IPS = get_post_meta( $post_id, "_user_IP" ); // stored IP addresses
      $liked_IPS = NULL; // set up array variable
      
      if ( count( $meta_IPS ) != 0 ) { // meta exists, set up values
        $liked_IPS = $meta_IPS[0];
      }
  
      if ( !is_array( $liked_IPS ) ) // make array just in case
        $liked_IPS = array();
        
      if ( !in_array( $ip, $liked_IPS ) ) // if IP not in array
        $liked_IPS['ip-'.$ip] = $ip; // add IP to array
      
      if ( !AlreadyLiked( $post_id ) ) { // like the post
        update_post_meta( $post_id, "_user_IP", $liked_IPS ); // Add user IP to post meta
        update_post_meta( $post_id, "_post_like_count", ++$post_like_count ); // +1 count post meta
        echo $post_like_count; // update count on front end
        
      } else { // unlike the post
        $ip_key = array_search( $ip, $liked_IPS ); // find the key
        unset( $liked_IPS[$ip_key] ); // remove from array
        update_post_meta( $post_id, "_user_IP", $liked_IPS ); // Remove user IP from post meta
        update_post_meta( $post_id, "_post_like_count", --$post_like_count ); // -1 count post meta
        echo "already".$post_like_count; // update count on front end
        
      }
    }
  }
  
  exit;
}

/**
 * (3) Test if user already liked post
 */
function AlreadyLiked( $post_id ) { // test if user liked before
  if ( is_user_logged_in() ) { // user is logged in
    $user_id = get_current_user_id(); // current user
    $meta_USERS = get_post_meta( $post_id, "_user_liked" ); // user ids from post meta
    $liked_USERS = ""; // set up array variable
    
    if ( count( $meta_USERS ) != 0 ) { // meta exists, set up values
      $liked_USERS = $meta_USERS[0];
    }
    
    if( !is_array( $liked_USERS ) ) // make array just in case
      $liked_USERS = array();
      
    if ( in_array( $user_id, $liked_USERS ) ) { // True if User ID in array
      return true;
    }
    return false;
    
  } else { // user is anonymous, use IP address for voting
  
    $meta_IPS = get_post_meta( $post_id, "_user_IP" ); // get previously voted IP address
    $ip = $_SERVER["REMOTE_ADDR"]; // Retrieve current user IP
    $liked_IPS = ""; // set up array variable
    
    if ( count( $meta_IPS ) != 0 ) { // meta exists, set up values
      $liked_IPS = $meta_IPS[0];
    }
    
    if ( !is_array( $liked_IPS ) ) // make array just in case
      $liked_IPS = array();
    
    if ( in_array( $ip, $liked_IPS ) ) { // True is IP in array
      return true;
    }
    return false;
  }
  
}

/**
 * (4) Front end button
 */
function getPostLikeLink( $post_id ) {
  $like_count = get_post_meta( $post_id, "_post_like_count", true ); // get post likes
  $count = ( empty( $like_count ) || $like_count == "0" ) ? 'Like' : esc_attr( $like_count );
  if ( AlreadyLiked( $post_id ) ) {
    $class = esc_attr( ' liked' );
    $title = esc_attr( 'Unlike' );
    $heart = 'I like';
  } else {
    $class = esc_attr( '' );
    $title = esc_attr( 'Like' );
    $heart = 'I unlike';
  }
  $output = '<a href="#" class="jm-post-like'.$class.'" data-post_id="'.$post_id.'" title="'.$title.'">'.$heart.'&nbsp;'.$count.'</a>';
  return $output;
}
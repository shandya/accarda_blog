<?php 
/*
Plugin Name: Accarda Widget
Version: 1.0
Plugin URI: 
Description: The descripion of your plugin.
Author: Shandy Ardiansyah
Author URI: http://shandya.com
*/

add_action( 'widgets_init', 'accarda_widget_init' );
 
function accarda_widget_init() {
	register_widget( 'accarda_widget' );
}
 
class accarda_widget extends WP_Widget{
 
	public function __construct()	{
		$widget_details = array(
			'classname' => 'my_widget',
			'description' => 'My plugin description'
		);
 
		parent::__construct( 'my_widget', 'My Widget', $widget_details );
 
    add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
	}

  /**
   * Upload the Javascripts for the media uploader
   */
  public function upload_scripts()
  {
      wp_enqueue_script('media-upload');
      wp_enqueue_script('thickbox');
      wp_enqueue_script('upload_media_widget', plugin_dir_url(__FILE__) . 'upload-media.js', array('jquery'));

      wp_enqueue_style('thickbox');
  }
 
	public function form( $instance ) {
    $title = '';
    if( !empty( $instance['title'] ) ) {
        $title = $instance['title'];
    }

    $image = '';
    if( !empty($instance['image'])) {
        $image = $instance['image'];
    }
 
    $text = '';
    if( !empty( $instance['text'] ) ) {
        $text = $instance['text'];
    }

    $hyperlink = '';
    if( !empty( $instance['hyperlink'] ) ) {
        $hyperlink = $instance['hyperlink'];
    }
 
    ?>
 
    <p>
        <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>

    <p>
        <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
        <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
        <input class="upload_image_button button button-primary" type="button" value="Upload Image" style="margin-top: 1em;"/>
    </p>
 
    <p>
        <label for="<?php echo $this->get_field_name( 'text' ); ?>"><?php _e( 'Text:' ); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" type="text" ><?php echo esc_attr( $text ); ?></textarea>
    </p>

    <p>
        <label for="<?php echo $this->get_field_name( 'hyperlink' ); ?>"><?php _e( 'Hyperlink:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'hyperlink' ); ?>" name="<?php echo $this->get_field_name( 'hyperlink' ); ?>" type="text" value="<?php echo esc_attr( $hyperlink ); ?>" />
    </p>
 
    <div class='mfc-text'>
         
    </div>
 
    <?php
 
    echo $args['after_widget'];
	}
 
	public function update( $new_instance, $old_instance ) {  
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['image'] = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';
		$instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
		$instance['hyperlink'] = ( ! empty( $new_instance['hyperlink'] ) ) ? strip_tags( $new_instance['hyperlink'] ) : '';
		return $instance;
	}
 
	public function widget( $args, $instance ) {

		$title = apply_filters( 'widget_title', $instance['title'] );
    $image = apply_filters( 'widget_image', $instance['image'] );
		$text = apply_filters( 'widget_text', $instance['text'] );
		$hyperlink = apply_filters( 'widget_hyperlink', $instance['hyperlink'] );

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];


		?>

			<aside class="entry entry-sidebar">
				<div class="row">
					<div class="col-xs-12">
						<div class="widget-thumbnail">
                <?php 
                  if ( ! empty( $image ) )
                  echo '<img src="' . $image . '" alt="' . $title . '">';
                ?>
						</div>
					</div>

					<div class="col-xs-12 entry-body">
						<header class="entry-header">
								<?php 
									if ( ! empty( $title ) )
									echo $args['before_title'] . $title . $args['after_title'];
								?>
						</header>

						<div class="entry-content">
              <?php 
                if ( ! empty( $text ) )
							    echo $text; 
                ?>

              <?php 
                if ( ! empty( $hyperlink ) )
                echo '<a href="' . $hyperlink . '" class="read-more-link">Jetzt Lesen <span class="icon-ico-chevron"></span></a>';
              ?>
						</div>
					</div>
				</div>
			</aside>
		<?php
		echo $args['after_widget'];

	}
 
}




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
	wp_enqueue_script( 'jm_like_post', esc_url( home_url() ) . "/assets/javascripts/vendors/post-like.js"  , array('jquery'), '1.0', 1 );
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
	$count = ( empty( $like_count ) || $like_count == "0" ) ? '0' : esc_attr( $like_count );
	if ( AlreadyLiked( $post_id ) ) {
		$class = esc_attr( 'liked' );
	} else {
		$class = esc_attr( '' );
	}
	
	$output = '<a href="#" class="jm-post-like '.$class.'" data-post_id="'.$post_id.'"><div class="like-button"><span class="icon-ico-thumbup"></span> Gefällt mir</div></a><div id="like-count-'.$post_id.'" class="like-count">'.$count.'</div>';

	return $output;
}




/*
 * Creating Redaktion Post Types
 */

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
    'menu_position' => 6,
    'menu_icon'     => 'dashicons-admin-users',
    'supports'      => array( 'title', 'editor', 'thumbnail' ),
    'has_archive'   => true,
		'capabilities' => array(
		    'edit_post'          => 'update_core',
		    'read_post'          => 'update_core',
		    'delete_post'        => 'update_core',
		    'edit_posts'         => 'update_core',
		    'edit_others_posts'  => 'update_core',
		    'delete_posts'       => 'update_core',
		    'publish_posts'      => 'update_core',
		    'read_private_posts' => 'update_core'
		),
  );
  register_post_type( 'redaktion', $args ); 
}
add_action( 'init', 'redaktion_custom_post_type' );



/*
 * Creating Admin Post Post Types
 */

function admin_post_custom_post_type() {
  $labels = array(
    'name'               => _x( 'Admin Posts', 'post type general name' ),
    'singular_name'      => _x( 'Admin Post', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'admin post' ),
    'add_new_item'       => __( 'Add New Admin Post' ),
    'edit_item'          => __( 'Edit Admin Post' ),
    'new_item'           => __( 'New Admin Post' ),
    'all_items'          => __( 'All Admin Posts' ),
    'view_item'          => __( 'View Admin Post' ),
    'search_items'       => __( 'Search Admin Posts' ),
    'not_found'          => __( 'No admin posts found' ),
    'not_found_in_trash' => __( 'No admin posts found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Admin Posts'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our admin posts and product specific data',
    'public'        => true,
    'menu_position' => 4,
    'menu_icon'     => 'dashicons-admin-post',
    'supports'      => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions' ),
    'has_archive'   => true,
		'capabilities' => array(
		    'edit_post'          => 'update_core',
		    'read_post'          => 'update_core',
		    'delete_post'        => 'update_core',
		    'edit_posts'         => 'update_core',
		    'edit_others_posts'  => 'update_core',
		    'delete_posts'       => 'update_core',
		    'publish_posts'      => 'update_core',
		    'read_private_posts' => 'update_core'
		),
  );
  register_post_type( 'admin-post', $args ); 
}
add_action( 'init', 'admin_post_custom_post_type' );

/*
 * Restrict Author from accesing other author's media file
 */

add_filter( 'ajax_query_attachments_args', 'show_current_user_attachments' );

function show_current_user_attachments( $query ) {
    $user_id = get_current_user_id();
    if ( $user_id ) {
        $query['author'] = $user_id;
    }
    return $query;
}



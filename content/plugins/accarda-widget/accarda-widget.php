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
 
	}
 
	public function form( $instance ) {
    $title = '';
    if( !empty( $instance['title'] ) ) {
        $title = $instance['title'];
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
		$instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
		$instance['hyperlink'] = ( ! empty( $new_instance['hyperlink'] ) ) ? strip_tags( $new_instance['hyperlink'] ) : '';
		return $instance;
	}
 
	public function widget( $args, $instance ) {

		$title = apply_filters( 'widget_title', $instance['title'] );
		$text = apply_filters( 'widget_text', $instance['text'] );
		$hyperlink = apply_filters( 'widget_hyperlink', $instance['hyperlink'] );

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];


		?>

			<aside class="entry entry-sidebar">
				<div class="row">
					<div class="col-xs-12">
						<div class="entry-thumbnail">
							<img src="http://lorempixel.com/400/360" alt="">
						</div>
					</div>

					<div class="col-xs-12 entry-body">
						<header class="entry-header">
							<div class="entry-meta-info">
								<a href="" class="category-link">lorem ipsum</a>
							</div>
							<h2 class="entry-title">
								<a href="<?php echo $title; ?>" class="entry-title-link">
									<?php 
										if ( ! empty( $title ) )
										echo $args['before_title'] . $title . $args['after_title'];
									?>
								</a>
							</h2>
						</header>

						<div class="entry-content">
							<?php echo $text; ?>
							<a href="<?php echo $hyperlink; ?>" class="read-more-link">Jetzt Lesen <span class="icon-ico-chevron"></span></a>
						</div>
					</div>
				</div>
			</aside>
		<?php
		echo $args['after_widget'];

	}
 
}
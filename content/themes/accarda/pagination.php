<?php
/**
 * The template for displaying paged navigation
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package accarda
 */ 
?>

<p class="pagination-label"><?php echo __( 'Seite' ); ?></p>

<?php $args = array(
  'prev_next'          => True,
  'prev_text'          => __('«'),
  'next_text'          => __('»'),
  'type'               => 'list'
); 

echo paginate_links( $args ); ?>
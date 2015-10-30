<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package accarda
 */

?>

<div class="row">
  <div class="col-md-12">
    <div class="entry-thumbnail">
      <?php the_post_thumbnail( 'entry-spotlight-image' ); ?>
    </div>
  </div>
  <div class="col-sm-6 col-md-4 col-lg-3 entry-body">
    <header class="entry-header">
      <div class="post-meta-info">
        <?php echo get_the_category_list( ', ')?>
      </div>
      <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" class="entry-title-link" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    </header>

    <div class="entry-content">
      <?php the_content(); ?>
    </div>

  </div>
</div>





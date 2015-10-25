<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package accarda
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'record' ); ?>>
  <div class="row">
    <div class="col-md-8 col-md-push-2">
      <div class="record-thumbnail record-thumbnail-small">
        <?php
          if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'record-featured-image' );
          }
        ?>
      </div>

      <header class="record-header text-center">
        <?php the_title( '<h2 class="record-title">', '</h2>' ); ?>
        <p class="record-subtitle">
          <?php the_field('titel'); ?>
        </p>
      </header>

      <div class="record-content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</article>
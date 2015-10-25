<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package accarda
 */

?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'record' ); ?>>
      <div class="row">
        <div class="col-md-8 col-md-push-2">
          <div class="record-thumbnail">
            <?php
              if ( has_post_thumbnail() ) {
                the_post_thumbnail( 'record-featured-image' );
              }
            ?>
          </div>

          <header class="record-header text-center">
            <?php the_title( '<h1 class="record-title">', '</h1>' ); ?>
          </header>
        </div>
      </div>
    </article>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-sm-6">
    <div class="record-content">
      <?php the_content(); ?>
    </div>  
  </div>
  <div class="col-xs-12 col-sm-6">
    <div class="record-content">
      <?php the_field('adresse'); ?>
    </div>
  </div>
</div>


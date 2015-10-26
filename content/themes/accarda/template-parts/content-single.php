<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package accarda
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
  <div class="row">
    <div class="col-xs-12">
      <div class="post-featured-image-wrapper">
				<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'large', array('class' => 'post-featured-image'));
					}
				?>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 post-body">
      <header class="post-header">
        <div class="post-meta-info">
          <a href="" class="category-link">lorem ipsum</a>
        </div>

        <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>

        <div class="post-meta-info">
          <span="post-date"><em><?php the_time('l, F jS, Y') ?></em></span>
        </div>
      </header>

      <div class="post-content">

				<?php the_content(); ?>

      </div>

      <footer class="post-footer">
        <div class="like-wrapper">
          <?php echo getPostLikeLink(get_the_ID());?>
        </div>
      </footer>
    </div>
  </div>
</article>

<div class="shortcut-button-containers clearfix">
  <?php 
    $prevPost = get_previous_post();
    if (!empty( $prevPost )) : ?>
      <div class="shortcut-button prev-shortcut-button pull-left">
        <h5 class="button-label"><?php echo __( 'Vorheriger Artikel') ?></h5>
        <?php previous_post_link('<p class="button-title">%link</p>'); ?> 
      </div>
  <?php endif; ?>

  <?php 
    $nextPost = get_next_post();
    if (!empty( $nextPost )) : ?>
    <div class="shortcut-button next-shortcut-button pull-right">
      <h5 class="button-label"><?php echo __( 'Nachster Artikel') ?></h5>
      <?php next_post_link('<p class="button-title">%link</p>'); ?> 
    </div>
  <?php endif; ?>
</div>
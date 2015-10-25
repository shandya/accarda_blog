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
          <div class="like-button">
            <input class="like-button-input" type="checkbox" id="like-box">
            <label for="like-box" class="like-button-label"><span class="icon-ico-thumbup"></span> Gefällt mir</label>
          </div>
          <div class="like-count">
            103
          </div>
        </div>
      </footer>
    </div>
  </div>
</article>
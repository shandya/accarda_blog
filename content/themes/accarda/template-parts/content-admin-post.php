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
          <?php echo get_the_category_list( ', ')?>
        </div>

        <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>

        <div class="post-meta-info">
          <span="post-date"><em><?php the_time('l, F jS, Y') ?></em></span>
        </div>
      </header>

      <div class="post-content">

        <?php the_content(); ?>



        <?php $video_embed = get_field('video_embed');

          if ( $video_embed ) : ?>
        <div class="embed-responsive embed-responsive-16by9">
          <?php echo $video_embed; ?>
        </div>
        <?php endif; ?>
      </div>

      <footer class="post-footer">
        <div class="like-wrapper">
          <?php echo getPostLikeLink(get_the_ID());?>
        </div>
      </footer>

      <?php 

        $file = get_field('befestigung');

        if( $file ):

          $url = $file['url'];
          $title = $file['title'];
          $mime = $file['mime_type'];

          if (preg_match('/image/', $mime)) {
            $icon = 'dashicons-format-image';
          } elseif (preg_match('/video/', $mime)) {
            $icon = 'dashicons-media-video';
          } elseif (preg_match('/audio/', $mime)) {
            $icon = 'dashicons-media-audio';
          } else {
            $icon = 'dashicons-media-text';
          }

          ?> 

          <div class="post-attachment-wrapper">
            <div class="media">
              <div class="media-left media-middle">
                <span class="dashicons <?php echo $icon; ?> media-object"></span>
              </div>
              <div class="media-body media-middle">
                <a href="<?php echo $url; ?>" title="<?php echo $title; ?>" target="_BLANK"><h4 class="media-heading"><?php echo $title; ?></h4></a>
              </div>
            </div>
          </div>
      <?php endif; ?>

    



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

<section class="comment-wrapper">
  <?php comments_template(); ?> 
</section>
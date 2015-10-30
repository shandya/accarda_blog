<?php
/**
 * The template for displaying mitmachen page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package accarda
 */

get_header();

wp_enqueue_media();
?>

<div class="body--page">
  <section class="record-spotlight-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <?php
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/content', 'post' );

              // If comments are open or we have at least one comment, load up the comment template.
              //if ( comments_open() || get_comments_number() ) :
              //  comments_template();
              //endif;
            endwhile; // End of the loop.
          ?>
        </div>
      </div>
    </div>
  </section>
</div>

<?php get_footer(); ?>

wp_enqueue_media();
<script>
  var media_uploader = null;

  function open_media_uploader_video(btn)
  {
    var $this = $(btn);
    var id = $this.data("field");
    media_uploader = wp.media();

    media_uploader.on("update", function(){
    });

    // When an image is selected in the media frame...
    media_uploader.on( 'select', function() {
      // Get media attachment details from the frame state
      var attachment = media_uploader.state().get('selection').first().toJSON();

      $(id).val(attachment.id);
      $this.parent().find('span').text(attachment.name);
    });

    media_uploader.open();
  }

  $(document).ready(function() {
    $('#post_content-html').remove();
    $('#post_content-tmce').trigger("click");
  });
</script>

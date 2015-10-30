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
      <div class="record-thumbnail" style="width: 300px; height: 300px; background-color: #DDD; cursor: pointer;" onclick="open_media_uploader_video(this)" data-field="#post_thumbnail">
        <img id="post_thumbnail_preview" src="#" alt="image" style="display: none; width: auto; height: 300px; transform: translate(-50%); margin-left: 50%;">
      </div>

      <header class="record-header text-center">
          <?php the_title( '<h2 class="record-title">', '</h2>' ); ?>
        <div class="row form-group">
            <div class="col-md-8 col-md-push-2 text-justify">
              <?php the_content(); ?>
            </div>
        </div>
      </header>
      <form method="post" class="front-end-form">
        <style>
          .wp-editor-container {
            clear: both;
            border: solid 1px #DDD;
          }
        </style>
        <?php wp_nonce_field('-accarda-nonce'); ?>
        <input id="post_thumbnail" name="post_thumbnail" type="hidden">
        <div class="form-group">
            <input name="post_title" class="form-control" placeholder="Titel" required>
        </div>
<!--         <div class="form-group">
            <input name="meta[subtitle]" class="form-control" placeholder="Subtitel">
        </div> -->
        <div class="form-group">
        <?php
        // default settings
        $content = '';
        $editor_id = 'post_content';
        $settings =   array(
            'wpautop' => true, // use wpautop?
            'media_buttons' => true, // show insert/upload button(s)
            'textarea_name' => $editor_id, // set the textarea name to something different, square brackets [] can be used here
            'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
            'tabindex' => '',
            'editor_css' => '', // intended for extra styles for both visual and HTML editors buttons, needs to include the <style> tags, can use "scoped".
            'editor_class' => '', // add extra class(es) to the editor textarea
            'teeny' => false, // output the minimal editor config used in Press This
            'dfw' => false, // replace the default fullscreen with DFW (supported on the front-end in WordPress 3.4)
            'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
            'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
        );
        wp_editor( $content, $editor_id, $settings );
        ?>
        </div>
        <div class="form-group">
          <label for="post_file">Anhange: <span></span></label><br>
          <input id="post_file" name="post_file" type="hidden">
          <a href="#" onclick="open_media_uploader_video(this)" data-field="#post_file" class="btn btn-accarda">Anhang hinzufügen</a>
        </div>
        <div class="form-group">
          <textarea id="meta_video_embed" name="meta[video_embed]" style="resize: none; width: 100%;" class="form-control" placeholder="Click the Embed link, copy the code (should be started with an <iframe> </iframe> tag) and paste here."></textarea>
        </div>
        <div class="text-right">
          <input name="submit" type="submit" value="Post senden" class="btn btn-accarda">
        </div>
      </form>
    </div>
  </div>
</article>
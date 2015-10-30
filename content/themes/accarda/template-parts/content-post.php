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
        <div class="record-thumbnail">
            <?php
            if ( has_post_thumbnail() ) {
                the_post_thumbnail( 'record-featured-image' );
            }
            ?>
        </div>

      <header class="record-header text-center">
        <div class="row form-group">
            <div class="col-md-8 col-md-push-2 text-justify">
              <?php the_content(); ?>
            </div>
        </div>
      </header>
      <form method="post" class="front-end-form">
        <?php wp_nonce_field('-accarda-nonce'); ?>
        <div class="row form-group">
            <label class="col-xs-2 label-control" style="padding-top: 15px;">
                Titel:
            </label>
            <div class="col-xs-10">
                <input type="text" name="post_title" class="form-control" placeholder="Titel" required />
            </div>
        </div>
          <div class="row form-group">
              <label class="col-xs-2 label-control" style="padding-top: 15px;">
                  Subtitel:
              </label>
              <div class="col-xs-10">
                  <input type="text" name="meta[subtitle]" class="form-control" placeholder="Subtitel" required />
              </div>
          </div>
          <div class="row form-group">
              <label class="col-xs-2 label-control" style="padding-top: 15px;">
                  Titlebild:
              </label>
              <div class="col-xs-10">
                  <input id="post_thumbnail" name="post_thumbnail" type="hidden">
                  <span></span>
                  <a href="#" onclick="open_media_uploader_video(this)" data-field="#post_thumbnail" class="btn btn-accarda">Titlebild hinzufügen</a>
              </div>
          </div>
          <div class="row form-group">
              <label class="col-xs-2 label-control" style="padding-top: 15px;">
                  Beitrag:
              </label>
              <div class="col-xs-10">
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
                      'default_editor' => 'tinymce',
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
          </div>
          <div class="row form-group">
              <label class="col-xs-2 label-control" style="padding-top: 15px;">
                  Anhange:
              </label>
              <div class="col-xs-10">
                  <input id="post_file" name="post_file" type="hidden">
                  <span></span>
                  <a href="#" onclick="open_media_uploader_video(this)" data-field="#post_file" class="btn btn-accarda">Anhang hinzufügen</a>
              </div>
          </div>
          <div class="row form-group">
              <label class="col-xs-2 label-control" style="padding-top: 15px;">
                  Videolink:
              </label>
              <div class="col-xs-10">
                  <input type="text" id="meta_video_embed" name="meta[video_embed]" style="resize: none; width: 100%;" class="form-control" />
              </div>
          </div>
        <div class="text-right">
          <input name="submit" type="submit" value="Post senden" class="btn btn-accarda">
        </div>
      </form>
    </div>
  </div>
</article>
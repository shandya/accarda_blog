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

get_header(); ?>

<div class="body--page">
  <section class="record-spotlight-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <?php
            while ( have_posts() ) : the_post(); 
              get_template_part( 'template-parts/content', 'page' ); 

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
  <div class="container">
    <div class="row">
      <div class="col xs-12">
        <hr style="border-top-color: #002341; margin-bottom: 4em;">
      </div>
    </div>
  </div>
  <section class="record-footer-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="section-header text-center">So einfach geht‘s!</h2>
        </div>
      </div>
      <div class="row">
        <?php
        if ( is_active_sidebar( 'sidebar-footer' ) ) {
          dynamic_sidebar( 'sidebar-footer' );
        } ?>        
      </div>
    </div>
  </section>
</div>

<?php get_footer(); ?>



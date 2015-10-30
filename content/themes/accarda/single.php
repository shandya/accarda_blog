<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package accarda
 */

get_header(); ?>

<div class="body--seite">
  <section class="page-content">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-9 content-wrapper">
          <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/content', 'single' ); ?>

            <?php
              // If comments are open or we have at least one comment, load up the comment template.
              //if ( comments_open() || get_comments_number() ) :
              //  comments_template();
              //endif;
            ?>

          <?php endwhile; // End of the loop. ?>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3 right-sidebar">
          <?php get_sidebar(); ?>
        </div>
      </div>
    </div>
  </section>
</div>
<?php get_footer(); ?>

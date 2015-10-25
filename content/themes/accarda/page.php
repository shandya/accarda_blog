<?php
/**
 * The template for displaying all pages.
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
              if ( is_page( 'impressum' ) ) {
                while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'template-parts/content', 'page-impressum' ); ?>

                <?php
                  // If comments are open or we have at least one comment, load up the comment template.
                  if ( comments_open() || get_comments_number() ) :
                    comments_template();
                  endif;
                ?>

              <?php endwhile; // End of the loop. 
              }
              else {

                while ( have_posts() ) : the_post(); ?>

                  <?php get_template_part( 'template-parts/content', 'page' ); ?>

                  <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                      comments_template();
                    endif;
                  ?>

                <?php endwhile; // End of the loop. 

              }
            ?>

        </div>
      </div>
    </div>
  </section>
</div>

<?php get_footer(); ?>



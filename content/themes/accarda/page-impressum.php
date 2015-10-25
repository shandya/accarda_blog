<?php
/**
 * The template for displaying page impressum
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

              get_template_part( 'template-parts/content', 'page-impressum' ); 

            endwhile; // End of the loop. 
          ?>
        </div>
      </div>
    </div>
  </section>
</div>

<?php get_footer(); ?>



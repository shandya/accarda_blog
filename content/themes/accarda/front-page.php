<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package accarda
 */

get_header(); ?>

<div class="body--index">

<section class="entry-spotlight-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <article class="entry entry-spotlight">

        <?php 

          $latest_blog_posts = new WP_Query( array( 'posts_per_page' => 1, 'post_type' => 'admin_post' ) );

          if ( $latest_blog_posts->have_posts() ) : 
            while ( $latest_blog_posts->have_posts() ) : 

              $latest_blog_posts->the_post();
              /*
               * Include the Post-Format-specific template for the content.
               * If you want to override this in a child theme, then include a file
               * called content-___.php (where ___ is the Post Format name) and that will be used instead.
               */
              get_template_part( 'template-parts/content', 'admin-post-spotlight' );

            endwhile; 
          endif; ?>
        </article> 
      </div>
    </div>
  </div>
</section>

<section class="entry-roll-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-9">
        <?php 

          $latest_blog_posts = new WP_Query( array( 'posts_per_page' => 5 ) );

          if ( $latest_blog_posts->have_posts() ) : 
            while ( $latest_blog_posts->have_posts() ) : 

              $latest_blog_posts->the_post();
              /*
               * Include the Post-Format-specific template for the content.
               * If you want to override this in a child theme, then include a file
               * called content-___.php (where ___ is the Post Format name) and that will be used instead.
               */
              get_template_part( 'template-parts/content', get_post_format() );

            endwhile; 
          endif; ?>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3 right-sidebar">
          <?php get_sidebar(); ?>
        </div>
      </div>
    </div>
  </section>
</div>

<?php get_footer(); ?>

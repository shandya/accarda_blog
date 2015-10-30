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
          /*
           * Custom Query for displaying the latest Admin Post
           */
          $latest_admin_blog_posts = new WP_Query( array( 'posts_per_page' => 1, 'post_type' => 'admin-post' ) );

          if ( $latest_admin_blog_posts->have_posts() ) : 
            while ( $latest_admin_blog_posts->have_posts() ) : 

              $latest_admin_blog_posts->the_post();
              /*
               * Include the Post-Format-specific template for the content.
               * If you want to override this in a child theme, then include a file
               * called content-___.php (where ___ is the Post Format name) and that will be used instead.
               */
              get_template_part( 'template-parts/content', 'admin-post-spotlight' );

            endwhile; 
          endif; ?>

          <?php wp_reset_query(); ?> 
        </article> 
      </div>
    </div>
  </div>
</section>

<section class="entry-roll-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-9 standard-post-wrapper">
        <?php 
          /*
           * Custom Query for displaying the latest regular Post
           */
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $latest_blog_posts = new WP_Query( array( 'paged' => $paged ) );

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
        <div class="col-xs-12 col-sm-4 col-md-3 index-sidebar">
          <?php get_sidebar(); ?>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 pagination-wrapper">
          <nav class="pagination-container">
            <?php if ( $latest_blog_posts->max_num_pages > 1 ) : ?>
              <p class="pagination-label"><?php echo __( 'Seite' ); ?></p>
              <?php
                $big = 999999999; // need an unlikely integer

                echo paginate_links( array(
                  'prev_next'          => True,
                  'prev_text'          => __('«'),
                  'next_text'          => __('»'),
                  'type'               => 'list',
                  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                  'format' => '?paged=%#%',
                  'current' => max( 1, get_query_var('paged') ),
                  'total' => $latest_blog_posts->max_num_pages
                ) );
              ?>
            <?php endif; ?>
          </nav>
        </div>
      </div>
      <?php wp_reset_query(); ?> 
    </div>
  </section>
</div>

<?php get_footer(); ?>

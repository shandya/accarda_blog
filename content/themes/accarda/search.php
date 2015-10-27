<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package accarda
 */

get_header(); ?>

<div class="body--archive">

<section class="entry-roll-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-9">

        <?php if ( have_posts() ) : ?>

          <header class="archive-header">
            <h1 class="archive-title"><?php printf( esc_html__( 'Search Results for: %s', 'accarda' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
          </header>

          <?php /* Start the Loop */ ?>
          <?php while ( have_posts() ) : the_post(); ?>

            <?php

              /*
               * Include the Post-Format-specific template for the content.
               * If you want to override this in a child theme, then include a file
               * called content-___.php (where ___ is the Post Format name) and that will be used instead.
               */
              get_template_part( 'template-parts/content', get_post_format() );
            ?>

          <?php endwhile; ?>

        <?php else : ?>

          <?php get_template_part( 'template-parts/content', 'none' ); ?>

        <?php endif; ?>

        </div>
        <div class="col-xs-12 col-sm-4 col-md-3 right-sidebar">
          <?php get_sidebar(); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 pagination-wrapper">
          <nav class="pagination-container">
            <?php include('pagination.php'); ?>
          </nav>
        </div>
      </div>
    </div>
  </section>
</div>

<?php get_footer(); ?>

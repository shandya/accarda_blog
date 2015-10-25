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

  <section class="entry-roll-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-9">

          <!-- <header class="archive-header">
            <h1 class="archive-title"><?php // echo get_the_title( get_option( 'page_for_posts' ) );?></h1>
          </header> -->

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

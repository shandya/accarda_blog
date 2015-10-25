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
          <a href="seite.html">
            <div class="row">
              <div class="col-md-12">
                <div class="entry-thumbnail">
                  <img src="http://lorempixel.com/1200/800" alt="">
                </div>
              </div>
              <div class="col-sm-5 col-md-4 col-lg-3 entry-body">
                <header class="entry-header">
                  <div class="entry-meta-info">
                    <a href="" class="category-link">lorem ipsum</a>
                  </div>
                  <h2 class="entry-title">
                    <a href="seite.html" class="entry-title-link">
                      Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.
                    </a>
                  </h2>
                </header>

                <div class="entry-content">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti quaerat facere sunt qui dolor doloremque vel cupiditate repellat temporibus cumque nesciunt tenetur assumenda odit, itaque obcaecati tempora suscipit iste deserunt hic eveniet dolorem perferendis sapiente. Saepe cum veniam perferendis at blanditiis, nihil neque minus eaque consequuntur laboriosam earum tempore, a magnam, placeat dicta praesentium ea similique commodi ut.</p>

                  <a href="seite.html" class="read-more-link">Jetzt Lesen <span class="icon-ico-chevron"></span></a>
                </div>
              </div>
            </div>
          </a>
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

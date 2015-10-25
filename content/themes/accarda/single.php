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
            <div class="col-xs-12 col-sm-8 col-md-9">

              <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'template-parts/content', 'single' ); ?>

                <?php //the_post_navigation(); ?>

                <?php
                  // If comments are open or we have at least one comment, load up the comment template.
                  //if ( comments_open() || get_comments_number() ) :
                  //  comments_template();
                  //endif;
                ?>

              <?php endwhile; // End of the loop. ?>

            <div class="shortcut-button-containers clearfix">
              <a href="">
                <div class="shortcut-button prev-shortcut-button pull-left">
                  <h5 class="button-label">Vorheriger Artikel</h5>
                  <p class="button-title">Lorem Ipsum Dolor Sit Ametnihil neque minus eaque consequuntur laboriosam earum tempore, a magnam, placeat dict</p>
                </div>
              </a>

              <a href="">
                <div class="shortcut-button next-shortcut-button pull-right">
                  <h5 class="button-label">Nachster Artikel</h5>
                  <p class="button-title">Deleniti quaerat facere sunt qui dolor doloremque vel cupiditate</p>
                </div>
              </a>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-3 right-sidebar">
            <article class="entry entry-sidebar">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="entry-thumbnail">
                      <img src="http://lorempixel.com/400/360" alt="">
                    </div>
                  </div>

                  <div class="col-xs-12 entry-body">
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
              </article>    
              <article class="entry entry-sidebar">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="entry-thumbnail">
                      <img src="http://lorempixel.com/400/360" alt="">
                    </div>
                  </div>

                  <div class="col-xs-12 entry-body">
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
              </article>
            </div>
          </div>
        </div>
      </section>
    </div>
<?php get_footer(); ?>

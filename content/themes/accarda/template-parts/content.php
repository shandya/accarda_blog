<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package accarda
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<div class="row">
		<div class="col-md-5">
			<div class="entry-thumbnail">

				<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'entry-thumbnail' );
					}
					else {
						echo '<img src="http://lorempixel.com/460/345" alt="">';
					}
				?>
			</div>
		</div>
	<div class="col-md-7 entry-body">
		<header class="entry-header">
			<div class="entry-meta-info">
				<a href="" class="category-link">lorem ipsum</a>
			</div>
			
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" class="entry-title-link" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		</header>
		<div class="entry-content">

			<?php the_content(); ?>

		</div>

			<div class="entry-footer">
				<div class="like-wrapper">

				</div>
			</div>
		</div>
	</div>
</article>
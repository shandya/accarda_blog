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

		<?php
			if ( has_post_thumbnail() ) :  ?>

		<div class="col-md-5 entry-thumbnail-wrapper">
			<div class="entry-thumbnail">
				<?php the_post_thumbnail( 'entry-thumbnail' ); ?>
			</div>
		</div>
	<div class="col-md-7 entry-body">
		<?php else : ?>
			<div class="col-md-12 entry-body">
		<?php endif; ?>

		<header class="entry-header">
	        <div class="post-meta-info">
				<?php echo get_post_meta(get_the_ID(), "subtitle", true); ?>
	        </div>
			
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" class="entry-title-link" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		</header>
		<div class="entry-content">

			<?php the_content(); ?>

		</div>

			<div class="entry-footer">
				<div class="like-wrapper">
          			<?php echo getPostLikeLink(get_the_ID());?>
				</div>
			</div>
		</div>
	</div>
</article>
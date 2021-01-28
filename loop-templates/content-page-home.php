<?php
/**
 * Partial template for content in home page template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	
	<div class="container home-page">
		<header class="entry-header">

			<?php the_title( '<h1 class="entry-title-home">', '</h1>' ); ?>

		</header><!-- .entry-header -->
		<div class="entry-content">

			<?php the_content(); ?>
			<?php echo activate_home_journey_repeater();?>
			<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
					'after'  => '</div>',
				)
			);
			?>

		</div><!-- .entry-content -->
	</div>

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

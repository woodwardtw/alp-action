<?php
/**
 * Single challenge partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	
	<div class="entry-content">
		<div class="col-md-8 offset-md-4 challenge-text">
			<?php echo acf_fetch_challenge();?>
			<!-- <div class="row challenge-details">
				<?php //echo acf_fetch_journey();?>
				<?php //echo acf_fetch_phase();?>
			</div> -->
			<div class="row challenge-submit">
				<div class="col-md-8 offset-md-2">
					<div class="big-participate">
				    <?php get_template_part('imgs/button_participate');?>
					</div>
				</div>
			</div>
			<?php the_content(); ?>
		</div>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

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
		<div class="col-md-11 offset-md-1 challenge-text">
			<?php echo acf_fetch_challenge();?>
			<!-- <div class="row challenge-details">
				<?php //echo acf_fetch_journey();?>
				<?php //echo acf_fetch_phase();?>
			</div> -->
			<div class="row challenge-submit">
				<div class="col-md-11">
					<div class="big-participate">
				    		<a data-toggle="collapse" href="#participate-area" role="button" aria-expanded="false" aria-controls="participate-area"><?php get_template_part('imgs/button_participate');?></a>
				</div>								
			</div>
			<div class="collapse col-md-11" id="participate-area">
					   <?php echo acf_fetch_submission_path();?>
			</div>

			<?php the_content(); ?>
			<?php activate_show_challenge_submissions();?>
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

<?php
/**
 * Single journey partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	
	<div class="entry-content">
		<div class="col-md-11 offset-md-1 challenge-text">
			<h1 class="center-label"><?php the_title();?></h1>	
		    <?php echo acf_fetch_journey_description();?>		
			<?php the_content(); ?>
			<div class="row journey-buttons">
				<div class="col-md-4"><a href="#expert-div" class="btn btn-primary btn-journey">Experts</a></div>
				<div class="col-md-4"><a href="#resources-div" class="btn btn-primary btn-journey">Resources</a></div>
				<div class="col-md-4"><a href="#challenge-div" class="btn btn-primary btn-journey">Challenges</a></div>
			</div>
			<div class="row journey-experts">
				<?php echo activate_expert_repeater();?>
			</div>
			<div class="row journey-resources">
				<?php echo activate_resource_repeater();?>
			</div>
			<div class="row">
				<?php echo activate_show_journey_submissions();?>
			</div>
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

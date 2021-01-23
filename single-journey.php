<?php
/**
 * The template for displaying all single journeys
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-journey-wrapper">

	<div class="container-fluid" id="content" tabindex="-1">
		
		<div class="star-holder">
			 <header class="entry-header d-flex justify-content-center align-items-center">
			 <img src="<?php echo get_template_directory_uri() . '/imgs/badge-' . $post->post_name . '.svg';?>" class="img-fluid journey-img" alt="<?php echo get_the_title();?> icon.">
			<?php //the_title( '<h1 class="entry-title '. $post->post_name .'">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		  <div id="starmap"></div>
        </div>

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'journey' );
					understrap_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				}
				?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();

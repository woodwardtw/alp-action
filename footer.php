<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">
	<footer class="container">

		<div class="row" id="footer">

							<div class="footer-widget col-md-4 col-sm-12">
								<div class="footer-brand">
									<a href="https://alplearn.com" aria-label="Advanced Learning Partnerships website.">
										<img src="https://alplearn.com/wp-content/themes/alp_rebirth/imgs/alp_footer_logo.svg">
									</a>
									<div class="copyright">© 2018 Advanced Learning Partnerships LLC</div>
								</div>
							</div>
							<div class="footer-widget address col-md-4 col-sm-12 ">
								<div class="footer-address">
									Advanced Learning Partnerships <br>
									PO Box 17254, Chapel Hill, NC 27516
								</div>
								<div class="footer-numbers">
									<span class="footer-phone">T: (919) 308-2636</span> 
									<a href="mailto:info@advancedpartnerships.com">info@advancedpartnerships.com</a>
								</div>
							</div>
							<div class="footer-widget col-md-2 col-6 footer-menu">
								<div class="menu-footer-menu-container">
									
								</div>		
							</div>
							<div class="footer-widget col-md-2 col-6 follow">
								<div class="menu-social-container">
									<ul id="menu-social" class="menu">
										<!-- <li id="menu-item-1531" class="twitter menu-item menu-item-type-custom menu-item-object-custom menu-item-1531">
											<a href="http://twitter.com/alplearn">Twitter</a>
										</li> -->
								</ul>
							</div>											
																															
						</div>	
																			
				</div><!-- row end -->

	</footer>



			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>


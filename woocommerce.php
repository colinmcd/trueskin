<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package true
 */

get_header(); 

?>

<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<div id="fullpage">
			
			<div class="section regular-page" style="padding-top:61px;">
				
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="height120"></div>
							
							<?php woocommerce_content(); ?>

						</div> <!-- col-xs-12 -->
					</div> <!-- row -->

				</div> <!-- container -->
				
			</div> <!-- section -->
			
			
			

		</div>

	</main><!-- #main -->
</div><!-- #primary -->
<div class="height120"></div>

<?php get_footer(); ?>
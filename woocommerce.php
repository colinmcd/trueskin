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

							<div class="">
								<div class="col-xs-12 border">
									<div class="mission">
										<div class="row">
											<div class="col-xs-12  border-bottom">
												<div class="mission-header">
													<img src="<?php echo $image ?>" alt="">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6 col-xs-12 mission-mission border-right border-bottom">
												<div class="padding">
													<h3>
														Mission:
													</h3>
													
													<?php echo $mission ?>
												</div>
											</div>
											<div class="col-sm-6 col-xs-12 border-bottom">
												<div class="padding">
													<h3>
														WHAT WE DO:
													</h3>
												
													<?php echo $what_we_do ?>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12 border-bottom">
												<div class="padding">
													<h3>
														What we are
													</h3>
													<div class="mission-who-we-are">
														<?php echo $who_we_are ?>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12 border-bottom">
												<div class="padding">
													<h3>
														How you join
													</h3>
													<div class="mission-how-you-join">
														<?php echo $how_you_join ?>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12">
												<div class="mission-email">
													<a href="mailto:yes@true.ink">yes@true.ink</a>
												</div>
											</div>
										</div>
									</div> <!-- mission -->

								</div>
							</div> <!-- row -->

						</div> <!-- col-xs-12 -->
					</div> <!-- row -->

				</div> <!-- container -->
				
			</div> <!-- section -->
			
			
			

		</div>

	</main><!-- #main -->
</div><!-- #primary -->
<div class="height120"></div>
<?php get_footer(); ?>
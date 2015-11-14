<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package true
 */

get_header();

	
	//information
	$id =              get_the_id();  //get current product id


	$image =  get_field('logo',$id);
	$mission =   get_field('mission',$id);
	$what_we_do = get_field('what_we_do', $id);
	$who_we_are = get_field('who_we_are', $id);
	$how_you_join = get_field('how_you_join', $id);


?>



<section id="primary" class="content-area" style="background-color:#FFFFDE">
		<main id="main" class="site-main" role="main">
		
		<div id="fullpage">
			
			<div class="section regular-page" style="padding-top:10px;">
				
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="height120" style="background-color:#FFFFDE"></div>

							<div class="">
								<div class="col-xs-12 border">
									<div class="mission">
										<div class="row">
											<div class="col-xs-12  border-bottom">
												<div class="mission-header">
													<center><h3>Wrong turn... We'll steer you straight.</h3></center><!-- img src="<?php echo $image ?>" alt="" -->
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6 col-xs-12 mission-mission border-right border-bottom">
												<div class="padding">
													<h3>
														Our Mission:
													</h3>
													
We <a href="http://true.ink/membership.php">celebrate</a> the core ingredients of rich, rewarding, hands-on living. That’s authenticity, individualism, and expertise.												</div>
											</div>
											<div class="col-sm-6 col-xs-12 border-bottom">
												<div class="padding">
													<h3>
														WHAT WE DO:
													</h3>
												
We make little stories, big stories, <a href="http://true.ink/product-category/kitchen/">memorable food</a>, <a href="http://true.ink/bradycakes/bradycakes.php">videos</a>, seasonal <a href="http://true.ink/product/winter-heat-hot-sauce/">hot sauce</a>, and an exotic range of <a href="http://true.ink/#library">tales</a> and <a href="http://true.ink/product-category/supply/">goods</a>.

												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12 border-bottom">
												<div class="padding">
													<h3>
														Who we are:
													</h3>
													<div class="mission-who-we-are">
<a href="true.ink/story/welcome">Inspired</a> by the pulpy magazines of the 1950’s, True’s roster of talent includes Pulitzer Prize winners, other writers and storytellers, technoligists, one matador, an expert falconer, a few boxers and their trainers, a master artist currently in solitary confinement, and many others.

													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12 border-bottom">
												<div class="padding">
													<h3>
														How you join:
													</h3>
													<div class="mission-how-you-join">
We’re growing and need hands. What’s your expertise? We’ll fit you in. <a href="http://eepurl.com/6rHCb">Sign up right here</a>. Write us right now:

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
<div class="height120" style="background-color:#FFFFDE"></div>

<?php get_footer(); ?>

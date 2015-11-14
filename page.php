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



	//information
	$id =              get_the_id();  //get current product id


	$image =  get_field('logo',$id);
	$mission =   get_field('mission',$id);
	$what_we_do = get_field('what_we_do', $id);
	$who_we_are = get_field('who_we_are', $id);
	$how_you_join = get_field('how_you_join', $id);


?>



<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<div id="fullpage">

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			// End the loop.
			endwhile;
			?>
			
			<div class="section regular-page" style="padding-top:61px;">
				
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="height120"></div>

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
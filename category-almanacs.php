<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package true
 */

$queried = get_queried_object();



$i = 1;
$heightArr = array(550,550,550,550,550,550,550,550,550,550,550,550);
$widthArr = array(12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12);


get_header(); ?>

<style>
.mctb-bar {display:none!important}
.archive .smaller.mitem .inner-content {
	height:51px !important;
	padding:0px;
	background-color:white;
}
	#myVideo {position:absolute!important}
@media only screen and (max-width: 480px) {
#mailchimptopbar {display:none!important}
.mctb-bar {display:none!important}
}
  </style>



	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<div id="fullpage">
		  <div class="almanac-body">
 
             
			<div class="section" id="category" style="padding-top:60px;">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
								<!-- div class="height120"></div -->
								<div id="mansory22">

									<?php 
										if($queried->taxonomy == "library" &&  ot_get_option("stories_order")) {
											
											get_trade_posts();

										}
										else {
 									?>

									<?php if ( have_posts() ) : ?>
				
					
									<?php while ( have_posts() ) : the_post(); ?>
										<?php
											$smallFontClass = ($i > 0?'smaller ':'');
											$post_id = get_the_id();
											// $title = (get_field('main_title',$post_id)?get_field('main_title',$post_id):get_the_title($post_id));
											$title = get_the_title($post_id);
											$lead_quote = "“".(get_field('lead-quote',$post_id) ? get_field('lead-quote',$post_id) : get_the_title($post_id))."”";
				
										?>
										<div class="<?php echo $smallFontClass ?>mitem col-md-<?php echo $widthArr[$i] ?> col-xs-12" style="height:<?php echo $heightArr[$i] ?>px;" data-height="<?php echo $heightArr[$i] ?>" data-id="<?php echo $post_id ?>">
											
											<?php if($i==0) { ?>
												<div class="inner-mitem col-md-12 col-xs-12" style="background:url('<?php echo get_field('main_image',$post_id) ?>') no-repeat transparent; background-position:center;">
											<?php } else { ?>
											<div class="inner-mitem col-md-12 col-xs-12">
											<?php } ?>

												<div class="row">

													<div class="inner-border">
													
																<?php if($i ==0) {?> 
																<div class="dtable inner-content" style="display: table; height: 100%; width: 100%;">
																	<div class="dmiddle" style="display:table-cell; vertical-align:middle;">
																	<div class="cover"></div>
																<?php } else { ?>
																	<div class="dtable inner-content" style="">
																<div class="dmiddle" style="">
																<?php } ?>
																<center class="above">
																	<div class="small-post-image-title"><?php echo ($i > 0)?strip_tags($title):$title ?></div>
																	<?php if($i == 0) { ?>
																	<div class="height25"></div>
																	<?php } ?>
																	<!-- <div class="small-post-image-caption"><?php echo ($i > 0)?strip_tags($secondary_title):$secondary_title ?></div> -->
																</center>
															</div>
														</div>
														

														<?php if($i > 0) { ?>
															<a href="<?php echo get_permalink($post_id) ?>"><div class="archive-tile" style="position:relative; height:404px; background:url('<?php echo get_field('main_image',$post_id) ?>') no-repeat transparent; background-size: cover; background-position:center; border-top:1px solid #000;">
																<div class="cover"></div>
									                        	<!-- div class="quote">
																	<div class="dtable" style="display: table; height: 100%; width: 100%;">
																	    <div class="dmiddle" style="display:table-cell; vertical-align:middle;">
																			<center class="quote">
																				<?php echo $lead_quote ?>
																			</center>
																		</div>
																	</div>
									                        	</div -->
															</div></a>
														<?php } ?>

														
														<div class="bottom-action">
															<div style="display:none!important" class="share social col-sm-6 col-xs-12">
																<div class="row">
																	<div class="share-text" style="padding:0;">
									                                    Share
									                                </div>
									                                <ul class="icons" style="font-size: 20px; height: 40px; line-height: 40px;">
									                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
									                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
									                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
									                                    <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
									                                </ul>
																</div>
															</div>
															<?php $btnColor = $i<2?' yellow':'' ?>
															<a href="<?php echo get_permalink($post_id) ?>" class="read col-sm-6 col-xs-12 <?php echo $btnColor ?>" style="background-color:#F1F833; width:100%!important">go</a>
														</div>
													</div>
												</div>
											</div>
										</div>	
				
									<?php $i++; ?>
									<?php endwhile; ?>
				
								<?php endif; ?>	
								
								</div>
								<!-- div class="height120"></div -->
						</div>
					</div>

					<?php } ?>

				</div>
				
				
			</div>
			
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>


		</div>

       
        <div class="almanac-footer" style="color:black">
        	&copy; 2015 True The Magazine, Inc
        </div>


		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
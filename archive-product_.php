<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package true
 */

$i = 0;
$heightArr = array(550,550,550,550,550,550,550,550,550,550,550,550);
$widthArr = array(12, 8, 4, 4, 4, 4, 8, 4, 4, 4, 4);


get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<div id="fullpage">
			<div class="section" id="category" style="padding-top:61px;">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
								<div class="height120"></div>
								<div id="mansory22">
									<?php if ( have_posts() ) : ?>
				
					
									<?php while ( have_posts() ) : the_post(); ?>
										<?php
											$smallFontClass = ($i > 0?'smaller ':'');
											$post_id = get_the_id();
											$title = (get_field('main_title',$post_id)?get_field('main_title',$post_id):get_the_title($post_id));
											$secondary_title = get_field('secondary_title',$post_id);
				
										?>
										<div class="<?php echo $smallFontClass ?>mitem col-md-<?php echo $widthArr[$i] ?> col-xs-12" style="height:<?php echo $heightArr[$i] ?>px;" data-id="<?php echo $post_id ?>">
											
											<?php if($i==0) { ?>
												<div class="inner-mitem col-md-12 col-xs-12" style="background:url('<?php echo get_field('main_image',$post_id) ?>') no-repeat transparent; ">
											<?php } else { ?>
											<div class="inner-mitem col-md-12 col-xs-12">
											<?php } ?>

												<div class="row">
													<div class="inner-border">
														<?php if($i > 0) { ?>
															<div style="height:380px; background:url('<?php echo get_field('main_image',$post_id) ?>') no-repeat transparent; background-size: cover; border-bottom:2px solid #000;"></div>
														<?php } ?>

														<div class="dtable inner-content" style="display: table; height: 100%; width: 100%;">
															<div class="dmiddle" style="display:table-cell; vertical-align:middle;">
																<?php if($i ==0) {?> 
																	<div class="cover"></div>
																<?php } ?>
																<center class="above">
																	<div class="small-post-image-title"><?php echo ($i > 0)?strip_tags($title):$title ?></div>
																	<?php if($i == 0) { ?>
																	<div class="height25"></div>
																	<?php } ?>
																	<div class="small-post-image-caption"><?php echo ($i > 0)?strip_tags($secondary_title):$secondary_title ?></div>
																</center>
															</div>
														</div>
														
														<div class="bottom-action">
															<div class="share">
																<span>
																	give
																</span>
																<ul class="social-share">
																	<li class='adad'><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($post_id) ?>" class="icon-facebook-squared" target="_blank"></a></li>
																	<li class='dadad'><a href="#" class="icon-gplus-squared" target="_blank"></a></li>
																	<!-- <li class='icon-mail-squared'></li> -->
																</ul>
															</div>
															<?php $btnColor = $i<3?' yellow':'' ?>
															<a href="<?php echo get_permalink($post_id) ?>" class="read <?php echo $btnColor ?>">go</a>
														</div>
													</div>
												</div>
											</div>
										</div>	
				
									<?php $i++; ?>
									<?php endwhile; ?>
				
								<?php endif; ?>	
								
								</div>
								<div class="height120"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

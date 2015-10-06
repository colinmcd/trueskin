<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<div class="menu-example">
			<a href="#" class="logo">
				<img src="<?php echo bloginfo('stylesheet_directory') ?>/images/logo.png" alt="True Magazine" />
			</a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => '','container_class' => 'true-menu' ) ); ?>
		</div>
		<div class="search">
			<form action="<?php echo WP_HOME; ?>">
				<input type="text" placeholder="and you are looking for?" name="s" />
			</form>
		</div>
		
		<div id="fullpage">
			
			<div class="section read" id="product" style="padding-top:61px;">
				
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="height100"></div>
								<div class="content">
									<div style="overflow:hidden">
										<div class="col-md-12" style="padding: 7px;">
											<div class="bordered" style="border:2px solid black; overflow:hidden;">
													
													<div style="width:50%; float:left; height:675px; border-right: 2px solid #000; position:relative;">
														<div style="height:543px; border-bottom:2px solid black;">
															<div class="cycle-slideshow" 
														        data-cycle-fx=scrollHorz
														        data-cycle-timeout=0
														        data-cycle-prev="#prev"
														        data-cycle-next="#next"
														        data-cycle-slides="> div"
														        data-cycle-caption="#custom-caption"
    															data-cycle-caption-template="{{slideNum}} / {{slideCount}}"
														        >
														        <div class="product-slider" style="background:url(http://allmounta.in/images/image1.jpg) no-repeat 0 0 transparent; background-size: cover;"></div>
														        <div class="product-slider" style="background:url(http://allmounta.in/images/image2.jpg) no-repeat 0 0 transparent; background-size: cover;"></div>
														        <div class="product-slider" style="background:url(http://allmounta.in/images/image3.jpg) no-repeat 0 0 transparent; background-size: cover;"></div>
														        <div class="product-slider" style="background:url(http://allmounta.in/images/image4.jpg) no-repeat 0 0 transparent; background-size: cover;"></div>
														    </div>
														</div>
														<div style="height:45px; border-bottom:2px solid black;">
															<div class="">
																
																<div class="col-md-12" style="height:45px;"><div id="prev"></div><div id="next"></div><center><div id="custom-caption" class="center"></div></center></div>
																
															</div>
															
														</div>
														<div class="bottom-action">
															<div class="share">
																<span>
																	Share
																</span>
																<ul class="social-share">
																	<li class="adad"><a href="https://www.facebook.com/sharer/sharer.php?u=http://localhost/true/?story=tiger" class="icon-facebook-squared" target="_blank"></a></li>
																	<li class="dadad"><a href="#" class="icon-gplus-squared" target="_blank"></a></li>
																	<!-- <li class='icon-mail-squared'></li> -->
																</ul>
															</div>
														</div>
													</div>
													<div style="width:50%; float:left; height:675px;">
														<div style="height:237px; border-bottom:2px solid black;">
															<div class="product-title">
																<?php echo get_field('main_title',get_the_id()); ?>
															</div>
															<div class="height17"></div>
															<div class="product-specs">
																6¾"W x 4"H x 2"D<br />
																100% pure virgin wool exterior <br />
																Imported
															</div>
														</div>
														<div style="height:45px; border-bottom:2px solid black;">
															<div class="row">
																<div class="col-md-3 product-price" style="">
																	<div style="overflow:hidden;position: absolute;width: 100%;">25$</div>
																</div>
																<div class="col-md-9 product-made-by" style="height:45px;">Made by Pendleton in the USA.</div>
															</div>
															
														</div>
														<div style="height:195px; border-bottom:2px solid black;">
															<div class="product-description">
																<?php echo apply_filters('the_content', get_post_field('post_content', get_the_id())); ?>
															</div>
														</div>
														<button type="submit"
														    data-quantity="1" data-product_id="<?php echo get_the_id(); ?>"
														    class="button custom_buy alt add_to_cart_button product_type_simple">
														    Buy
														</button>
													</div>
													
												
											</div>
										</div>
									</div>
									<div class="height120"></div>
									<div class="take-your-pick">
										take your pick
									</div>
									<div style="overflow:hidden"><?php dummy() ?>
										<?php dummy() ?>
										<?php dummy() ?></div>

								</div>
							<div class="height57"></div>

						</div>
					</div>

				</div>
				<div class="scroll-to-top">top</div>
				<div class="footer">
					<div class="credits">
						® 2014 TRUE THE MAGAZINE. ALL RIGHTS RESERVED.
					</div>
					<div class="social">
						<a target="_blank" href="http://www.facebook.com/" class="facebook"></a>
						<a target="_blank" href="http://www.twitter.com/" class="twitter"></a>
					</div>
				</div>
			</div>
			
			
			

		</div>

	</main><!-- #main -->
</div><!-- #primary -->

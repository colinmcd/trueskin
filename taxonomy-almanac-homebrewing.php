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

get_header(); 


// echo check_user_agent('mobile'); die;


$i = 1;
$heightArr = array(550,550,550,550,550,550,550,550,550,550,550,550);
$widthArr = array(12, 12, 12, 12, 12, 12, 12);



function getHomePageVideo($id) {
$video = get_field('video','options');
$image = get_field('home_page_background_image','options');
	if($video && !check_user_agent('mobile')) {
		?>
			<video autoplay loop muted id="myVideo" style="position: fixed; z-index: 0;">
  				<source src="<?php echo $video ?>" type="video/mp4">
   			</video>

		<?php
	}
	else {
		?>
			<div style="background:url('<?php echo $image ?>') no-repeat center center transparent; position:fixed; left:0; top:0; height:100%; width:100%;background-size: cover; "></div>
		<?php
	}
}





?>

<style>
.mctb-bar {display:none!important}
.down-arrow {border:none!important}
.archive .smaller.mitem .inner-content {
	height:73px !important;
	padding:0px;
	background-color:white;
}
@media only screen and (max-width: 480px) {
#mailchimptopbar {display:none!important}
.mctb-bar {display:none!important}
}
  </style>


<div class="story-cover" style="overflow:hidden; position: relative; z-index: 1;">
  
	<?php getHomePageVideo(get_the_id()); ?>
	 <div class="almanac-header">
            <a href="http://www.true.ink"><div class="logo"></div></a>
            <h1 style="letter-spacing:14px; font-size:80p; z-index:10; position:relative">Almanac</h1>
            <!-- p class="subtitle" style="font-size:30px!important; color:white!important">Volume II</p -->
            <h2 style="font-style:none!important">Home Brewing</h2>
            <div class="down-arrow bounce animated animation-name"></div>
        </div> 
	<!-- i class="fa fa-angle-down down-arrow"></i -->
</div>




	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<div id="fullpage">
		  <div class="almanac-body" style="background-image:url('http://true.ink/wp-content/uploads/2015/10/brew-cover.jpg')">

<section id="todo" style="color:#000;">
                <div class="story-box" style="background-color:white!important">
                    <div class="todo-box-row">
                    <div class="story-box-cell story-box-title" style="background-color:black!important; color:white!important">
                            <h4 style="font-size:30px!important">INDEX</h4>
                        </div>
                        <div class="story-box-cell todo-box-number">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//true.ink/almanacs/home-brewing/" target="_blank" class="fa-stack fa-lg" style="display:inline; margin-right:12px">
                <i class="fa fa-circle fa-stack-2x" style="color:black; left:-69px; top:-4px; font-size: 1.5em !important"></i>
                <i class="fa fa-facebook fa-stack-1x" style="color:white; left:-60px; top:-10px; font-size: 1em !important;"></i>
            </a>
            <a href="https://twitter.com/home?status=http%3A//true.ink/almanacs/home-brewing/" target="_blank" class="fa-stack fa-lg" style="display:inline; margin-right:12px; z-index:99999;">
                <i class="fa fa-circle fa-stack-2x" style="left:-24px; top:-4px; color:black; font-size: 1.5em !important"></i>
                <i class="fa fa-twitter fa-stack-1x" style="left:-19px; top: -10px; color:white; font-size: 1em !important;"></i>
            </a>   
            </div>
                    </div>
                    <div class="todo"><a href="http://true.ink/story/vinnys-magical-boatmobile/" target="_blank">1. The Worm-Infested, Basement-Born, Heirloom Apple Time Machine</a></div>
                    <div class="todo"><a href="http://true.ink/story/how-to-build-a-houseboat/" target="_blank">2. How To Turn Your Bike Into A Cider Press</a></div>
                    <div class="todo"><a href="http://true.ink/story/disaster-ark/" target="_blank">3. Vinny’s Prison Hooch</a></div>
                    <div class="todo"><a href="http://true.ink/story/nymph-cedar-sairy-gamp-canoe/" target="_blank">4. Secrets of Roasting Your Own Coffee Beans</a></div>
                    <div class="todo"><a href="http://true.ink/story/salmon-salad/" target="_blank">5. Hard Cider Marshmallows
</a></div>
                    <!-- img class="story-box-img" src="http://true.ink//wp-content/uploads/2015/08/knives-long.jpg" -->
                    <!-- div class="story-box-description">
                        <p>After spending his childhood hacking away at fresh catch, John Filippi of central Minnesota has perfected his own handcrafted line of efficient, durable fillet knives. They're not hard to look at either.</p>
                    </div -->
                    <div class="todo-box-row" style="border-bottom:0px!important; border-left:0px!important; border-top:1px black solid!important">
                     <!-- div class="story-box-cell story-box-title" style="width:50%!important; background-color:#F1F833!important; color:black!important">
                            <h4 style="font-size:24px!important; text-align:center">WIN THIS KNIFE</h4>
                        </div -->
                        <div class="story-box-cell todo-box-number" style="border-left:0px!important; width:100%!important; background-color:#F1F833!important">
                       <a style="color:black!important" href="http://true.ink/cider/"><h4 style="font-size:30px!important; font-weight:bold; letter-spacing:3px; line-height: 40px; text-align:center; font-family:brandon-grotesque;">WIN AN EXTRAORDINARY ORCHARD RUN</h4></a>
            </div>
                </div>
             </section>   
             
			<div class="section" id="category" style="padding-top:1px;">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
								<div class="height120"></div>
								<div id="mansory22">

									<?php 
										if($queried->taxonomy == "almanac" &&  ot_get_option("stories_order")) {
											
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
															<div class="archive-tile" style="position:relative; height:404px; background:url('<?php echo get_field('main_image',$post_id) ?>') no-repeat transparent; background-size: cover; background-position:center; border-top:1px solid #000;">
																<div class="cover"></div>
									                        	<div class="quote">
																	<div class="dtable" style="display: table; height: 100%; width: 100%;">
																	    <div class="dmiddle" style="display:table-cell; vertical-align:middle;">
																			<center class="quote">
																				<?php echo $lead_quote ?>
																			</center>
																		</div>
																	</div>
									                        	</div>
															</div>
														<?php } ?>

														
														<div class="bottom-action">
															<div class="share social col-sm-6 col-xs-12">
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
															<a href="<?php echo get_permalink($post_id) ?>" class="read col-sm-6 col-xs-12 <?php echo $btnColor ?>">go</a>
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

					<?php } ?>

				</div>
				
				
			</div>
			
		   <section id="todo" style="color:#000;">
                <div class="story-box" style="background-color:white!important">
                    <div class="todo-box-row">
                    <div class="story-box-cell story-box-title" style="background-color:black!important; color:white!important">
                            <h4 style="font-size:30px!important">TO-DO</h4>
                        </div>
                        <div class="story-box-cell todo-box-number">
                        <a href="http://www.facebook.com/truedotink" target="_blank" class="fa-stack fa-lg" style="display:inline; margin-right:12px">
                <i class="fa fa-circle fa-stack-2x" style="color:black; left:-69px; top:-4px; font-size: 1.5em !important"></i>
                <i class="fa fa-facebook fa-stack-1x" style="color:white; left:-60px; top:-10px; font-size: 1em !important;"></i>
            </a>
            <a href="http://www.twitter.com/truedotink" target="_blank" class="fa-stack fa-lg" style="display:inline; margin-right:12px; z-index:99999;">
                <i class="fa fa-circle fa-stack-2x" style="left:-24px; top:-4px; color:black; font-size: 1.5em !important"></i>
                <i class="fa fa-twitter fa-stack-1x" style="left:-19px; top: -10px; color:white; font-size: 1em !important;"></i>
            </a>   
            </div>
                    </div>
                    <div class="todo"><a href="mailto:yes@true.ink?subject=Construction crew&body=Drop me a line when Roy's next boat ups the ante: http://true.ink/story/how-to-build-a-houseboat/">1. Build a Houseboat With Roy</a></div>
                    <div class="todo"><a href="http://true.ink/story/salmon-salad/" target="_blank">2. Send This Sailor’s Tale to a Mentor</a></div>
                    <div class="todo"><a href="http://www.true.ink/giveaways/boat/" target="_blank">3. Win John Fillippi’s Fillet Knife</a></div>
                    <div class="todo"><a href="http://www.true.ink/housewarming/" target="_blank">4. RSVP for Our Massive Paella Feast</a></div>
                    <div class="todo"><a href="http://www.tienda.com/products/padron-peppers-peregrino-vg-08.html" target="_blank">7. Bring The Padron Peppers?</a></div>
                    <div class="todo"><a href="http://www.narragansettbeer.com/wheretobuy" target="_blank">5. Gonna Need Beer, Too</a></div>
                    <div class="todo"><a href="http://trucedesigns.com/products/duffle-1" target="_blank">6. And a Sailcloth Duffel to Carry It All</a></div>
                    <div class="todo"><a href="http://true.ink/story/jobs/" target="_blank">7. Join Our Crew</a></div>
					<div class="todo" style="border-bottom:0px!important;"><a href="mailto:FRIENDS?subject=Let's hit the water&body=Hey mates, feeling inspired: http://true.ink/almanacs/boat-building/">8. Hit The Water</a></div>

                    <!-- img class="story-box-img" src="http://true.ink//wp-content/uploads/2015/08/knives-long.jpg" -->
                    <!-- div class="story-box-description">
                        <p>After spending his childhood hacking away at fresh catch, John Filippi of central Minnesota has perfected his own handcrafted line of efficient, durable fillet knives. They're not hard to look at either.</p>
                    </div -->
                    <div class="todo-box-row" style="border-bottom:0px!important; border-top:2px black solid!important">
                     <div class="story-box-cell story-box-title" style="width:50%!important; background-color:#F1F833!important; color:black!important">
                            <h4 style="font-size:24px!important; text-align:center">UP NEXT</h4>
                        </div>
                        <div class="story-box-cell todo-box-number" style="width:50%!important; background-color:black!important; color:white!important">
                       <h4 style="font-size:24px!important; font-style:italic; font-weight:normal; letter-spacing:3px; text-align:center; font-family:adobe-caslon-pro; line-height: 44px;">Tennis Tactics</h4>
            </div>
                </div>
             </section> 
		</div>
  
       
        <div class="almanac-footer" style="color:black">
        	&copy; 2015 True The Magazine, Inc
        </div>


		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
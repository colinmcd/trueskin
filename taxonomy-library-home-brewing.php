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
  				<source src="http://true.ink/wp-content/uploads/2014/09/applesgifconvert.mp4" type="video/mp4">
   			</video>

		<?php
	}
	else {
		?>
			<div style="background:url('http://true.ink/wp-content/uploads/2015/10/apples-hold.jpg') repeat center center; left:0; top:0; height:100%; position:absolute; width:100%;background-size: cover; "></div>
		<?php
	}
}





?>

<style>
.mctb-bar {display:none!important}
.down-arrow {border:none!important}
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


<div class="story-cover" style="overflow:hidden; position: relative; z-index: 1;">
  
	<?php getHomePageVideo(get_the_id()); ?>
	 <div class="almanac-header">
            <a href="http://www.true.ink"><div class="logo"></div></a>
            <h1 style="letter-spacing:14px; font-size:80px; z-index:10; position:relative">Almanac</h1>
            <!-- p class="subtitle" style="font-size:30px!important; color:white!important">Volume II</p -->
            <h2 style="font-style:none!important">Home Brewing</h2>
            <div class="down-arrow bounce animated animation-name"></div>
        </div> 
	<!-- i class="fa fa-angle-down down-arrow"></i -->
</div>




	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<div id="fullpage">
		  <div class="almanac-body" style="background-image:url('http://true.ink//wp-content/uploads/2015/10/brown-bg.jpg')">

<!-- section id="todo" style="color:#000;">
                <div class="story-box" style="background-color:white!important">
                    <div class="todo-box-row">
                    <div class="story-box-cell story-box-title" style="background-color:black!important; color:white!important">
                            <h4 style="font-size:30px!important">INDEX</h4>
                        </div>
                        <div class="story-box-cell todo-box-number">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//true.ink/library/home-brewing/" target="_blank" class="fa-stack fa-lg" style="display:inline; margin-right:12px">
                <i class="fa fa-circle fa-stack-2x" style="color:black; left:-69px; top:-4px; font-size: 1.5em !important"></i>
                <i class="fa fa-facebook fa-stack-1x" style="color:white; left:-60px; top:-10px; font-size: 1em !important;"></i>
            </a>
            <a href="https://twitter.com/home?status=http%3A//true.ink/library/home-brewing/" target="_blank" class="fa-stack fa-lg" style="display:inline; margin-right:12px; z-index:99999;">
                <i class="fa fa-circle fa-stack-2x" style="left:-24px; top:-4px; color:black; font-size: 1.5em !important"></i>
                <i class="fa fa-twitter fa-stack-1x" style="left:-19px; top: -10px; color:white; font-size: 1em !important;"></i>
            </a>   
            </div>
                    </div>
                    <div class="todo"><a href="http://true.ink/story/andy-brennan-apple-cider-tales/" target="_blank">1. The Worm-Infested, Basement-Born, Heirloom Apple Time Machine</a></div>
                                        <div class="todo"><a href="http://true.ink/story/how-to-turn-bike-into-cider-press/" target="_blank">2. Turn Your Bike Into A Cider Press</a></div>
                                        <div class="todo"><a href="http://true.ink/story/prison-hooch-brewing-recipe/" target="_blank">3. Vinny’s Prison Hooch Recipe</a></div>
                    <div class="todo"><a href="http://true.ink/story/james-freeman-blue-bottle-coffee-founding-recipe/" target="_blank">4. Art of the Home Roast</a></div>
                                       <div class="todo-box-row" style="border-bottom:0px!important; border-left:0px!important; border-top:1px black solid!important">
                        <div class="story-box-cell todo-box-number" style="border-left:0px!important; width:100%!important; background-color:#F1F833!important">
                       <a style="color:black!important" href="http://true.ink/cider/"><h4 style="font-size:24px!important; font-weight:bold; letter-spacing:3px; line-height: 40px; text-align:center; font-family:brandon-grotesque;">Press Some Cider With Us?</h4></a>
            </div>
                </div>
             </section -->   
             
			<div class="section" id="category" style="padding-top:30px;">
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
									                        	<div class="quote">
																	<div class="dtable" style="display: table; height: 100%; width: 100%;">
																	    <div class="dmiddle" style="display:table-cell; vertical-align:middle;">
																			<center class="quote">
																				<?php echo $lead_quote ?>
																			</center>
																		</div>
																	</div>
									                        	</div>
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
                    <div class="todo"><a href="http://true.ink/cider/" target="_blank">1. Hit the Abandoned Orchards With Andy</a></div>
                    <div class="todo"><a href="http://www.mountainfeed.com/collections/homebrewing/products/diy-make-your-own-hard-cider-kit" target="_blank">2. Prepare With Your Own Cider Making Kit</a></div>
                    <div class="todo"><a href="https://mombucha.wordpress.com/" target="_blank">3. Learn the Powers of Fermented Tea from Our Friend Rich</a></div>
                    <div class="todo"><a href="https://food52.com/users/33-veronica" target="_blank">4. Save Apples for Veronica’s Cake</a></div>
                    <div class="todo"><a href="https://www.sweetmarias.com/product/guatemala-proyecto-xinabajul-pena-roja" target="_blank">5. Pair With These Magic Beans from Guatemala</a></div>
                    <div class="todo"><a href="https://www.sweetmarias.com/product/stovetop-roasting-starter-kit" target="_blank">6. Roasted With This Nifty Stovetop Contraption</a></div>
                    <div class="todo"><a href="http://www.amazon.com/gp/product/B003EEGDSM/ref=as_li_tl?ie=UTF8&camp=1789&creative=390957&creativeASIN=B003EEGDSM&linkCode=as2&tag=trueink-20&linkId=5ZPRZAYHMKOQD7DJ" target="_blank">7. Hand-Ground With This Canister Grinder</a></div>
                                        <div class="todo"><a href="http://www.amazon.com/gp/product/B0016OBCTC/ref=as_li_tl?ie=UTF8&camp=1789&creative=390957&creativeASIN=B0016OBCTC&linkCode=as2&tag=trueink-20&linkId=HMRX6BZR4COXNA3T" target="_blank">8. Blasted To Perfection With This Trusted Pavoni</a></div>
                    <div class="todo"><a href="http://true.ink/story/jobs/" target="_blank">9. Join Our Crew</a></div>
                    <div class="todo"><a href="http://true.ink/story/a-true-housewarming/" target="_blank">10. Oh yeah - you see our Massive Paella Party pics yet?</a></div>

                    <!-- img class="story-box-img" src="http://true.ink//wp-content/uploads/2015/08/knives-long.jpg" -->
                    <!-- div class="story-box-description">
                        <p>After spending his childhood hacking away at fresh catch, John Filippi of central Minnesota has perfected his own handcrafted line of efficient, durable fillet knives. They're not hard to look at either.</p>
                    </div -->
                    <!-- div class="todo-box-row" style="border-bottom:0px!important; border-top:2px black solid!important">
                     <div class="story-box-cell story-box-title" style="width:50%!important; background-color:#F1F833!important; color:black!important">
                            <h4 style="font-size:24px!important; text-align:center">UP NEXT</h4>
                        </div>
                        <div class="story-box-cell todo-box-number" style="width:50%!important; background-color:black!important; color:white!important">
                       <h4 style="font-size:24px!important; font-style:italic; font-weight:normal; letter-spacing:3px; text-align:center; font-family:adobe-caslon-pro; line-height: 44px;">Tennis Tactics</h4>
            </div>
                </div -->

             </section> 
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
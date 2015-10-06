<?php get_header(); ?>



 <?php

 	function get_story_content($id) {

		// check if the flexible content field has rows of data
		if( have_rows('story_content', $id) ):

			//is it numbered?
			$numbered_story_section = get_field('numbered_story_section',$id);

			//count everything in case its numbered
			$x=1;

			//check if first imae
			$imgx = 0;

			//store last item used
			$last = 0;

		 	// loop through the rows of data
		    while ( have_rows('story_content', $id) ) : the_row();

		    	// check of there is a 'Title Card' field
		        if( get_row_layout() == 'title_card' ):

		        	getTitleCardHTML(get_the_id());

		        	$last = get_row_layout();

				// check of there is a 'Scheme Cell' field
		        elseif( get_row_layout() == 'scheme_cell' ):

		        	getSchemeHTML(get_the_id());

		        	$last = get_row_layout();

				// check of there is a 'Full Width Image' field
				elseif ( get_row_layout() == 'full_width_image'):
					$class= '';
					if($imgx == 0) {
						$class= 'first';
					}
					//get the content of the field
					$image = get_sub_field('image');
						$url = $image['url'];
	$caption = $image['caption'];
	?>
					

                    <img src="<?php echo $url ?>" class="full-width-image lead-image <?php echo $class ?>" />

	<?php if( $caption ): ?>

			<div class="wp-caption-text"><?php echo $caption; ?></div>

	<?php endif; ?>
	
						<?php

					$imgx++;

					$last = get_row_layout();

// check of there is a 'Full Width Image' field
				elseif ( get_row_layout() == 'full_width_video'):
					$class= '';
					if($imgx == 0) {
						$class= 'first';
					}
					//get the content of the field
					$video = get_sub_field('video');
					?>
					
					<div class="embed-container">
	<?php echo $video ?>
</div>
<style>
	.embed-container { 
		position: relative; 
		padding-bottom: 56.25%;
		height: 0;
		overflow: hidden;
		max-width: 100%;
		height: auto;
	} 

	.embed-container iframe,
	.embed-container object,
	.embed-container embed { 
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}
</style>

					<!-- img src="<?php echo $image ?>" class="full-width-image lead-image <?php echo $class ?>" / -->

					<?php

					$imgx++;

					$last = get_row_layout();
					
				
				// check of there is a 'Story Section' field
				elseif ( get_row_layout() == 'story_section'):
					
					

					//get the title of the field
					$story_section_title = get_sub_field('story_section_title');

					//get the content of the field
					$story_section_content = get_sub_field('story_section_content');

					if($last == 'full_width_image') {
						$customCss = 'm-t-full-width-image';
					}
					if($last == 'full_width_video') {
						$customCss = 'm-t-full-width-image';
					}
					elseif($last == 'legend') {
						$customCss = 'm-t-50';
					}
					else {
						$customCss = '';
					}

					?>
					
					<div class="text-wrap <?php echo $customCss ?>">
		                <div class="story-step">
		                	<?php if($numbered_story_section == true && $story_section_title) { ?>
		                		<div class="step-number"><?php echo $x ?></div>
		                		<?php 
		                		
			                		//count the steps
									$x++; 

								?>
		                	<?php } ?>
		                    <h2><?php echo $story_section_title ?></h2>
		                    
		                </div>
		                <?php echo $story_section_content ?>
		            </div>

					<?php

					$last = get_row_layout();
					
				
				// check of there is a 'List Ingredients Scheme' field
				elseif ( get_row_layout() == 'list_(ingredients)_scheme'):
					
					getIngredientsSchemeHTML(get_the_id());

					$last = get_row_layout();

		        

		        // check of there is a 'Legend' field
				elseif ( get_row_layout() == 'legend'):
 					
 					getLegendHTML(get_the_id());
 					$last = get_row_layout();
 				endif;

		       
		    endwhile;


		   	//social stuff and credits
			$credits = do_shortcode(get_field('credits',$id));
			if($credits) {

				if($last == 'full_width_image') {
					$customCss = 'm-t-full-width-image';
				}
				elseif($last == 'legend') {
					$customCss = 'm-t-50';
				}
				else {
					$customCss = '';
				}
		    ?>
			<section id="story-end <?php echo $customCss ?>">
	        	<div class="text-wrap">
	                <div class="social-button">
	                <?php echo do_shortcode('[easy-social-share buttons="facebook,twitter,pinterest,mail" counters=0 style="icon" fullwidth="yes" twitter_user="truedotink"]'); ?> 
	                	<!-- div class="social">
	                        <div class="share-text">
	                            Share
	                        </div>
	                        <ul class="icons">
	                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
	                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
	                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
	                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
	                        </ul>
	                    </div -->
	                </div>
	       			 <div id="story-credits">
	        			<div class="main">
	        				<?php echo $credits; ?>
	        			</div>
	        		<p><span class="byline"></span></p>
	        		</div>
	        	</div>
	        </section>

		    <?php
		    }
		    
		

		endif;
	}

	?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
			
			<!-- div class="story-cover">
				<?php echo $story_cover ?>
				<div class="dtable" style="display: table; height: 100%; width: 100%;">
					<div class="dmiddle" style="display:table-cell; vertical-align:middle;">
						<center class="above lead-quote">
							<div class="hidden-xs"><?php  echo $lead_quote ?></div>
							<div class="hidden-lg hidden-md hidden-sm"><?php echo strip_tags($lead_quote) ?></div>
						</center>
					</div>
				</div>
			</div -->
			
			<div class="story-section">
				<?php get_story_content(get_the_id()); ?>

			</div>
			
			<div class="section read" id="section1" style="">
				<div class="footer">
					<div class="credits">
® 2015 True The Magazine, Inc.
						<!-- ?php echo CREDITS ? -->
					</div>
				</div>
			</div>
			
	</main><!-- #main -->
</div><!-- #primary -->
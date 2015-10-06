<?php 
	//get story's title
					  //if there is field called lead_quote - get it                         if not     get the regular title of the story
	$lead_quote = "“".(get_field('lead-quote',get_the_id()) ? get_field('lead-quote',get_the_id()) : get_the_title(get_the_id()))."”";


	$story_cover_overlay_filter = get_field('story_cover_overlay_filter',get_the_id());

	if($story_cover_overlay_filter) {
		$color = get_field('story_cover_overlay_color',get_the_id());
		$number = get_field('story_cover_overlay_opacity',get_the_id());
		$fraction = $number/100;

		?>
		
			<div class='story_cover_overlay_filter' style='background-color:<?php echo $color ?>; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=<?php echo $number ?>)";filter: alpha(opacity=<?php echo $number ?>);-moz-opacity: <?php echo $fraction ?>;-khtml-opacity: <?php echo $fraction ?>;opacity: <?php echo $fraction ?>;'></div>

		<?php
	}

 ?>

 <?php

 	function get_story_content($id) {

		// check if the flexible content field has rows of data
		if( have_rows('story_content', $id) ):

			//is it numbered?
			$numbered_story_section = get_field('numbered_story_section',$id);

			//count everything in case its numbered
			$x=0;

			//check if first imae
			$imgx = 0;

		 	// loop through the rows of data
		    while ( have_rows('story_content', $id) ) : the_row();

		    	// check of there is a 'Title Card' field
		        if( get_row_layout() == 'title_card' ):

		        	//get the content of the field
					$story_title = get_sub_field('story_title');
					$dek = get_sub_field('dek');


					//lets move to the html
					?>
					<div class="title-card">
				        <h1>
				        	<?php echo $story_title ?>
				        </h1>
				        
				        <div class="lead">
				        	<?php echo the_sub_field('dek') ?>
				        </div>
				        
				        <div class="social-button white">
		                	<div class="social">
		                        <div class="share-text">
		                            Share
		                        </div>
		                        <ul class="icons">
		                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
		                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
		                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
		                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
		                        </ul>
		                    </div>
		                </div>
				    </div>
				<?php



				// check of there is a 'Scheme Cell' field
		        elseif( get_row_layout() == 'scheme_cell' ):

		        	//get the content of the field
					$story_title = get_sub_field('story_title');
					$dek = get_sub_field('dek');
					$credits = get_sub_field('credits');
					$editors_note = get_sub_field('editors_note');


					//lets move to the html
					?>
				
				    <div class="title-scheme-wrap">
				    	<div class="container">
				            <div id="title-scheme">
				                <div class="scheme-row">
				                    <div class="scheme-cell main-cell">
				                        <div class="scheme-cell title-cell">
				                        	<p class="scheme-text">Presenting:</p>
				                        	<h1><?php echo $story_title ?></h1>
				                        </div>
				                        <div class="scheme-cell dek-cell">
				                        	<p class="scheme-text">In Brief:</p>
				                            <p class="dek-text"><?php echo $dek ?></p>
				                        </div>                    
				                    </div>
				                    <div class="side-cell">
				                        <div class="scheme-cell byline-cell">
				                            <p class="scheme-text">Credits:</p>
				                            <ul>
				                                <?php if($credits) { foreach ($credits as $credit) { ?>

													<li>
														<p class="byline">
															<?php echo $credit['author'] ?>
														</p>
														<p class="byline-role">
															<?php echo $credit['role'] ?>
														</p>	
													</li>

				                                <?php } } ?>  
				                            </ul>               
				                        </div>
				                        <div class="scheme-cell editors-note-cell">
				                        	<div class="editors-note"><?php echo $editors_note ?></div>
				                        </div>
				                	</div>
				                </div>                    
				            </div>
				            
				            <div class="social-share-cell">
				                <div class="social yellow" style="position:relative;">
			                        <div class="share-text">
			                            Share
			                        </div>
			                        <ul class="icons">
			                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
			                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
			                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
			                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
			                        </ul>
			                    </div>
				            </div>
				               
				        </div>
				    </div>


					<?php

				// check of there is a 'Full Width Image' field
				elseif ( get_row_layout() == 'full_width_image'):
					$class= '';
					if($imgx == 0) {
						$class= 'first';
					}
					//get the content of the field
					$image = get_sub_field('image');
					?>
					
					<img src="<?php echo $image ?>" class="full-width-image lead-image <?php echo $class ?>" />

					<?php

					$imgx++;

					
				
				// check of there is a 'Story Section' field
				elseif ( get_row_layout() == 'story_section'):
					
					//count the steps
					$x++;

					//get the title of the field
					$story_section_title = get_sub_field('story_section_title');

					//get the content of the field
					$story_section_content = get_sub_field('story_section_content');
					?>
					
					<div class="text-wrap">
		                <div class="story-step">
		                	<?php if($numbered_story_section == true) { ?>
		                		<div class="step-number"><?php echo $x ?></div>
		                	<?php } ?>
		                    <h2><?php echo $story_section_title ?></h2>
		                </div>
		                <?php echo $story_section_content ?>
		            </div>

					<?php
					
				
		        endif;

		       
		    endwhile;


		   	//social stuff and credits
			$credits = do_shortcode(get_field('credits',$id));
			if($credits) {
		    ?>
			<section id="story-end">
	        	<div class="text-wrap">
	                <div class="social-button">
	                	<div class="social">
	                        <div class="share-text">
	                            Share
	                        </div>
	                        <ul class="icons">
	                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
	                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
	                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
	                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
	                        </ul>
	                    </div>
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
			<?php get_story_image(get_the_id()) ?>
		
			<div class="story-cover">
				<div class="dtable" style="display: table; height: 100%; width: 100%;">
					<div class="dmiddle" style="display:table-cell; vertical-align:middle;">
						<center class="above lead-quote">
							<div class="hidden-xs"><?php  echo $lead_quote ?></div>
							<div class="hidden-lg hidden-md hidden-sm"><?php echo strip_tags($lead_quote) ?></div>
						</center>
					</div>
				</div>
			</div>
			
			<div class="story-section">
				<?php get_story_content(get_the_id()); ?>
			</div>
			
			<div class="section read" id="section1" style="">
				<div class="footer">
					<div class="credits">
						<?php echo CREDITS ?>
					</div>
				</div>
			</div>
			
	</main><!-- #main -->
</div><!-- #primary -->

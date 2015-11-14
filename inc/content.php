<?php 

function getVideo($id) {
	$video = get_field('video',$id);
	if($video) {
		?>
			
			<video loop muted id="myVideo">
				<source src="<?php echo $video ?>" type="video/mp4">
			</video>

		<?php
	}
	else {
		echo "no video";
	}
}



function getImageOrVideo() {
	$post_id = ot_get_option("main_story");

	$type = get_field('show_only_video',$post_id);

	if($type > 2) {
		?>
			<div class="main-background-image" <?php echo get_main_story_image() ?>></div>
		<?php
	}
	else {

			$video = get_field('video',$post_id);
		?>
		
			<div class="main-background-image" ></div>

			<video autoplay loop muted id="myVideo">
				<source src="<?php echo $video ?>" type="video/mp4">
			</video>

		<?php
	}

}

function get_main_story_image() {
	$post_id = ot_get_option("main_story");
	$src = get_field('main_image',$post_id);
	echo 'style="background-image:url('.$src.')"';
}

function get_story_image($id) {
	
	$type = get_field('show_only_video',$id);

	if($type == 1) {
		$video = get_field('video',$id);
		?>
		
			<div class="main-background-image" ></div>

			<video autoplay loop muted id="myVideo">
				<source src="<?php echo $video ?>" type="video/mp4">
			</video>
		<?php
	}
	else {
		$src = get_field('main_image',$id);
	
		?>

		<div class="main-background-image" style="background-image:url('<?php echo $src ?>')"></div>

		<?php
	}

}

function get_main_story() {
	$post_id = ot_get_option("main_story");

	$title = (get_field('main_title',$post_id)?get_field('main_title',$post_id):get_the_title($post_id));
	$secondary_title = get_field('secondary_title',$post_id);
	$link = get_permalink($post_id);
	?>
		<div class="post-image-number">No. 0814 _ L010</div>
		<div class="height9"></div>
		<div class="post-image-underline"></div>
		<div class="height26"></div>
		<div class="post-image-title"><?php echo $title ?></div>
		<div class="height18"></div>
		<div class="post-image-caption"><?php echo $secondary_title ?></div>
		<div class="height32"></div>
		<a href="<?php echo $link ?>" class="post-image-read">Read</a>
	<?php
} 

function get_story($post_id) {

	//get story's title
	$title = (get_field('main_title',$post_id)?get_field('main_title',$post_id):get_the_title($post_id));


	$secondary_title = get_field('secondary_title',$post_id);
	$link = get_permalink($post_id);
	
	echo $title;
		
	
}



function get_home_stories() {
	$home_posts = ot_get_option("homepage_posts");

	foreach ($home_posts as $key => $value) {
		$post_id = $value['item'];
		// $title = (get_field('main_title',$post_id)?get_field('main_title',$post_id):get_the_title($post_id));
		$title = get_the_title($post_id);
		$secondary_title = get_field('secondary_title',$post_id);
	
		if(get_post_type($post_id) == "story") {
			$src = get_field("main_image",$post_id);
		}
		else {
			$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id, apply_filters( 'single_product_large_thumbnail_size', 'full' ) ));
			$src = $src[0];
		}

		?>

		<div class="mitem col-md-<?php echo $value['item_width'] ?> col-xs-12" style="height:<?php echo $value['item_height'] ?>px; background-position:center;" data-id="<?php echo $post_id ?>">

			<div class="inner-mitem col-md-12 col-xs-12" style="background:url('<?php echo $src ?>') no-repeat center transparent;">
				<div class="row">
					<div class="inner-border">
						<div class="small-post-image-number-wrapper">
							<div class="small-post-image-number">No. 0814 _ L010</div>
							<div class="height4"></div>
							<div class="small-post-image-underline"></div>
						</div>
						<div class="dtable inner-content" style="display: table; height: 100%; width: 100%;">
							<div class="dmiddle" style="display:table-cell; vertical-align:middle;">
								<center class="above">
									<div class="small-post-image-title"><?php echo $title ?></div>
									<div class="height11"></div>
									<div class="small-post-image-caption"><?php echo $secondary_title ?></div>
								</center>
							</div>
						</div>
						<div class="cover"></div>
						<div class="bottom-action">
							<div class="share social">
								<div class="share-text" style="padding:0;">
                                    Share
                                </div>
                                <ul class="icons" style="font-size: 30px; height: 34px; line-height: 25px;">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                </ul>
							</div>
							<a href="<?php echo get_permalink($post_id) ?>" class="read">go</a>
						</div>
					</div>
				</div>
			</div>
		</div>	

		<?php
	}
}
function get_trade_posts() {
	$home_posts = ot_get_option("stories_order");

	foreach ($home_posts as $key => $value) {
		$post_id = $value['item'];
		// $title = (get_field('main_title',$post_id)?get_field('main_title',$post_id):get_the_title($post_id));
		$title = get_the_title($post_id);
		$lead_quote = "“".(get_field('lead-quote',$post_id) ? get_field('lead-quote',$post_id) : get_the_title($post_id))."”";
		$src = get_field("main_image",$post_id);

		$smallFontClass = 'smaller ';

		?>
 

		<div class="<?php echo $smallFontClass ?>mitem col-md-<?php echo $value['item_width'] ?> col-xs-12" style="height:<?php echo $value['item_height']+14?>px;" data-height="<?php echo $value['item_height']+14?>" data-id="<?php echo $post_id ?>">

			<div class="inner-mitem col-md-12 col-xs-12">
				<div class="row">
					<div class="inner-border">
						<div class="dtable inner-content" style="">
							<div class="dmiddle" style="">
								<center class="above">
									<div class="small-post-image-title"><?php echo strip_tags($title) ?></div>
								</center>
							</div>
						</div>
			
			<div class="archive-tile" style="position:relative; height:<?php echo ($value['item_height'] - 51 - 80)?>px; background:url('<?php echo get_field('main_image',$post_id) ?>') no-repeat transparent; background-size: cover; background-position:center; border-top:1px solid #000;">
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
				<?php $btnColor = ' yellow' ?>
				<a href="<?php echo get_permalink($post_id) ?>" class="read col-sm-6 col-xs-12 <?php echo $btnColor ?>">go</a>
			</div>

					</div>
				</div>
			</div>


		</div>

		<?php

	};
}

function get_home_stories2() {
	$home_posts = ot_get_option("homepage_posts");

	foreach ($home_posts as $key => $value) {
		$post_id = $value['item'];
		// $title = (get_field('main_title',$post_id)?get_field('main_title',$post_id):get_the_title($post_id));
		$title = get_the_title($post_id);
		$secondary_title = get_field('secondary_title',$post_id);

		$lead_quote = "“".(get_field('lead-quote',$post_id) ? get_field('lead-quote',$post_id) : get_the_title($post_id))."”";
	
		if(get_post_type($post_id) == "story") {
			$src = get_field("main_image",$post_id);
		}
		else {
			$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id, apply_filters( 'single_product_large_thumbnail_size', 'full' ) ));
			$src = $src[0];
		}

		?>

		<div class="mitem col-md-<?php echo $value['item_width'] ?> col-xs-12" style=" background-position:center;" data-id="<?php echo $post_id ?>" >
			
			<div class="inner-mitem col-md-12 col-xs-12" style="" >
				<div class="tiles" style="padding:0; margin:0;">
				<div class="row">
						<div class="post col-xs-12" style="margin:15px 0; padding-top:0; padding-bottom:0;">
						<div class="row">
							<table>
				                <tbody>
				                    <tr height="40">
				                        <td class="hed" rowspan="3" colspan="3"><h3><?php echo $title ?></h3></td>
				                        <td class="system"></td>
				                    </tr>
				                    <tr>
				                        <td class="system">&nbsp;</td>
				                    </tr>
				                    <tr>
				                        <td class="system"></td>
				                    </tr>
				                    <tr>
				                        <td colspan="4" class="story-th" style="">
				                        <a href="<?php echo get_permalink($post_id) ?>" style="display: block; z-index: 3; position: relative;"><div class="" style="height:<?php echo $value['item_height']?>px; background:url('<?php echo $src ?>') no-repeat center transparent; background-size:cover;"></div></a>
				                        	<div class="cover"></div>
				                        	<div class="quote" style="position:absolute; top:0; left:0; height:100%; width:100%;">
												<div class="dtable" style="display: table; height: 100%; width: 100%;">
												    <div class="dmiddle" style="display:table-cell; vertical-align:middle;">
														<center class="quote">
															<?php echo $lead_quote ?>
														</center>
													</div>
												</div>
				                        	</div>
				                        </td>
				                    </tr>
				                    <tr class="hidden-xs">
				                        <td colspan="2" class="bottom bottom-left">
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
		
				                        </td>
				                        <td colspan="2" class="bottom"><a href="<?php echo get_permalink($post_id) ?>" class="go">Go</a></td>
				                    </tr>
				    				
				                    <tr class="hidden-lg hidden-md hidden-sm">
				                        <td colspan="4" class="bottom bottom-left" style="width:100%;">
				                            <div class="social">
				                                <div class="share-text" style="padding: 20px;">
				                                    Share
				                                </div>
				                                <ul class="icons" style="font-size: 30px;">
				                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
				                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
				                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
				                                    <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
				                                </ul>
				                            </div>
		
				                        </td>
				                       
				                    </tr>
				                    <tr class="hidden-lg hidden-md hidden-sm">
				                        
				                        <td colspan="4" class="bottom" style="width:100%; border-top:1px solid black;"><a href="<?php echo get_permalink($post_id) ?>" class="go" style="padding: 20px;">Go</a></td>
				                    </tr>
				                    
				                </tbody>
				            </table>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>	

		<?php
	}
}

function get_supply_products() {
	$home_posts = ot_get_option("supply_products");

	foreach ($home_posts as $key => $value) {
		$post_id = $value['item'];
		// $title = (get_field('main_title',$post_id)?get_field('main_title',$post_id):get_the_title($post_id));
		$title = get_the_title($post_id);
		$secondary_title = get_field('secondary_title',$post_id);

		$lead_quote = "“".(get_field('lead-quote',$post_id) ? get_field('lead-quote',$post_id) : get_the_title($post_id))."”";
	
		if(get_post_type($post_id) == "story") {
			$src = get_field("main_image",$post_id);
		}
		else {
			$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id, apply_filters( 'single_product_large_thumbnail_size', 'full' ) ));
			$src = $src[0];
		}

		?>

		<div class="mitem col-md-<?php echo $value['item_width'] ?> col-xs-12" style=" background-position:center;" data-id="<?php echo $post_id ?>" >
			
			<div class="inner-mitem col-md-12 col-xs-12" style="" >
				<div class="tiles" style="padding:0; margin:0;">
				<div class="row">
						<div class="post col-xs-12" style="margin:15px 0; padding-top:0; padding-bottom:0;">
						<div class="row">
							<table>
				                <tbody>
				                    <tr height="40">
				                        <td class="hed" rowspan="3" colspan="3"><h3><?php echo $title ?></h3></td>
				                        <td class="system"></td>
				                    </tr>
				                    <tr>
				                        <td class="system">&nbsp;</td>
				                    </tr>
				                    <tr>
				                        <td class="system"></td>
				                    </tr>
				                    <tr>
				                        <td colspan="4" class="story-th" style="">
				                        <a href="<?php echo get_permalink($post_id) ?>" style="display: block; z-index: 3; position: relative;"><div class="" style="height:<?php echo $value['item_height']?>px; background:url('<?php echo $src ?>') no-repeat center transparent; background-size:cover;"></div></a>
				                        	<div class="cover"></div>
				                        	<div class="quote" style="position:absolute; top:0; left:0; height:100%; width:100%;">
												<div class="dtable" style="display: table; height: 100%; width: 100%;">
												    <div class="dmiddle" style="display:table-cell; vertical-align:middle;">
														<center class="quote">
															<?php echo $lead_quote ?>
														</center>
													</div>
												</div>
				                        	</div>
				                        </td>
				                    </tr>
				                    <tr class="hidden-xs">
				                        <td colspan="2" class="bottom bottom-left">
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
		
				                        </td>
				                        <td colspan="2" class="bottom"><a href="<?php echo get_permalink($post_id) ?>" class="go">Go</a></td>
				                    </tr>
				    				
				                    <tr class="hidden-lg hidden-md hidden-sm">
				                        <td colspan="4" class="bottom bottom-left" style="width:100%;">
				                            <div class="social">
				                                <div class="share-text" style="padding: 20px;">
				                                    Share
				                                </div>
				                                <ul class="icons" style="font-size: 30px;">
				                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
				                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
				                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
				                                    <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
				                                </ul>
				                            </div>
		
				                        </td>
				                       
				                    </tr>
				                    <tr class="hidden-lg hidden-md hidden-sm">
				                        
				                        <td colspan="4" class="bottom" style="width:100%; border-top:1px solid black;"><a href="<?php echo get_permalink($post_id) ?>" class="go" style="padding: 20px;">Go</a></td>
				                    </tr>
				                    
				                </tbody>
				            </table>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>	

		<?php
	}
}

function get_kitchen_products() {
	$home_posts = ot_get_option("kitchen_products");

	foreach ($home_posts as $key => $value) {
		$post_id = $value['item'];
		// $title = (get_field('main_title',$post_id)?get_field('main_title',$post_id):get_the_title($post_id));
		$title = get_the_title($post_id);
		$secondary_title = get_field('secondary_title',$post_id);

		$lead_quote = "“".(get_field('lead-quote',$post_id) ? get_field('lead-quote',$post_id) : get_the_title($post_id))."”";
	
		if(get_post_type($post_id) == "story") {
			$src = get_field("main_image",$post_id);
		}
		else {
			$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id, apply_filters( 'single_product_large_thumbnail_size', 'full' ) ));
			$src = $src[0];
		}

		?>

		<div class="mitem col-md-<?php echo $value['item_width'] ?> col-xs-12" style=" background-position:center;" data-id="<?php echo $post_id ?>" >
			
			<div class="inner-mitem col-md-12 col-xs-12" style="" >
				<div class="tiles" style="padding:0; margin:0;">
				<div class="row">
						<div class="post col-xs-12" style="margin:15px 0; padding-top:0; padding-bottom:0;">
						<div class="row">
							<table>
				                <tbody>
				                    <tr height="40">
				                        <td class="hed" rowspan="3" colspan="3"><h3><?php echo $title ?></h3></td>
				                        <td class="system"></td>
				                    </tr>
				                    <tr>
				                        <td class="system">&nbsp;</td>
				                    </tr>
				                    <tr>
				                        <td class="system"></td>
				                    </tr>
				                    <tr>
				                        <td colspan="4" class="story-th" style="">
				                        <a href="<?php echo get_permalink($post_id) ?>" style="display: block; z-index: 3; position: relative;"><div class="" style="height:<?php echo $value['item_height']?>px; background:url('<?php echo $src ?>') no-repeat center transparent; background-size:cover;"></div></a>
				                        	<div class="cover"></div>
				                        	<div class="quote" style="position:absolute; top:0; left:0; height:100%; width:100%;">
												<div class="dtable" style="display: table; height: 100%; width: 100%;">
												    <div class="dmiddle" style="display:table-cell; vertical-align:middle;">
														<center class="quote">
															<?php echo $lead_quote ?>
														</center>
													</div>
												</div>
				                        	</div>
				                        </td>
				                    </tr>
				                    <tr class="hidden-xs">
				                        <td colspan="2" class="bottom bottom-left">
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
		
				                        </td>
				                        <td colspan="2" class="bottom"><a href="<?php echo get_permalink($post_id) ?>" class="go">Go</a></td>
				                    </tr>
				    				
				                    <tr class="hidden-lg hidden-md hidden-sm">
				                        <td colspan="4" class="bottom bottom-left" style="width:100%;">
				                            <div class="social">
				                                <div class="share-text" style="padding: 20px;">
				                                    Share
				                                </div>
				                                <ul class="icons" style="font-size: 30px;">
				                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
				                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
				                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
				                                    <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
				                                </ul>
				                            </div>
		
				                        </td>
				                       
				                    </tr>
				                    <tr class="hidden-lg hidden-md hidden-sm">
				                        
				                        <td colspan="4" class="bottom" style="width:100%; border-top:1px solid black;"><a href="<?php echo get_permalink($post_id) ?>" class="go" style="padding: 20px;">Go</a></td>
				                    </tr>
				                    
				                </tbody>
				            </table>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>	

		<?php
	}
}

function get_gallery($id) {
	?>

	<?php if( have_rows('gallery') ): ?>

		<?php $i = 0; ?>
		<?php $total = count( get_field('gallery') ); ?>

		<?php while( have_rows('gallery') ): the_row(); 
			$i++;

			$image = get_sub_field('image');
			$content = get_sub_field('content');

			?>

			<div class="slide slider-image" id="slide1" style="background:url('<?php echo $image ?>') no-repeat 0 0 transparent;">
				<div class="slider-content" style="height: 100%; width: 100%;">
					<div class="cover"></div>
					<div class="dtable inner-content" style="display: table; height: 100%; width: 100%;">
						<div class="dmiddle" style="display:table-cell; vertical-align:middle;">
							<div class="caption-overlay">
								<center>
									<div class="post-image-number"><?php echo $i ?> / <?php echo $total ?></div>
									<div class="height9"></div>
									<div class="post-image-underline"></div>
									<div class="height26"></div>
								</center>
								<div class="container">
									<div class="row">
										<div class="slider-inner-caption col-md-12">
											<?php echo $content ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php endwhile; ?>

	<?php endif; ?>

	<?php
}


function dummy() {
	?>
	
	<div class="mitem col-md-4 col-xs-12" style="height: 450px" data-id="35">

										<div class="inner-mitem col-md-12 col-xs-12" style="background:url('http://allmounta.in/true/wp-content/uploads/2014/09/block1.jpg') no-repeat transparent;">
											<div class="row">
												<div class="inner-border">
													<div class="small-post-image-number-wrapper">
														<div class="small-post-image-number">No. 0814 _ L010</div>
														<div class="height4"></div>
														<div class="small-post-image-underline"></div>
													</div>
													<div class="dtable inner-content" style="display: table; height: 100%; width: 100%;">
														<div class="dmiddle" style="display:table-cell; vertical-align:middle;">
															<center class="above">
																<div class="small-post-image-title">Tiger is not a frog<br>
							Duck is not a porcupine</div>
																<div class="height11"></div>
																<div class="small-post-image-caption"><p>Gotthart Snider stumbled out into the<br> terrible storm a new and deeperrage<br> festering in his mind.</p>
							</div>
															</center>
														</div>
													</div>
													<div class="cover"></div>
													<div class="bottom-action">
														<div class="share">
															<span>
																share
															</span>
															<ul class="social-share">
																<li class="adad"><a href="https://www.facebook.com/sharer/sharer.php?u=http://www.allmounta.in/true/?story=tiger" class="icon-facebook-squared" target="_blank"></a></li>
																<li class="dadad"><a href="#" class="icon-gplus-squared" target="_blank"></a></li>
																<!-- <li class='icon-mail-squared'></li> -->
															</ul>
														</div>
														<a href="http://www.allmounta.in/true/?story=tiger" class="read">go</a>
													</div>
												</div>
											</div>
										</div>
									</div><!-- mitem -->

	<?php
}

function getTitleCardHTML($id) {
	//get the content of the field
	$story_title = get_sub_field('story_title');
	$dek = get_sub_field('dek');

	$revet = get_sub_field('revet_color')?"white":"";

	//lets move to the html
	?>
	<div class="title-card <?php echo $revet ?>">
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

}


function getSchemeHTML($id) {
	//get the content of the field
	$story_title = get_sub_field('story_title');
	$dek = get_sub_field('dek');
	$credits = get_sub_field('credits');
	$editors_note = get_sub_field('editors_note');

	$revet = get_sub_field('revet_color')?"white":"";


	//lets move to the html
	?>

    <div class="title-card-wrap <?php echo $revet ?>">
    	<div class="container">
            <div id="title-card">
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
                    <?php echo do_shortcode('[easy-social-share buttons="facebook,twitter,pinterest,mail" counters=0 style="icon" fullwidth="yes" twitter_user="truedotink"]'); ?> <!-- div class="share-text">
                        Share
                    </div -->
                    <!-- ul class="icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                    </ul -->
                </div>
            </div>
               
        </div>
    </div>


	<?php
}

function getLegendHTML($id) {
	//get the content of the field
	$smallTitle = get_sub_field('small_title');
	$bigTitle = get_sub_field('big_title');
	


	//lets move to the html
	?>
		<div class="legend">
			<?php if($smallTitle) { ?>
				<div class="part-type"><?php echo $smallTitle ?></div>
			<?php } ?>
		    <h2><?php echo $bigTitle ?></h2>
		</div>
	<?php
}

function getIngredientsSchemeHTML($id) {
	//get the content of the field
	$receipe_title = get_sub_field('title');
	$items = get_sub_field('items');
	$preperation_time = get_sub_field('preperation_time');
	

	//lets move to the html
	?>

    <div class="ingredients-scheme-wrap">
    	<div class="container">
			
			<table class="you-will-need">
            	<thead>
                	<tr><th class="ingredients">
                    	<?php echo $receipe_title ?>
                    </th>
                    <th class="quantity">
                    	
                    </th>
                </tr></thead>
                <tbody>
	                <?php if($items) { foreach ($items as $item) { ?>

						<tr>
							<td class="ingredients">
								<?php echo $item['item'] ?>
							</td>
							<td class="ing_quantity">
								<?php echo $item['value'] ?>
							</td>

						</tr>

					<?php } } ?>  
                	
                    <tr>
                    	<td class="duration" colspan="2">This will take: <span class="time"><?php echo $preperation_time ?></span></td>                        
                    </tr>                                                                                                
                </tbody>
            </table>

			

        </div>
    </div>


	<?php
}


function getListHTML($id) {

	//get the title of the field
	$title = get_sub_field('title');

	//get the list from the field
	$items = get_sub_field('items');

	
	?>
	<div class="text-wrap">
		<ul class="ingredients">
			<?php if($title) { ?>
		    	<li>
		        	<h2><?php echo $title ?></h2>
		            <div class="divider"></div>
		        </li>
		    <?php } ?>
		    <?php if($items) { foreach ($items as $item) { ?>

				<li>
						<?php echo $item['caption'] ?>
				</li>

		    <?php } } ?>  
		</ul>
    </div>

<?php
}
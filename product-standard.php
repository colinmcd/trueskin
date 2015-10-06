<?php 

//information
$id =              get_the_id();                                                                  //get current product id
$product_title =   get_field('main_title',get_the_id());										  //get the title of the product
$product_content = apply_filters('the_content', get_post_field('post_content', get_the_id()));    //get the content of the product
$price =           get_post_meta( $id, '_sale_price');											  //get the price of the product
$made_by =         get_field('made_by',$id);													  //get the 'made by' field
$expiration =      'Until Feb 2015';															  //hard coded expiration date, need buy a plugin for that feature

// images
$images = ''; //hold the html for sliders
$images_id = get_post_meta( get_the_id(), '_product_image_gallery' ); //get the list of id attachments
$images_id = preg_split('/\,/', $images_id[0]); //split it into array

//run for each on of the elements in array
foreach ($images_id as $image_id) {
	//get the details of of the image by its atachment id
	$src = wp_get_attachment_image_src( $image_id, 'full');

	//put the image as background in slider
	$images .= '<div class="product-slider" style="background-cover:cover; background:url('.$src[0].') no-repeat 0 0 transparent; background-size: cover;"></div>';
}


//relations with other products
$related_products = ''; //hold related products information

$tags_ids = array(); //hold array of tag ids
$tags = wp_get_object_terms($id,'product_tag'); //get all the tags (terms) in this products

foreach ($tags as $tag) { 
	$tags_ids[] = $tag->term_id; // push all the ids to a different array ($tags_ids)
} 

if ( ! empty( $tags ) ) { //make sure its not empty
	if ( ! is_wp_error( $tags ) ) { //make sure wordpress has no errors
		
		//get all the products that has the same tags (terms)
	 	$posttype =  get_post_type($id);

		global $wp_query; //wordpress global variable

		//filter args
	    $args = array(
		    'post_type' => $posttype, 
		    'terms' => $tags_ids, // products that have this tags
		    'post__not_in' => array($id), // excluding current product 
		    'posts_per_page' => 3, //number of related products 
		    'orderby' => 'rand' //randomize the products 
		);

	    //run a query
		$postslist = get_posts( $args );

		//move to information for storage at $related_products
		foreach ($postslist as $post) :  setup_postdata($post);

			//get the image of the related product
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); //get the path to the image
			if($image) { //if there is results
				$image = $image[0]; //make img element with src attr
			}
			else {
				$image = 'no image'; //notify there is no image
			}
			
			//get the author of the related product
			$first_name = strtoupper(substr(get_the_author_meta( 'user_firstname' , $post->post_author ), 0, 1)); //take the first letter of the name and capitlize it
			$last_name = get_the_author_meta( 'user_lastname' , $post->post_author ); //take the last name
			$fullname = $first_name . ". " . $last_name; //build the name in desired format

			//get the category/categories of the related product
			$categoryString = ''; //store the categories string
			$categories = wp_get_object_terms($post->ID, 'product_cat'); //get all the categories of the product

			if(count($categories) > 1) { //if product is in more than one category
				foreach ($categories as $category) { //run through all categories
					$categoryString .= $category->name . ', '; //store a category string in desired format exp: cat1, cat2, cat3
				}
			}
			else {
				$categoryString = $categories[0]->name; //store a category string
			}

			$related_products[$post->ID]['title'] = get_the_title($post->ID); //get the title of the related product
			$related_products[$post->ID]['category'] = $categoryString;       // get the category of the related product
			$related_products[$post->ID]['image'] = $image;					  //get the image of  the related product
			$related_products[$post->ID]['author'] = $fullname;				  // get the author of the related product
			$related_products[$post->ID]['link'] = $post->guid;				  // get the link of the related product

		endforeach; 

	}
}


 ?>

<style>
	/*hide this button when adding new product to the cart*/
	.added_to_cart { display:none !important; }
</style>

<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<div id="fullpage">
			
			<div class="section read" id="product" style="padding-top:61px;">
				
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							
								<div class="content">
									<div style="overflow:hidden">
										<div class="col-md-12" style="padding: 7px;">
											
											<!-- SUPPLY -->
											<div id="supply">
											    <div class="">

											        <div id="supply-product">
											            
											            <div class="header-row">
											                <div class="supply-row">
											                    <div class="product-title">
											                        <h1><?php echo $product_title ?></h1>
											                    </div>
											                    <div class="specs">
											                        <ul>
											                            <li><?php echo $made_by ?></li>
											                            <li><?php echo "$".$price[0] ?></li>
											                            <li><?php echo $expiration ?></li>
											                        </ul>
											                    </div>
											                </div>
											            </div>
											            
											            <div class="description-row">
											                <div class="supply-row">
											                    <div class="product-image">
											                    	
											                        <div id="product-slideshow">
											                            
											                           <div style="">
																			<div class="cycle-slideshow" 
																		        data-cycle-fx=scrollHorz
																		        data-cycle-timeout=0
																		        data-cycle-prev="#prev"
																		        data-cycle-next="#next"
																		        data-cycle-slides="> div"
																		        data-cycle-caption="#custom-caption"
				    															data-cycle-caption-template="{{slideNum}}/{{slideCount}}"
																		        >

																		        <?php 
																			        echo $images;
																				?>
	
																		    </div>
																		</div>
																	
											                            
											                        </div>
											                        
											                        <div class="slideshow-controls">
											                        	<div class="arrow"><a href="#product-slideshow" data-slide="prev" id="prev" class="left"></a></div>
											                            <div id="carousel-index"><div id="custom-caption" class="center"></div></div>   
											                        	<div class="arrow"><a href="#product-slideshow" data-slide="next" id="next"  class="right"></a></div>
											                        </div>



											                                                           
											                    </div>
											                    <div class="product-description">
											                        <?php echo $product_content ?>
											                    </div>            
											                </div>
											            </div>                    
											            
											            <div class="action-row">
											                <div class="supply-row">
											                    <div class="action-button share-button">
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
											                    
											                     <button type="submit"
																    data-quantity="1" data-product_id="<?php echo $id; ?>"
																    class="hidden-xs button custom_buy alt add_to_cart_button product_type_simple action-button buy-button">
																    Buy
																</button>
											                </div>

											                <div class="supply-row hidden-lg hidden-md hidden-sm" >
											                	
										                        <button type="submit" style="border-top:1px solid #000;"
																    data-quantity="1" data-product_id="<?php echo $id; ?>"
																    class="button custom_buy alt add_to_cart_button product_type_simple action-button buy-button">
																    Buy
																</button>

											                </div>
											            </div>                   
											            
											        </div>
											        <!-- END PRODUCT -->
											        <!-- TAKE YOUR PICK -->
											    
											    </div>
											</div>

										</div>
									</div>
									<div id="suggestions" style="padding:20px 0">
											        	<div class="heading-wrap">
											            	<h2>Take Your Pick</h2>
											            </div>
											            <div class="">
											                <div class="row">
											                    <?php if($related_products) { foreach ($related_products as $related_product) { ?>
											                    	
												                    <div class="col-xs-12 col-sm-6 col-md-4">
												                        <div class="post">
												                            <table>
												                                <tr height="40">
												                                    <td class="hed" rowspan="3" colspan="3"><h3><?php echo $related_product['title'] ?></h3></td>
												                                    <td class="system"><?php //echo $related_product['category'] ?></td>
												                                </tr>
												                                <tr>
												                                    <td class="system">&nbsp;</td>
												                                </tr>
												                                <tr>
												                                    <td class="system"><?php //echo $related_product['author'] ?></td>
												                                </tr>
												                                <tr>
												                                    <td colspan="4" class="story-th" height="200" style="background:url(<?php echo $related_product['image'] ?>) no-repeat center center transparent; background-size:cover;">
												                                    	
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
												                                    <td colspan="2" class="bottom"><a href="<?php echo $related_product['link'] ?>" class="go">Go</a></td>
												                                </tr>
																				
												                                <tr class="hidden-lg hidden-md hidden-sm">
												                                    <td colspan="4" class="bottom bottom-left" style="width:100%;">
												                                        <div class="social">
												                                            <div class="share-text" style="padding: 20px;">
												                                                Share
												                                            </div>
												                                            <ul class="icons" style="font-size: 30px; height: 34px; line-height: 25px; margin-top: -41px;">
												                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
												                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
												                                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
												                                                <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
												                                            </ul>
												                                        </div>
												    
												                                    </td>
												                                   
												                                </tr>
												                                <tr class="hidden-lg hidden-md hidden-sm">
												                                    
												                                    <td colspan="4" class="bottom"  style="width:100%; border-top:1px solid black;"><a href="<?php echo $related_product['link'] ?>" class="go" style="padding: 20px;">Go</a></td>
												                                </tr>
												                                
												                            </table>
												                        </div>                
												                    </div>

												                <?php } } ?>
											                   
											        		</div>
											        	</div>                    
											        </div>
								</div>
							<div class="height57"></div>

						</div>
					</div>

				</div>
				<div class="scroll-to-top">top</div>
				<div class="footer">
					<div class="credits">
						<?php echo CREDITS ?>
					</div>
				</div>
			</div>
			
			
			

		</div>

	</main><!-- #main -->
</div><!-- #primary -->

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




<div class="story-cover" style="overflow:hidden; position: relative; z-index: 1;">
	<?php getHomePageVideo(get_the_id()); ?>
	<i class="fa fa-angle-down down-arrow"></i>
</div>



<div id="primary" class="content-area v2" style="background-color:#FFFFDE; z-index: 1; position: relative;">
	<main id="main" class="site-main" role="main">

		
			<!-- <div class="section" id="section0">

				<div class="dtable" style="display: table; height: 100%; width: 100%;">
					<div class="dmiddle" style="display:table-cell; vertical-align:middle;">
						<center class="above">
							<?php get_main_story() ?>						
						</center>
						<div class="cover ground"></div>
					</div>
				</div>
			</div> -->
			
			<div class="section" id="section1" style="">
				<!-- <div class="menu-example">
					<?php //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class'      => '','container_class'=>'true-menu' ) ); ?>
				</div> -->
				<div class="container">
					<div class="row">
						<div class="col-md-12">
								<div class="height57"></div>
								<div id="mansory">
									<?php 
										// $i = 0;
										// $heightArr = array(450,215,215,450,215);
										// $widthArr = array(4, 4, 4, 8, 4);
										// $imagesArr = array("block1.jpg","block2.jpg","block3.jpg","block5.jpg","block4.jpg");
										get_home_stories2();
										// get_home_stories2();
										// get_home_stories2();
									 ?>
								</div>
								<div class="height57"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="footer">
				<div class="credits">
					<?php echo CREDITS ?>
				</div>
			</div>

		

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>

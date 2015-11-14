<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package true
 */

get_header(); 



	//information
	$id =              get_the_id();  //get current product id


	$image =  get_field('logo',$id);
	$mission =   get_field('mission',$id);
	$what_we_do = get_field('what_we_do', $id);
	$who_we_are = get_field('who_we_are', $id);
	$how_you_join = get_field('how_you_join', $id);


?>



<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<div id="fullpage">

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'content', 'page' );

			// End the loop.
			endwhile;
			?>

		</div>

	</main><!-- #main -->
</div><!-- #primary -->
<div class="height120"></div>
<?php get_footer(); ?>
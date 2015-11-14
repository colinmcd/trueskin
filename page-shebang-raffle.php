<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Full Frame
 * @since Full Frame 1.0
 */

get_header(); ?>
<meta property="og:image" content="http://true.ink/wp-content/uploads/2015/06/boatrafflegif-cover.jpg"/>
<style type="text/css">
	.shebang {text-align:center; letter-spacing:1px; font-family:league-gothic-condensed!important; color: #00B!important; line-height:1em; font-size:140px}
	.raffle {text-align:center; letter-spacing:1px; padding:10px 0px; font-style:italic; font-family:league-gothic!important; color: #F84919!important; line-height:1em; font-size:60px}
	@media screen and (max-width: 520px) {
		.shebang{font-size:6em}
		.raffle{font-size:2.5em;padding:10px 0px}
	}
</style>

<div id="primary" class="content-area">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'page-raffle' ); ?>

	<?php endwhile; // end of the loop. ?>

</div><!-- #primary -->

<?php get_footer(); ?>
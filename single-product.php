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

get_header(); ?>

<?php 

$format = get_post_format();
if ( false === $format ) {
	$format = 'standard';
}

get_template_part( 'product', $format );

?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
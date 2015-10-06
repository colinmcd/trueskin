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

if ( $format == 'image' ) {
	$format = 'gallery';
}
elseif ( $format == 'video' ) {
	$format = 'video';
}
//recipe
elseif ( $format == 'aside' ) {
	$format = 'aside';
}
else {
	$format = 'standard';
}
if(get_the_id() == 1840) {
	$format = 'almanac';
}


get_template_part( 'story', $format );



?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
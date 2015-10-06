<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package true
 */
?>

<div id="fullpage">

	<div class="section read"  style="padding-top:61px;">

		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<?php 
								the_content(); 
							?>
							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'true' ),
									'after'  => '</div>',
									) );
							?>
						</div><!-- .entry-content -->
						<footer class="entry-footer">
							<?php edit_post_link( __( 'Edit', 'true' ), '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-footer -->
					</article><!-- #post-## -->

				</div>
			</div>
		</div>
	</div>

</div>
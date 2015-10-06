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
		<script src="//use.typekit.net/uuj1gqg.js"></script>
		<script>try{Typekit.load();}catch(e){}</script>
		    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

	<!-- SHARE MODAL -->
	

	<div id="page" class="hfeed site">
		
		<div style="background-color:#000; z-index:99999; line-height:1!important;height:50px">
  <a class="navbar-brand" style="z-index:99999;" href="http://true.ink"></a>

			<nav role="navigation" class="site-navigation main-navigation block">
												<div style="float:right; margin:5px 5px 0 0;">
												
<a href="http://www.facebook.com/truedotink" target="_blank" class="fa-stack fa-lg" style="margin-right:12px">
                <i class="fa fa-circle fa-stack-2x" style="font-size: 3em !important"></i>
                <i class="fa fa-facebook fa-stack-1x" style="font-size: 1.5em !important; padding: 8px 11px 0px;"></i>
            </a>
            <a href="http://www.twitter.com/truedotink" target="_blank" class="fa-stack fa-lg" style="margin-right:12px; z-index:99999;">
                <i class="fa fa-circle fa-stack-2x" style="font-size: 3em !important"></i>
                <i class="fa fa-twitter fa-stack-1x" style="font-size: 1.5em !important; padding: 7px 0px 0px 6px;"></i>
            </a>   
            <a href="http://www.instagram.com/truedotink" target="_blank" class="fa-stack fa-lg" style="margin-right:12px; z-index:99999;">
                <i class="fa fa-circle fa-stack-2x" style="font-size: 3em !important"></i>
                <i class="fa fa-instagram fa-stack-1x" style="font-size: 1.5em !important; padding: 7px 0px 0px 6px;"></i>
            </a> 
            <a href="http://true.ink/mission.php" target="_blank" class="fa-stack fa-lg" style="margin-right:12px; z-index:99999;">
                <i class="fa fa-circle fa-stack-2x" style="font-size: 3em !important"></i>
                <i class="fa fa-info fa-stack-1x" style="color:black!important; font-size: 1.5em !important; padding: 7px 0px 0px 6px"></i>
            </a>
                        <!-- a href="http://eepurl.com/bngDnH" target="_blank" class="fa-stack fa-lg">
            <i class="fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-envelope fa-stack-1x"></i></a -->
            <!-- h1 class="assistive-text"><?php _e( 'Menu', 'full_frame' ); ?></h1>
				<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'full_frame' ); ?>"><?php _e( 'Skip to content', 'full_frame' ); ?></a></div>
								<div style="float:right"><?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'menu_class' => 'main-menu' ) ); ?> </div -->

            </DIV>
			</nav><!-- .site-navigation .main-navigation -->
			     
		</div>
		
		<div id="content" class="site-content">

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
<style>
#mc_embed_signup .button {color: #D51E10; background-color: #FEFB04;}
#mc_embed_signup form {padding: 20px 0px 10px !important;}
.essb_links.essb_template_grey-circles-retina li a .essb_network_name {vertical-align:bottom!important}
@media only screen and (max-width: 480px) {

   .hed { font-size: 24px!important; }
   .text { font-size: 18px; width:300px!important; }
   .pan { width:300px!important; height:225px!important; background-image:url('http://true.ink//wp-content/uploads/2015/09/pan-300.png')!important; }
   .logo {width:auto!important}
      .tienda { width:300px!important; height:70px!important; background-image:url('http://true.ink//wp-content/uploads/2015/09/LaTienda_logo2-300.png')!important; }
}
</style>
<div style="letter-spacing:3px; background-size: cover; background-image:url('http://true.ink/wp-content/uploads/2015/09/paella-bg-2-sm.jpg')">
<div style="text-align:center; padding-top:30px; margin:auto"><img src="http://true.ink//wp-content/uploads/2015/09/logo-party-sm-3.png"></div>
<div style="text-align:center; padding:10px 0 30px 0; line-height:1em; font-size:24px; color:white">INVITES YOU TO</div>
<div class="pan" style="width:650px; height:490px; margin:auto; text-align:center; padding-top:20px; background-repeat:no-repeat; background-image:url('http://true.ink//wp-content/uploads/2015/09/pan-650.png')"></div>

<div class="text" style="width:480px; line-height:1.1em; margin:auto; text-align:center; font-family:adobe-caslon-pro; padding: 0px 0px 30px 0px; font-size:20px; color:white"><em>A special feast including distinguished guests, extraordinary wines, magic rice & you.</em></div>
<div class="hed" style="text-align:center; padding-bottom:20px; line-height:1em; font-size:34px; color:white">37 BOX STREET, GREENPOINT, BROOKLYN</div>
<div class="hed" style="text-align:center; padding-bottom:20px; line-height:1em; font-size:34px; color:white">OCTOBER 1ST, 7:30 PM ON...</div>
<div class="text" style="width:480px; line-height:1.1em; margin:auto; text-align:center; font-family:adobe-caslon-pro; padding: 20px 0px; font-size:20px; color:white"><em>We might pick you to learn paella cooking with our maestro. Be sure to RSVP!<br><br>And if you can't make it, drop your email at the bottom of this page. We'll shout about our next Almanac - and our next event!</em></div>

<!-- Begin MailChimp Signup Form -->
<div id="mc_embed_signup">
<form action="//ink.us9.list-manage.com/subscribe/post?u=7b051329937c2cd004c0f6783&amp;id=ee670ac074" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	
<div class="mc-field-group">
	<input type="email" value="" name="EMAIL" class="required email" placeholder="Your email?" id="mce-EMAIL">
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_7b051329937c2cd004c0f6783_ee670ac074" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="RSVP" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>

<!--End mc_embed_signup-->
<div style="vertical-align:bottom!important; line-height:1em"><?php echo do_shortcode('[easy-social-share buttons="facebook,twitter,pinterest,mail" counters=0 style="button"]'); ?></div>

<div class="logo" style="width:750px; text-align:center; padding-top:30px; padding-bottom:20px; margin:auto">
<a href="http://www.narragansettbeer.com/"><img src="http://true.ink//wp-content/uploads/2015/09/Gansett_Logo2.png"></a>
<a href="http://spanishartisanwine.com/"><img style="padding:0px 20px" src="http://true.ink//wp-content/uploads/2015/09/SpanishArtisan_Logo2.png"></a>
<a href="http://www.northbrooklynfarms.com/"><img src="http://true.ink//wp-content/uploads/2015/09/NorthBrooklynFarms_Logo.png"></a>
<a href="http://www.bakeribrooklyn.com/"><img src="http://true.ink//wp-content/uploads/2015/10/bakeri-sm.png"></a>
<a href="http://www.socarratnyc.com/"><img src="http://true.ink//wp-content/uploads/2015/10/socorrat-sm.png"></a>
<div>&nbsp;</div>
<a href="http://www.paellamasters.com/"><img src="http://true.ink//wp-content/uploads/2015/10/PaellaMasters-2.png"></a>

</div>

<a href="https://tienda.com/"><div class="tienda" style="width:640px; height:140px; margin:auto; text-align:center; padding-top:20px; background-repeat:no-repeat; background-image:url('http://true.ink//wp-content/uploads/2015/09/LaTienda_logo2.png')"></div></a>


</div>
<?php get_footer(); ?>
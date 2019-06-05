<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package makinggayhistory
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link type="application/rss+xml" rel="alternate" title="Making Gay History" href="http://feeds.megaphone.fm/makinggayhistory"/>

<?php wp_head(); ?>

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/vendor/font-awesome/css/font-awesome.min.css">
<style>
#masthead {
	background-color: rgba(34, 34, 34, 0.6);
	background-blend-mode: overlay;
	background-image: url(<?php echo wp_get_attachment_url(get_theme_mod('header_image')); ?>);
	background-size: cover;
	background-position: 44% 0%;
	background-attachment: fixed;
}
</style>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'a-theme-for-making-gay-history-podcast' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<div class="site-branding__wrapper">
				<a class="site-link" href="<?php echo site_url(); ?>">
					<h1 class="site-title">MAKING<br />GAY<br /><span id="history--h">H</span><span id="history--i">I</span><span id="history--s">S</span><span id="history--t">T</span><span id="history--o">O</span><span id="history--r">R</span><span id="history--y">Y</span><span class="narrow-space">&mdash;</span><span class="site-sub">THE PODCAST</span></h1>

			<?php $description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>

					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			
			<?php endif; ?>

				</a>
			</div>
		</div><!-- .site-branding -->

		<a href="#site-navigation" class="menu-toggle hamburger hamburger--arrow-r">
		  <span class="hamburger-box">
		    <span class="hamburger-inner"></span>
		  </span>
		</a>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php $items_wrap = '<ul id="%1$s" class="%2$s"><li class="search-form">' . get_search_form(false) . '</li>%3$s</ul>';
			wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container' => 'ul', 'items_wrap' => $items_wrap ) ); ?>
		</nav><!-- #site-navigation -->
		<script type="text/javascript">
			jQuery(document).ready(function($){
				var $menu = $("#site-navigation").mmenu({
					navbar: false,
	         "offCanvas": {
	            "position": "right",
	            "zposition": "next"
	         },
         "navbars": [
            {
               "position": "top",
               "height": 2,
               "content": "<p>Making Gay History</p>"
            },
         ],
         "extensions": [
         	"pagedim-black",
         	"shadow-page"
         ]
				});
				var $icon = $(".menu-toggle");
				var API = $menu.data( "mmenu" );

				$icon.on( "click", function() {
				   API.open();

				<?php if(is_admin_bar_showing()) : ?>

				   $('html').attr('style', 'margin-top: 0 !important;');
				   $('.menu-toggle').attr('style', 'top: 3rem;');

				<?php endif; ?>

				});

				API.bind( "opened", function() {
				   $icon.addClass( "is-active" );
				});

				API.bind( "closed", function() {
				   $icon.removeClass( "is-active" );

				<?php if(is_admin_bar_showing()) : ?>

				   $('html').attr('style', 'margin-top: 32px !important;');
				   $('.menu-toggle').attr('style', 'top: 1rem;');

				<?php endif; ?>

				});
				
			});
		</script>
	</header><!-- #masthead -->

	<div id="content" class="site-content">

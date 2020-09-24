<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package On_Reading
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

	
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<header id="masthead" class="site-header">
		
		
	<?php if ( has_nav_menu( 'primary' ) ) { ?>

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'on-reading' ); ?></a>
		
	<nav class="navbar navbar-expand-md navbar-light bg-secondary">
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#on-reading-primary-nav" aria-controls="on-reading-primary-nav" aria-expanded="false" aria-label="Toggle Primary Navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>
		<div class="container-xl">
		 <?php
			wp_nav_menu( array(
				'theme_location'    => 'primary',
				'depth'             => 2,
				'container'         => 'div',
				'container_class'   => 'collapse navbar-collapse',
				'container_id'      => 'on-reading-primary-nav',
				'menu_class'        => 'navbar-nav d-flex justify-content-around w-100',
				'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
				'walker'            => new WP_Bootstrap_Navwalker(),
			) );
        ?>
		</div>
	</nav>

	<?php } ?>
		
	<div class="site-branding">	
		<div class="container-xl" style="background-image: url(<?php header_image(); ?>);
    background-position: center center;
    background-size: auto;
    background-repeat: repeat;
    background-attachment: scroll;">
			<div class="row align-items-center">
				<div class="col-8">
					<?php
		// the_custom_logo();
		if ( is_front_page() && is_home() ) :
			?><h1 class="site-title display-1 px-3 pt-4 pb-0 m-0"><?php bloginfo( 'name' ); ?></h1><?php		
		else :
			?><p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php
				bloginfo( 'name' );
			?></a></p><?php
		endif;
		$on_reading_description = get_bloginfo( 'description', 'display' );
		if ( $on_reading_description || is_customize_preview() ) :
			?><p class="site-description px-3 pb-5 m-0"><?php echo $on_reading_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
				</div>
			<div class="col-3">
				<button class="btn btn-lg btn-block btn-outline-primary rounded-pill">
					Subscribe
				</button>
				</div></div>
		
		
		</div>
		</div><!-- .site-branding -->
		
	<?php if ( has_nav_menu( 'secondary' ) ) { ?>
	<nav class="navbar navbar-expand-md navbar-dark bg-primary">
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#on-reading-secondary-nav" aria-controls="on-reading-secondary-nav" aria-expanded="false" aria-label="Toggle Secondary Navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>
		<div class="container-xl">
		 <?php
			wp_nav_menu( array(
				'theme_location'    => 'secondary',
				'depth'             => 2,
				'container'         => 'div',
				'container_class'   => 'collapse navbar-collapse',
				'container_id'      => 'on-reading-secondary-nav',
				'menu_class'        => 'navbar-nav d-flex justify-content-around w-100',
				'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
				'walker'            => new WP_Bootstrap_Navwalker(),
			) );
        ?>
		</div>
	</nav>
	<?php } ?>
	
		
	<?php if ( has_nav_menu( 'combined' ) ) { ?>
	<nav class="navbar navbar-combined fixed-top navbar-expand-md navbar-dark bg-primary">
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#on-reading-combined-nav" aria-controls="on-reading-combined-nav" aria-expanded="false" aria-label="Toggle Combined Navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>
		<div class="container-xl">
		 <?php
			wp_nav_menu( array(
				'theme_location'    => 'combined',
				'depth'             => 2,
				'container'         => 'div',
				'container_class'   => 'collapse navbar-collapse',
				'container_id'      => 'on-reading-combined-nav',
				'menu_class'        => 'navbar-nav d-flex justify-content-around w-100',
				'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
				'walker'            => new WP_Bootstrap_Navwalker(),
			) );
        ?>
		</div>
	</nav>
		
		
		
		
		
	<?php } ?>	
		
		
		
	</header><!-- #masthead -->
	

		

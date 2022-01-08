<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="wrapper">
	<div id="header-wrapper" class="hfeed">
	  <header id="site-header">
		<div id="header-wrap" class="wrap">
		  <?php
		  $imageID = get_field( 'header_logo', 'option' )[ 'id' ];
		  ?>
		  <div id="header-logo"><a class="desktop-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo wp_get_attachment_image($imageID, 'full' ); ?></a> </div>
		  <div id="home-menu"><i class="fas fa-bars"></i>&nbsp; Menu</div>
		  <nav id="header-nav" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
		  </nav>
		</div>
		<div id="header-shape-container">
			<?php echo wp_get_attachment_image( get_field( 'header_shape', 'option' )['id'], 'full', false, array( 'id' => 'header-shape' ) ); ?>
		</div>
	  </header>
	</div>
	<div id="sticky-header">
		<div class="wrap" id="sticky-header-wrap">
			<div id="sticky-header-contents">
				<div id="sticky-header-contents-left">
					<?php $imageID = get_field( 'header_sticky_logo', 'option' )['id']; ?>
					<div id="sticky-header-logo"><a class="desktop-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo wp_get_attachment_image($imageID, 'full' ); ?></a> </div>
	  				<nav id="sticky-header-nav" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
	  				</nav>
				</div>
				<?php echo wp_get_attachment_image( get_field( 'sticky_header_shape', 'option' )['id'], 'full', false, array( 'id' => 'sticky-header-shape' ) ); ?>
			</div>
		</div>
	</div>
	<div id="container">

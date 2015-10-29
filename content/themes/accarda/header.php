<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package accarda
 */

?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>" class="no-js">
  <head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0">

		<!-- for Google -->
		<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<meta name="copyright" content="" />
		<meta name="application-name" content="<?php bloginfo( 'name' ); ?>" />

		<!-- for Facebook -->          
		<meta property="og:title" content="<?php bloginfo( 'name' ); ?>" />
		<meta property="og:type" content="article" />
		<meta property="og:image" content="" />
		<meta property="og:url" content="" />
		<meta property="og:description" content="<?php bloginfo( 'description' ); ?>" />

		<!-- for Twitter -->          
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:title" content="<?php bloginfo( 'name' ); ?>" />
		<meta name="twitter:description" content="<?php bloginfo( 'description' ); ?>" />
		<meta name="twitter:image" content="" />

    <link rel="shortcut icon" href="<?php echo esc_url( home_url() ); ?> /assets/images/favicon.ico" />

    <title><?php bloginfo( 'name' ); ?></title>
    <link rel="stylesheet" href="<?php echo esc_url( home_url() ); ?> /assets/stylesheets/site.prefixed.css">
  </head>
  <body><header id="site-header">
  <div class="container wrapper">
    <div class="row">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img src="<?php echo esc_url( home_url() ); ?> /assets/images/logo-accarda.png" alt="<?php bloginfo( 'name' ); ?>" id="header-logo">
      </a>
    </div>
    
    <nav class="navbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed btn btn-accarda" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="mobile-menu-label">Menü</span>
          </button>
        </div>

        <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 1,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'header-navbar',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
    </nav>

  </div>
</header>

<?php $container = get_theme_mod( 'understrap_container_type' ); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="hfeed site" id="page">

		<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">
			<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>
			<nav class="navbar navbar-expand-lg navbar-dark">
			<?php if ( 'container' == $container ) : ?><div class="container"><?php endif; ?>
			
				<h1 class="navbar-brand mb-0 d-flex align-items-center">
					<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
						<img class="logo" src="<?php echo dirname( get_bloginfo('stylesheet_url')); ?>/images/logo.png" alt="College Park Church" />
					</a>
					<a class="ml-2" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
						<span class="brand-bold">College Park</span>
						<span class="brand-spaced">Church</span>
					</a>	
				</h1>																	

				<div class="d-flex align-items-lg-end align-items-md-start flex-column w-100">
					<div class="d-flex align-items-center justify-content-end w-100">
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'secondary',
								'container_class' => 'd-none d-lg-block',
								'menu_class'      => 'navbar-nav',
								'menu_id'         => 'secondary-menu',
								'walker'          => new understrap_WP_Bootstrap_Navwalker(),
							)
						); ?>

						<div class="social ml-lg-2 mr-3">
							<a href="https://www.facebook.com/cpubchurch" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="https://twitter.com/cpubchurch" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<a href="<?php echo esc_url( home_url('feed') ); ?>" target="_blank"><i class="fa fa-rss" aria-hidden="true"></i></a>
						</div>

						<?php get_search_form(true) ?>

						<button class="navbar-toggler ml-lg-3 ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
					</div>

					<div id="navbarNavDropdown" class="collapse navbar-collapse">
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'menu_class'      => 'navbar-nav mt-4',
								'menu_id'         => 'main-menu',
								'walker'          => new understrap_WP_Bootstrap_Navwalker(),
							)
						); ?>

						<?php wp_nav_menu(
							array(
								'theme_location'  => 'secondary',
								'container_class' => 'd-lg-none',
								'menu_class'      => 'navbar-nav',
								'menu_id'         => 'secondary-menu',
								'walker'          => new understrap_WP_Bootstrap_Navwalker(),
							)
						); ?>
					</div>
				</div>

				<?php if ( 'container' == $container ) : ?></div><?php endif; ?>
			</nav>
		</div>

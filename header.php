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
			<nav class="navbar navbar-expand-md navbar-dark bg-dark">
			<?php if ( 'container' == $container ) : ?><div class="container"><?php endif; ?>
			
				<h1 class="navbar-brand mb-0">
					<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
						<span class="brand-bold">College Park</span>
						<span class="brand-spaced">Church</span>
					</a>	
				</h1>																	

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="d-flex align-items-end flex-column">
					<div class="d-flex">
						<div class="social">
							<a href="https://www.facebook.com/cpubchurch" target="_blank"><i class="fa fa-facebook-square"></i></a>
							<a href="https://twitter.com/cpubchurch" target="_blank"><i class="fab fa-twitter-square"></i></a>
							<a href="<?php echo esc_url( home_url('feed') ); ?>" target="_blank"><i class="fas fa-rss-square"></i></a>
						</div>

						<?php get_search_form(true) ?>
					</div>

					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'walker'          => new understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
				</div>

				<?php if ( 'container' == $container ) : ?></div><?php endif; ?>
			</nav>
		</div>

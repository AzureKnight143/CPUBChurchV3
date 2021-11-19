<?php $container = get_theme_mod('understrap_container_type'); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="hfeed site" id="page">
		<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">
			<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e('Skip to content', 'understrap'); ?></a>
			<nav class="navbar navbar-expand-lg navbar-dark">
				<?php if ('container' == $container) : ?><div class="container"><?php endif; ?>
					<a rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url">
						<img class="logo-mobile d-lg-none" src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/images/logo.png" alt="College Park Church" />
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-dropdown" aria-controls="navbar-dropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div id="navbar-dropdown" class="collapse navbar-collapse">
						<?php wp_nav_menu(array(
							'theme_location'  => 'primary',
							'menu_class'      => 'navbar-nav',
							'menu_id'         => 'main-menu',
							'walker'          => new understrap_WP_Bootstrap_Navwalker(),
							"depth" 		  => 2
						)); ?>
					</div>
					<?php if ('container' == $container) : ?>
					</div><?php endif; ?>
			</nav>
		</div>
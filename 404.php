<?php
$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );

get_header();
?>

<div class="wrapper" id="error-404-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<div class="col-md-12 content-area" id="primary">
				<main class="site-main" id="main">
					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'That page could not be found', 'understrap' ); ?></h1>
						</header>

						<div class="page-content">
							<p><?php esc_html_e( 'We did not find the page you were looking for. Try one of the links at the top of the page or try a search!', 'understrap' ); ?></p>
							<?php get_search_form(); ?>
						</div>
					</section>
				</main>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>

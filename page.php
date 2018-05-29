<?php
$container   = get_theme_mod( 'understrap_container_type' );
get_header();
?>

<div class="wrapper" id="page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

                <main class="site-main" id="main">
                    <?php 
                    while ( have_posts() ) : the_post();
                        get_template_part( 'loop-templates/content', 'page' );

                        if ($displayChildren) :
                             include get_stylesheet_directory() . '/page-templates/sections/children.php';
                        endif;

                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    endwhile; 
                    ?>
                </main>
            </div>
            
            <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
        </div>
	</div>
</div>

<?php get_footer(); ?>

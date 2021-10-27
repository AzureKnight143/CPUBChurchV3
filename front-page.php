<?php  
$container = get_theme_mod( 'understrap_container_type' );
get_header();
?>

<div class="wrapper" id="home-wrapper">
    <main class="site-main" id="main">
        <div class="<?php echo esc_attr( $container ); ?>">
            <div class="highlights">
                <?php if(get_theme_mod('highlight_main_text_1') != "") { ?>
                <div class="highlight one">
                    <h2><?php echo get_theme_mod('highlight_main_text_1') ?></h2>
                    <p><?php echo get_theme_mod('highlight_secondary_text_1') ?></p>
                </div>
                <?php } ?>
                <?php if(get_theme_mod('highlight_main_text_2')) { ?>
                <div class="highlight two">
                    <h2><?php echo get_theme_mod('highlight_main_text_2') ?></h2>
                    <p><?php echo get_theme_mod('highlight_secondary_text_2') ?></p>
                </div>
                <?php } ?>
                <?php if(get_theme_mod('highlight_main_text_3')) { ?>
                <div class="highlight three">
                    <h2><?php echo get_theme_mod('highlight_main_text_3') ?></h2>
                    <p><?php echo get_theme_mod('highlight_secondary_text_3') ?></p>
                </div>
                <?php } ?>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
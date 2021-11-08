<?php  
$container = get_theme_mod( 'understrap_container_type' );
get_header();
?>

<div class="wrapper" id="home-wrapper">
    <main class="site-main" id="main">
        <div class="<?php echo esc_attr( $container ); ?>">
            <div class="highlights">
                <?php if(get_theme_mod('highlight_main_text_1') != "") { ?>
                <a class="highlight" href="<?php echo get_permalink( get_theme_mod('highlight_link_1') ) ?>">
                    <h2><?php echo get_theme_mod('highlight_main_text_1') ?></h2>
                    <?php if(get_theme_mod('highlight_secondary_text_1')) { ?>
                    <p><?php echo get_theme_mod('highlight_secondary_text_1') ?></p>
                    <?php } ?>
                </a>
                <?php } ?>
                <?php if(get_theme_mod('highlight_main_text_2')) { ?>
                <a class="highlight" href="<?php echo get_permalink( get_theme_mod('highlight_link_2') ) ?>">
                    <h2><?php echo get_theme_mod('highlight_main_text_2') ?></h2>
                    <?php if(get_theme_mod('highlight_secondary_text_2')) { ?>
                    <p><?php echo get_theme_mod('highlight_secondary_text_2') ?></p>
                    <?php } ?>
                </a>
                <?php } ?>
                <?php if(get_theme_mod('highlight_main_text_3')) { ?>
                <a class="highlight" href="<?php echo get_permalink( get_theme_mod('highlight_link_3') ) ?>">
                    <h2><?php echo get_theme_mod('highlight_main_text_3') ?></h2>
                    <?php if(get_theme_mod('highlight_secondary_text_3')) { ?>
                    <p><?php echo get_theme_mod('highlight_secondary_text_3') ?></p>
                    <?php } ?>
                </a>
                <?php } ?>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
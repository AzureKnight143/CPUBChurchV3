<?php
$container = get_theme_mod('understrap_container_type');
get_header();
?>

<div class="wrapper" id="home-wrapper">
    <main class="site-main" id="main">
        <div class="<?php echo esc_attr($container); ?>">
            <div class="banner">
                <?php if (get_theme_mod('banner_title')) { ?>
                    <h1><?php echo get_theme_mod('banner_title') ?></h1>
                <?php } ?>
                <?php if (get_theme_mod('banner_subtitle')) { ?>
                    <h2><?php echo get_theme_mod('banner_subtitle') ?></h2>
                <?php } ?>
                <?php if (get_theme_mod('banner_content')) { ?>
                    <p><?php echo get_theme_mod('banner_content') ?></p>
                <?php } ?>
                <div class="links">
                    <?php if (get_theme_mod('banner_link_1') && get_theme_mod('banner_link_text_1')) { ?>
                        <a href="<?php echo get_permalink(get_theme_mod('banner_link_1')) ?>"><?php echo get_theme_mod('banner_link_text_1') ?></a>
                    <?php } ?>
                    <?php if (get_theme_mod('banner_link_2') && get_theme_mod('banner_link_text_2')) { ?>
                        <a href="<?php echo get_permalink(get_theme_mod('banner_link_2')) ?>"><?php echo get_theme_mod('banner_link_text_2') ?></a>
                    <?php } ?>
                </div>
            </div>
            <div class="highlights">
                <?php if (get_theme_mod('highlight_title_1') && get_theme_mod('highlight_link_1')) { ?>
                    <a class="highlight" href="<?php echo get_permalink(get_theme_mod('highlight_link_1')) ?>">
                        <h2><?php echo get_theme_mod('highlight_title_1') ?></h2>
                        <?php if (get_theme_mod('highlight_subtitle_1')) { ?>
                            <p><?php echo get_theme_mod('highlight_subtitle_1') ?></p>
                        <?php } ?>
                    </a>
                <?php } ?>
                <?php if (get_theme_mod('highlight_title_2') && get_theme_mod('highlight_link_2')) { ?>
                    <a class="highlight" href="<?php echo get_permalink(get_theme_mod('highlight_link_2')) ?>">
                        <h2><?php echo get_theme_mod('highlight_title_2') ?></h2>
                        <?php if (get_theme_mod('highlight_subtitle_2')) { ?>
                            <p><?php echo get_theme_mod('highlight_subtitle_2') ?></p>
                        <?php } ?>
                    </a>
                <?php } ?>
                <?php if (get_theme_mod('highlight_title_3') && get_theme_mod('highlight_link_3')) { ?>
                    <a class="highlight" href="<?php echo get_permalink(get_theme_mod('highlight_link_3')) ?>">
                        <h2><?php echo get_theme_mod('highlight_title_3') ?></h2>
                        <?php if (get_theme_mod('highlight_subtitle_3')) { ?>
                            <p><?php echo get_theme_mod('highlight_subtitle_3') ?></p>
                        <?php } ?>
                    </a>
                <?php } ?>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
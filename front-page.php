<?php
$featured_post = wp_get_recent_posts(array(
    'numberposts' => '1',
    'post_status' => 'publish',
    'category_name' => "featured"
))[0];

$recent_posts = wp_get_recent_posts(array(
    'numberposts' => '3',
    'post_status' => 'publish',
    'category_name' => 'news',
    'post__not_in' => array($featured_post['ID'])
));

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
        <div class="featured announcement" style="background-image: url('<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($featured_post["ID"]), 'single-post-thumbnail')[0] ?>')">
            
                <div class="<?php echo esc_attr($container); ?>">
                    <h2><?php echo $featured_post["post_title"]; ?></h2>
                    <?php if (get_field('subtitle')) { ?>
                        <h3><?php the_field('subtitle'); ?></h3>
                    <?php } ?>
                    <a class="more" href="<?php echo get_permalink($featured_post["ID"]); ?>">Learn More</a>
                </div>
            
        </div>
        <?php foreach ($recent_posts as $post) { ?>
            <div class="announcement" style="background-image: url('<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post["ID"]), 'single-post-thumbnail')[0] ?>')">
                <div class="<?php echo esc_attr($container); ?>">
                    <h2><?php echo $post["post_title"]; ?></h2>
                    <?php if (get_field('subtitle')) { ?>
                        <h3><?php the_field('subtitle'); ?></h3>
                    <?php } ?>
                    <a class="more" href="<?php echo get_permalink($post["ID"]); ?>">Learn More</a>
                </div>
            </div>
        <?php } ?>
    </main>
</div>

<?php get_footer(); ?>
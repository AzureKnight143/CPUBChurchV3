<?php
$featured_posts = wp_get_recent_posts(array(
    'numberposts' => '1',
    'post_status' => 'publish',
    'category_name' => "featured"
));
$featured_post = array_shift($featured_posts);

$recent_posts = wp_get_recent_posts(array(
    'numberposts' => '3',
    'post_status' => 'publish',
    'category_name' => 'news',
    'post__not_in' => $featured_post ? array($featured_post['ID']) : array()
));

$announcementCount = 0;

function getAnnouncementAlignment($announcementCount)
{
    echo $announcementCount % 2 ? '' : 'right';
}

$container = get_theme_mod('understrap_container_type');
get_header();
?>

<div class="wrapper" id="home-wrapper">
    <main class="site-main" id="main">
        <div class="<?php echo esc_attr($container); ?>">
            <div class="banner">
                <?php if (get_theme_mod('banner_subtitle')) { ?>
                    <h2><?php echo get_theme_mod('banner_subtitle') ?></h2>
                <?php } ?>
                <?php if (get_theme_mod('banner_title')) { ?>
                    <h1><?php echo get_theme_mod('banner_title') ?></h1>
                <?php } ?>
                <?php if (get_theme_mod('banner_content')) { ?>
                    <p><?php echo get_theme_mod('banner_content') ?></p>
                <?php } ?>
                <div class="links">
                    <?php for ($banner_link_number = 0; $banner_link_number <= 2; $banner_link_number++) { ?>
                        <?php if (get_theme_mod('banner_link_' . $banner_link_number) && get_theme_mod('banner_link_text_' . $banner_link_number)) { ?>
                            <a
                                href="<?php echo get_permalink(get_theme_mod('banner_link_' . $banner_link_number)) ?>"><?php echo get_theme_mod('banner_link_text_' . $banner_link_number) ?></a>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <div class="highlights">
                <?php for ($highlight_number = 0; $highlight_number <= 3; $highlight_number++) { ?>
                    <?php if (get_theme_mod('highlight_title_' . $highlight_number) && get_theme_mod('highlight_link_' . $highlight_number)) { ?>
                        <a class="highlight"
                            href="<?php echo get_permalink(get_theme_mod('highlight_link_' . $highlight_number)) ?>">
                            <h2><?php echo get_theme_mod('highlight_title_' . $highlight_number) ?></h2>
                            <?php if (get_theme_mod('highlight_subtitle_' . $highlight_number)) { ?>
                                <p><?php echo get_theme_mod('highlight_subtitle_' . $highlight_number) ?></p>
                            <?php } ?>
                        </a>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <?php if ($featured_post) {
            $announcementCount++; ?>
            <div class="featured announcement"
                style="background-image: url('<?php echo get_field('home_page_image', $featured_post["ID"])['url'] ?>')">
                <div class="<?php echo esc_attr($container); ?>">
                    <h2><?php echo $featured_post["post_title"]; ?></h2>
                    <?php if (get_field('subtitle', $featured_post["ID"])) { ?>
                        <h3><?php the_field('subtitle', $featured_post["ID"]); ?></h3>
                    <?php } ?>
                    <a class="more" href="<?php echo get_permalink($featured_post["ID"]); ?>">Learn More</a>
                </div>
            </div>
        <?php }
        $announcementCount++; ?>
        <div class="sermon announcement <?php getAnnouncementAlignment($announcementCount) ?>"
            style="background-image: url('<?php echo wp_get_attachment_url(get_theme_mod('sermon_background_image')) ?>')">
            <div class="<?php echo esc_attr($container); ?>">
                <?php if (get_theme_mod('sermon_title')) { ?>
                    <h2><?php echo get_theme_mod('sermon_title') ?></h2>
                <?php } ?>
                <?php if (get_theme_mod('sermon_subtitle')) { ?>
                    <h3><?php echo get_theme_mod('sermon_subtitle') ?></h3>
                <?php } ?>
                <a class="more" href="<?php echo get_permalink(get_page_by_path('sermons')) ?>">Watch Latest Sermon</a>
            </div>
        </div>
        <div class="<?php echo esc_attr($container); ?>">
            <div class="small-highlights">
                <div class="position-wrapper">
                    <?php for ($small_highlight_number = 0; $small_highlight_number <= 4; $small_highlight_number++) { ?>
                        <?php if (get_theme_mod('small_highlight_title_' . $small_highlight_number) && get_theme_mod('small_highlight_image_' . $small_highlight_number)) { ?>
                            <div class="small-highlight">
                                <img src="<?php echo wp_get_attachment_url(get_theme_mod('small_highlight_image_' . $small_highlight_number)) ?>"
                                    alt="<?php echo get_theme_mod('small_highlight_title_' . $small_highlight_number) ?>" />
                                <div class="content">
                                    <h3><?php echo get_theme_mod('small_highlight_title_' . $small_highlight_number) ?></h3>
                                    <?php if (get_theme_mod('small_highlight_content_' . $small_highlight_number)) { ?>
                                        <p><?php echo get_theme_mod('small_highlight_content_' . $small_highlight_number) ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php foreach ($recent_posts as $post) {
            $announcementCount++; ?>
            <div class="announcement <?php getAnnouncementAlignment($announcementCount) ?>"
                style="background-image: url('<?php echo get_field('home_page_image', $post["ID"])['url'] ?>')">
                <div class="<?php echo esc_attr($container); ?>">
                    <h2><?php echo $post["post_title"]; ?></h2>
                    <?php if (get_field('subtitle', $post["ID"])) { ?>
                        <h3><?php the_field('subtitle', $post["ID"]); ?></h3>
                    <?php } ?>
                    <a class="more" href="<?php echo get_permalink($post["ID"]); ?>">Learn More</a>
                </div>
            </div>
        <?php } ?>
        <div class="<?php echo esc_attr($container); ?> contact">
            <div class="contact-info">
                <h2>How to Find Us</h2>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i><a href="https://goo.gl/maps/xZGMzXRckbo"
                            target="_blank"><?php echo theme_variable_address; ?></a></li>
                    <li><i class="fas fa-phone"></i><a href="tel:260-356-2642"><?php echo theme_variable_phone; ?></a>
                    </li>
                    <li><i class="fas fa-envelope"></i><a
                            href="mailto:office@cpubchurch.com"><?php echo theme_variable_email; ?></a></li>
                    <li><i class="fas fa-clock"></i>Sundays, <?php if (get_theme_mod('service_times')) {
                        echo do_shortcode(get_theme_mod('service_times'));
                    } ?></li>
                </ul>
            </div>
        </div>
        <div class="<?php echo esc_attr($container); ?> connect">
            <?php if (get_theme_mod('newsletter_shortcode')) {
                echo do_shortcode(get_theme_mod('newsletter_shortcode'));
            } ?>
            <div class="social">
                <a class="facebook" href="https://www.facebook.com/cpubchurch" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                    <div class="text">LIKE US ON FACEBOOK</div>
                </a>
                <a class="twitter" href="https://twitter.com/cpubchurch" target="_blank">
                    <i class="fab fa-twitter"></i>
                    <div class="text">FOLLOW US ON TWITTER</div>
                </a>
                <a class="youtube" href="https://www.youtube.com/c/CollegeParkUnitedBrethrenChurch" target="_blank">
                    <i class="fab fa-youtube"></i>
                    <div class="text">VIEW MORE CP CHURCH VIDEOS</div>
                </a>
                <a class="instagram" href="https://www.instagram.com/cpubchurch" target="_blank">
                    <i class="fab fa-instagram"></i>
                    <div class="text">FOLLOW US ON INSTAGRAM</div>
                </a>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
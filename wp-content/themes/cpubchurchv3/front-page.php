<?php
$featured_posts = get_posts(array(
    'numberposts' => 4,
    'post_status' => 'publish',
    'category_name' => 'featured'
));
$featured_post = array_shift($featured_posts);

$announcementCount = 0;

function render_link($url, $content, $class = '', $raw_content = false)
{
    if (!$url || !$content)
        return;
    $is_relative = preg_match('/^\/[^\s]*$/', $url);
    if (!filter_var($url, FILTER_VALIDATE_URL) && !$is_relative)
        return;
    $is_external = !$is_relative && parse_url($url, PHP_URL_HOST) !== parse_url(home_url(), PHP_URL_HOST);
    $class_attr = $class ? ' class="' . esc_attr($class) . '"' : '';
    $target_attr = $is_external ? ' target="_blank" rel="noopener noreferrer"' : '';
    $inner = $raw_content ? $content : esc_html($content);
    echo '<a href="' . esc_url($url) . '"' . $class_attr . $target_attr . '>' . $inner . '</a>';
}

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
                    <h2><?php echo esc_html(get_theme_mod('banner_subtitle')) ?></h2>
                <?php } ?>
                <?php if (get_theme_mod('banner_title')) { ?>
                    <h1><?php echo esc_html(get_theme_mod('banner_title')) ?></h1>
                <?php } ?>
                <?php if (get_theme_mod('banner_content')) { ?>
                    <p><?php echo esc_html(get_theme_mod('banner_content')) ?></p>
                <?php } ?>
                <div class="links">
                    <?php for ($banner_link_number = 1; $banner_link_number <= 3; $banner_link_number++) {
                        render_link(
                            get_theme_mod('banner_link_' . $banner_link_number),
                            get_theme_mod('banner_link_text_' . $banner_link_number)
                        );
                    } ?>
                </div>
            </div>
            <div class="highlights">
                <?php for ($highlight_number = 1; $highlight_number <= 3; $highlight_number++) {
                    $highlight_title = get_theme_mod('highlight_title_' . $highlight_number);
                    $highlight_link = get_theme_mod('highlight_link_' . $highlight_number);
                    if ($highlight_title && $highlight_link && (filter_var($highlight_link, FILTER_VALIDATE_URL) || preg_match('/^\/[^\s]*$/', $highlight_link))) { ?>
                        <a class="highlight" href="<?php echo esc_url($highlight_link) ?>">
                            <h2><?php echo esc_html($highlight_title) ?></h2>
                            <?php if (get_theme_mod('highlight_subtitle_' . $highlight_number)) { ?>
                                <p><?php echo esc_html(get_theme_mod('highlight_subtitle_' . $highlight_number)) ?></p>
                            <?php } ?>
                        </a>
                    <?php }
                } ?>
            </div>
        </div>
        <?php if ($featured_post) {
            $announcementCount++; ?>
            <div class="featured announcement"
                style="background-image: url('<?php echo esc_url(get_field('home_page_image', $featured_post->ID)['url']) ?>')">
                <div class="<?php echo esc_attr($container); ?>">
                    <h2><?php echo esc_html($featured_post->post_title); ?></h2>
                    <?php if (get_field('subtitle', $featured_post->ID)) { ?>
                        <h3><?php the_field('subtitle', $featured_post->ID); ?></h3>
                    <?php } ?>
                    <a class="more" href="<?php echo get_permalink($featured_post->ID); ?>">Learn More</a>
                </div>
            </div>
        <?php }
        $announcementCount++; ?>
        <div class="<?php echo esc_attr($container); ?>">
            <div class="small-highlights">
                <div class="position-wrapper">
                    <?php for ($small_highlight_number = 1; $small_highlight_number <= 4; $small_highlight_number++) { ?>
                        <?php if (get_theme_mod('small_highlight_title_' . $small_highlight_number) && get_theme_mod('small_highlight_image_' . $small_highlight_number)) { ?>
                            <div class="small-highlight">
                                <img src="<?php echo wp_get_attachment_url(get_theme_mod('small_highlight_image_' . $small_highlight_number)) ?>"
                                    alt="<?php echo esc_attr(get_theme_mod('small_highlight_title_' . $small_highlight_number)) ?>" />
                                <div class="content">
                                    <h3><?php echo esc_html(get_theme_mod('small_highlight_title_' . $small_highlight_number)) ?>
                                    </h3>
                                    <?php if (get_theme_mod('small_highlight_content_' . $small_highlight_number)) { ?>
                                        <p><?php echo esc_html(get_theme_mod('small_highlight_content_' . $small_highlight_number)) ?>
                                        </p>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php foreach ($featured_posts as $post) {
            $announcementCount++; ?>
            <div class="announcement <?php getAnnouncementAlignment($announcementCount) ?>"
                style="background-image: url('<?php echo esc_url(get_field('home_page_image', $post->ID)['url']) ?>')">
                <div class="<?php echo esc_attr($container); ?>">
                    <h2><?php echo esc_html($post->post_title); ?></h2>
                    <?php if (get_field('subtitle', $post->ID)) { ?>
                        <h3><?php the_field('subtitle', $post->ID); ?></h3>
                    <?php } ?>
                    <a class="more" href="<?php echo get_permalink($post->ID); ?>">Learn More</a>
                </div>
            </div>
        <?php } ?>
        <div class="contact">
            <div class="<?php echo esc_attr($container); ?>">
                <div class="contact-info">
                    <h2>How to Find Us</h2>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i><a href="https://goo.gl/maps/xZGMzXRckbo"
                                target="_blank"><?php echo theme_variable_address; ?></a></li>
                        <li><i class="fas fa-phone"></i><a
                                href="tel:260-356-2642"><?php echo theme_variable_phone; ?></a>
                        </li>
                        <li><i class="fas fa-envelope"></i><a
                                href="mailto:office@cpubchurch.com"><?php echo theme_variable_email; ?></a></li>
                        <li><i class="fas fa-clock"></i>Sundays, <?php if (get_theme_mod('service_times')) {
                            echo do_shortcode(get_theme_mod('service_times'));
                        } ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="connect">
            <div class="<?php echo esc_attr($container); ?>">
                <?php if (get_theme_mod('newsletter_shortcode')) {
                    echo do_shortcode(get_theme_mod('newsletter_shortcode'));
                } ?>
                <div class="social">
                    <a class="facebook" href="https://www.facebook.com/cpubchurch" target="_blank">
                        <i class="fa-brands fa-facebook-f"></i>
                        <div class="text">LIKE US ON FACEBOOK</div>
                    </a>
                    <a class="twitter" href="https://x.com/cpubchurch" target="_blank">
                        <i class="fa-brands fa-x-twitter"></i>
                        <div class="text">FOLLOW US ON X</div>
                    </a>
                    <a class="youtube" href="https://www.youtube.com/c/CollegeParkUnitedBrethrenChurch" target="_blank">
                        <i class="fa-brands fa-youtube"></i>
                        <div class="text">VIEW MORE CP CHURCH VIDEOS</div>
                    </a>
                    <a class="instagram" href="https://www.instagram.com/cpubchurch" target="_blank">
                        <i class="fa-brands fa-instagram"></i>
                        <div class="text">FOLLOW US ON INSTAGRAM</div>
                    </a>
                </div>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
<?php
add_action('customize_register', 'customize_register');
function customize_register(WP_Customize_Manager $wp_customize)
{
    $wp_customize->remove_section('colors');
    $wp_customize->remove_section('background_image');
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('custom_css');

    $wp_customize->add_panel('homepage', array(
        'title' => __('Homepage'),
        'priority' => 120,
    ));

    // Homepage Banner Section
    $wp_customize->add_section('homepage_banner', array(
        'title' => __('Banner'),
        'panel' => 'homepage',
        'priority' => 1,
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'background_image', array(
        'label' => __('Background Image'),
        'section' => 'homepage_banner'
    )));

    $wp_customize->add_setting('banner_title');
    $wp_customize->add_control('banner_title', array(
        'label' => __('Title'),
        'section' => 'homepage_banner'
    ));

    $wp_customize->add_setting('banner_subtitle');
    $wp_customize->add_control('banner_subtitle', array(
        'label' => __('Subtitle'),
        'section' => 'homepage_banner'
    ));

    $wp_customize->add_setting('banner_content');
    $wp_customize->add_control('banner_content', array(
        'label' => __('Content'),
        'section' => 'homepage_banner',
        'type' => 'textarea'
    ));

    for ($banner_link_number = 1; $banner_link_number <= 2; $banner_link_number++) {
        $wp_customize->add_setting('banner_link_text_' . $banner_link_number);
        $wp_customize->add_control('banner_link_text_' . $banner_link_number, array(
            'label' => __('Link ' . $banner_link_number . ' Text'),
            'section' => 'homepage_banner'
        ));

        $wp_customize->add_setting('banner_link_' . $banner_link_number);
        $wp_customize->add_control('banner_link_' . $banner_link_number, array(
            'label' => __('Link ' . $banner_link_number . ' Page'),
            'section' => 'homepage_banner',
            'type' => 'dropdown-pages'
        ));
    }

    // Homepage Highlight Section
    $wp_customize->add_section('homepage_highlights', array(
        'title' => __('Highlights'),
        'panel' => 'homepage',
        'priority' => 2,
    ));

    for ($highlight_link_number = 1; $highlight_link_number <= 3; $highlight_link_number++) {
        $wp_customize->add_setting('highlight_title_' . $highlight_link_number);
        $wp_customize->add_control('highlight_title_' . $highlight_link_number, array(
            'label' => __('Card ' . $highlight_link_number . ' Title'),
            'section' => 'homepage_highlights'
        ));

        $wp_customize->add_setting('highlight_subtitle_' . $highlight_link_number);
        $wp_customize->add_control('highlight_subtitle_' . $highlight_link_number, array(
            'label' => __('Card ' . $highlight_link_number . ' Subtitle'),
            'section' => 'homepage_highlights'
        ));

        $wp_customize->add_setting('highlight_link_' . $highlight_link_number);
        $wp_customize->add_control('highlight_link_' . $highlight_link_number, array(
            'label' => __('Card ' . $highlight_link_number . ' Page Link'),
            'section' => 'homepage_highlights',
            'type' => 'dropdown-pages'
        ));
    }

    // Homepage Small Highlights Section
    $wp_customize->add_section('homepage_small_highlights', array(
        'title' => __('Small Highlights'),
        'panel' => 'homepage',
        'priority' => 3,
    ));

    for ($small_highlight_link_number = 1; $small_highlight_link_number <= 4; $small_highlight_link_number++) {
        $wp_customize->add_setting('small_highlight_title_' . $small_highlight_link_number);
        $wp_customize->add_control('small_highlight_title_' . $small_highlight_link_number, array(
            'label' => __('Card ' . $small_highlight_link_number . ' Title'),
            'section' => 'homepage_small_highlights'
        ));

        $wp_customize->add_setting('small_highlight_content_' . $small_highlight_link_number);
        $wp_customize->add_control('small_highlight_content_' . $small_highlight_link_number, array(
            'label' => __('Card ' . $small_highlight_link_number . ' Content'),
            'section' => 'homepage_small_highlights',
            'type' => 'textarea'
        ));

        $wp_customize->add_setting('small_highlight_image_' . $small_highlight_link_number);
        $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'small_highlight_image_' . $small_highlight_link_number, array(
            'label' => __('Card ' . $small_highlight_link_number . ' Image'),
            'section' => 'homepage_small_highlights',
            'width' => 545,
            'height' => 272
        )));
    }

    // Newsletter
    $wp_customize->add_section('homepage_newsletter', array(
        'title' => __('Newsletter Signup'),
        'panel' => 'homepage',
        'priority' => 4,
    ));

    $wp_customize->add_setting('newsletter_shortcode');
    $wp_customize->add_control('newsletter_shortcode', array(
        'label' => __('Contact Form 7 Shortcode'),
        'section' => 'homepage_newsletter'
    ));
}

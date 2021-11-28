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

    $wp_customize->add_setting('banner_link_text_1');
    $wp_customize->add_control('banner_link_text_1', array(
        'label' => __('Link 1 Text'),
        'section' => 'homepage_banner'
    ));

    $wp_customize->add_setting('banner_link_1', array(
        'default' => '',
    ));
    $wp_customize->add_control('banner_link_1', array(
        'label' => __('Link 1 Page'),
        'section' => 'homepage_banner',
        'type' => 'dropdown-pages'
    ));

    $wp_customize->add_setting('banner_link_text_2');
    $wp_customize->add_control('banner_link_text_2', array(
        'label' => __('Link 2 Text'),
        'section' => 'homepage_banner'
    ));

    $wp_customize->add_setting('banner_link_2', array(
        'default' => '',
    ));
    $wp_customize->add_control('banner_link_2', array(
        'label' => __('Link 2 Page'),
        'section' => 'homepage_banner',
        'type' => 'dropdown-pages'
    ));

    // Homepage Highlight Section
    $wp_customize->add_section('homepage_highlight', array(
        'title' => __('Highlight'),
        'panel' => 'homepage',
        'priority' => 2,
    ));

    // Homepage Highlight 1
    $wp_customize->add_setting('highlight_title_1');
    $wp_customize->add_control('highlight_title_1', array(
        'label' => __('Card 1 Title'),
        'section' => 'homepage_highlight'
    ));

    $wp_customize->add_setting('highlight_subtitle_1');
    $wp_customize->add_control('highlight_subtitle_1', array(
        'label' => __('Card 1 Subtitle'),
        'section' => 'homepage_highlight'
    ));

    $wp_customize->add_setting('highlight_link_1', array(
        'default' => '',
    ));
    $wp_customize->add_control('highlight_link_1', array(
        'label' => __('Card 1 Page Link'),
        'section' => 'homepage_highlight',
        'type' => 'dropdown-pages'
    ));

    // Homepage Highlight 2
    $wp_customize->add_setting('highlight_title_2');
    $wp_customize->add_control('highlight_title_2', array(
        'label' => __('Card 2 Title'),
        'section' => 'homepage_highlight'
    ));

    $wp_customize->add_setting('highlight_subtitle_2');
    $wp_customize->add_control('highlight_subtitle_2', array(
        'label' => __('Card 2 Subtitle'),
        'section' => 'homepage_highlight'
    ));

    $wp_customize->add_setting('highlight_link_2', array(
        'default' => '',
    ));
    $wp_customize->add_control('highlight_link_2', array(
        'label' => __('Card 2 Page Link'),
        'section' => 'homepage_highlight',
        'type' => 'dropdown-pages'
    ));

    // Homepage Highlight 3
    $wp_customize->add_setting('highlight_title_3');
    $wp_customize->add_control('highlight_title_3', array(
        'label' => __('Card 3 Title'),
        'section' => 'homepage_highlight'
    ));

    $wp_customize->add_setting('highlight_subtitle_3');
    $wp_customize->add_control('highlight_subtitle_3', array(
        'label' => __('Card 3 Subtitle'),
        'section' => 'homepage_highlight'
    ));

    $wp_customize->add_setting('highlight_link_3', array(
        'default' => '',
    ));
    $wp_customize->add_control('highlight_link_3', array(
        'label' => __('Card 3 Page Link'),
        'section' => 'homepage_highlight',
        'type' => 'dropdown-pages'
    ));
}

add_action('wp_head', 'customizer_css');
function customizer_css()
{ ?>
    <style type="text/css">
    </style>
<?php }

function set_background_image($theme_mod, $css_class)
{
    if (get_theme_mod($theme_mod)) $image = get_theme_mod($theme_mod);
    else $image = 'none';
    return $css_class . ' { background-image: url(' . $image . '); }';
}
?>
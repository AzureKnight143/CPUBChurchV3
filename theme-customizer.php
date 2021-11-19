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

    // Homepage Background Image
    $wp_customize->add_section('homepage_background', array(
        'title' => __('Background'),
        'panel' => 'homepage',
        'priority' => 1,
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'background_image', array(
        'label' => __('Background Image'),
        'section' => 'homepage_background'
    )));

    // Homepage Highlight
    $wp_customize->add_section('homepage_highlight', array(
        'title' => __('Highlight'),
        'panel' => 'homepage',
        'priority' => 2,
    ));

    // Homepage Highlight 1
    $wp_customize->add_setting('highlight_main_text_1');
    $wp_customize->add_control('highlight_main_text_1', array(
        'id' => 'highlight_main_text_1',
        'label' => __('Card 1 Main Text:'),
        'section' => 'homepage_highlight'
    ));
    $wp_customize->add_setting('highlight_secondary_text_1');
    $wp_customize->add_control('highlight_secondary_text_1', array(
        'label' => __('Card 1 Secondary Text:'),
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
    $wp_customize->add_setting('highlight_main_text_2');
    $wp_customize->add_control('highlight_main_text_2', array(
        'id' => 'highlight_main_text_2',
        'label' => __('Card 2 Main Text:'),
        'section' => 'homepage_highlight'
    ));
    $wp_customize->add_setting('highlight_secondary_text_2');
    $wp_customize->add_control('highlight_secondary_text_2', array(
        'label' => __('Card 2 Secondary Text:'),
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
    $wp_customize->add_setting('highlight_main_text_3');
    $wp_customize->add_control('highlight_main_text_3', array(
        'id' => 'highlight_main_text_3',
        'label' => __('Card 3 Main Text:'),
        'section' => 'homepage_highlight'
    ));
    $wp_customize->add_setting('highlight_secondary_text_3');
    $wp_customize->add_control('highlight_secondary_text_3', array(
        'label' => __('Card 3 Secondary Text:'),
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
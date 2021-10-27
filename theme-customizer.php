<?php
add_action( 'customize_register', 'customize_register' );
function customize_register( WP_Customize_Manager $wp_customize ) {
    $wp_customize->remove_section( 'colors' );
    $wp_customize->remove_section( 'background_image' );
    $wp_customize->remove_section( 'static_front_page' );
    $wp_customize->remove_section( 'custom_css' );
    
    $wp_customize->add_panel( 'homepage' , array(
        'title' => __( 'Homepage' ),
        'priority' => 120,
    ));

    // Homepage Highlight
    $wp_customize->add_section( 'homepage_highlight' , array(
        'title' => __( 'Highlight' ),
        'panel' => 'homepage',
        'description ' => 'Main text is required for Highlight to display.  Background Image and Secondary Text are optional',
        'priority'   => 1,
    ));
    $wp_customize->add_setting( 'highlight_main_text_1' );
    $wp_customize->add_control( 'highlight_main_text_1', array(
        'id'=> 'highlight_main_text_1',
        'label' => __( 'Main Text 1:' ),
        'description ' => 'Main text is required for Highlight to display.  Background Image and Secondary Text are optional',
        'section' => 'homepage_highlight'
    ));
    $wp_customize->add_setting( 'highlight_secondary_text_1' );
    $wp_customize->add_control( 'highlight_secondary_text_1', array(
        'label' => __( 'Secondary Text 1:' ),
        'section' => 'homepage_highlight'
    ));
    $wp_customize->add_setting( 'highlight_image_1' );
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'highlight_image_1', array(
        'label' => __( 'Image 1:' ),
        'section' => 'homepage_highlight'
    )));

    $wp_customize->add_setting( 'highlight_main_text_2' );
    $wp_customize->add_control( 'highlight_main_text_2', array(
        'id'=> 'highlight_main_text_2',
        'label' => __( 'Main Text 2:' ),
        'section' => 'homepage_highlight'
    ));
    $wp_customize->add_setting( 'highlight_secondary_text_2' );
    $wp_customize->add_control( 'highlight_secondary_text_2', array(
        'label' => __( 'Secondary Text 2:' ),
        'section' => 'homepage_highlight'
    ));
    $wp_customize->add_setting( 'highlight_image_2' );
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'highlight_image_2', array(
        'label' => __( 'Image 2:' ),
        'section' => 'homepage_highlight'
    )));

    $wp_customize->add_setting( 'highlight_main_text_3' );
    $wp_customize->add_control( 'highlight_main_text_3', array(
        'id'=> 'highlight_main_text_3',
        'label' => __( 'Main Text 3:' ),
        'section' => 'homepage_highlight'
    ));
    $wp_customize->add_setting( 'highlight_secondary_text_3' );
    $wp_customize->add_control( 'highlight_secondary_text_3', array(
        'label' => __( 'Secondary Text 3:' ),
        'section' => 'homepage_highlight'
    ));
    $wp_customize->add_setting( 'highlight_image_3' );
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'highlight_image_3', array(
        'label' => __( 'Image 3:' ),
        'section' => 'homepage_highlight'
    )));
}

add_action( 'wp_head', 'customizer_css');
function customizer_css() { ?>
    <style type="text/css">
        <?php echo set_background_image('highlight_image_1', '.home .highlight.one'); ?>
        <?php echo set_background_image('highlight_image_2', '.home .highlight.two'); ?>
        <?php echo set_background_image('highlight_image_3', '.home .highlight.three'); ?>       
    </style>
<?php } 

function set_background_image($theme_mod, $css_class) {
    if ( get_theme_mod( $theme_mod ) ) $image = get_theme_mod( $theme_mod );
    else $image = 'none';  
    
    return $css_class . ' { background-image: url(' . $image . '); }';
}
?>
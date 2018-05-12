<?php
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {  
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'init', 'register_my_menu' );
function register_my_menu() {
    register_nav_menu('secondary',__( 'Secondary Menu' ));
}

add_filter( 'get_the_archive_title', 'get_the_archive_title_simple');
function get_the_archive_title_simple($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>' ;
    }
    return $title;
}

add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );
function understrap_all_excerpts_get_more_link($post_excerpt) {
    return $post_excerpt . ' ...<p class="mb-0"><a class="btn btn-primary" href="' . esc_url( get_permalink( get_the_ID() )) . '">' . __( 'Read More', 'understrap' ) . '</a></p>';
}

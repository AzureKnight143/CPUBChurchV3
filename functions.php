<?php
defined('ABSPATH') || exit;

define("theme_variable_address", "1945 COLLEGE AVE. HUNTINGTON, IN 46750");
define("theme_variable_phone", "(260) 356-2642");
define("theme_variable_email", "office@cpubchurch.com");
define("theme_variable_service_times", "9 AM & 10:30 AM");

require_once(__DIR__ . '/theme-customizer.php');

add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20);
function understrap_remove_scripts()
{
    wp_dequeue_style('understrap-styles');
    wp_deregister_style('understrap-styles');

    wp_dequeue_script('understrap-scripts');
    wp_deregister_script('understrap-scripts');
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    $the_theme = wp_get_theme();
    $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    // Grab asset urls.
    $theme_styles  = "/css/child-theme{$suffix}.css";
    $theme_scripts = "/js/child-theme{$suffix}.js";

    wp_enqueue_style('child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get('Version'));
    wp_enqueue_script('jquery');
    wp_enqueue_script('child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get('Version'), true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('after_setup_theme', 'add_child_theme_textdomain');
function add_child_theme_textdomain()
{
    load_child_theme_textdomain('understrap-child', get_stylesheet_directory() . '/languages');
}

add_filter('theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20);
function understrap_default_bootstrap_version($current_mod)
{
    return 'bootstrap5';
}

add_filter('theme_page_templates', 'remove_page_templates');
function remove_page_templates($templates)
{
    unset($templates['page-templates/blank.php']);
    unset($templates['page-templates/both-sidebarspage.php']);
    unset($templates['page-templates/empty.php']);
    unset($templates['page-templates/fullwidthpage.php']);
    unset($templates['page-templates/left-sidebarpage.php']);
    unset($templates['page-templates/right-sidebarpage.php']);
    return $templates;
}

add_action('init', 'register_my_menu');
function register_my_menu()
{
    register_nav_menu('footer', __('Footer Menu'));
}

add_filter('get_the_archive_title', 'get_the_archive_title_simple');
function get_the_archive_title_simple($title)
{
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    }
    return $title;
}

add_filter('wp_trim_excerpt', 'understrap_all_excerpts_get_more_link');
function understrap_all_excerpts_get_more_link($post_excerpt)
{
    return $post_excerpt . ' ...<p class="mb-0"><a class="btn btn-primary" href="' . esc_url(get_permalink(get_the_ID())) . '">' . __('Read More', 'understrap') . '</a></p>';
}

function understrap_post_nav()
{
    $previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
    $next     = get_adjacent_post(false, '', false);

    if (!$next && !$previous) {
        return;
    }
?>

    <nav class="container navigation post-navigation">
        <h2 class="sr-only"><?php _e('Post navigation', 'understrap'); ?></h2>
        <div class="row nav-links justify-content-between">
            <?php
            if (get_previous_post_link()) {
                previous_post_link('<span class="nav-previous">%link</span>', _x('<i class="fa fa-angle-left"></i>&nbsp;Previous Post', 'Previous post link', 'understrap'));
            }
            if (get_next_post_link()) {
                next_post_link('<span class="nav-next">%link</span>',     _x('Next Post&nbsp;<i class="fa fa-angle-right"></i>', 'Next post link', 'understrap'));
            }
            ?>
        </div>
    </nav>
<?php
}

add_filter('next_post_link', 'post_link_attributes');
add_filter('previous_post_link', 'post_link_attributes');
function post_link_attributes($output)
{
    return str_replace('<a href=', '<a class="btn btn-outline-primary" href=', $output);
}

add_filter('acf/load_field/name=category', 'acf_load_category_field_choices');
function acf_load_category_field_choices($field)
{
    $field['choices'] = array();

    $categories = get_categories();
    foreach ($categories as $category) {
        $field['choices'][$category->term_id] = $category->name;
    }

    return $field;
}

add_action('widgets_init', 'remove_sidebars', 11);
function remove_sidebars()
{
    unregister_sidebar('herocanvas');
    unregister_sidebar('hero');
    unregister_sidebar('statichero');
    unregister_sidebar('footerfull');
    unregister_sidebar('left-sidebar');
}
?>
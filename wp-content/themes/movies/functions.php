<?php
function check_required_plugins() {
    // Include the file that manages plugins in the admin area.
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');

    // Set the required plugins
    $required_plugins = [
        'advanced-custom-fields/acf.php', // This should match the main plugin file for ACF
        'tmdb-plugin/tmdb-plugin.php'     // Adjust this path to the main file of your TMDB plugin
    ];

    $inactive_plugins = [];

    foreach ($required_plugins as $plugin) {
        if (!is_plugin_active($plugin)) {
            $inactive_plugins[] = $plugin;
        }
    }

    if (!empty($inactive_plugins)) {
        // Deactivate the current theme
        switch_theme(WP_DEFAULT_THEME);
        wp_die(
            'This theme requires the following plugins to be active: ' . implode(', ', $inactive_plugins) . 
            '. <br>Please install and activate these plugins before using the theme.<br><a href="' . admin_url('themes.php') . '">&laquo; Return to Themes</a>'
        );
    }
}
add_action('after_switch_theme', 'check_required_plugins');

//adds dynamic title tag support
function movies_theme_support(){
    add_theme_support('title-tag');
    //adds dynamic logo support
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'movies_theme_support');

function movies_menu() {
    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'top-menu' => "Top menu",
        'footer' => "Footer Menu Items"
    );
    register_nav_menus($locations);
}
add_action('init', 'movies_menu');

//add class to li
function add_additional_class_on_li($classes, $item, $args) {
    // Ensure we are only modifying the 'top-menu' theme location
    if (isset($args->theme_location) && $args->theme_location == 'top-menu') {
        // Start with only 'menu-list-item' as the class
        $classes = ['menu-list-item'];

        // Check if this item is the current item or current item's ancestor
        if (in_array('current-menu-item', $item->classes) || in_array('current-menu-ancestor', $item->classes)) {
            $classes[] = 'active';
        }
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 10, 3);

function truncate_text($text, $max_chars = 150) {
    if (mb_strlen($text) > $max_chars) {
        $text = mb_substr($text, 0, $max_chars) . '...';
    }
    return $text;
}


// Styles
function movies_register_styles(){
    wp_enqueue_style('movies-style', get_template_directory_uri() . '/assets/css/styles.min.css');
    wp_enqueue_style('movies-googlefonts', "https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap");
    wp_enqueue_style('movies-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css");
}
add_action('wp_enqueue_scripts', 'movies_register_styles');


function movies_register_scripts(){
    wp_enqueue_script('movies-javascript', get_template_directory_uri() . '/assets/js/app.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'movies_register_scripts');

?>
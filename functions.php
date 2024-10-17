<?php

function enqueue_theme_styles() {
    // Enqueue stylesheet with file versioning based on last modification time
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/style.css', array(), filemtime( get_template_directory() . '/style.css' ), 'all' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_theme_styles' );

// Theme support
add_theme_support( 'menus' );

// Register multiple menu locations
function nav_menus() {
    $locations = array(
        'primary' => __('Primary menu', 'text-domain'),
        'footer' => __('Footer menu', 'text-domain')
    );
    register_nav_menus($locations);
}
add_action('init', 'nav_menus');

add_filter('wpcf7_autop_or_not', '__return_false');

function custom_body_class( $classes ) {
    // Check if it is NOT the front page AND NOT using the 'homepage.php' template
    if ( ! is_front_page() && ! is_page_template( 'homepage.php' ) ) { 
        $classes[] = 'sub_page';
    }

    return $classes;
}
add_filter( 'body_class', 'custom_body_class' );

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    // Start the element
    function start_el(&$output, $item, $depth = 0, $args = null, $current_object_id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        // Get the class names for <li>
        $class_names = join(' ', apply_filters('nav_menu_css_class', (array) $item->classes, $item, $args));
        $class_names = $class_names ? ' class="nav-item ' . esc_attr($class_names) . '"' : ' class="nav-item"';

        // Add <li> element
        $output .= $indent . '<li' . $class_names . '>';

        // Prepare <a> element
        $atts = array();
        $atts['href'] = !empty($item->url) ? $item->url : '';
        $atts['class'] = 'nav-link'; // Bootstrap class for <a>

        // Add additional attributes as necessary
        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);
        
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $attributes .= ' ' . esc_attr($attr) . '="' . esc_attr($value) . '"';
            }
        }

        // Build the <a> output
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        // Output the complete item
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

add_theme_support( 'block-templates' );

add_theme_support( 'post-thumbnails' );
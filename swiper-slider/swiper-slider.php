<?php
/*
Plugin Name: Dynamic Swiper Slider Plugin
Description: A WordPress plugin for a dynamic Swiper.js slider with image selection.
Version: 1.0
Author: Your Name
*/

// Enqueue Swiper.js library
function enqueue_swiper() {
    wp_enqueue_style('swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css');
    wp_enqueue_script('swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js', array('jquery'), '6.11.5', true);
}
add_action('wp_enqueue_scripts', 'enqueue_swiper');

// Shortcode for Swiper Slider
function dynamic_swiper_slider_shortcode() {
    ob_start();
    ?>

<!-- Swiper -->
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <?php
            $slider_items = get_theme_mod('swiper_slider_items', '[]');
            foreach ($slider_items as $item) {
                echo '<div class="swiper-slide">';
                echo '<a href="#"><img src="' . esc_url($item['image_url']) . '" alt="book"></a>';
                echo '</div>';
            }
            ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>

<?php
    return ob_get_clean();
}
add_shortcode('dynamic-swiper-slider', 'dynamic_swiper_slider_shortcode');

// Register a Customizer section for the Swiper slider
function register_swiper_customizer_section($wp_customize) {
    $wp_customize->add_section('swiper_slider', array(
        'title' => 'Swiper Slider',
        'priority' => 200,
    ));

    // Add control for adding/removing slider items
    $wp_customize->add_setting('swiper_slider_items', array(
        'default' => array(),
        'sanitize_callback' => 'sanitize_json',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'swiper_slider_items', array(
        'label' => 'Slider Items',
        'section' => 'swiper_slider',
        'type' => 'json',
    )));
}
add_action('customize_register', 'register_swiper_customizer_section');

// Sanitize JSON data
function sanitize_json($input) {
    $input = json_decode($input, true);
    return is_array($input) ? $input : array();
}

// Enqueue the Customizer JavaScript file
function enqueue_customizer_script() {
    wp_enqueue_script('customize-swiper', plugin_dir_url(__FILE__) . 'customize-swiper.js', array('customize-preview'), '1.0', true);
}
add_action('customize_preview_init', 'enqueue_customizer_script');
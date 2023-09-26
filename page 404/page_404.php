<?php
/*
Plugin Name: Custom HTML CSS JS
Description: The "Custom HTML CSS JS" plugin empowers you to inject custom HTML, CSS, and JavaScript code directly into your WordPress website using a simple shortcode. Whether you need to add custom styling, unique content elements, or interactive features, this plugin offers a hassle-free solution to enhance your website's design and functionality without the need for complex theme modifications.
Version: 1.0
Author: Md Nazmul Hasan Akash
*/
function custom_html_css_js_shortcode() {
    ob_start();
    include('404_page.html');
    $content = ob_get_clean();
    return $content;
}
add_shortcode('404_page', 'custom_html_css_js_shortcode');

?>
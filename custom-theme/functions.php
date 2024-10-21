<?php

function load_css()
{
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    //custom css styles

    wp_register_style('finder_css', get_template_directory_uri() . '/css/finder-style.css', array(), false, 'all');
    wp_enqueue_style('finder_css');

    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css');
    wp_enqueue_style('font_awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css');

    wp_enqueue_style('syracuse-css-cdn', 'https://fastly.cdn.syracuse.edu/dds/latest/dds.min.css');
}

add_action('wp_enqueue_scripts', 'load_css');


function load_js()
{
    wp_enqueue_script('jquery');
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
    wp_enqueue_script('bootstrap');
    wp_register_script('js_for_buttons', get_template_directory_uri() . '/js/button.js', null, false, false);
    wp_enqueue_script('js_for_buttons');
    wp_register_script('js_for_cards', get_template_directory_uri() . '/js/storageCard.js', null, false, false);
    wp_enqueue_script('js_for_cards');
}

add_action('wp_enqueue_scripts', 'load_js');

?>
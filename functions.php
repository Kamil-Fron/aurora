<?php
if (!defined('ABSPATH')) exit;

// Dodanie podstawowego wsparcia dla motywu
function zwiazek_chemikow_setup()
{
    // Dodanie wsparcia dla miniatur
    add_theme_support('post-thumbnails');

    // Dodanie wsparcia dla tytułu
    add_theme_support('title-tag');

    // Rejestracja menu
    register_nav_menus(array(
        'primary' => __('Menu główne', 'zwiazek-chemikow'),
        'footer' => __('Menu w stopce', 'zwiazek-chemikow')
    ));
}
add_action('after_setup_theme', 'zwiazek_chemikow_setup');

// Dodanie styli i skryptów
function zwiazek_chemikow_scripts()
{
    wp_enqueue_style('zwiazek-chemikow-style', get_stylesheet_uri());
    wp_enqueue_script('zwiazek-chemikow-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'zwiazek_chemikow_scripts');

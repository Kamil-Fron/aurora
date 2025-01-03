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
        'primary' => __('Menu główne', 'aurora'),
        'footer' => __('Menu w stopce', 'aurora')
    ));
}

// Rejestracja Custom Post Type dla dokumentów
function zwiazek_chemikow_register_post_types()
{
    register_post_type('document', array(
        'labels' => array(
            'name' => 'Dokumenty',
            'singular_name' => 'Dokument'
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-media-document',
        'supports' => array('title', 'editor', 'thumbnail')
    ));
}
add_action('init', 'zwiazek_chemikow_register_post_types');

// Rejestracja sidebars
function zwiazek_chemikow_widgets_init()
{
    register_sidebar(array(
        'name'          => 'Sidebar',
        'id'            => 'sidebar-1',
        'description'   => 'Główny sidebar',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'zwiazek_chemikow_widgets_init');


add_action('after_setup_theme', 'zwiazek_chemikow_setup');

// Dodanie styli i skryptów
function zwiazek_chemikow_scripts()
{
    wp_enqueue_style('zwiazek-chemikow-style', get_stylesheet_uri());
    wp_enqueue_script('zwiazek-chemikow-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'zwiazek_chemikow_scripts');

// functions.php - dodaj na końcu pliku

// Rejestracja Custom Post Type dla członków
function zwiazek_chemikow_register_member_post_type()
{
    register_post_type('member', array(
        'labels' => array(
            'name' => 'Członkowie',
            'singular_name' => 'Członek',
            'add_new' => 'Dodaj nowego członka',
            'add_new_item' => 'Dodaj nowego członka',
            'edit_item' => 'Edytuj członka',
        ),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'czlonkowie'),
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-groups'
    ));

    // Dodanie Custom Fields dla członków
    register_post_meta('member', 'member_id', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true
    ));
    register_post_meta('member', 'phone', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true
    ));
    register_post_meta('member', 'department', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true
    ));
}
add_action('init', 'zwiazek_chemikow_register_member_post_type');
